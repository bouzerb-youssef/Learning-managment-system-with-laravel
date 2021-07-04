<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TrainshipController extends Controller
{
    public function trainships(){
        $trainships= Trainship::paginate(12);
       // dd( $formations);
         return view('admin.formation.formations',compact('trainships'));
    }
}
