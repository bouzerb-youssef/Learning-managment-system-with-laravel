<div wire:poll>
    <div class="message-content-inner">
        @php
                  

        @endphp
        @forelse ($conversationgroup->messages as $message)
        
            @if ($message->user->name == auth()->user()->name)



        <div class="message-bubble me">
            <div class="message-bubble-inner">
                <div class="message-avatar"><img src="../assets/images/avatars/avatar-1.jpg" alt="">
                </div>
                <div class="message-text">
                    <p>{{ $message->message_text }}</p>
                    <small class="time_date">
                        {{ $message->created_at->diffForHumans(null, false, false) }}</small>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
        @else
        <div class="message-bubble">
            <div class="message-bubble-inner">
                <div class="message-avatar"><img src="../assets/images/avatars/avatar-2.jpg" alt="">
                </div>
                <div class="message-text">
                    <p>{{ $message->message_text }}</p>
                    <small class="time_date">
                        {{ $message->created_at->diffForHumans(null, false, false) }}</small>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
        @endif
        @empty
        <h5 style="text-align: center;color:red"> لاتوجد رسائل سابقة</h5>
    @endforelse
</div>  
    <div class="message-reply">

        <form class="d-flex align-items-center w-100" wire:submit.prevent="sendMessage">
            <div class="btn-box d-flex align-items-center mr-3">
                <a href="#" class="btn btn-icon  btn-default btn-circle d-inline-block mr-2" uk-tooltip="filter" title="" aria-expanded="false">
                    <i class="uil-smile-wink"></i>
                </a>
                <a href="#" class="btn btn-icon  btn-default btn-circle d-inline-block  " uk-tooltip="filter" title="" aria-expanded="false">
                    <i class="uil-link-alt"></i>
                </a>
            </div>

            <textarea cols="1"  onkeydown='scrollDown()' wire:model.defer="messageText"  rows="1" placeholder="Your Message" data-autoresize=""></textarea>

            <button type="submit" class="send-btn d-inline-block btn btn-default">ارسال <i class="bx bx-paper-plane"></i></button>
        </form>

    </div>
</div>