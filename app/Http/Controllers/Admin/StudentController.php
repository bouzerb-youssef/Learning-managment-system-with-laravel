<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Student;
use App\Models\Group;

use App\Models\StudentAttachment;
use Intervention\Image\ImageManagerStatic;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
  
    public function students(){
        $students= User::with("group")->where("role","0")->paginate(12);
        return view('admin.student.students',compact('students'));
    }
       
    public function studentattachment($id){
        $student= User::find($id);
        return view('admin.student.studentattachments',compact('student'));
    }

    public function addstudent(){
        $groups = Group::get();

    return view('admin.student.addstudent',compact('groups'));
    }

    public function storestudent(Request $request)
    {
    $request->validate([
        'name' => 'required|unique:users',
        'email' => 'required|unique:users',
        'password' => 'required',
        'age' => 'required',
        'phone' => 'required',
        'sex' => 'required',
        'cin' => 'required',
        'familySituation' => 'required',
        'childrenNmb' => 'required',
        'educationLevel' => 'required',
        'address' => 'required',
        'photo' => 'required|image|mimes:jpg,jpeg,png,svg,gif|max:2048', 
        'group_id' => 'required',
    ]);
   
    try {
     
        $fileName = request('name').".".Str::random().'.'.request('photo')->extension();  
        $actdenaissance =request('name').".". Str::random().'.'.$request->actdenaissance->extension();  
        $cincopie = request('name').".".Str::random().'.'.$request->cincopie->extension();  
        $ramid = request('name').".".Str::random().'.'.$request->ramid->extension();  
      
        $request->actdenaissance->move(public_path('student-attachment').'/'.request('name'), $actdenaissance);
        $request->cincopie->move(public_path('student-attachment').'/'.request('name'), $cincopie);
        $request->ramid->move(public_path('student-attachment').'/'.request('name'), $ramid);


        $createdstudent = User::create([

            'name' => request('name'),
            'email' =>  request('email'),
            'password' =>  Hash::make(request('password')),
            'age' =>  request('age'),
            'phone' =>  request('phone'),
            'sex' =>  request('sex'),
            "cin"=> request('cin'), 
            'familySituation' => request('familySituation'),
            'childrenNmb' =>  request('childrenNmb'),
            'educationLevel' =>  request('educationLevel'),
            'address' =>  request('address'),
            "nots"=> request('nots'),
            "photo"=> request('name').$fileName,
            'group_id' => request('group_id'),
            "actdenaissance"=> $actdenaissance,
            "cincopie"=>$cincopie,
            "ramid"=> $ramid,
            
        ]) ;
    
        $img = ImageManagerStatic::make($request->photo)->resize(200,200)->encode('jpg');
        Storage::disk('student')->put(request('name').$fileName, $img); 

        toastr()->success('.لقد تم الاضافة  بنجاح');
        return redirect()->route('admin.students'); 
    }
  
    catch (\Exception $e){
        return redirect()->back()->withErrors(['error' => $e->getMessage()]);
    }
    }
    public function removestudent($id){



    
    // try {  

         $student = User::Find($id);   
        //dd( $student->$studentAttachment );
         if( $student){
           
                    $path1 = public_path()."/student-attachment/".$student->name."/".$student->actdenaissance;
                    unlink($path1);
                    $path2 = public_path()."/student-attachment/".$student->name."/".$student->cincopie;
                    unlink($path2);
                    $path3 = public_path()."/student-attachment/".$student->name."/".$student->ramid;
                    unlink($path3);
                    
                
             
            Storage::disk('student')->delete($student->photo); 
            $student->delete();
         }
       

        

         
         toastr()->success('.لقد تم المسح  بنجاح');
     return back()->with('message', '.لقد تم المسح بنجاح ');
    }
    public function editstudent($id)
    {
        
        $student = User::findorfail($id);
        $groups = Group::get();
      
            return view("admin.student.editstudent",compact("student","groups"));
        
    }
    public function showstudent($id)
    {
        
        $student = User::findorfail($id);
       // $studentgroups = studentgroup::get();
            return view("admin.student.showstudent",compact("student"));
        
    }
    

        public function updatestudent($id,Request $request){
            //dd(request('photo'));

         /* Glob vars  */
           $ramid;  
           $actdenaissance;  
           $cincopie; 
           $filename;
        $request->validate([
         
            'name' => 'required',
            'email' => 'required',
             'password' => 'required',
            'age' => 'required',
            'phone' => 'required',
            'sex' => 'required',
            'cin' => 'required',
            'familySituation' => 'required',
            'childrenNmb' => 'required',
            'educationLevel' => 'required',
            'address' => 'required',
            //'photo' => 'required|image|mimes:jpg,jpeg,png,svg,gif|max:2048', 

           
            'group_id' => 'required',
        ]);
        try { 
            $student= User::findorfail($id);
             
               
                   
                    if ($request->file('actdenaissance')){
                        
                        $path1 = public_path()."/student-attachment/".$student->name."/".$student->actdenaissance;
                        unlink($path1);
                        $actdenaissance =request('name').".". Str::random().'.'.$request->actdenaissance->extension(); 
                        $request->actdenaissance->move(public_path('student-attachment').'/'.request('name'), $actdenaissance);
                    }

                    if ($request->file('cincopie')){
                        
                        $path2 = public_path()."/student-attachment/".$student->name."/".$student->cincopie;
                        unlink($path2);
                        $cincopie =request('name').".". Str::random().'.'.$request->cincopie->extension(); 
                        $request->cincopie->move(public_path('student-attachment').'/'.request('name'), $cincopie);
                    }

                    if ($request->file('ramid')){
                        
                        $path3 = public_path()."/student-attachment/".$student->name."/".$student->ramid;
                        unlink($path3);
                        $ramid =request('name').".". Str::random().'.'.$request->ramid->extension(); 
                        $request->ramid->move(public_path('student-attachment').'/'.request('name'), $ramid);
                    }
                    if ($request->file('photo')){
                        
                        Storage::disk('student')->delete($student->photo); 
                        $fileName = request('name').".".Str::random().'.'.request('photo')->extension();  

                        $img = ImageManagerStatic::make($request->photo)->resize(200,200)->encode('jpg');
                        Storage::disk('student')->put(request('name').$fileName, $img); 
                    }
                     
                   
                    $updatestudent = User::findorfail($id)->update([
                        'name' => request('name'),
                        'email' =>  request('email'),
                        'password' =>  Hash::make(request('password')),
                        'age' =>  request('age'),
                        'phone' =>  request('phone'),
                        'sex' =>  request('sex'),
                        "cin"=> request('cin'), 
                        'familySituation' => request('familySituation'),
                        'childrenNmb' =>  request('childrenNmb'),
                        'educationLevel' =>  request('educationLevel'),
                        'address' =>  request('address'),
                        "nots"=> request('nots'),
                        "photo"=> $request->File('photo') ? request('name'). $fileName : $student->photo,
                        'group_id' => request('group_id'),
                        'actdenaissance' => $request->File('actdenaissance') ? $actdenaissance : $student->actdenaissance,
                        'cincopie' => $request->File('cincopie') ? $cincopie : $student->cincopie,
                        'ramid' => $request->File('ramid') ? $ramid : $student->ramid,
                        ]);
                           
                  
                

                toastr()->success('.لقد تم التعديل  بنجاح');
            return redirect()->route('admin.students');
        }
      
        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    
            
        
        }
        public function searchstudent(){
            $search_text = $_GET['searchstudent'];
            $students = User::where('name','like','%'. $search_text.'%')->with('group')->where("role","0")->get();
            return view('admin.student.searchstudent',compact('students'));




        }

}
