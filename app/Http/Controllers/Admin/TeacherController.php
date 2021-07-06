<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Teacher;
use App\Models\Group;
use App\Models\Centre;
use Intervention\Image\ImageManagerStatic;

use Illuminate\Support\Facades\Storage;
class TeacherController extends Controller
{
    public function teachers (){

        $teachers= Teacher::with("group","center")->get();
        //dd($teachers);
        return view('admin.teacher.teachers',compact('teachers'));
    }
    public function addteacher(){
        $groups = Group::get();
        $centres = Centre::get();

    return view('admin.teacher.addteacher',compact('groups','centres'));
    }

    public function storeteacher(Request $request)
    {
    $request->validate([
        'name' => 'required|unique:teachers',
        'sex' => 'required', 
    
        'phone' => 'required',
        'sex' => 'required',
        'address' => 'required',
        'photo' => 'required', 

         
        'nots' => 'required',
        'center_id' => 'required',
        'group_id' => 'required',
    ]);
   
    try {
        $name  = $request->photo->getClientOriginalName().'-photo-teacher-'.$request->name.'jpg';
        
        $createdteacher = Teacher::create([
            'name' => request('name'),
            'phone' =>  request('phone'),
            'sex' =>  request('sex'),
            'address' =>  request('address'),
            "nots"=> request('nots'),
            "photo"=> $name,
            'group_id' => request('group_id'),
            'center_id' => request('center_id'),
        ]);
        $img   = ImageManagerStatic::make($request->photo)/* ->resize(367,190) */->encode('jpg');
        Storage::disk('teacher')->put($name, $img); 
        toastr()->success('.لقد تم الاضافة  بنجاح');
        return redirect()->route('admin.teacher'); 
    }
  
    catch (\Exception $e){

        return redirect()->back()->withErrors(['error' => $e->getMessage()]);

    }
    
    }
    public function removeteacher($id){

        try {  
            $teacher = teacher::Find($id);    
           if(  $teacher){
               //File::deleteDirectory(storage_path('app/public/teacherAttachement/'.$teacherAttachment->teacher->name));
               Storage::disk('teacher')->delete($teacher->photo); 
               $teacher->delete();
            }
            toastr()->success('.لقد تم المسح  بنجاح');
        return back()->with('message', '.لقد تم المسح بنجاح ');
       }
     
       catch (\Exception $e){
           toastr()->error('.هناك خطأ');
           return redirect()->back()->withErrors(['error' => $e->getMessage()]);
       }
        
          
   
       }



       public function editteacher($id)
       {
           
           $teacher = Teacher::findorfail($id);
           $groups = Group::get();
           $centres = Centre::get();
               return view("admin.teacher.editteacher",compact("teacher","groups","centres"));
           
       }
       public function showteacher($id)
       {
           
           $teacher = Teacher::findorfail($id);
          // $teachergroups = teachergroup::get();
               return view("admin.teacher.showteacher",compact("teacher"));
           
       }
       
   
           public function updateteacher($id,Request $request){

           
           $request->validate([
            
            'name' => 'required',
            'sex' => 'required', 
        
            'phone' => 'required',
            'sex' => 'required',
            'address' => 'required',
            //'photo' => 'required', 
    
             
            'nots' => 'required',
            'center_id' => 'required',
            'group_id' => 'required',
           ]);
           try {  

           

           if($request->photo){
            $name  = $request->photo->getClientOriginalName().'-photo-teacher-'.$request->name.'jpg';
            $teacher= Teacher::findorfail($id);  
            Storage::disk("teacher")->delete($teacher->photo);
               $updateteacher = Teacher::findorfail($id)->update([
                'name' => request('name'),
                'phone' =>  request('phone'),
                'sex' =>  request('sex'),
                'address' =>  request('address'),
                "nots"=> request('nots'),
                "photo"=> $name,
                'group_id' => request('group_id'),
                'center_id' => request('center_id'),
                   ]);
                   /* delete old phot */
                   
                   /* create a new photo */
                   $img   = ImageManagerStatic::make($request->photo)/* ->resize(367,190) */->encode('jpg');
                   Storage::disk('teacher')->put($name, $img); 

           }
           $updateteacher = Teacher::findorfail($id)->update([
            'name' => request('name'),
            'phone' =>  request('phone'),
            'sex' =>  request('sex'),
            'address' =>  request('address'),
            "nots"=> request('nots'),
           // "photo"=> $name,
            'group_id' => request('group_id'),
            'center_id' => request('center_id'),
               ]);

        
           
                   toastr()->success('.لقد تم التعديل  بنجاح');
               return redirect()->route('admin.teacher');
           }
         
           catch (\Exception $e){
               return redirect()->back()->withErrors(['error' => $e->getMessage()]);
           }
       
               
           
           }
           public function searchteacher(){
               $search_text = $_GET['searchteacher'];
               $teachers = Teacher::where('name','like','%'. $search_text.'%')->with('group')->where("role","0")->get();
               return view('admin.teacher.searchteacher',compact('teachers'));
   
   
   
   
           }
   
}
