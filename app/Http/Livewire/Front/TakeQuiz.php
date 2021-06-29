<?php

namespace App\Http\Livewire\Front;

use Livewire\Component;

class TakeQuiz extends Component
{
    public $currentPage = 1;
public $cource;
  
    public function mount($cource){
        $this->cource=$cource;
      //  dd( $this->cource->courceQuestions->count());
    }
    public function goToNextPage()
    {
     //   $this->validate($this->validationRules[$this->currentPage]);
        $this->currentPage++;
    }

    public function goToPreviousPage()
    {
        $this->currentPage--;
    }



    public function render()
    {
        return view('livewire.front.take-quiz');
    }
}
