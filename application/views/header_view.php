<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<!-- Apple devices fullscreen -->
<meta name="apple-mobile-web-app-capable" content="yes" />
<!-- Apple devices fullscreen -->
<meta names="apple-mobile-web-app-status-bar-style" content="black-translucent" />
<title>FLAT - Dashboard</title>

<!-- Bootstrap -->
<link rel="stylesheet" href="http://localhost/base/assets/css/bootstrap.min.css">
<!-- Bootstrap responsive -->
<link rel="stylesheet" href="http://localhost/base/assets/css/bootstrap-responsive.min.css">
<!-- jQuery UI -->
<link rel="stylesheet" href="http://localhost/base/assets/css/plugins/jquery-ui/smoothness/jquery-ui.css">
<link rel="stylesheet" href="http://localhost/base/assets/css/plugins/jquery-ui/smoothness/jquery.ui.theme.css">
<!-- PageGuide -->
<link rel="stylesheet" href="http://localhost/base/assets/css/plugins/pageguide/pageguide.css">
<!-- Fullcalendar -->
<link rel="stylesheet" href="http://localhost/base/assets/css/plugins/fullcalendar/fullcalendar.css">
<link rel="stylesheet" href="http://localhost/base/assets/css/plugins/fullcalendar/fullcalendar.print.css" media="print">
<!-- chosen -->
<link rel="stylesheet" href="http://localhost/base/assets/css/plugins/chosen/chosen.css">
<!-- select2 -->
<link rel="stylesheet" href="http://localhost/base/assets/css/plugins/select2/select2.css">
<!-- icheck -->
<link rel="stylesheet" href="http://localhost/base/assets/css/plugins/icheck/all.css">
<!-- Theme CSS -->
<link rel="stylesheet" href="http://localhost/base/assets/css/style.css">
<!-- Color CSS -->
<link rel="stylesheet" href="http://localhost/base/assets/css/themes.css">

<!-- jQuery -->
<script src="http://localhost/base/assets/js/jquery.min.js"></script>

<!-- Nice Scroll -->
<script src="http://localhost/base/assets/js/plugins/nicescroll/jquery.nicescroll.min.js"></script>
<!-- jQuery UI -->
<script src="http://localhost/base/assets/js/plugins/jquery-ui/jquery.ui.core.min.js"></script>
<script src="http://localhost/base/assets/js/plugins/jquery-ui/jquery.ui.widget.min.js"></script>
<script src="http://localhost/base/assets/js/plugins/jquery-ui/jquery.ui.mouse.min.js"></script>
<script src="http://localhost/base/assets/js/plugins/jquery-ui/jquery.ui.draggable.min.js"></script>
<script src="http://localhost/base/assets/js/plugins/jquery-ui/jquery.ui.resizable.min.js"></script>
<script src="http://localhost/base/assets/js/plugins/jquery-ui/jquery.ui.sortable.min.js"></script>
<!-- Touch enable for jquery UI -->
<script src="http://localhost/base/assets/js/plugins/touch-punch/jquery.touch-punch.min.js"></script>
<!-- slimScroll -->
<script src="http://localhost/base/assets/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
<!-- Bootstrap -->
<script src="http://localhost/base/assets/js/bootstrap.min.js"></script>
<!-- vmap -->
<script src="http://localhost/base/assets/js/plugins/vmap/jquery.vmap.min.js"></script>
<script src="http://localhost/base/assets/js/plugins/vmap/jquery.vmap.world.js"></script>
<script src="http://localhost/base/assets/js/plugins/vmap/jquery.vmap.sampledata.js"></script>
<!-- Bootbox -->
<script src="http://localhost/base/assets/js/plugins/bootbox/jquery.bootbox.js"></script>
<!-- Flot -->
<script src="http://localhost/base/assets/js/plugins/flot/jquery.flot.min.js"></script>
<script src="http://localhost/base/assets/js/plugins/flot/jquery.flot.bar.order.min.js"></script>
<script src="http://localhost/base/assets/js/plugins/flot/jquery.flot.pie.min.js"></script>
<script src="http://localhost/base/assets/js/plugins/flot/jquery.flot.resize.min.js"></script>
<!-- imagesLoaded -->
<script src="http://localhost/base/assets/js/plugins/imagesLoaded/jquery.imagesloaded.min.js"></script>
<!-- PageGuide -->
<script src="http://localhost/base/assets/js/plugins/pageguide/jquery.pageguide.js"></script>
<!-- FullCalendar -->
<script src="http://localhost/base/assets/js/plugins/fullcalendar/fullcalendar.min.js"></script>
<!-- Chosen -->
<script src="http://localhost/base/assets/js/plugins/chosen/chosen.jquery.min.js"></script>
<!-- select2 -->
<script src="http://localhost/base/assets/js/plugins/select2/select2.min.js"></script>
<!-- icheck -->
<script src="http://localhost/base/assets/js/plugins/icheck/jquery.icheck.min.js"></script>

