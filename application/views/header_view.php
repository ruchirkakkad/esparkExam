<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <!-- Apple devices fullscreen -->
        <meta name="apple-mobile-web-app-capable" content="yes" />
        <!-- Apple devices fullscreen -->
        <meta names="apple-mobile-web-app-status-bar-style" content="black-translucent" />
        <title><?php echo $title;?></title>

        <!-- Bootstrap -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
        <!-- Bootstrap responsive -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap-responsive.min.css">
        <!-- jQuery UI -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/plugins/jquery-ui/smoothness/jquery-ui.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/plugins/jquery-ui/smoothness/jquery.ui.theme.css">
        <!-- PageGuide -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/plugins/pageguide/pageguide.css">
        <!-- Fullcalendar -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/plugins/fullcalendar/fullcalendar.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/plugins/fullcalendar/fullcalendar.print.css" media="print">
        <!-- chosen -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/plugins/chosen/chosen.css">
        <!-- select2 -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/plugins/select2/select2.css">
        <!-- icheck -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/plugins/icheck/all.css">
        <!-- Theme CSS -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">
        <!-- Color CSS -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/themes.css">

        <!-- jQuery -->
        <script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>

        <!-- Nice Scroll -->
        <script src="<?php echo base_url(); ?>assets/js/plugins/nicescroll/jquery.nicescroll.min.js"></script>
        <!-- jQuery UI -->
        <script src="<?php echo base_url(); ?>assets/js/plugins/jquery-ui/jquery.ui.core.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/plugins/jquery-ui/jquery.ui.widget.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/plugins/jquery-ui/jquery.ui.mouse.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/plugins/jquery-ui/jquery.ui.draggable.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/plugins/jquery-ui/jquery.ui.resizable.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/plugins/jquery-ui/jquery.ui.sortable.min.js"></script>
        <!-- Touch enable for jquery UI -->
        <script src="<?php echo base_url(); ?>assets/js/plugins/touch-punch/jquery.touch-punch.min.js"></script>
        <!-- slimScroll -->
        <script src="<?php echo base_url(); ?>assets/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
        <!-- Bootstrap -->
        <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
        <!-- vmap -->
        <script src="<?php echo base_url(); ?>assets/js/plugins/vmap/jquery.vmap.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/plugins/vmap/jquery.vmap.world.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/plugins/vmap/jquery.vmap.sampledata.js"></script>
        <!-- Bootbox -->
        <script src="<?php echo base_url(); ?>assets/js/plugins/bootbox/jquery.bootbox.js"></script>
        <!-- Flot -->
        <script src="<?php echo base_url(); ?>assets/js/plugins/flot/jquery.flot.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/plugins/flot/jquery.flot.bar.order.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/plugins/flot/jquery.flot.pie.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/plugins/flot/jquery.flot.resize.min.js"></script>
        <!-- imagesLoaded -->
        <script src="<?php echo base_url(); ?>assets/js/plugins/imagesLoaded/jquery.imagesloaded.min.js"></script>
        <!-- PageGuide -->
        <script src="<?php echo base_url(); ?>assets/js/plugins/pageguide/jquery.pageguide.js"></script>
        <!-- FullCalendar -->
        <script src="<?php echo base_url(); ?>assets/js/plugins/fullcalendar/fullcalendar.min.js"></script>
        <!-- Chosen -->
        <script src="<?php echo base_url(); ?>assets/js/plugins/chosen/chosen.jquery.min.js"></script>
        <!-- select2 -->
        <script src="<?php echo base_url(); ?>assets/js/plugins/select2/select2.min.js"></script>
        <!-- icheck -->
        <script src="<?php echo base_url(); ?>assets/js/plugins/icheck/jquery.icheck.min.js"></script>

        <!-- Theme framework -->
        <script src="<?php echo base_url(); ?>assets/js/eakroko.min.js"></script>
        <!-- Theme scripts -->
        <script src="<?php echo base_url(); ?>assets/js/application.min.js"></script>
        <!-- Just for demonstration -->
        <script src="<?php echo base_url(); ?>assets/js/demonstration.min.js"></script>

        <!-- Favicon -->
        <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/img/favicon.ico" />
        <!-- Apple devices Homescreen icon -->
        <link rel="apple-touch-icon-precomposed" href="<?php echo base_url(); ?>assets/img/apple-touch-icon-precomposed.png" />
    </head>

    <body>
        <div id="navigation">
            <div class="container-fluid"> <a href="#" id="brand">eSparkBiz</a> <a href="#" class="toggle-nav" rel="tooltip" data-placement="bottom" title="Toggle navigation"><i class="icon-reorder"></i></a>
                <ul class='main-nav'>
                    <!--<li class='active'> <a href="index.html"> <span>Dashboard</span> </a> </li>-->                    
                </ul>
                <div class="user">
                    <div class="dropdown">
                        <a href="#" class='dropdown-toggle' data-toggle="dropdown">Admin</a>
                        <ul class="dropdown-menu pull-right">
<!--                            <li>
                                <a href="more-userprofile.html">Edit profile</a>
                            </li>
                            <li>
                                <a href="#">Account settings</a>
                            </li>-->
                            <li>
                                <a href="<?php echo base_url(); ?>dashboard/logout">Sign out</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid" id="content">