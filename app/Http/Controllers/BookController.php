<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categorybook;
use App\Models\Book;
class BookController extends Controller
{



    public function index(){
        $categorybooks = Categorybook::get();
        $books = Book::paginate(10);
        return view('front.books.books',compact("categorybooks","books"));
    }



    public function show($id){
        $book = Book::findorfail($id);
        return view('front.books.show',compact('book'));
    }
}
