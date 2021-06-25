<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Formation;
use App\Models\Group;
use App\Models\Centre;
class StudentgroupController extends Controller
{
    public function studentgroups(){
        $studentgroups= Group::with("formation",'centre')->get();
    //  dd( $studentgroups);
         return view('admin.studentgroup.studentgroups',compact('studentgroups'));
    }
    public function addstudentgroup(){
    
        $formations = formation::get();
        $centres = Centre::get();
    

      return view('admin.studentgroup.addstudentgroup',compact('formations','centres'));
 }

 public function storestudentgroup(Request $request)
    
 {
     $request->validate([
         'title' => 'required',
         'description' => 'required',      
         'formation_id' => 'required',
         'centre_id' => 'required',
     ]);
 
 
 
     $createdstudentgroup = Group::create([
 
       "title"=> request('title'),
       
       'description' => request('description'),
      
       'formation_id' =>  request('formation_id'),
       'centre_id' =>  request('centre_id'),
       ]);
 
       $createdstudentgroup->save();
     
     
       toastr()->success('.لقد تم الاضافة  بنجاح');
     return redirect()->route('admin.studentgroups');
 }
     public function removestudentgroup($id){
 
         $studentgroup = Group::Find($id);
     
         $studentgroup->delete();
         toastr()->success('.لقد تم المسح  بنجاح');
     return back()->with('message', '.لقد تم المسح بنجاح ');
 
     }
     public function editstudentgroup($id)
     {
        
         $studentgroup = Group::findorfail($id);
         $formations = formation::get();
         $centres = Centre::get();
            return view("admin.studentgroup.editstudentgroup",compact("studentgroup","formations",'centres'));
           
     }
     
 
        public function updatestudentgroup($id,Request $request){
         $request->validate([
            'title' => 'required',
         'description' => 'required',      
         'formation_id' => 'required',
         'centre_id' => 'required',
         ]);
     
            $updatestudentgroup = Group::findorfail($id)->update([
            
                "title"=> request('title'),
       
                'description' => request('description'),
               
                'formation_id' =>  request('formation_id'),
                'centre_id' =>  request('centre_id'),
                ]);
                toastr()->success('.لقد تم التعديل  بنجاح');
            return redirect()->route('admin.studentgroups');
           
        }
}
