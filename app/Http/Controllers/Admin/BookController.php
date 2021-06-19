<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categorybook;
use App\Models\Book;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic;
use Illuminate\Support\Str;

class BookController extends Controller
{
    public function showcategory(){
        $categorybooks = Categorybook::get();
           return view("admin.books.showcategorybook",compact("categorybooks"));
          
    
       }
       public function  addcategorybook(){
         // dd($cource);
           return view("admin.books.addcategorybook");
  
       }

       public function showbook(){
        $books = Book::get();
           return view("admin.books.showbook",compact("books"));
          
    
       }
       public function  addbook(){
        $categorybooks = Categorybook::get();
        $books = Book::get();
       
           return view("admin.books.addbook",compact("categorybooks","books"));
  
       }
       

  /*      public function saveImage($image,$folder)
       {
           $file_extension=$image->getClientOriginalExtension ();
           $file_name = time().'book'.'.'.$file_extension;
           $path = $folder;
           $image -> move($path,$file_name);
           
           return $file_name;
   
    */
      

       public function addbookstore(Request $request)
   
       {
           $request->validate([
               'title' => 'required',
             
               'description' => 'required',
              
               'thumbnail' => 'required', 
            
               'categorybook_id' => 'required',
           ]);
           $img   = ImageManagerStatic::make($request->thumbnail)->resize(300,390)->encode('jpg');
           $name  = Str::random() .'book';

           Storage::disk('books')->put($name, $img);
         

     

           $createdbook = Book::create([
    
             "title"=> request('title'),
             "short_description"=>request('short_description'),
             "description"=>request('description'),
          
             "thumbnail"=>$name,
             "categorybook_id"=> request('categorybook_id'),
             ]);;
  
             $createdbook->save();
           
            
             toastr()->success('.لقد تم الاضافة  بنجاح');

           return redirect()->route('admin.books');
       }

       public function  editbook($id){
        $categorybooks = Categorybook::get();
        $book = Book::with('categorybook')->findorfail($id);
           return view("admin.books.editbook",compact("categorybooks","book"));
       }
       

       public function updatebook($id,Request $request)
   
       {
           $request->validate([
               'title' => 'required',
               'description' => 'required',  
              'thumbnail' => 'required',  
               'categorybook_id' => 'required',
           ]);
           $img   = ImageManagerStatic::make($request->thumbnail)->resize(300,390)->encode('jpg');
           $name  = Str::random() .'book';
           Storage::disk('books')->put($name, $img);

              $updatebook = Book::find($id)->update([
        
                "title"=> request('title'),
                "short_description"=>request('short_description'),
                "description"=>request('description'),
                "thumbnail"=>$name,
                "categorybook_id"=> request('categorybook_id'),
                ]);
                toastr()->success('.لقد تم التعديل  بنجاح');

           return redirect()->route('admin.books');
       }
     






























       public function remove($id){

        $book = Book::Find($id);
          if($book){
          
             Storage::disk("books")->delete($book->thumbnail);
/*              File::delete('/path/to/image/file');
 */ 
           
            $book->delete();
          }
        
          return redirect()->route('admin.books');
        //$this->comments =$this->comments->except($id);
       
       }
}
