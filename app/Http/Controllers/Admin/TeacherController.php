<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Teacher;
use App\Models\Group;
use App\Models\Centre;

class TeacherController extends Controller
{
    public function teachers (){

        $teachers= Teacher::with("group")->get();
        return view('admin.teacher.teachers',compact('teachers'));
    }
    public function addteacher(){
        $groups = Group::get();
        $centres = Centre::get();

    return view('admin.teacher.addteacher',compact('groups','centres'));
    }
}
