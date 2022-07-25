@extends('layouts.master')
@section('content')

<form action="{{ route('chats.store', ['order' => $order->id]) }}" method="POST" role="form" enctype="multipart/form-data" class="container-fluid" style="padding-top:50px">
{{ csrf_field() }}
<div class="card" style="width: 100%">
    <div class="card-header body_color text-center text-white">
        <h3>Chats</h3>
    </div>
    
    <div class="container-fluid card-body">
        @foreach($chats as $chat)
            <div class="form-group row">
                <div class="col-md-6">
                    <div class="container-fluid">
                        <div class="row">
                            @if($chat->user_id)
                                <div class="col-md-2" style="padding-left:40px ;">
                                    <div class="img-fluid" style="width:50px; height: 50px; border-radius: 50%; background-image: url(https://image.flaticon.com/icons/svg/327/327779.svg)" alt="">
                                    </div>
                                </div>
                                
                                <div class="col-md-10 p-3" style="border-radius:15px 15px 15px 1px; background-color: #ECECEC;">
                                    <span class="d-flex justify-content-between mb-2">
                                            <span><b>{{ $chat->user->name}}</b></span>
                                            <span> {{ $chat->created_at}}</span>
                                    </span>
                                    
                                    <p>
                                        {{ $chat->message }}    

                                        @if ($chat->image)
                                            <a href="{{asset('/storage'.$chat->image)}}" target="_blank"><img src="{{ asset('/storage'.$chat->image) }}" width="40" height="40"></a>
                                        @endif
                                    </p>                            
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="col-md-6 text-light">
                    <div class="container-fluid">
                        <div class="row">
                            @if($chat->admin_id)
                                <div class="col-md-10 p-3" style="border-radius:15px 15px 1px 15px; background-color: #579FFB;">
                                    <span class="d-flex justify-content-between mb-2">
                                            <span><b>{{$chat->admin->name}}</b></span>
                                            <span> {{ $chat->created_at}}</span>
                                    </span>
                                    
                                        <p>
                                            {{ $chat->message }}
                                        </p>
                                </div>
                            @endif
                            <div class="col-md-2" style="padding-right:40px ;">
                                <div class="img-fluid" style="width:50px; height: 50px; border-radius: 50%; background-image: url(https://image.flaticon.com/icons/svg/327/327779.svg)" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
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