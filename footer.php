<footer>

  <div class="bg-light border-top border-light mt-5">
    <div class="container">
      <div class="row">
        <div id="footer-sidebar1">
          <?php
          if (is_active_sidebar('footer-1')) {
            dynamic_sidebar('footer-1');
          }
          ?>
        </div>
        <div id="footer-sidebar2">
          <?php
          if (is_active_sidebar('footer-2')) {
            dynamic_sidebar('footer-2');
          }
          ?>
        </div>
        <div id="footer-sidebar3">
          <?php
          if (is_active_sidebar('footer-3')) {
            dynamic_sidebar('footer-3');
          }
          ?>
        </div>
        <div id="footer-sidebar4">
          <?php
          if (is_active_sidebar('footer-4')) {
            dynamic_sidebar('footer-4');
          }
          ?>
        </div>
      </div>
    </div>

    <li class="list-inline-item">
      <a class="btn btn-outline-light btn-social text-center rounded-circle" href="https://bit.ly/2Al2RNp" target="_blank">
        <i class="fab fa-fw fa-whatsapp"></i>
      </a>
    </li>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <a id="whatsapp-icon" href="https://api.whatsapp.com/send?phone=555191288976&text=Ol%C3%A1!%20Vi%20seu%20site,%20pode%20me%20ajudar?%20" target="_blank">
      <i style="margin-top:15px" class="fa fa-whatsapp"></i>
    </a>

    <div class="jumbotron">
      <p>&copy; Company 2014</p>
    </div>
  </div> <!-- /container -->
</footer>

<?php wp_footer(); ?>

<!-- Bootstrap core JS / CDN -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

<!-- Third party plugin JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>

<!-- Bootstrap core JS / local 
        <script src="<?php bloginfo('template_url') ?>/lib/js/jquery.js"></script>
        <script src="<?php bloginfo('template_url') ?>/lib/js/popper.min.js"></script>
        <script src="<?php bloginfo('template_url') ?>/lib/js/bootstrap.min.js"></script>
        -->

<!-- Contact form JS-->
<script src="assets/mail/jqBootstrapValidation.js"></script>
<script src="assets/mail/contact_me.js"></script>
<!-- Core theme JS-->
<script src="<?php bloginfo('template_url') ?>/lib/js/scripts.js"></script>
</body>

</html>