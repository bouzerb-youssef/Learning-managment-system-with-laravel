<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Material;
use App\Models\Cource;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;



class MaterialController extends Controller
{
  public function index(){

    $materials = material::paginate(12);
    
  // dd( $materials);

   return view('admin.materials.materials',compact('materials'));
   }








    public function remove($id){

        $material = material::Find($id);
        if( $material){
           
          $path = public_path()."/materials/".$material->material;
          unlink($path);
           
                 $material->delete();
        };
        toastr()->error('.لقد تم التعديل  بنجاح');

       return redirect()->back();
       }

       public function store(Request $request)
       
       {
                   
  
      
         
           $request->validate([
               'material' => 'required',
             
               'materialname' => 'required',
        
               
             
             
    
           ]);
          

        
            
        $fileName = time().'.'.$request->material->extension();  
   
        $request->material->move(public_path('materials'), $fileName);
   
    
           $material = material::create([

             "material"=>$fileName ,
             "materialname"=>request('materialname'),
             "cource_id"=> request('cource_id'),

            ]);
    
         
             toastr()->success('.لقد تم الانشاء  بنجاح');
           return redirect()->route("admin.materials");
       }
    
       public function  addmaterial(){
        $cources=Cource::all();
           return view("admin.materials.addmaterial",compact('cources'));
       }

        public function editmaterial($id){
            $material = material::findorfail($id);
            $cources=Cource::all();
               return view("admin.materials.editmaterial",compact("material","cources")); 
           }

           public function update($id,Request $request){
            $material = Material::findorfail($id);
          //dd( $material->cource);
            $request->validate([
              "cource_id" => 'required',
              'materialname' => 'required',
             
          ]);
          
        

         if(request('material')){
        
          $path = public_path()."/materials/".$material->material;
          unlink($path);
          $fileName = time().'.'.$request->material->extension();  
   
          $request->material->move(public_path('materials'), $fileName);
                $updatematerial = material::findorfail($id)->update([
                
                 "material"=>$fileName ,
                 "materialname"=>request('materialname'),
                 "cource_id"=> request('cource_id'),
                    ]);

         }
         $updatematerial = material::findorfail($id)->update([
          "materialname"=>request('materialname'),
          "cource_id"=> request('cource_id'),
             ]);

              
        toastr()->success('.لقد تم التعديل  بنجاح');
       
               return redirect()->route("admin.materials");
           }
}
