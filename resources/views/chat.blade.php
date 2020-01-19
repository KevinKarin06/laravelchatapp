@include('layouts.header')
<script>
    window.Laravel = {!! json_encode([
      'csrfToken' => csrf_token(),
      'user' => Auth::user(),
    ]) !!};
  </script>
    <div class="container">
        <div class="wellcome">
            <h4 class="center-align">Wellcome come back {{Auth::user()->name}} </h4>
        </div>
        <div class="row justify-content-center" id="app">
            <div class="col-md-6 col-sm-12">
                <li class="list-group-item active mt-2">Chat Room
                    <span class="badge badge-light ml-1">@{{totalMessages +' '+'Messages'}}</span>
                </li>
                <ul class="list-group" v-chat-scroll>
                    <message v-for="value,index in chat.message" :key=value.index :color="chat.color[index]"
                        :user="chat.users[index]">
                        @{{value}}
                    </message>
                </ul>
                <span id="type" class="badge badge-primary">@{{typing}}</span>
                <loader v-show='isGone'></loader>
                <div class="input-field">
                    <input type="text" placeholder="Type your message here..." v-model='message'
                        @keyup.enter='send'>
                </div>
                {{-- <i class="material-icons"id="send" @click='send'>send</i> --}}
            </div>
            <div class="col-md-4 col-sm-12">
                <li class="list-group-item active mt-2">Users Online
                    <span class="badge badge-light ml-2">@{{numberOfUsers}}</span></li>
                <ul class="list-group" v-chat-scroll>
                    <users v-for="user,index in users" :key=user.index>
                        @{{user.name}}
                    </users>
                </ul>
            </div>

        </div>
    </div>
    <script src="{{asset('js/app.js')}}"></script>
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-rc.2/js/materialize.min.js"></script>

@include('layouts.footer')
</html>
