@extends('layouts.master')
@section('content')

<form action="{{ route('chats.store', ['order' => $order->id]) }}" method="POST" role="form" enctype="multipart/form-data" class="container-fluid" style="padding-top:50px">
{{ csrf_field() }}
    <div class="card" style="width: 100%">
        <div class="card-header body_color text-center text-white"><h3>Chats</h3></div>
        <div class="card-body">

            @foreach($chats as $chat)
                <div class="form-group row">
                    <div class="col-md-6 ">
                        @if($chat->user_id)
                            {{ $chat->message }}    

                            @if ($chat->image)
                                <a href="{{asset('/storage'.$chat->image)}}" target="_blank"><img src="{{ asset('/storage'.$chat->image) }}" width="40" height="40"></a>
                                @endif

                        @endif
                    </div>
                    <div class="col-md-6 ">
                    @if($chat->admin_id)
                            {{ $chat->message }}
                        @endif
                    </div>
                </div>
            @endforeach

            <div class="form-group row">
                <label for="message" class="col-md-4 col-form-label text-md-right">Write message here</label>
                
                <div class="col-md-6">
                    <input id="message" type="text" name="message" class="form-control" required placeholder="Send message here">
                </div>
            </div>    

            <div class="form-group row mb-0 mt-5">
                <div class="col-md-4 offset-md-4">
                    <button type="submit" class="btn body_color text-white btn-block">Send</button>
                </div>
            </div>
        </div>
    </div>
</form>

@endsection