<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Formation;
use App\Models\Year;
use App\Http\Controllers\Controller;


class FormationController extends Controller
{
    public function formations(){
        $formations= Formation::with("year")->get();
       // dd( $formations);
         return view('admin.formation.formations',compact('formations'));
    }
    public function addformation(){
    
        $years = Year::get();

      return view('admin.formation.addformation',compact('years'));
 }

 public function storeformation(Request $request)
    
 {
     $request->validate([
         'title' => 'required',
         'description' => 'required',
         'datebegun' => 'required',
         'dateend' => 'required',
         'year_id' => 'required',
     ]);
 
 
 
     $createdformation = Formation::create([
 
       "title"=> request('title'),
       
       'description' => request('description'),
       'datebegun' =>  request('datebegun'),
       'dateend' =>  request('dateend'),
       'year_id' =>  request('year_id'),
       ]);
 
       $createdformation->save();
     
     
       toastr()->success('.لقد تم الاضافة  بنجاح');
     return redirect()->route('admin.formations');
 }
     public function removeformation($id){
 
         $formation = Formation::Find($id);
     
         $formation->delete();
         toastr()->success('.لقد تم المسح  بنجاح');
     return back()->with('message', '.لقد تم المسح بنجاح ');
 
     }
     public function editformation($id)
     {
        
         $formation = Formation::findorfail($id);
         $years = Year::get();
            return view("admin.formation.editformation",compact("formation","years"));
           
     }
     
 
        public function updateformation($id,Request $request){
         $request->validate([
            'title' => 'required',
            'description' => 'required',
            'datebegun' => 'required',
            'dateend' => 'required',
            'year_id' => 'required',
         ]);
     
            $updateformation = Formation::findorfail($id)->update([
            
                "title"=> request('title'),
                'description' => request('description'),
                'datebegun' =>  request('datebegun'),
                'dateend' =>  request('dateend'),
                'year_id' =>  request('year_id'),
                ]);
                toastr()->success('.لقد تم التعديل  بنجاح');
            return redirect()->route('admin.formations');
           
        }
}
