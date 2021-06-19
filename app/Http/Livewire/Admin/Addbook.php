<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use App\Models\Book;
use Intervention\Image\ImageManagerStatic;
use Illuminate\Support\Str;
class Addbook extends Component
{
    use WithFileUploads;
    public $categorybooks;
    public $title;
    public $description;
   
    public $thumbnail;
    public $categorybook_id;
        public function mount($categorybooks){
            $this->categorybooks =$categorybooks;
        }

    public function addbook(){
        $this->validate([
            'title' => 'required|max:70',
            'description' => 'required',
            'thumbnail' => 'required',
            'categorybook_id' => 'required',
            
          ]);  
         

          $img= ImageManagerStatic::make($this->thumbnail)->resize(50,50)->encode('jpg');

          $path =$img->store('public/bo');


          $createbook = Book::create([

            "title"=> $this->title,
            'description' =>  $this->description,
            'categorybook_id' =>  $this->categorybook_id,

            "thumbnail"=>explode('/', $path)[1],
    
            ]);
           
            //$createdcourcedetail->save();
            $this->title ="";
            $this->description ="";
            $this->thumbnail ="";
            $this->categorybook_id ="";
            session()->flash('message', 'Comment added successfully 😊');

    }
 


    public function remove($id){

        $book = Book::Find($id);
  
      
        if( $book){
         
  
      
        Storage::disk("storage/books")->delete($book->thumbnail);
         
          $book->delete();
      }


    }







    public function render()
    {
        $books = book::get();
        return view('livewire.admin.addbook',compact("books"));
    }
}
