<!DOCTYPE html>
<html class="no-js css-menubar" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Admin Panel &gt; Life">
    <meta name="author" content="">
    <title>Admin Panel &gt; <?=$page_title?></title>
    <link rel="apple-touch-icon" href="<?=GLOBAL_?>assets/images/apple-touch-icon.png">
    <link rel="shortcut icon" href="<?=GLOBAL_?>assets/images/favicon.ico">
    <!-- Stylesheets -->


    <link rel="stylesheet" href="<?=GLOBAL_?>css/bootstrap.min.css">
    <link rel="stylesheet" href="<?=GLOBAL_?>css/bootstrap-extend.min.css">
    <link rel="stylesheet" href="<?=GLOBAL_?>assets/css/site.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.css" />
    <!-- Plugins -->
    <link rel="stylesheet" href="<?=GLOBAL_?>vendor/animsition/animsition.css">
    <link rel="stylesheet" href="<?=GLOBAL_?>vendor/asscrollable/asScrollable.css">
    <link rel="stylesheet" href="<?=GLOBAL_?>vendor/switchery/switchery.css">
    <link rel="stylesheet" href="<?=GLOBAL_?>vendor/intro-js/introjs.css">
    <link rel="stylesheet" href="<?=GLOBAL_?>vendor/slidepanel/slidePanel.css">
    <link rel="stylesheet" href="<?=GLOBAL_?>vendor/flag-icon-css/flag-icon.css">
    <link rel="stylesheet" href="<?=GLOBAL_?>vendor/waves/waves.css">
    <link rel="stylesheet" href="<?=GLOBAL_?>vendor/datatables-bootstrap/dataTables.bootstrap.css">
    <link rel="stylesheet" href="<?=GLOBAL_?>vendor/datatables-fixedheader/dataTables.fixedHeader.css">
    <link rel="stylesheet" href="<?=GLOBAL_?>vendor/datatables-responsive/dataTables.responsive.css">
    <link rel="stylesheet" href="<?=GLOBAL_?>assets/examples/css/tables/datatable.css">
    <link rel="stylesheet" href="<?=GLOBAL_?>vendor/formvalidation/formValidation.css">
    <link rel="stylesheet" href="<?=GLOBAL_?>assets/examples/css/forms/validation.css">
    <link rel="stylesheet" href="<?=GLOBAL_?>vendor/bootstrap-datepicker/bootstrap-datepicker.css">
    <link rel="stylesheet" href="<?=GLOBAL_?>vendor/blueimp-file-upload/jquery.fileupload.css">
    <link rel="stylesheet" href="<?=GLOBAL_?>vendor/dropify/dropify.css">

    <link rel="stylesheet" href="<?=GLOBAL_?>vendor/clockpicker/clockpicker.css">
    <link rel="stylesheet" href="<?=GLOBAL_?>vendor/jt-timepicker/jquery-timepicker.css">

    <!-- ICONS -->
    <link rel="stylesheet" href="<?=GLOBAL_?>vendor/gridstack/gridstack.css">
    <link rel="stylesheet" href="<?=GLOBAL_?>assets/examples/css/panel/panel-portlets.css">
    <link rel="stylesheet" href="<?=GLOBAL_?>assets/examples/css/uikit/icons.css">
    <link rel="stylesheet" href="<?=GLOBAL_?>fonts/7-stroke/7-stroke.css">
    <link rel="stylesheet" href="<?=GLOBAL_?>fonts/ionicons/ionicons.css">
    <link rel="stylesheet" href="<?=GLOBAL_?>fonts/mfglabs/mfglabs.css">
    <link rel="stylesheet" href="<?=GLOBAL_?>fonts/open-iconic/open-iconic.css">
    <link rel="stylesheet" href="<?=GLOBAL_?>fonts/themify/themify.css">
    <link rel="stylesheet" href="<?=GLOBAL_?>fonts/weather-icons/weather-icons.css">
    <link rel="stylesheet" href="<?=GLOBAL_?>fonts/glyphicons/glyphicons.css">
    <link rel="stylesheet" href="<?=GLOBAL_?>fonts/web-icons/web-icons.css">
    <link rel="stylesheet" href="<?=GLOBAL_?>fonts/octicons/octicons.css">
    <link rel="stylesheet" href="<?=GLOBAL_?>vendor/summernote/summernote.css">
  

    <!-- Fonts -->
    <link rel="stylesheet" href="<?=GLOBAL_?>fonts/font-awesome/font-awesome.css">
    <link rel="stylesheet" href="<?=GLOBAL_?>fonts/material-design/material-design.min.css">
    <link rel="stylesheet" href="<?=GLOBAL_?>fonts/brand-icons/brand-icons.min.css">
    <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,300italic'>
    <!-- <link rel="stylesheet" href="<?=CSS?>style.css"> -->
    <!--[if lt IE 9]>
      <script src="<?=GLOBAL_?>vendor/html5shiv/html5shiv.min.js"></script>
      <![endif]-->
    <!--[if lt IE 10]>
      <script src="<?=GLOBAL_?>vendor/media-match/media.match.min.js"></script>
      <script src="<?=GLOBAL_?>vendor/respond/respond.min.js"></script>
      <![endif]-->
    <!-- Scripts -->
    <script src="<?=GLOBAL_?>vendor/jquery/jquery.js"></script>
    <script src="<?=GLOBAL_?>vendor/modernizr/modernizr.js"></script>
    <script src="<?=GLOBAL_?>vendor/breakpoints/breakpoints.js"></script>
    <script>
    Breakpoints();
    </script>