<!-- Theme framework -->
<script src="http://localhost/base/assets/js/eakroko.min.js"></script>
<!-- Theme scripts -->
<script src="http://localhost/base/assets/js/application.min.js"></script>
<!-- Just for demonstration -->
<script src="http://localhost/base/assets/js/demonstration.min.js"></script>

<!--[if lte IE 9]>
		<script src="http://localhost/base/assets/js/plugins/placeholder/jquery.placeholder.min.js"></script>
		<script>
			$(document).ready(function() {
				$('input, textarea').placeholder();
			});
		</script>
	<![endif]-->

<!-- Favicon -->
<link rel="shortcut icon" href="img/favicon.ico" />
<!-- Apple devices Homescreen icon -->
<link rel="apple-touch-icon-precomposed" href="img/apple-touch-icon-precomposed.png" />
</head>

<body>
<div id="new-task" class="modal hide" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Add new task</h3>
  </div>
  <form action="#" class='new-task-form form-horizontal form-bordered'>
    <div class="modal-body nopadding">
      <div class="control-group">
        <label for="tasktitel" class="control-label">Icon</label>
        <div class="controls">
          <select name="icons" id="icons" class='select2-me input-xlarge'>
            <option value="icon-adjust">icon-adjust</option>
            <option value="icon-asterisk">icon-asterisk</option>
            <option value="icon-ban-circle">icon-ban-circle</option>
            <option value="icon-bar-chart">icon-bar-chart</option>
            <option value="icon-barcode">icon-barcode</option>
            <option value="icon-beaker">icon-beaker</option>
            <option value="icon-beer">icon-beer</option>
            <option value="icon-bell">icon-bell</option>
            <option value="icon-bell-alt">icon-bell-alt</option>
            <option value="icon-bolt">icon-bolt</option>
            <option value="icon-book">icon-book</option>
            <option value="icon-bookmark">icon-bookmark</option>
            <option value="icon-bookmark-empty">icon-bookmark-empty</option>
            <option value="icon-briefcase">icon-briefcase</option>
            <option value="icon-bullhorn">icon-bullhorn</option>
            <option value="icon-calendar">icon-calendar</option>
            <option value="icon-camera">icon-camera</option>
            <option value="icon-camera-retro">icon-camera-retro</option>
            <option value="icon-certificate">icon-certificate</option>
            <option value="icon-check">icon-check</option>
            <option value="icon-check-empty">icon-check-empty</option>
            <option value="icon-circle">icon-circle</option>
            <option value="icon-circle-blank">icon-circle-blank</option>
            <option value="icon-cloud">icon-cloud</option>
            <option value="icon-cloud-download">icon-cloud-download</option>
            <option value="icon-cloud-upload">icon-cloud-upload</option>
            <option value="icon-coffee">icon-coffee</option>
            <option value="icon-cog">icon-cog</option>
            <option value="icon-cogs">icon-cogs</option>
            <option value="icon-comment">icon-comment</option>
            <option value="icon-comment-alt">icon-comment-alt</option>
            <option value="icon-comments">icon-comments</option>
            <option value="icon-comments-alt">icon-comments-alt</option>
            <option value="icon-credit-card">icon-credit-card</option>
            <option value="icon-dashboard">icon-dashboard</option>
            <option value="icon-desktop">icon-desktop</option>
            <option value="icon-download">icon-download</option>
            <option value="icon-download-alt">icon-download-alt</option>
            <option value="icon-edit">icon-edit</option>
            <option value="icon-envelope">icon-envelope</option>
            <option value="icon-envelope-alt">icon-envelope-alt</option>
            <option value="icon-exchange">icon-exchange</option>
            <option value="icon-exclamation-sign">icon-exclamation-sign</option>
            <option value="icon-external-link">icon-external-link</option>
            <option value="icon-eye-close">icon-eye-close</option>
            <option value="icon-eye-open">icon-eye-open</option>
            <option value="icon-facetime-video">icon-facetime-video</option>
            <option value="icon-fighter-jet">icon-fighter-jet</option>
            <option value="icon-film">icon-film</option>
            <option value="icon-filter">icon-filter</option>
            <option value="icon-fire">icon-fire</option>
            <option value="icon-flag">icon-flag</option>
            <option value="icon-folder-close">icon-folder-close</option>
            <option value="icon-folder-open">icon-folder-open</option>
            <option value="icon-folder-close-alt">icon-folder-close-alt</option>
            <option value="icon-folder-open-alt">icon-folder-open-alt</option>
            <option value="icon-food">icon-food</option>
            <option value="icon-gift">icon-gift</option>
            <option value="icon-glass">icon-glass</option>
            <option value="icon-globe">icon-globe</option>
            <option value="icon-group">icon-group</option>
            <option value="icon-hdd">icon-hdd</option>
            <option value="icon-headphones">icon-headphones</option>
            <option value="icon-heart">icon-heart</option>
            <option value="icon-heart-empty">icon-heart-empty</option>
            <option value="icon-home">icon-home</option>
            <option value="icon-inbox">icon-inbox</option>
            <option value="icon-info-sign">icon-info-sign</option>
            <option value="icon-key">icon-key</option>
            <option value="icon-leaf">icon-leaf</option>
            <option value="icon-laptop">icon-laptop</option>
            <option value="icon-legal">icon-legal</option>
            <option value="icon-lemon">icon-lemon</option>
            <option value="icon-lightbulb">icon-lightbulb</option>
            <option value="icon-lock">icon-lock</option>
            <option value="icon-unlock">icon-unlock</option>
            <option value="icon-magic">icon-magic</option>
            <option value="icon-magnet">icon-magnet</option>
            <option value="icon-map-marker">icon-map-marker</option>
            <option value="icon-minus">icon-minus</option>
            <option value="icon-minus-sign">icon-minus-sign</option>
            <option value="icon-mobile-phone">icon-mobile-phone</option>
            <option value="icon-money">icon-money</option>
            <option value="icon-move">icon-move</option>
            <option value="icon-music">icon-music</option>
            <option value="icon-off">icon-off</option>
            <option value="icon-ok">icon-ok</option>
            <option value="icon-ok-circle">icon-ok-circle</option>
            <option value="icon-ok-sign">icon-ok-sign</option>
            <option value="icon-pencil">icon-pencil</option>
            <option value="icon-picture">icon-picture</option>
            <option value="icon-plane">icon-plane</option>
            <option value="icon-plus">icon-plus</option>
            <option value="icon-plus-sign">icon-plus-sign</option>
            <option value="icon-print">icon-print</option>
            <option value="icon-pushpin">icon-pushpin</option>
            <option value="icon-qrcode">icon-qrcode</option>
            <option value="icon-question-sign">icon-question-sign</option>
            <option value="icon-quote-left">icon-quote-left</option>
            <option value="icon-quote-right">icon-quote-right</option>
            <option value="icon-random">icon-random</option>
            <option value="icon-refresh">icon-refresh</option>
            <option value="icon-remove">icon-remove</option>
            <option value="icon-remove-circle">icon-remove-circle</option>
            <option value="icon-remove-sign">icon-remove-sign</option>
            <option value="icon-reorder">icon-reorder</option>
            <option value="icon-reply">icon-reply</option>
            <option value="icon-resize-horizontal">icon-resize-horizontal</option>
            <option value="icon-resize-vertical">icon-resize-vertical</option>
            <option value="icon-retweet">icon-retweet</option>
            <option value="icon-road">icon-road</option>
            <option value="icon-rss">icon-rss</option>
            <option value="icon-screenshot">icon-screenshot</option>
            <option value="icon-search">icon-search</option>
            <option value="icon-share">icon-share</option>
            <option value="icon-share-alt">icon-share-alt</option>
            <option value="icon-shopping-cart">icon-shopping-cart</option>
            <option value="icon-signal">icon-signal</option>
            <option value="icon-signin">icon-signin</option>
            <option value="icon-signout">icon-signout</option>
            <option value="icon-sitemap">icon-sitemap</option>
            <option value="icon-sort">icon-sort</option>
            <option value="icon-sort-down">icon-sort-down</option>
            <option value="icon-sort-up">icon-sort-up</option>
            <option value="icon-spinner">icon-spinner</option>
            <option value="icon-star">icon-star</option>
            <option value="icon-star-empty">icon-star-empty</option>
            <option value="icon-star-half">icon-star-half</option>
            <option value="icon-tablet">icon-tablet</option>
            <option value="icon-tag">icon-tag</option>
            <option value="icon-tags">icon-tags</option>
            <option value="icon-tasks">icon-tasks</option>
            <option value="icon-thumbs-down">icon-thumbs-down</option>
            <option value="icon-thumbs-up">icon-thumbs-up</option>
            <option value="icon-time">icon-time</option>
            <option value="icon-tint">icon-tint</option>
            <option value="icon-trash">icon-trash</option>
            <option value="icon-trophy">icon-trophy</option>
            <option value="icon-truck">icon-truck</option>
            <option value="icon-umbrella">icon-umbrella</option>
            <option value="icon-upload">icon-upload</option>
            <option value="icon-upload-alt">icon-upload-alt</option>
            <option value="icon-user">icon-user</option>
            <option value="icon-user-md">icon-user-md</option>
            <option value="icon-volume-off">icon-volume-off</option>
            <option value="icon-volume-down">icon-volume-down</option>
            <option value="icon-volume-up">icon-volume-up</option>
            <option value="icon-warning-sign">icon-warning-sign</option>
            <option value="icon-wrench">icon-wrench</option>
            <option value="icon-zoom-in">icon-zoom-in</option>
            <option value="icon-zoom-out">icon-zoom-out</option>
            <option value="icon-file">icon-file</option>
            <option value="icon-file-alt">icon-file-alt</option>
            <option value="icon-cut">icon-cut</option>
            <option value="icon-copy">icon-copy</option>
            <option value="icon-paste">icon-paste</option>
            <option value="icon-save">icon-save</option>
            <option value="icon-undo">icon-undo</option>
            <option value="icon-repeat">icon-repeat</option>
            <option value="icon-text-height">icon-text-height</option>
            <option value="icon-text-width">icon-text-width</option>
            <option value="icon-align-left">icon-align-left</option>
            <option value="icon-align-center">icon-align-center</option>
            <option value="icon-align-right">icon-align-right</option>
            <option value="icon-align-justify">icon-align-justify</option>
            <option value="icon-indent-left">icon-indent-left</option>
            <option value="icon-indent-right">icon-indent-right</option>
            <option value="icon-font">icon-font</option>
            <option value="icon-bold">icon-bold</option>
            <option value="icon-italic">icon-italic</option>
            <option value="icon-strikethrough">icon-strikethrough</option>
            <option value="icon-underline">icon-underline</option>
            <option value="icon-link">icon-link</option>
            <option value="icon-paper-clip">icon-paper-clip</option>
            <option value="icon-columns">icon-columns</option>
            <option value="icon-table">icon-table</option>
            <option value="icon-th-large">icon-th-large</option>
            <option value="icon-th">icon-th</option>
            <option value="icon-th-list">icon-th-list</option>
            <option value="icon-list">icon-list</option>
            <option value="icon-list-ol">icon-list-ol</option>
            <option value="icon-list-ul">icon-list-ul</option>
            <option value="icon-list-alt">icon-list-alt</option>
            <option value="icon-angle-left">icon-angle-left</option>
            <option value="icon-angle-right">icon-angle-right</option>
            <option value="icon-angle-up">icon-angle-up</option>
            <option value="icon-angle-down">icon-angle-down</option>
            <option value="icon-arrow-down">icon-arrow-down</option>
            <option value="icon-arrow-left">icon-arrow-left</option>
            <option value="icon-arrow-right">icon-arrow-right</option>
            <option value="icon-arrow-up">icon-arrow-up</option>
            <option value="icon-caret-down">icon-caret-down</option>
            <option value="icon-caret-left">icon-caret-left</option>
            <option value="icon-caret-right">icon-caret-right</option>
            <option value="icon-caret-up">icon-caret-up</option>
            <option value="icon-chevron-down">icon-chevron-down</option>
            <option value="icon-chevron-left">icon-chevron-left</option>
            <option value="icon-chevron-right">icon-chevron-right</option>
            <option value="icon-chevron-up">icon-chevron-up</option>
            <option value="icon-circle-arrow-down">icon-circle-arrow-down</option>
            <option value="icon-circle-arrow-left">icon-circle-arrow-left</option>
            <option value="icon-circle-arrow-right">icon-circle-arrow-right</option>
            <option value="icon-circle-arrow-up">icon-circle-arrow-up</option>
            <option value="icon-double-angle-left">icon-double-angle-left</option>
            <option value="icon-double-angle-right">icon-double-angle-right</option>
            <option value="icon-double-angle-up">icon-double-angle-up</option>
            <option value="icon-double-angle-down">icon-double-angle-down</option>
            <option value="icon-hand-down">icon-hand-down</option>
            <option value="icon-hand-left">icon-hand-left</option>
            <option value="icon-hand-right">icon-hand-right</option>
            <option value="icon-hand-up">icon-hand-up</option>
            <option value="icon-circle">icon-circle</option>
            <option value="icon-circle-blank">icon-circle-blank</option>
            <option value="icon-play-circle">icon-play-circle</option>
            <option value="icon-play">icon-play</option>
            <option value="icon-pause">icon-pause</option>
            <option value="icon-stop">icon-stop</option>
            <option value="icon-step-backward">icon-step-backward</option>
            <option value="icon-fast-backward">icon-fast-backward</option>
            <option value="icon-backward">icon-backward</option>
            <option value="icon-forward">icon-forward</option>
            <option value="icon-fast-forward">icon-fast-forward</option>
            <option value="icon-step-forward">icon-step-forward</option>
            <option value="icon-eject">icon-eject</option>
            <option value="icon-fullscreen">icon-fullscreen</option>
            <option value="icon-resize-full">icon-resize-full</option>
            <option value="icon-resize-small">icon-resize-small</option>
            <option value="icon-phone">icon-phone</option>
            <option value="icon-phone-sign">icon-phone-sign</option>
            <option value="icon-facebook">icon-facebook</option>
            <option value="icon-facebook-sign">icon-facebook-sign</option>
            <option value="icon-twitter">icon-twitter</option>
            <option value="icon-twitter-sign">icon-twitter-sign</option>
            <option value="icon-github">icon-github</option>
            <option value="icon-github-alt">icon-github-alt</option>
            <option value="icon-github-sign">icon-github-sign</option>
            <option value="icon-linkedin">icon-linkedin</option>
            <option value="icon-linkedin-sign">icon-linkedin-sign</option>
            <option value="icon-pinterest">icon-pinterest</option>
            <option value="icon-pinterest-sign">icon-pinterest-sign</option>
            <option value="icon-google-plus">icon-google-plus</option>
            <option value="icon-google-plus-sign">icon-google-plus-sign</option>
            <option value="icon-sign-blank">icon-sign-blank</option>
            <option value="icon-ambulance">icon-ambulance</option>
            <option value="icon-beaker">icon-beaker</option>
            <option value="icon-h-sign">icon-h-sign</option>
            <option value="icon-hospital">icon-hospital</option>
            <option value="icon-medkit">icon-medkit</option>
            <option value="icon-plus-sign-alt">icon-plus-sign-alt</option>
            <option value="icon-stethoscope">icon-stethoscope</option>
            <option value="icon-user-md">icon-user-md</option>
          </select>
        </div>
      </div>
      <div class="control-group">
        <label for="task-name" class="control-label">Task</label>
        <div class="controls">
          <input type="text" name="task-name">
        </div>
      </div>
      <div class="control-group">
        <label for="tasktitel" class="control-label"></label>
        <div class="controls">
          <label class="checkbox">
            <input type="checkbox" name="task-bookmarked" value="yep">
            Mark as important</label>
        </div>
      </div>
    </div>
    <div class="modal-footer">
      <input type="submit" class="btn btn-primary" value="Add task">
    </div>
  </form>
