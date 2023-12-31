
<!DOCTYPE html>
<html class="no-js css-menubar" lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta name="description" content="bootstrap admin template">
  <meta name="author" content="">
  <title>Review Login</title>
  <link rel="apple-touch-icon" href="<?=GLOBAL_?>assets/images/apple-touch-icon.png">
  <link rel="shortcut icon" href="<?=GLOBAL_?>assets/images/favicon.ico">
  <!-- Stylesheets -->
  <link rel="stylesheet" href="<?=GLOBAL_?>css/bootstrap.min.css">
  <link rel="stylesheet" href="<?=GLOBAL_?>css/bootstrap-extend.min.css">
  <link rel="stylesheet" href="<?=GLOBAL_?>assets/css/site.min.css">
  <!-- Plugins -->
  <link rel="stylesheet" href="<?=GLOBAL_?>vendor/animsition/animsition.css">
  <link rel="stylesheet" href="<?=GLOBAL_?>vendor/asscrollable/asScrollable.css">
  <link rel="stylesheet" href="<?=GLOBAL_?>vendor/switchery/switchery.css">
  <link rel="stylesheet" href="<?=GLOBAL_?>vendor/intro-js/introjs.css">
  <link rel="stylesheet" href="<?=GLOBAL_?>vendor/slidepanel/slidePanel.css">
  <link rel="stylesheet" href="<?=GLOBAL_?>vendor/flag-icon-css/flag-icon.css">
  <link rel="stylesheet" href="<?=GLOBAL_?>vendor/waves/waves.css">
  <link rel="stylesheet" href="<?=GLOBAL_?>assets/examples/css/pages/login-v2.css">
  <!-- Fonts -->
  <link rel="stylesheet" href="<?GLOBAL_?>fonts/material-design/material-design.min.css">
  <link rel="stylesheet" href="<?GLOBAL_?>fonts/brand-icons/brand-icons.min.css">
  <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,300italic'>
  <!--[if lt IE 9]>
    <script src="../../../global/vendor/html5shiv/html5shiv.min.js"></script>
    <![endif]-->
  <!--[if lt IE 10]>
    <script src="../../../global/vendor/media-match/media.match.min.js"></script>
    <script src="../../../global/vendor/respond/respond.min.js"></script>
    <![endif]-->
  <!-- Scripts -->
  <script src="<?=GLOBAL_?>vendor/modernizr/modernizr.js"></script>
  <script src="<?=GLOBAL_?>vendor/breakpoints/breakpoints.js"></script>
  <script>
  Breakpoints();
  </script>
</head>
<body class="page-login-v2 layout-full page-dark">
  <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->



