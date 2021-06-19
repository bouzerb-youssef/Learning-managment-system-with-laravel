<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Cource;
use App\Models\Lesson;
use App\Models\Material;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;




    public function delete(){
        
        $cources =Cource::where("category_id",null)->get();
        if( $cources){
        foreach( $cources as $cource){
          Storage::disk("cources")->delete($cource->thumbnail);         
           $cource->delete();
        }}

   
    $lessons =Lesson::where("section_id",null)->get();
    if( $lessons){
    foreach( $lessons as $lesson){
       File::deleteDirectory(storage_path('app/public/lessons/'.$lesson->title));
        $lesson->delete();
    }}

    $materials =Material::where("section_id",null)->get();
    if( $materials){
    foreach( $materials as $material){
      
        File::deleteDirectory(storage_path('app/public/materials/'.$material->material));
        $material->delete();
    }}
    
     
        return redirect()->back();
    }
    



}
