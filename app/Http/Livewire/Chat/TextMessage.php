<?php

namespace App\Http\Livewire\Chat;

use Livewire\Component;
use App\Models\Message;

class TextMessage extends Component
{


    public $conversationgroup;
    public $messageText;

    public  function mount($conversationgroup){

    // dd($group->messages);
        $this->conversationgroup=$conversationgroup;
       // dd($this->conversationgroup);
    }
    public function sendMessage()
    {
        Message::create([
            'user_id' => auth()->user()->id,
            'message_text' => $this->messageText,
            'group_id'=>$this->conversationgroup->id

        ]);

        $this->reset('messageText');
    }

    public function render()
    {
        
    

       // $messages = Message::with('user')->latest()->take(10)->get()->sortBy('id');
        return view('livewire.chat.text-message');
    }
}
