<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Material;
use App\Models\Section;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;


class MaterialController extends Controller
{
    public function remove($id){

        $material = material::Find($id);
        if( $material){
           
                //Storage::disk("materials")->delete($material->material);
                File::deleteDirectory(storage_path('app/public/materials/'.$material->material));
           
                 $material->delete();
        };
        toastr()->error('.لقد تم التعديل  بنجاح');

       return redirect()->back();
       }

       public function store(Request $request)
       
       {
                   
  
      
         
           $request->validate([
               'material' => 'required',
             
               'title' => 'required',
        
               
             
             
    
           ]);
           $name =request('material')->getClientOriginalName();

           $material =request('material');
   
          $storematerial=Storage::disk('materials')->put( $name,  $material);
   
    
           $material = material::create([
    
             "material"=> $name ,
             "title"=>request('title'),
             "cource_id"=>  $material->cource->id,
            ]);;
    
             $material->save();
             $section=Section::with('cource')->find(request('section_id'));  
             toastr()->success('.لقد تم الانشاء  بنجاح');
           return redirect()->route("admin.sections",$section->cource->id);
       }
    
       public function  addmaterial($id){
    
        $section=Section::findorfail($id);

         
         
           return view("admin.materials.addmaterial",compact('section'));
    
       }
        public function editmaterial($id){
            $material = material::findorfail($id);
               return view("admin.materials.editmaterial",compact("material")); 
           }

           public function update($id,Request $request){
            $material = Material::findorfail($id);
          //dd( $material->cource);
            $request->validate([
              'material' => 'required',
              'title' => 'required',
             
          ]);
          File::deleteDirectory(storage_path('app/public/materials/'.$material->material));
          $name =request('material')->getClientOriginalName();
//dd(request('material'));
//$path = $request->file('material')->store(
    //'materials', 'public'
//);
          $materiall =request('material');
  
         $storematerial=Storage::disk('materials')->put($request['title'].$name, $materiall);
  
         
               $updatematerial = material::findorfail($id)->update([
               
                   "material"=>   $storematerial,
                   "materialname"=>$request['title'],
                 "cource_id"=>  $material->cource->id,
                   ]);
        //$materialid=material::with('material')->Find($id);
              
        toastr()->success('.لقد تم التعديل  بنجاح');
        $section=Section::with('cource')->find(request('section_id'));  
               return redirect()->route("admin.sections",$material->cource->id);
           }
}