</div>
<div id="modal-user" class="modal hide">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="user-infos">Jane Doe</h3>
  </div>
  <div class="modal-body">
    <div class="row-fluid">
      <div class="span2"> <img src="img/demo/user-1.jpg" alt=""> </div>
      <div class="span10">
        <dl class="dl-horizontal" style="margin-top:0;">
          <dt>Full name:</dt>
          <dd>Jane Doe</dd>
          <dt>Email:</dt>
          <dd>jane.doe@janedoesemail.com</dd>
          <dt>Address:</dt>
          <dd>
            <address>
            <strong>John Doe, Inc.</strong> <br>
            7195 JohnsonDoes Ave, Suite 320 <br>
            San Francisco, CA 881234 <br>
            <abbr title="Phone">P:</abbr> (123) 456-7890
            </address>
          </dd>
          <dt>Social:</dt>
          <dd> <a href="#" class='btn'><i class="icon-facebook"></i></a> <a href="#" class='btn'><i class="icon-twitter"></i></a> <a href="#" class='btn'><i class="icon-linkedin"></i></a> <a href="#" class='btn'><i class="icon-envelope"></i></a> <a href="#" class='btn'><i class="icon-rss"></i></a> <a href="#" class='btn'><i class="icon-github"></i></a> </dd>
        </dl>
      </div>
    </div>
  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal">Close</button>
  </div>
