<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Chat App</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('css/styles.css')}}">
</head>
<body>
    <div class="container">
        <div class="row justify-content-center" id="app">
            <div class="col-md-6 col-sm-12">
                <li class="list-group-item active mt-2">Chat Room</li>
                <ul class="list-group" v-chat-scroll>
                <message
                    v-for="value in chat.message"
                    :key=value.index
                    color='success'
                    >
                    @{{value}}
                </message>
                  </ul>
                  <input type="text" class="form-control" placeholder="Type your message here..."
                    v-model='message' @keyup.enter='send'>
            </div>
            <div class="col-md-4 col-sm-12">
                <li class="list-group-item active mt-2">Users Online</li>
                 {{$user->name}}
            </div>

        </div>
    </div>
<script src="{{asset('js/app.js')}}"></script>
</body>
</html>