<!-- Page -->
  <div class="page animsition" data-animsition-in="fade-in" data-animsition-out="fade-out">
    <div class="page-content">
      <div class="page-brand-info">
        <div class="brand">
          <img class="brand-img" src="<?=GLOBAL_?>assets/images/logo@2x.png" alt="...">
          <h2 class="brand-text font-size-40">Remark</h2>
        </div>
        <p class="font-size-20">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
          tempor incididunt ut labore et dolore magna aliqua.</p>
      </div>
      <div class="page-login-main">
        <div class="brand visible-xs">
          <img class="brand-img" src="<?=GLOBAL_?>assets/images/logo-blue@2x.png" alt="...">
          <h3 class="brand-text font-size-40">Remark</h3>
        </div>
        <h3 class="font-size-24">Sign In</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
        <form method="post" action="<?=BASEURL.'admin/process-login/'?>" autocomplete="off">
          <div class="form-group form-material floating">
            <input type="text" class="form-control empty" id="inputEmail" name="username">
            <label class="floating-label" for="inputEmail">Username</label>
          </div>
          <div class="form-group form-material floating">
            <input type="password" class="form-control empty" id="inputPassword" name="password">
            <label class="floating-label" for="inputPassword">Password</label>
          </div>
          <div class="form-group clearfix">
            <div class="checkbox-custom checkbox-inline checkbox-primary pull-left">
              <input type="checkbox" id="remember" name="checkbox">
              <label for="inputCheckbox">Remember me</label>
            </div>
            <a class="pull-right" href="forgot-password.html">Forgot password?</a>
          </div>
          <button type="submit" class="btn btn-primary btn-block">Sign in</button>
        </form>
        <p>No account? <a href="register-v2.html">Sign Up</a></p>
        <footer class="page-copyright">
          <p>WEBSITE BY amazingSurge</p>
          <p>© 2015. All RIGHT RESERVED.</p>
          <div class="social">
            <a class="btn btn-icon btn-round social-twitter" href="javascript:void(0)">
              <i class="icon bd-twitter" aria-hidden="true"></i>
            </a>
            <a class="btn btn-icon btn-round social-facebook" href="javascript:void(0)">
              <i class="icon bd-facebook" aria-hidden="true"></i>
            </a>
            <a class="btn btn-icon btn-round social-google-plus" href="javascript:void(0)">
              <i class="icon bd-google-plus" aria-hidden="true"></i>
            </a>
          </div>
        </footer>
      </div>
    </div>
  </div>
  <!-- End Page -->



   <!-- Core  -->
  <script src="<?=GLOBAL_?>vendor/jquery/jquery.js"></script>
  <script src="<?=GLOBAL_?>vendor/bootstrap/bootstrap.js"></script>
  <script src="<?=GLOBAL_?>vendor/animsition/animsition.js"></script>
  <script src="<?=GLOBAL_?>vendor/asscroll/jquery-asScroll.js"></script>
  <script src="<?=GLOBAL_?>vendor/mousewheel/jquery.mousewheel.js"></script>
  <script src="<?=GLOBAL_?>vendor/asscrollable/jquery.asScrollable.all.js"></script>
  <script src="<?=GLOBAL_?>vendor/ashoverscroll/jquery-asHoverScroll.js"></script>
  <script src="<?=GLOBAL_?>vendor/waves/waves.js"></script>
  <!-- Plugins -->
  <script src="<?=GLOBAL_?>vendor/switchery/switchery.min.js"></script>
  <script src="<?=GLOBAL_?>vendor/intro-js/intro.js"></script>
  <script src="<?=GLOBAL_?>vendor/screenfull/screenfull.js"></script>
  <script src="<?=GLOBAL_?>vendor/slidepanel/jquery-slidePanel.js"></script>
  <script src="<?=GLOBAL_?>vendor/jquery-placeholder/jquery.placeholder.js"></script>
  <!-- Scripts -->
  <script src="<?=GLOBAL_?>js/core.js"></script>
  <script src="<?=GLOBAL_?>assets/js/site.js"></script>
  <script src="<?=GLOBAL_?>assets/js/sections/menu.js"></script>
  <script src="<?=GLOBAL_?>assets/js/sections/menubar.js"></script>
  <script src="<?=GLOBAL_?>assets/js/sections/gridmenu.js"></script>
  <script src="<?=GLOBAL_?>assets/js/sections/sidebar.js"></script>
  <script src="<?=GLOBAL_?>js/configs/config-colors.js"></script>
  <script src="<?=GLOBAL_?>assets/js/configs/config-tour.js"></script>
  <script src="<?=GLOBAL_?>js/components/asscrollable.js"></script>
  <script src="<?=GLOBAL_?>js/components/animsition.js"></script>
  <script src="<?=GLOBAL_?>js/components/slidepanel.js"></script>
  <script src="<?=GLOBAL_?>js/components/switchery.js"></script>
  <script src="<?=GLOBAL_?>js/components/tabs.js"></script>
  <script src="<?=GLOBAL_?>js/components/jquery-placeholder.js"></script>
  <script src="<?=GLOBAL_?>js/components/material.js"></script>
  <script>
  (function(document, window, $) {
    'use strict';
    var Site = window.Site;
    $(document).ready(function() {
      Site.run();
    });
  })(document, window, jQuery);
  </script>
</body>
</html>