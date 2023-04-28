<!-- footer -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/f6def5424c.js" crossorigin="anonymous" samesite="none Secure"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
<script>
  window.onscroll = function() {
    progress_compu()
  };

  function progress_compu() {
    var winScroll = document.body.scrollTop || document.documentElement.scrollTop;
    var height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
    var scrolled = (winScroll / height) * 100;
    document.getElementById("myBar").style.width = scrolled + "%";
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
  <div class="container-fluid mb-4 mb-md-0" style="background-color: #E9666D;">
    <div class="container pt-3 pb-2">
      <div class="row">
        <div class="col-lg-12 pt-1 text-center">
          <p class="raleway400" style="color: #692C31"><strong>Gamer Total</strong> - Argentina. <br>E-mail de contacto: janosoft@gmail.com</p>
        </div>
        <!-- <div class="col-lg-3 pt-md-1">
          <ul class="list-inline m-0" style="text-align: center;">
            <li class="list-inline-item"><a class="social-icon text-xs-center" target="_blank" href="https://www.twitter.com/gamertotal" alt="Twitter"><i style="color: #000; font-size: 20px;" class="fab fa-twitter" aria-hidden="true"></i></a></li>
            <li class="list-inline-item">&nbsp;</li>
            <li class="list-inline-item"><a class="social-icon text-xs-center" target="_blank" href="https://www.facebook.com/gamertotal" alt="FaceBook"><i style="color: #000; font-size: 20px" class="fab fa-facebook-f" aria-hidden="true"></i></a></li>
            <li class="list-inline-item">&nbsp;</li>
            <li class="list-inline-item"><a class="social-icon text-xs-center" target="_blank" href="https://www.instagram.com/gamertotal" alt="instagram"><i style="color: #000; font-size: 20px" class="fab fa-instagram" aria-hidden="true"></i></a></li>
          </ul>
        </div> -->
      </div>
    </div>
  </div>
</footer>

<?php wp_footer();
?>
</body>

</html>