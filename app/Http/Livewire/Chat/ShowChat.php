<?php

namespace App\Http\Livewire\Chat;

use Livewire\Component;
use App\Models\Group;

class ShowChat extends Component
{
    
 public $groups;
 public $group;
 public  function mount($group,$groups){

        $this->groups=$groups;
       $this->group=$group;
      
       
    }
    public function render()
    {
        $conversationgroup=$this->group;
        return view('livewire.chat.show-chat',compact('conversationgroup'));
    }
}
