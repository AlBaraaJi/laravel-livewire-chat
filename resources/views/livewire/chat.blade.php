<div wire:poll>
    <div class="container">
        <h3 class=" text-center">
            @if (auth()->user())
                <a class="btn btn-primary" href="{{ Url('delete_chat') }}">حذف المحادثة</a>
            @endif
            Live Chat
        </h3>
        <div class="messaging">
            <div class="inbox_msg">
                <div class="mesgs">
                        @forelse ($messages as $message)

                            @if ($message->user->name == auth()->user()->name)
                                <!-- Reciever Message-->
                                <div class="outgoing_msg">
                                    <div class="sent_msg">
                                        <p>{{ $message->message_text }}</p>
                                        <span class="time_date">
                                            {{ $message->created_at->diffForHumans(null, false, false) }}</span>
                                    </div>
                                </div>

                            @else

                                <div class="incoming_msg">{{ $message->user->name }}
                                    <div class="incoming_msg_img"> <img
                                            src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                                    <div class="received_msg">
                                        <div class="received_withd_msg">
                                            <p>{{ $message->message_text }}</p>
                                            <span
                                                class="time_date">{{ $message->created_at->diffForHumans(null, false, false) }}</span>
                                        </div>
                                    </div>
                                </div>

                            @endif
                        @empty
                            <h5 style="text-align: center;color:red"> لاتوجد رسائل سابقة</h5>
                        @endforelse

                    </div>
                    <div class="type_msg">
                        <div class="input_msg_write">

                            <form wire:submit.prevent="sendMessage" class="input-group">

                                <input onkeydown='scrollDown()' wire:model.defer="messageText" type="text"
                                    class="write_msg" placeholder="اكتب رسالتك"/>

                                <button class="msg_send_btn" type="submit">ارسال</button>

                            </form>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>