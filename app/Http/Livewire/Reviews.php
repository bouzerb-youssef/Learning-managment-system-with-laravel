<?php

namespace App\Http\Livewire;
use App\Models\Review;

use Illuminate\Support\Facades\Auth;

use Livewire\Component;

class Reviews extends Component
{
    public $review="";
    public  $cource_id ;

    public function mount ( $cource)
    {
       
     
     $this->cource_id =$cource->id;   

    }
    public function updated($field)
    {
        $this->validateOnly($field, ['review' => 'required|max:250']);
    }
        public function addComment(){
            $this->validate([
                'review' => 'required|max:255',
              ]);
            $createdCommnet = Review::create([

                "review"=> $this->review,
                "rating"=> "8"/* $this->rate */,
                "user_id"=> Auth::user()->id,
                "cource_id"=>$this->cource_id,
        
                ]);
                $this->review ="";
                
                session()->flash('message', 'Comment added successfully 😊');
        }

    public function render()

    {
        $comments =Review::where("cource_id","$this->cource_id")->latest()->paginate(4);
              $numberofreview =Review::where("cource_id","$this->cource_id")->count();
        return view('livewire.reviews',compact("comments","numberofreview"));
    }
}
