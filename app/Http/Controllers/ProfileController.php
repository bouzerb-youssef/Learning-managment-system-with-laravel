<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ProfileController extends Controller
{
    public function index(){
        $user =User::with('enrolls','stages')->find(\Auth::user()->id);
       
        return view("front.profile",compact('user'));
    }
}
