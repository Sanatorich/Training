<div class="footer">
  <div class="content has-text-centered">
    <p>
      Copyright ©
      <script>
        document.write(new Date().getFullYear());
      </script> <strong>CinemaPark</strong>
    </p>
  </div>
</div>

</body>
<script src="jq/jquery-3.2.0.min.js"></script>

<script>
  $(document).on('click', '.menu-mob', function () {
    let prnt = $(this).parents('.wrap-menu');
    let navbar_menu = $('.navbar-menu', prnt);
    if (!navbar_menu.hasClass('active')) {
      navbar_menu.slideDown(function () {
        navbar_menu.addClass('active');
      });
    } else {
      navbar_menu.slideUp(function () {
        navbar_menu.removeClass('active');
      });
    }
  });


</script>
<?php dbDisconnect($connection); ?>
 
</html>