</div>
<div id="navigation">
  <div class="container-fluid"> <a href="#" id="brand">FLAT</a> <a href="#" class="toggle-nav" rel="tooltip" data-placement="bottom" title="Toggle navigation"><i class="icon-reorder"></i></a>
    <ul class='main-nav'>
      <li class='active'> <a href="index.html"> <span>Dashboard</span> </a> </li>
      <li> <a href="#" data-toggle="dropdown" class='dropdown-toggle'> <span>Forms</span> <span class="caret"></span> </a>
        <ul class="dropdown-menu">
          <li> <a href="forms-basic.html">Basic forms</a> </li>
          <li> <a href="forms-extended.html">Extended forms</a> </li>
          <li> <a href="forms-validation.html">Validation</a> </li>
          <li> <a href="forms-wizard.html">Wizard</a> </li>
        </ul>
      </li>
      <li> <a href="#" data-toggle="dropdown" class='dropdown-toggle'> <span>Components</span> <span class="caret"></span> </a>
        <ul class="dropdown-menu">
          <li> <a href="components-timeline.html">Timeline</a> </li>
          <li> <a href="components-pagestatistics.html">Page statistics</a> </li>
          <li> <a href="components-sidebarwidgets.html">Sidebar widgets</a> </li>
          <li> <a href="components-messages.html">Messages &amp; Chat</a> </li>
          <li> <a href="components-gallery.html">Gallery &amp; Thumbs</a> </li>
          <li> <a href="components-tiles.html">Tiles</a> </li>
          <li> <a href="components-icons.html">Icons &amp; Buttons</a> </li>
          <li> <a href="components-elements.html">UI elements</a> </li>
          <li> <a href="components-typography.html">Typography</a> </li>
          <li> <a href="components-bootstrap.html">Bootstrap elements</a> </li>
          <li> <a href="components-grid.html">Grid</a> </li>
        </ul>
      </li>
      <li> <a href="#" data-toggle="dropdown" class='dropdown-toggle'> <span>Tables</span> <span class="caret"></span> </a>
        <ul class="dropdown-menu">
          <li> <a href="tables-basic.html">Basic tables</a> </li>
          <li> <a href="tables-dynamic.html">Dynamic tables</a> </li>
          <li> <a href="tables-large.html">Large tables</a> </li>
        </ul>
      </li>
      <li> <a href="#" data-toggle="dropdown" class='dropdown-toggle'> <span>Plugins</span> <span class="caret"></span> </a>
        <ul class="dropdown-menu">
          <li> <a href="plugins-charts.html">Charts</a> </li>
          <li> <a href="plugins-calendar.html">Calendar</a> </li>
          <li> <a href="plugins-filemanager.html">File manager</a> </li>
          <li> <a href="plugins-filetrees.html">File trees</a> </li>
          <li> <a href="plugins-elements.html">Editable elements</a> </li>
          <li> <a href="plugins-maps.html">Maps</a> </li>
          <li> <a href="plugins-dragdrop.html">Drag &amp; Drop widgets</a> </li>
        </ul>
      </li>
      <li> <a href="#" data-toggle="dropdown" class='dropdown-toggle'> <span>Pages</span> <span class="caret"></span> </a>
        <ul class="dropdown-menu">
          <li> <a href="more-error.html">Error pages</a> </li>
          <li class='dropdown-submenu'> <a href="#" data-toggle="dropdown" class='dropdown-toggle'>Shop</a>
            <ul class="dropdown-menu">
              <li> <a href="more-shop-list.html">List view</a> </li>
              <li> <a href="more-shop-product.html">Product view</a> </li>
            </ul>
          </li>
          <li> <a href="more-pricing.html">Pricing tables</a> </li>
          <li> <a href="more-faq.html">FAQ</a> </li>
          <li> <a href="more-invoice.html">Invoice</a> </li>
          <li> <a href="more-userprofile.html">User profile</a> </li>
          <li> <a href="more-searchresults.html">Search results</a> </li>
          <li> <a href="more-login.html">Login</a> </li>
          <li> <a href="more-locked.html">Lock screen</a> </li>
          <li> <a href="more-email.html">Email templates</a> </li>
          <li> <a href="more-blank.html">Blank page</a> </li>
          <li class='dropdown-submenu'> <a href="#" data-toggle="dropdown" class='dropdown-toggle'>Blog</a>
            <ul class="dropdown-menu">
              <li> <a href="more-blog-list.html">List big image</a> </li>
              <li> <a href="more-blog-list-small.html">List small image</a> </li>
              <li> <a href="more-blog-post.html">Post</a> </li>
            </ul>
          </li>
        </ul>
      </li>
      <li> <a href="#" data-toggle="dropdown" class='dropdown-toggle'> <span>Layouts</span> <span class="caret"></span> </a>
        <ul class="dropdown-menu">
          <li> <a href="layouts-sidebar-hidden.html">Default hidden sidebar</a> </li>
          <li> <a href="layouts-sidebar-right.html">Sidebar right side</a> </li>
          <li> <a href="layouts-color.html">Different default color</a> </li>
          <li> <a href="layouts-fixed.html">Fixed layout</a> </li>
          <li> <a href="layouts-fixed-topside.html">Fixed topbar and sidebar</a> </li>
          <li class='dropdown-submenu'> <a href="#">Mobile sidebar</a>
            <ul class="dropdown-menu">
              <li> <a href="layouts-mobile-slide.html">Slide</a> </li>
              <li> <a href="layouts-mobile-button.html">Button</a> </li>
            </ul>
          </li>
          <li> <a href="layouts-footer.html">Footer</a> </li>
        </ul>
      </li>
    </ul>
    <div class="user">
				<ul class="icon-nav">
					<li class='dropdown'>
						<a href="#" class='dropdown-toggle' data-toggle="dropdown"><i class="icon-envelope"></i><span class="label label-lightred">4</span></a>
						<ul class="dropdown-menu pull-right message-ul">
							<li>
								<a href="#">
									<img src="img/demo/user-1.jpg" alt="">
									<div class="details">
										<div class="name">Jane Doe</div>
										<div class="message">
											Lorem ipsum Commodo quis nisi ...
										</div>
									</div>
								</a>
							</li>
							<li>
								<a href="#">
									<img src="img/demo/user-2.jpg" alt="">
									<div class="details">
										<div class="name">John Doedoe</div>
										<div class="message">
											Ut ad laboris est anim ut ...
										</div>
									</div>
									<div class="count">
										<i class="icon-comment"></i>
										<span>3</span>
									</div>
								</a>
							</li>
							<li>
								<a href="#">
									<img src="img/demo/user-3.jpg" alt="">
									<div class="details">
										<div class="name">Bob Doe</div>
										<div class="message">
											Excepteur Duis magna dolor!
										</div>
									</div>
								</a>
							</li>
							<li>
								<a href="components-messages.html" class='more-messages'>Go to Message center <i class="icon-arrow-right"></i></a>
							</li>
						</ul>
					</li>
