<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Student;
use App\Models\Group;


use Intervention\Image\ImageManagerStatic;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    public function index(){
            $users = User::with('enrolls')->paginate(10);
        return view('admin.students.studentlist',compact("users"));
    }
    public function students(){
        $students= User::with("group")->where("role","0")->get();
        return view('admin.student.students',compact('students'));
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
        'photo' => 'required', 

       
        'group_id' => 'required',
    ]);
   
    try {
        $img   = ImageManagerStatic::make($request->photo)/* ->resize(367,190) */->encode('jpg');
        
        $name  = Str::random() .'photo-student'.'jpg';
        Storage::disk('student')->put($name, $img); 
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
            "photo"=> $name,
            'group_id' => request('group_id'),
        ]);
    
        $createdstudent->save();   
        toastr()->success('.لقد تم الاضافة  بنجاح');
        return redirect()->route('admin.students'); 
    }
  
    catch (\Exception $e){
        return redirect()->back()->withErrors(['error' => $e->getMessage()]);
    }
    }
    public function removestudent($id){



    
     try {  

         $student = User::with('studentAttachments')->Find($id);    
    dd($student);
        $studentAttachment = StudentAttachment::with('student')->Find($id);

        //  dd($studentAttachment->student->name);

        if($studentAttachment){

            File::deleteDirectory(storage_path('app/public/studentAttachement/'.$studentAttachment->student->name));

            $studentAttachment->delete();

         }
        

         $student->delete();
         toastr()->success('.لقد تم المسح  بنجاح');
     return back()->with('message', '.لقد تم المسح بنجاح ');
    }
  
    catch (\Exception $e){
        toastr()->error('.هناك خطأ');
        return redirect()->back()->withErrors(['error' => $e->getMessage()]);
    }
     
       

    }
    public function editstudent($id)
    {
        
        $student = User::findorfail($id);
        $studentgroups = Group::get();
            return view("admin.student.editstudent",compact("student","studentgroups"));
        
    }
    public function showstudent($id)
    {
        
        $student = User::findorfail($id);
       // $studentgroups = studentgroup::get();
            return view("admin.student.showstudent",compact("student"));
        
    }
    

        public function updatestudent($id,Request $request){
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
                             'photo' => 'required', 

           
            'group_id' => 'required',
        ]);
        try {  
            $updatestudent = User::findorfail($id)->update([
             
    
                'name' => request('name'),
                'email' =>  request('email'),
                'password' =>   Hash::make(request('password')),
                'age' =>  request('age'),
                'phone' =>  request('phone'),
                'sex' =>  request('sex'),
                "cin"=> request('cin'),
                
                'familySituation' => request('familySituation'),
                'childrenNmb' =>  request('childrenNmb'),
                'educationLevel' =>  request('educationLevel'),
                'address' =>  request('address'),
                "nots"=> request('nots'),

                'group_id' => request('group_id'),
                ]);
                toastr()->success('.لقد تم التعديل  بنجاح');
            return redirect()->route('admin.students');
        }
      
        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    
            
        
        }

}