</head>
<body class="dashboard">
  <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->
  <nav class="site-navbar navbar navbar-default navbar-fixed-top navbar-mega" role="navigation">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle hamburger hamburger-close navbar-toggle-left hided"
      data-toggle="menubar">
        <span class="sr-only">Toggle navigation</span>
        <span class="hamburger-bar"></span>
      </button>
      <button type="button" class="navbar-toggle collapsed" data-target="#site-navbar-collapse"
      data-toggle="collapse">
        <i class="icon md-more" aria-hidden="true"></i>
      </button>
      <div class="navbar-brand navbar-brand-center site-gridmenu-toggle" data-toggle="gridmenu">
        <img class="navbar-brand-logo" src="<?=GLOBAL_?>assets/images/logo.png" title="Remark">
        <span class="navbar-brand-text"> Front Desk</span>
      </div>
      <button type="button" class="navbar-toggle collapsed" data-target="#site-navbar-search"
      data-toggle="collapse">
        <span class="sr-only">Toggle Search</span>
        <i class="icon md-search" aria-hidden="true"></i>
      </button>
    </div>
    <div class="navbar-container container-fluid">
      <!-- Navbar Collapse -->
      <div class="collapse navbar-collapse navbar-collapse-toolbar" id="site-navbar-collapse">
        <!-- Navbar Toolbar -->
        <ul class="nav navbar-toolbar">
          <li class="hidden-float" id="toggleMenubar">
            <a data-toggle="menubar" href="#" role="button">
              <i class="icon hamburger hamburger-arrow-left">
                  <span class="sr-only">Toggle menubar</span>
                  <span class="hamburger-bar"></span>
                </i>
            </a>
          </li>
          <li class="hidden-xs" id="toggleFullscreen">
            <a class="icon icon-fullscreen" data-toggle="fullscreen" href="#" role="button">
              <span class="sr-only">Toggle fullscreen</span>
            </a>
          </li>
        </ul>
        <!-- End Navbar Toolbar -->
        <!-- Navbar Toolbar Right -->
        <ul class="nav navbar-toolbar navbar-right navbar-toolbar-right">
          <li class="dropdown">
            <a class="navbar-avatar dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false"
            data-animation="scale-up" role="button">
              <span class="avatar avatar-online">
                <img src="<?=GLOBAL_?>portraits/5.jpg" alt="...">
                <i></i>
              </span>
            </a>
            <ul class="dropdown-menu" role="menu">
              <li role="presentation">
                <a href="<?=BASEURL.'admin/logout'?>" role="menuitem"><i class="icon md-power" aria-hidden="true"></i> Logout</a>
              </li>
            </ul>
          </li>
          <li class="dropdown">
            <?php if ($order_notify['count'] > 0): ?>
              <a class="order-notify" data-toggle="dropdown" href="javascript:void(0)" title="Notifications" aria-expanded="false" data-animation="scale-up" role="button">
                <i class="icon md-notifications" aria-hidden="true"></i>
                <span class="badge badge-danger up new-order-count"><?=$order_notify['count']?></span>
              </a>
            <?php else: ?>
              <a class="order-notify" style="display: none;" data-toggle="dropdown" href="javascript:void(0)" title="Notifications" aria-expanded="false" data-animation="scale-up" role="button">
                <i class="icon md-notifications" aria-hidden="true"></i>
                <span class="badge badge-danger up new-order-count">5</span>
              </a>
            <?php endif ?>
            <ul class="dropdown-menu dropdown-menu-right dropdown-menu-media" role="menu">
              <li class="dropdown-menu-header" role="presentation">
                <h5>NOTIFICATIONS</h5>
                <?php if ($order_notify['count'] > 0): ?>
                  <span class="label label-round label-danger new-order-count-text"><?=$order_notify['count']?> New Order(s)</span>
                <?php else: ?>
                  <span class="label label-round label-danger new-order-count-text">No New Order</span>
                <?php endif ?>
              </li>
              <li class="list-group" role="presentation">
                <div data-role="container">
                  <div class="notify-orders-dropdown" data-role="content">
                    <?php foreach ($order_notify['orders'] as $key => $new_order): ?>
                      <a class="list-group-item" href="<?=BASEURL.'admin/orders/new'?>" role="menuitem">
                        <div class="media">
                          <div class="media-left padding-right-10">
                            <i class="icon md-receipt bg-red-600 white icon-circle" aria-hidden="true"></i>
                          </div>
                          <div class="media-body">
                            <h6 class="media-heading">A new order has been placed</h6>
                            <time class="media-meta" datetime="2015-06-12T20:50:48+08:00"><?=get_time_difference_php_2($new_order['at'])?></time>
                          </div>
                        </div>
                      </a>
                    <?php endforeach ?>
                  </div>
                </div>
              </li>
              <li class="dropdown-menu-footer" role="presentation">
                <a href="javascript:void(0)" role="menuitem">
                    All notifications
                  </a>
              </li>
            </ul>
          </li>
        </ul>
        <!-- End Navbar Toolbar Right -->
      </div>
      <!-- End Navbar Collapse -->
      <!-- Site Navbar Seach -->
      <div class="collapse navbar-search-overlap" id="site-navbar-search">
        <form role="search">
          <div class="form-group">
            <div class="input-search">
              <i class="input-search-icon md-search" aria-hidden="true"></i>
              <input type="text" class="form-control" name="site-search" placeholder="Search...">
              <button type="button" class="input-search-close icon md-close" data-target="#site-navbar-search"
              data-toggle="collapse" aria-label="Close"></button>
            </div>
          </div>
        </form>
      </div>
      <!-- End Site Navbar Seach -->
    </div>
  </nav>
  <div class="site-menubar">
    <div class="site-menubar-body">
      <div>
        <div>
          <ul class="site-menu">
            <li class="site-menu-category">General</li>
            <li rel="index" class="site-menu-item">
              <a class="animsition-link" href="<?=BASEURL.'admin/'?>">
                <i class="site-menu-icon md-view-dashboard" aria-hidden="true"></i>
                <span class="site-menu-title">Dashboard</span>
              </a>
            </li>

            <!-- Orders  -->
              <li class="site-menu-item has-sub">
              <a href="javascript:void(0)">
                <i class="site-menu-icon md-view-compact" aria-hidden="true"></i>
                <span class="site-menu-title">Orders</span>
                <span class="site-menu-arrow"></span>
              </a>
              <ul class="site-menu-sub">
                <li rel="all_orders" class="site-menu-item">
                  <a class="animsition-link" href="<?=BASEURL.'admin/orders/all'?>">
                    <span class="site-menu-title">All</span>
                  </a>
                </li>
                <li rel="new_orders" class="site-menu-item">
                  <a class="animsition-link" href="<?=BASEURL.'admin/orders/new'?>">
                    <?php if ($order_notify['count'] > 0): ?>
                      <span class="site-menu-title">New <span class="badge badge-danger order-notify new-order-count"><?=$order_notify['count']?></span></span>
                    <?php else: ?>
                      <span class="site-menu-title">New <span class="badge badge-danger order-notify new-order-count" style="display: none;">0</span></span>
                    <?php endif ?>
                  </a>
                </li>
                <li rel="process_orders" class="site-menu-item">
                  <a class="animsition-link" href="<?=BASEURL.'admin/orders/process'?>">
                    <span class="site-menu-title">Process</span>
                  </a>
                </li>
                <li rel="done_orders" class="site-menu-item">
                  <a class="animsition-link" href="<?=BASEURL.'admin/orders/done'?>">
                    <span class="site-menu-title">Done</span>
                  </a>
                </li>
                <li rel="cancel_orders" class="site-menu-item">
                  <a class="animsition-link" href="<?=BASEURL.'admin/orders/cancel'?>">
                    <span class="site-menu-title">Cancel</span>
                  </a>
                </li>
              </ul>
            </li>

            <!-- Categories  -->
              <li class="site-menu-item has-sub">
              <a href="javascript:void(0)">
                <i class="site-menu-icon md-view-compact" aria-hidden="true"></i>
                <span class="site-menu-title">Categories</span>
                <span class="site-menu-arrow"></span>
              </a>
              <ul class="site-menu-sub">
                <li rel="all_cats" class="site-menu-item">
                  <a class="animsition-link" href="<?=BASEURL.'admin/cats/all'?>">
                    <span class="site-menu-title">All</span>
                  </a>
                </li>
                <li rel="active_cats" class="site-menu-item">
                  <a class="animsition-link" href="<?=BASEURL.'admin/cats/active'?>">
                    <span class="site-menu-title">Active</span>
                  </a>
                </li>
                <li rel="inactive_cats" class="site-menu-item">
                  <a class="animsition-link" href="<?=BASEURL.'admin/cats/inactive'?>">
                    <span class="site-menu-title">Inactive</span>
                  </a>
                </li>
                <li rel="add_cat" class="site-menu-item">
                  <a class="animsition-link" href="<?=BASEURL.'admin/add-cat'?>">
                    <span class="site-menu-title">+Add</span>
                  </a>
                </li>
              </ul>
            </li>

            <!-- Products  -->
              <li class="site-menu-item has-sub">
              <a href="javascript:void(0)">
                <i class="site-menu-icon md-view-compact" aria-hidden="true"></i>
                <span class="site-menu-title">Products</span>
                <span class="site-menu-arrow"></span>
              </a>
              <ul class="site-menu-sub">
                <li rel="products" class="site-menu-item">
                  <a class="animsition-link" href="<?=BASEURL.'admin/products'?>">
                    <span class="site-menu-title">All</span>
                  </a>
                </li>
                <li rel="add_product" class="site-menu-item">
                  <a class="animsition-link" href="<?=BASEURL.'admin/add-product'?>">
                    <span class="site-menu-title">+Add</span>
                  </a>
                </li>
              </ul>
            </li>

            <!-- Cold Drinks  -->
              <li class="site-menu-item has-sub">
              <a href="javascript:void(0)">
                <i class="site-menu-icon md-view-compact" aria-hidden="true"></i>
                <span class="site-menu-title">Drinks</span>
                <span class="site-menu-arrow"></span>
              </a>
              <ul class="site-menu-sub">
                <li rel="drinks" class="site-menu-item">
                  <a class="animsition-link" href="<?=BASEURL.'admin/drinks'?>">
                    <span class="site-menu-title">All</span>
                  </a>
                </li>
                <li rel="add_drink" class="site-menu-item">
                  <a class="animsition-link" href="<?=BASEURL.'admin/add-drink'?>">
                    <span class="site-menu-title">+Add</span>
                  </a>
                </li>
              </ul>
            </li>

            <!-- Addons  -->
              <li class="site-menu-item has-sub">
              <a href="javascript:void(0)">
                <i class="site-menu-icon md-view-compact" aria-hidden="true"></i>
                <span class="site-menu-title">Addon</span>
                <span class="site-menu-arrow"></span>
              </a>
              <ul class="site-menu-sub">
                <li rel="addon" class="site-menu-item">
                  <a class="animsition-link" href="<?=BASEURL.'admin/addon'?>">
                    <span class="site-menu-title">All</span>
                  </a>
                </li>
                <li rel="add_addon" class="site-menu-item">
                  <a class="animsition-link" href="<?=BASEURL.'admin/add-addon'?>">
                    <span class="site-menu-title">+Add</span>
                  </a>
                </li>
              </ul>
            </li>

            <!-- Pages  -->
              <li class="site-menu-item has-sub">
              <a href="javascript:void(0)">
                <i class="site-menu-icon md-view-compact" aria-hidden="true"></i>
                <span class="site-menu-title">Pages</span>
                <span class="site-menu-arrow"></span>
              </a>
              <ul class="site-menu-sub">
                <li rel="pages" class="site-menu-item">
                  <a class="animsition-link" href="<?=BASEURL.'admin/pages'?>">
                    <span class="site-menu-title">All</span>
                  </a>
                </li>
              </ul>
            </li>

            <li rel="discount" class="site-menu-item">
              <a class="animsition-link" href="<?=BASEURL.'admin/discount/'?>">
                <i class="site-menu-icon md-view-compact" aria-hidden="true"></i>
                <span class="site-menu-title">Promotion Codes</span>
              </a>
            </li>

            <li rel="sliders" class="site-menu-item">
              <a class="animsition-link" href="<?=BASEURL.'admin/sliders/'?>">
                <i class="site-menu-icon md-view-compact" aria-hidden="true"></i>
                <span class="site-menu-title">Slider</span>
              </a>
            </li>
            <li rel="blog" class="site-menu-item">
                <a class="animsition-link" href="<?=BASEURL?>admin/blog">
                    <i class="site-menu-icon md-file" aria-hidden="true"></i>
                    <span class="site-menu-title">Blog</span>
                </a>
            </li>


          </ul>
        </div>
      </div>
    </div>
    <div class="site-menubar-footer">
      <a href="<?=BASEURL.'admin/setting/'?>" class="fold-show" data-placement="top" data-toggle="tooltip"
      data-original-title="Settings">
        <span class="icon md-settings" aria-hidden="true"></span>
      </a>
      <a href="javascript: void(0);" data-placement="top" data-toggle="tooltip" data-original-title="Lock">
        <span class="icon md-eye-off" aria-hidden="true"></span>
      </a>
      <a href="<?=BASEURL.'admin/logout'?>" data-placement="top" data-toggle="tooltip" data-original-title="Logout">
        <span class="icon md-power" aria-hidden="true"></span>
      </a>
    </div>
  </div>