<!--					<li class="dropdown sett">
						<a href="#" class='dropdown-toggle' data-toggle="dropdown"><i class="icon-cog"></i></a>
						<ul class="dropdown-menu pull-right theme-settings">
							<li>
								<span>Layout-width</span>
								<div class="version-toggle">
									<a href="#" class='set-fixed'>Fixed</a>
									<a href="#" class="active set-fluid">Fluid</a>
								</div>
							</li>
							<li>
								<span>Topbar</span>
								<div class="topbar-toggle">
									<a href="#" class='set-topbar-fixed'>Fixed</a>
									<a href="#" class="active set-topbar-default">Default</a>
								</div>
							</li>
							<li>
								<span>Sidebar</span>
								<div class="sidebar-toggle">
									<a href="#" class='set-sidebar-fixed'>Fixed</a>
									<a href="#" class="active set-sidebar-default">Default</a>
								</div>
							</li>
						</ul>
					</li>-->
					
					
				</ul>
				<div class="dropdown">
					<a href="#" class='dropdown-toggle' data-toggle="dropdown">John Doe <img src="img/demo/user-avatar.jpg" alt=""></a>
					<ul class="dropdown-menu pull-right">
						<li>
							<a href="more-userprofile.html">Edit profile</a>
						</li>
						<li>
							<a href="#">Account settings</a>
						</li>
						<li>
							<a href="more-login.html">Sign out</a>
						</li>
					</ul>
				</div>
			</div>
  </div>
</div>
    <div class="container-fluid" id="content">