<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Cource;
use App\Models\Category;
use App\Models\User;
use App\Models\Content;
class CategoryController extends Controller
{








    
    public function show($id){
        
        $category=Category::with("cources")->find($id);
        $content=Content::select(["hero_image1","title1",'description1','button1'])->find(1);
      
        
        $categories=Category::take(4)->get();
        $user =User::with('enrolls')->find(\Auth::user()->id);
  // dd($user);
         return view("test",compact("categories","category","user","content"));
        
  
     }
}