<?php
function get_time_difference_php_2($created_time)
{
    $timezone = (DateTimeZone::listIdentifiers(DateTimeZone::PER_COUNTRY, "PK"));
    date_default_timezone_set($timezone[0]); //Change as per your default time
    $str = strtotime($created_time);
    $today = strtotime(date('Y-m-d H:i:s'));

    // It returns the time difference in Seconds...
    $time_differnce = $today-$str;

    // To Calculate the time difference in Years...
    $years = 60*60*24*365;

    // To Calculate the time difference in Months...
    $months = 60*60*24*30;

    // To Calculate the time difference in Days...
    $days = 60*60*24;

    // To Calculate the time difference in Hours...
    $hours = 60*60;

    // To Calculate the time difference in Minutes...
    $minutes = 60;

    if(intval($time_differnce/$years) > 1)
    {
        return intval($time_differnce/$years)." years ago";
    }else if(intval($time_differnce/$years) > 0)
    {
        return intval($time_differnce/$years)." year ago";
    }else if(intval($time_differnce/$months) > 1)
    {
        return intval($time_differnce/$months)." months ago";
    }else if(intval(($time_differnce/$months)) > 0)
    {
        return intval(($time_differnce/$months))." month ago";
    }else if(intval(($time_differnce/$days)) > 1)
    {
        return intval(($time_differnce/$days))." days ago";
    }else if (intval(($time_differnce/$days)) > 0) 
    {
        return intval(($time_differnce/$days))." day ago";
    }else if (intval(($time_differnce/$hours)) > 1) 
    {
        return intval(($time_differnce/$hours))." hours ago";
    }else if (intval(($time_differnce/$hours)) > 0) 
    {
        return intval(($time_differnce/$hours))." hour ago";
    }else if (intval(($time_differnce/$minutes)) > 1) 
    {
        return intval(($time_differnce/$minutes))." minutes ago";
    }else if (intval(($time_differnce/$minutes)) > 0) 
    {
        return intval(($time_differnce/$minutes))." minute ago";
    }else if (intval(($time_differnce)) > 1) 
    {
        return intval(($time_differnce))." seconds ago";
    }else
    {
        // return "few seconds ago";
        return "Just Now";
    }
}
?>