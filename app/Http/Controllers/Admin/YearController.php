<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Year;

class YearController extends Controller
{
   public function years(){
       $years= Year::all();
        return view('admin.year.years',compact('years'));
   }
   public function addyear(){
   
     return view('admin.year.addyear');
}
public function storeyear(Request $request)
   
{
    $request->validate([
        'year' => 'required|integer',
    ]);



    $createdyear = Year::create([

      "year"=> request('year'),
      ]);

      $createdyear->save();
    
    
      toastr()->success('.لقد تم الاضافة  بنجاح');
    return redirect()->route('admin.years');
}
    public function removeyear($id){

        $year = Year::Find($id);
    
        $year->delete();
        toastr()->success('.لقد تم المسح  بنجاح');
    return back()->with('message', '.لقد تم المسح بنجاح ');

    }
    public function edityear($id)
    {
       
        $year = Year::findorfail($id);
           return view("admin.year.edityear",compact("year"));
          
    }
    

       public function updateyear($id,Request $request){
        $request->validate([
            'year' => 'required|integer',
        ]);
    
           $updateyear = Year::findorfail($id)->update([
           
               "year"=>$request['year'],
               ]);
               toastr()->success('.لقد تم التعديل  بنجاح');
           return redirect()->route('admin.years');
          
       }
    

}
