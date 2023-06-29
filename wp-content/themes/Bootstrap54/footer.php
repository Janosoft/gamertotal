<!-- footer -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
<script src="https://kit.fontawesome.com/f6def5424c.js" crossorigin="anonymous" samesite="none Secure"></script>
<script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
<script>
  window.onscroll = function() {
    progress_compu()
  };

  function progress_compu() {
    var winScroll = document.body.scrollTop || document.documentElement.scrollTop;
    var height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
    var scrolled = (winScroll / height) * 100;
    document.getElementById("myBar").style.width = scrolled + "%";
    document.getElementById("myBar2").style.width = scrolled + "%";
  }
</script>
<!----boton_scroll_top---->
<script>
  var btn = $('#button_top');
  $(window).scroll(function() {
    if ($(window).scrollTop() > 300) {
      btn.addClass('show');
    } else {
      btn.removeClass('show');
    }
  });
  btn.on('click', function() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
  });
</script>
<!----boton_scroll_top---->

<footer>
  <div class="container-fluid" style="background-color: #E9666D;">
    <div class="container pt-3 pb-2">
      <div class="row align-items-center">

        <div class="col-lg-11 text-center">
          <p class="raleway400" style="color: #692C31;margin-bottom: 7px;"><strong>Gamer Total</strong> - Argentina. <br>E-mail de contacto: janosoft@gmail.com</p>
        </div>

        <div class="col-lg-1 text-center">
          <a href="https://linkedin.com/company/gamertotal/" target="_blank"><i class="fab fa-linkedin" aria-hidden="true" style="color: #692C31;"></i></a>
          <a href="https://www.instagram.com/gamertotal_ar/" target="_blank"><i class="fab fa-instagram ps-1 pe-1" aria-hidden="true" style="color: #692C31;"></i></a>
        </div>

      </div>
    </div>
  </div>
</footer>

<?php wp_footer();?>
</body>

</html>