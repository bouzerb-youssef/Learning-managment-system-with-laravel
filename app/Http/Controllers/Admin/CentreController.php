<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Centre;
class CentreController extends Controller
{
    public function centres(){
        $centres= centre::all();
         return view('admin.centre.centres',compact('centres'));
    }
    public function addcentre(){
    
      return view('admin.centre.addcentre');
 }
 public function storecentre(Request $request)
    
 {
     $request->validate([
         'centre' => 'required|unique:centres',
     ]);
     $createdcentre = Centre::create([
       "centre"=> request('centre'),
       ]);
 
       $createdcentre->save();    
       toastr()->success('.لقد تم الاضافة  بنجاح');
     return redirect()->route('admin.centres');
 }
     public function removecentre($id){
 
         $centre = Centre::Find($id);
     
         $centre->delete();
         toastr()->success('.لقد تم المسح  بنجاح');
     return back()->with('message', '.لقد تم المسح بنجاح ');
 
     }
     public function editcentre($id)
     {
        
         $centre = Centre::findorfail($id);
            return view("admin.centre.editcentre",compact("centre"));
           
     }
     
 
        public function updatecentre($id,Request $request){
         $request->validate([
             'centre' => 'required',
         ]);
     
            $updatecentre = Centre::findorfail($id)->update([
            
                "centre"=>$request['centre'],
                ]);
                toastr()->success('.لقد تم التعديل  بنجاح');
            return redirect()->route('admin.centres');
           
        }
}
