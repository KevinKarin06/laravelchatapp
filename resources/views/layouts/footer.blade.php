<footer class="page-footer">
    <script>
        document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.materialboxed');
    var instances = M.Materialbox.init(elems, 200);
  });

  document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.tooltipped');
    var instances = M.Tooltip.init(elems, {
        enterDelay:200,
        exitDelay:0,
        outDuration: 10
    });
  });
        </script>
    <div class="container">
        <div class="row">
            <div class="col l2 s12">
                <h5 class="white-text">About Me</h5>
              <img src="/images/moi.jpg" width="100" height="150"
              alt="pic" class="responsive-img materialboxed tooltipped"
              data-position="right" data-tooltip="Click to see full Image"></a>
                <p>Etudiant a L'IUT de Douala FI2 filiere GI
                <br>
                LaravelVueJs Learner<i class="tiny mb--4 material-icons">mood</i>
                </p>
            </div>
            <div class="col l4 offset-l2 s12">
                <h5 class="white-text">Social Media</h5>
                <ul>
                    <li><span class="fab fa-whatsapp fa-lg"></span><a target="blank" href="https://wa.me/237694271964">Whatsapp</a></li>
                    <li><span class="fab fa-instagram fa-lg"><a target="blank" href="https://www.instagram.com/karin_kevin">Instagram</a></li>
                    <li><span class="fab fa-linkedin fa-lg"><a target="blank" href="https://www.linkedin.com/in/kevin-karin-728aa519a">LinkedIn</a></li>
                    <li><span class="fab fa-github fa-lg"><a target="blank" href="https://github.com/KevinKarin06/laravelchatapp">Github</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="footer-copyright">
        <div class="container">
            © {{date('Y')}} Copyright
            <span class="grey-text text-lighten-4 right">By Nkwelle Kevin Karin</span>
        </div>
    </div>
</footer>
