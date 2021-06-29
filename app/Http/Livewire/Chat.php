<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Group;
class Chat extends Component
{

 public $groups;
 public $group;
 public  function mount(Group $group,$groups){

        $this->groups=$groups;
        $this->group=$group;
    }

    public function render()
    {
     
        //$groups= Group::all();

        return view('livewire.chat');
    }
}
