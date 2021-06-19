<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Question;
use App\Models\Cource;
class Quiz extends Component
{

public $cource;

    public function mount($cource){
        $this->cource = $cource;
    }
    public function render()
    {

        $cource = Cource::with('questions')->find($this->cource->id);
        return view('livewire.admin.quiz',compact('cource'));
    }
}
