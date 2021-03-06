<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cource;
use App\Models\Category;
use App\Models\Lesson;
use App\Models\User;
use App\Models\Enroll;
use App\Models\content;
use App\Models\Teacher;
use App\Models\Centre;
use App\Models\Formation;
use App\Models\Group;
use App\Models\Stage;
class DashboardFrontController extends Controller
{


  
   
    public function index(){

        $cources=Cource::inRandomOrder()->take(4)->get();
   
      //  $categories = Category::with("cources")->get();
       // dd($content);
       return view("front.accuille",compact("cources"));
      
    }

    public function test(){

      $cources=Cource::with("category")->paginate(9);
    
      return view("test",compact("cources"));
     
  }
  public function video(){

   $lesson =Lesson::find(1);
  
    return view("index",compact("lesson")
  );
   
}
  public function admin(){

      
    // dd($enrolles);

      $lastusers =User::where('role', 0)->latest()->take(4)->get();
      $users =User::where('role', 0)->get();
      $teachers=Teacher::get();
      $cources =Cource::latest()->take(4)->get();
//dd( $lastusers);
      $courcecount=$cources->count();
      $centres=Centre::all();
      $formations=Formation::all();
      $groups=Group::all();
      $laststages=Stage::latest()->take(4)->get();

      //dd(  $enrolles);

      return view('admin.dashboard',compact('cources',"courcecount","lastusers","users","teachers","centres","formations","groups","laststages"));
    
  }
    
}
