<?php 
if(isset($error) && $error != '')
{
    $display = "display : block";
}
else
{
    $display = "display : none";
}

?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<!-- Apple devices fullscreen -->
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<!-- Apple devices fullscreen -->
	<meta names="apple-mobile-web-app-status-bar-style" content="black-translucent" />
	
	<title>FLAT - Login</title>

	<!-- Bootstrap -->
	<link rel="stylesheet" href="http://localhost/base/assets/css/bootstrap.min.css">
	<!-- Bootstrap responsive -->
	<link rel="stylesheet" href="http://localhost/base/assets/css/bootstrap-responsive.min.css">
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
	<!-- Validation -->
	<script src="http://localhost/base/assets/js/plugins/validation/jquery.validate.min.js"></script>
	<script src="http://localhost/base/assets/js/plugins/validation/additional-methods.min.js"></script>
	<!-- icheck -->
	<script src="http://localhost/base/assets/js/plugins/icheck/jquery.icheck.min.js"></script>
	<!-- Bootstrap -->
	<script src="http://localhost/base/assets/js/bootstrap.min.js"></script>
	<script src="http://localhost/base/assets/js/eakroko.js"></script>

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

<body class='login'>
	<div class="wrapper">
		<h1><a href="index.html"><img src="img/logo-big.png" alt="" class='retina-ready' width="59" height="49">FLAT</a></h1>
		<div class="login-body">
			<h2>SIGN IN</h2>
			  <?php echo form_open("dashboard/login"); //controller => user --- function => login ?>
				<div class="control-group">
					<div class="email controls">
						<input type="text" name='username' placeholder="Email address" class='input-block-level' data-rule-required="true" data-rule-email="true">
					</div>
				</div>
				<div class="control-group">
					<div class="pw controls">
						<input type="password" name="password" placeholder="Password" class='input-block-level' data-rule-required="true">
					</div>
				</div>
				<div class="submit">
					<div class="remember">
						<input type="checkbox" name="remember" class='icheck-me' data-skin="square" data-color="blue" id="remember"> <label for="remember">Remember me</label>
					</div>
					
                                         <input type="submit" class="btn btn-primary" value="Sign me in" name="admin_login" />
            
            
            <?php echo form_close(); ?>
				</div>
			
			<div class="forget">
				<a href="#"><span>Forgot password?</span></a>
			</div>
		</div>
	</div>
</body>


</html>
