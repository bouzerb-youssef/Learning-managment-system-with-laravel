<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Enroll;


class EnrollController extends Controller
{
   public function store($id){

    $enroll = Enroll::create([
        
        'user_id' => \Auth::user()->id,
      
        'cource_id' => $id,
    
    ]);
    $enroll->save();
    return back()->with('message', '.لقد قمت بالتسجل في الكورس بنجاح ');;
  
   }
}
