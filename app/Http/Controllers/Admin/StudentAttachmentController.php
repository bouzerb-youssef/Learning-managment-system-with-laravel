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
    public function studentAttachments($id){
        $student= User::with('studentAttachments')->findorfail($id);
      // dd($student);
         return view('admin.studentAttachment.studentAttachments',compact('student'));
    }
    public function addstudentAttachment($id){
    
     
        $student= User::findorfail($id);
        // dd($student);
      return view('admin.studentAttachment.addstudentAttachment',compact('student'));
 }

 public function storestudentAttachment(Request $request)
    
 {
     $request->validate([
         'genre' => 'required',
         'file' => 'required',
         'user_id' => 'required',
     ]);
     try {  
        $name = Str::random().'-'.request('file')->getClientOriginalName();

        $studentAttachment =request('file');
        $student=User::findorfail(request('user_id'));
        $storestudentAttachement=Storage::disk('studentAttachement')->put($student->name, $studentAttachment);

   //dd( $studentAttachment);
        $createdstudentAttachment = studentAttachment::create([
    
          "genre"=> request('genre'),
          
          'file' =>  $storestudentAttachement ,
         
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
                $studentAttachement=Storage::disk('studentAttachement')->delete($studentAttachment->file);

                //File::deleteDirectory(storage_path('app/public/studentAttachement/'.$studentAttachment->student->name.'/'.$studentAttachment->file));
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
        
            return view("admin.studentAttachment.editstudentAttachment",compact("studentAttachment"));
           
     }
     
 
        public function updatestudentAttachment($id,Request $request){
         $request->validate([
            'genre' => 'required',
            'file' => 'required',
           
           // 'user_id' => 'required',
         ]);
  //  try {  
         $Attachement=StudentAttachment::with('student')->findorfail($id);
        
        Storage::disk('studentAttachement')->delete($Attachement->file);
         $studentAttachmentfile =request('file');
         $storestudentAttachement=Storage::disk('studentAttachement')->put($Attachement->student->name, $studentAttachmentfile);
 
            $updatestudentAttachment = studentAttachment::findorfail($id)->update([
            
              
                "genre"=> request('genre'),
                
                'file' =>  $storestudentAttachement ,

                'user_id' =>  $Attachement->student->id,

                ]);
              
        
                toastr()->success('.لقد تم التعديل  بنجاح');

            return redirect()->route('admin.studentAttachments',$Attachement->student->id);
       // }
       // catch (\Exception $e){
        //     return redirect()->back()->withErrors(['error' => $e->getMessage()]);
       // }
        }
      
}
