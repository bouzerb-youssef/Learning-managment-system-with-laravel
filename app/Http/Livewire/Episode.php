<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Lesson;
use Illuminate\Support\Facades\Auth;

class Episode extends Component
{
    public $lesson;
    protected $listeners = ['VideoViewed' => 'countView'];

    public function mount( $lesson)
    {
        $this->lesson = $lesson;
    }

    public function countView(){
      /*   $view=Lesson::find($this->lesson->id)->update([
            "view"=>'viewed',

        ]); */
        $lesson =Lesson::find($this->lesson->id);
        $user_id= Auth::user()->id;
         $lesson->users()->sync($user_id);
       $lesson->save();


    }

    public function render()
    {
        return view('livewire.episode');
    }

}
