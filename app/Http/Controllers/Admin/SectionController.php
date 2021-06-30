<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Section;
use App\Models\Cource;

class SectionController extends Controller
{
  public function  sections($id){

   $cource=Cource::with('lessons','materials','whatinthecoures')->find($id);
  
 //dd($cource);
 //  $cources=Cource::get();

    
    
      return view("admin.sections.sections",compact('cource'));

  }



  public function removesection($id){

    $section = Section::Find($id);
        $section->delete();
   return redirect()->back();/* route("admin.index") */;
   }

   public function storesection(Request $request)
   
   {
     
       $request->validate([
           'section' => 'required',
         
           'description' => 'required',
    
           'cource_id' => 'required',
       ]);
       $section = Section::create([

         "section"=> request('section'),
         "description"=>request('description'),
         "cource_id"=> request('cource_id'),
         ]);;
         $section->save();
       return redirect()->route("admin.sections",request('cource_id'));
   }

   public function  addsection($id){

    $cource=Cource::findorfail($id);
//dd( $cource->id);
     
     
       return view("admin.sections.addsection",compact('cource'));

   }
    public function editsection($id){
        $section = Section::findorfail($id);
           return view("admin.sections.editsection",compact("section")); 
       }
       public function updatesection($id,Request $request){
        $request->validate([
          'section' => 'required',
          'description' => 'required',
          'cource_id' => 'required',
      ]);
     
           $updatesection = Section::findorfail($id)->update([
           
               "section"=>$request['section'],
               "description"=>$request['description'],
               "cource_id"=>$request['cource_id'],
               ]);
    //$sectionid=Section::with('section')->Find($id);
          
    toastr()->success('.لقد تم التعديل  بنجاح');
    
           return redirect()->route('admin.sections',$request['cource_id']);
          
       }
}
