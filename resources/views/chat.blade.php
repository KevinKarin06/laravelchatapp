<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('css/styles.css')}}">
</head>
<body>
    <div class="container">
        <div class="row" id="app">
            <div class="offset-4 col-md-4 col-sm-12">
                <li class="list-group-item active">Chat Room</li>
                <ul class="list-group" v-chat-scroll>
                <message
                    v-for="value in chat.message">
                    @{{value}}
                </message>
                  </ul>
                  <input type="text" class="form-control" placeholder="Type your message here..."
                    v-model='message' @keyup.enter='send'>
            </div>

        </div>
    </div>
<script src="{{asset('js/app.js')}}"></script>
</body>
</html>
