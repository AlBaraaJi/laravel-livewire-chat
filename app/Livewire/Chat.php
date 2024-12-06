<?php

namespace App\Livewire;
use App\Models\Message;
use Livewire\Component;

class Chat extends Component
{
    public $messageText;

    public function render()
    {
        $messages = Message::with('user')->latest()->take(10)->get()->sortBy('id');

        return view('livewire.chat', compact('messages'));
    }

    public function sendMessage()
    {
        // if (!auth()->check()) {
        //     return; // Abort if the user is not authenticated
        // }

        // $this->validate([
        //     'messageText' => 'required|string|max:255',
        // ]);
        
        Message::create([
            'user_id' => auth()->user()->id,
            'message_text' => $this->messageText,
        ]);

        $this->reset('messageText');
    }
}
