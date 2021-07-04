<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentAttachment;
use App\Models\User;
use Illuminate\Support\Str;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class StudentAttachmentController extends Controller
{
    public function studentAttachments(){
        $studentAttachments= StudentAttachment::with('student')->paginate(12);
      // dd($student);
         return view('admin.studentAttachment.studentAttachments',compact('studentAttachments'));
    }
    public function addstudentAttachment(){
    
     
        $students= User::all();
        // dd($student);
      return view('admin.studentAttachment.addstudentAttachment',compact('students'));
 }

 public function storestudentAttachment(Request $request)
    
 {
     $request->validate([
         'genre' => 'required',
         'file' => 'required',
         'user_id' => 'required',
     ]);
     try {  

        $student=User::findorfail(request('user_id'));
       
        $fileName = time().'.'.$request->file->extension();  
   
        $request->file->move(public_path('student-attachment').'/'. $student->name, $fileName);
   //dd( $studentAttachment);
        $createdstudentAttachment = studentAttachment::create([
    
          "genre"=> request('genre'),
          
          'file' =>  $fileName ,
         
          'user_id' =>  request('user_id'),
          ]);
                
          toastr()->success('.لقد تم الاضافة  بنجاح');
        return redirect()->route('admin.studentAttachments', request('user_id'));  
    }
    catch (\Exception $e){
        toastr()->error('هناك خطأ');
        return redirect()->back()->withErrors(['error' => $e->getMessage()]);
    }
 }
 public function removestudentAttachment($id){
 
         $studentAttachment = StudentAttachment::with('student')->Find($id);
            //  dd($studentAttachment->student->name);
         try {  
            if($studentAttachment){
                $Attachement=StudentAttachment::with('student')->findorfail($id);
                $path = public_path()."/student-attachment/".$Attachement->student->name."/".$Attachement->file;
                unlink($path);
                $studentAttachment->delete();
             }
             toastr()->error('.لقد تم المسح  بنجاح');
             return back()->with('message', '.لقد تم المسح بنجاح ');
        }
        catch (\Exception $e){
            toastr()->error('.هناك خطأ');
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
         
     
         
 
     }
     public function editstudentAttachment($id)
     {
        
         $studentAttachment = studentAttachment::findorfail($id);
         $students= User::all();
            return view("admin.studentAttachment.editstudentAttachment",compact("studentAttachment","students"));
           
     }
     
 
        public function updatestudentAttachment($id,Request $request){
         $request->validate([
            'genre' => 'required',
            //'file' => 'required',
           
            'user_id' => 'required',
         ]);
   try {  
      if($request->file){
        $Attachement=StudentAttachment::with('student')->findorfail($id);
        $path = public_path()."/student-attachment/".$Attachement->student->name."/".$Attachement->file;
        unlink($path);
        $fileName = time().'.'.$request->file->extension();  
  
       $request->file->move(public_path('student-attachment').'/'. $Attachement->student->name, $fileName);
       
           $updatestudentAttachment = studentAttachment::findorfail($id)->update([
           
             
               "genre"=> request('genre'),
               
               'file' => $fileName ,

               'user_id' =>request('user_id')  ,

               ]);
      }
      $updatestudentAttachment = studentAttachment::findorfail($id)->update([
           
             
        "genre"=> request('genre'),
        
       

        'user_id' =>request('user_id')  ,

        ]);
        
              
        
                toastr()->success('.لقد تم التعديل  بنجاح');

            return redirect()->route('admin.studentAttachments');
        }
        catch (\Exception $e){
             return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
        }
      
}
