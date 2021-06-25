<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Cource;
use App\Models\Content;
use App\Models\Teacher;
class HomeController extends Controller
{
    public function check(){
        $lastusers =User::where('role', 0)->latest()->take(4)->get();
        $users =User::where('role', 0)->get();
        $teachers=Teacher::get();
        $cources =Cource::latest()->take(4)->get();
        $role =\Auth::user()->role ;

        $courcecount=$cources->count();
  
        if ($role==1) {
            return view('admin.dashboard',compact("courcecount","cources","users","teachers","lastusers"));
        }else{
            return view('front.accuille',compact("cources"));
        }
    }
}
