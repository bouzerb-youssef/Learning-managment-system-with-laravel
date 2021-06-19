<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Cource;
use App\Models\Content;
class HomeController extends Controller
{
    public function check(){
        $users =User::all();
        $cources =Cource::all();
        $courcecount=$cources->count();
        $role =\Auth::user()->role ;
        $cources=Cource::take(4)->get();
        $content=Content::find(1);
        if ($role==1) {
            return view('admin.dashboard',compact("courcecount","cources","users"));
        }else{
            return view('front.accuille',compact("cources","content"));
        }
    }
}
