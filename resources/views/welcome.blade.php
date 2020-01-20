
@include('layouts.header')
<main>
<div class="container">
    <div id="wellcome" class="row justify-content-center">
        <div class="col m6 l6 s10 text-white">
            <h2 class="center-align text-wrap">Wellcome to LaravelVueJs Chat App Demo</h2>
               <p class="center-align text text-wrap">Just signIn or SignUp to get started and
                    connect with friends from around the world <br>
                This project is available on github if you are interested in the source code
                You can just clone the repository <br>
                Just follow the github link on the footer.
               </p>
        </div>
    </div>
</div>
<script src="{{asset('js/app.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-rc.2/js/materialize.min.js"></script>
</main>
@include('layouts.footer')
</html>
