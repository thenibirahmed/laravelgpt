<div>
    <nav class="bg-primary-subtle py-3 mb-4">
        <div class="container">
            <div class="text-center justify-content-center">
                <h4>Laravel GPT by Nibir</h4>
            </div>
        </div>
    </nav>
    <div class="container mb-5">
        <div class="row">
            <div class="col">
                @foreach ($messages as $message)
                    <div
                        class="flex rounded p-4 mt-3 @if ($message['role'] === 'assistant') bg-success-subtle flex-reverse @else bg-primary-subtle @endif ">
                        <div class="ml-4">
                            <div class="text-lg">
                                @if ($message['role'] === 'assistant')
                                    <b>Laravel GPT</b>
                                @else
                                    <b>You</b>
                                @endif
                            </div>

                            <p>{!! \Illuminate\Mail\Markdown::parse($message['content']) !!}</p>
                           
                        </div>
                    </div>
                @endforeach

                <div wire:loading>
                    Typing...
                </div>

                <form wire:submit.prevent="send_message" class="py-5">
                    @csrf
                    <label for="message" class="mb-2"><h5>Your Question:</h5></label>
                    <textarea wire:keydown.enter="send_message" wire:model.defer="message" id="message" name="message" id="" class="form-control"></textarea>
                    <input type="submit" class="btn btn-primary mt-3" value="Send">
                    {{-- <input id="message" type="text"  autocomplete="off" class="" /> --}}
                    <a class="btn btn-danger mt-3" wire:click="reset_chat">Reset Conversation</a>
                </form>
            </div>
        </div>
    </div>

    <nav class="bg-primary-subtle pt-3 pb-1 fixed-bottom">
        <div class="container">
            <div class="text-center justify-content-center">
                <p>
                    &copy; {{ date('Y') }} - <a class="text-dark" href="https://nibirahmed.com">Nibir Ahmed</a> 
                    <a class="ms-1 text-dark" target="_blank" href="https://fb.com/thenibirahmed"><i class="fab fa-facebook-f"></i></a>
                    <a class="ms-1 text-dark" target="_blank" href="https://instagram.com/thenibirahmed"><i class="fab fa-instagram"></i></a>
                    <a class="ms-1 text-dark" target="_blank" href="https://twitter.com/thenibirahmed"><i class="fab fa-twitter"></i></a>
                    <a class="ms-1 text-dark" target="_blank" href="https://linkedin.com/in/nibirahmed"><i class="fab fa-linkedin"></i></a>
                </p>
            </div>
        </div>
    </nav>
</div>
