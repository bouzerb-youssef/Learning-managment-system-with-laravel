<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Group;
class ChatController extends Controller
{
    public function index(){

       $groups=Group::all();
     //  dd($groups);
        return view ('chat',compact('groups'));
    }

    public function show(Group $group){
        $groups=Group::all();
 
  //   dd($groupconversation);
        return view ('showchat',compact('group','groups'));
    }
}
