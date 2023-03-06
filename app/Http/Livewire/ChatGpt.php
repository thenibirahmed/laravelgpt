<?php

namespace App\Http\Livewire;

use Livewire\Component;
use OpenAI\Laravel\Facades\OpenAI;

class ChatGpt extends Component {

    public $message;

    public $messages;

    public function mount() {
        $this->messages = $this->get_messages();
    }

    public function get_messages() {
        return collect( session( 'messages', [] ) )->reject( fn( $message ) => $message['role'] === 'system' );
    }

    public function send_message() {
        $messages = session()->get( 'messages', [
            ['role' => 'system', 'content' => 'You are LaravelGPT - A ChatGPT clone. Answer as concisely as possible.'],
        ] );

        $messages[] = ['role' => 'user', 'content' => $this->message];

        $this->clear_field();

        $response = OpenAI::chat()->create( [
            'model'    => 'gpt-3.5-turbo',
            'messages' => $messages,
        ] );

        $messages[] = ['role' => 'assistant', 'content' => $response->choices[0]->message->content];

        session()->put( 'messages', $messages );

        $this->messages = $this->get_messages();
    }

    public function reset_chat() {
        session()->forget( 'messages' );
        $this->messages = $this->get_messages();
    }

    public function clear_field() {
        $this->message = '';
    }

    public function render() {
        return view( 'livewire.chat-gpt' );
    }
}
