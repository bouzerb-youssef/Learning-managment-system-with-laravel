<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Stage;
class StageController extends Controller
{
    public function stages(){
        $stages = Stage::with('user')->paginate(10);
        //dd($users);
            return view('admin.stages.stages',compact("stages"));
        }
    public function addstage($id){
    $student = User::findorfail($id);
    
        return view('admin.stages.addstage',compact('student'));
    }
    public function storestage(Request $request){
        $request->validate([
            'user_id' => 'required',
            'title' => 'required',
            'description' => 'required',
            'address' => 'required', 
            'genre' => 'required', 
         
        ]);
        $createstage = Stage::create([
 
          "user_id"=> request('user_id'),
          "title"=>request('title'),
          "description"=>request('description'),
          "address"=>request('address'),
          "genre"=> request('genre'),
         
          ]);

          $createstage->save();
          toastr()->success('.لقد تم الاضافة  بنجاح');
        return redirect()->route('admin.stages')->with('message','لقد قمت بالانشاء بنجاح');

    }
    public function remove($id){

        $stage = Stage::Find($id);
      
          $stage->delete();
          toastr()->success('.لقد تم المسح  بنجاح');
     return redirect()->back();
  
    }
    public function editstage($id){

        $stage = Stage::with('user')->Find($id);
        $users = User::all();
         
     return view('admin.stages.editestage',compact('stage',"users"));
  
    }
    public function updatestage($id,Request $request){
     
        $request->validate([
            'user_id' => 'required',
            'title' => 'required',
            'description' => 'required',
            'address' => 'required', 
            'genre' => 'required', 
         
        ]);
            
       $updateStage = Stage::findorfail($id)->update([
       
            "user_id"=> request('user_id'),
            "title"=>request('title'),
            "description"=>request('description'),
            "address"=>request('address'),
            "genre"=> request('genre'),
           ]);

       return redirect()->route('admin.students')->with('message','لقد قمت التعديل بنجاح');
      
   }
   public function showstage($id){

    $stage = Stage::with('user')->Find($id);
    
     
 return view('admin.stages.showstage',compact('stage'));

}

}
