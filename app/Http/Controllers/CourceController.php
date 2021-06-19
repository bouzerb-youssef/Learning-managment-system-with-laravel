<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cource;
use App\Models\Review;
use App\Models\Lesson;
use App\Models\Category;
use App\Models\Enroll;
use App\Models\User;
use App\Models\whatinthecoure;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic;
use Illuminate\Support\Str;

class CourceController extends Controller
{
 

   public function index(){
      $cources=Cource::with("category","sections")->paginate(9);
      
    
       return view("front.cources",compact("cources"));
      

   }

   public function show($id){
      $cource=Cource::with("sections","whatinthecoures")->find($id);
  //dd( $cource);
     $user=User::with('enrolls')->find(\Auth::user()->id); 
  $cources=Cource::take(4)->get();
      /*  $is_enroll = Enroll::whereHas('enrolls',function($q){
            $q->where('user_id'==\Auth::user()->id);

        })->get(); */
        $user_id=\Auth::user()->id;
        $is_enroll = Enroll::where([
            "user_id"=>$user_id,
            "cource_id"=>$id,
        ])->get();


       return view("front.courcedetailes",compact("cource" , "is_enroll","cources" ));
      
   }

   public function lessons($id){
    
      $cource=Cource::with("lessons")->Find($id);
     // dd($cource);
  
       return view("front.vedio",compact("cource"));
      

   }

   public function episode($id){
    
      $lesson=Lesson::Find($id);
      $episode=Lesson::with("section")->find($id);
      
     $cource_id = $episode->section->cource->id;
     $cource=Cource::with("sections")->find($cource_id); 

  //dd($lesson);
  
       return view("front.episodedetails",compact("lesson","cource"));
      

   }

   public function store(Request $request)
   
   {
     
       $request->validate([
           'title' => 'required',
           'short_description' => 'required',
           'description' => 'required',
          
           'level' => 'required', 
           'thumbnail' => 'required', 
           'category_id' => 'required',
         
         

       ]);
       $img   = ImageManagerStatic::make($request->thumbnail)->resize(367,190)->encode('jpg');
         
       $name  = Str::random() .'cource'.'.jpg';

      

       $createdCource = Cource::create([

         "title"=> request('title'),
         "short_description"=>request('short_description'),
         "description"=>request('description'),
         "level"=>request('level'),
         "thumbnail"=>"fghf",
         "category_id"=> request('category_id'),
         ]);;

         Storage::disk('cources')->put($name, $img);

         $createdCource->save();
     /*     $courcedetail = whatinthecoure::create([

          "detail"=> request('title'),
          "cource_id"=>request('cource_id')
         
         
  
          ]);; */
          $createdCource->save();
         /*  $courcedetail->save() */;
 
       return redirect()->route('admin.index');
   }

}
