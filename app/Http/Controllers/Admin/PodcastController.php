<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Podcast;
use App\Models\Cource;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class PodcastController extends Controller
{
    public function index(){

        $podcasts = Podcast::paginate(12);
        
      // dd( $podcasts);
    
       return view('admin.podcasts.podcasts',compact('podcasts'));
       }

       public function remove($id){

        $podcast = Podcast::Find($id);
        if( $podcast){
           
          $path = public_path()."/podcasts/".$podcast->podcast;
          unlink($path);
           
                 $podcast->delete();
        };
        toastr()->error('.لقد تم التعديل  بنجاح');

       return redirect()->back();
       }

       public function store(Request $request)
       
       {
                   
           $request->validate([
               'name' => 'required',
             'cource_id'=>'required',
               'podcast' => 'required',

           ]);
        $fileName = time().'.'.$request->podcast->extension();  
   
        $request->podcast->move(public_path('podcasts'), $fileName);
   
    
           $podcast = Podcast::create([

             "podcast"=>$fileName ,
             "name"=>request('name'),
             "cource_id"=> request('cource_id'),

            ]);
    
         
             toastr()->success('.لقد تم الانشاء  بنجاح');
           return redirect()->route("admin.podcasts");
       }

       public function  addpodcast(){
        $cources=Cource::all();
           return view("admin.podcasts.addpodcast",compact('cources'));
       }

       public function editpodcast($id){
        $podcast = Podcast::findorfail($id);
        $cources=Cource::all();
           return view("admin.podcasts.editpodcast",compact("podcast","cources")); 
       }

       public function update($id,Request $request){
        $podcast = Podcast::findorfail($id);
      //dd( $podcast->cource);
        $request->validate([
          "cource_id" => 'required',
          'name' => 'required',
         
      ]);
      
    

     if(request('podcast')){
    
      $path = public_path()."/podcasts/".$podcast->podcast;
      unlink($path);
      $fileName = time().'.'.$request->podcast->extension();  

      $request->podcast->move(public_path('podcasts'), $fileName);
            $updatepodcast = Podcast::findorfail($id)->update([
            
             "podcast"=>$fileName ,
             "name"=>request('name'),
             "cource_id"=> request('cource_id'),
                ]);

     }
     $updatepodcast = podcast::findorfail($id)->update([
      "name"=>request('name'),
      "cource_id"=> request('cource_id'),
         ]);

          
    toastr()->success('.لقد تم التعديل  بنجاح');
   
           return redirect()->route("admin.podcasts");
       }
}
