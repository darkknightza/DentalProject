<!DOCTYPE html>
<html lang="en"> 
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

	<title>DOCTOR Maejo</title>

	<link rel="stylesheet" href="/public/css/font-awesome.min.css">
	<link rel="stylesheet" href="/public/css/bootstrap.min.css">
	<link rel="stylesheet" href="/public/css/style.css">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:600italic,400,800,700,300' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=BenchNine:300,400,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
	<script src="/public/js/modernizr.js"></script>
	<!--[if lt IE 9]>
      <script src="/public/js/html5shiv.js"></script>
      <script src="/public/js/respond.min.js"></script>
    <![endif]-->

</head>


<body>
	<!-- ====================================================
	header section -->
	<header class="top-header">
		<div class="container">
			<div class="row">
				<div class="col-xs-5 header-logo">
					<br>
					<?php if($user==null){ ?>
					<a href="/UserTypeController/Topage/''"><img src="/public/img/logo.png" alt="" class="img-responsive logo"></a>
					<?php }else{ ?>
					<a href="/UserTypeController/Topage/<?php echo $user['userType_id'] ?>"><img src="/public/img/logo.png" alt="" class="img-responsive logo"></a>
					<?php } ?>
				</div>
				<div class="col-md-7">
					<nav class="navbar navbar-default">
					  <div class="container-fluid nav-bar">
					    <!-- Brand and toggle get grouped for better mobile display -->
					    <div class="navbar-header">
					      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					        <span class="sr-only">Toggle navigation</span>
					        <span class="icon-bar"></span>
					        <span class="icon-bar"></span>
					        <span class="icon-bar"></span>
					      </button>
					    </div>

					    <!-- Collect the nav links, forms, and other content for toggling -->
					    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					      <ul class="nav navbar-nav navbar-right">
					      	<?php if($user==null){ ?>
					      	<li><a class="menu active" href="/UserTypeController/Topage/''" >Home</a></li>
					      	 <?php }else{ ?>
					        <li><a class="menu active" href="/UserTypeController/Topage/<?php echo $user['userType_id'] ?>" >Home</a></li>
					        <?php } ?>
					        <?php if($user==null){ ?>
					        <li><a class="menu" href="/LoginControllers/FormLogin">Login พนักงาน</a></li>
					        <?php }else{ ?>
					        <li><a class="menu" href="#"><?php echo $user['name'] ?></a></li>
					        <li><a class="menu" href="/LoginControllers/logout">Logout พนักงาน</a></li>
					        <?php } ?>
					      </ul>
					    </div><!-- /navbar-collapse -->
					  </div><!-- / .container-fluid -->
					</nav>
				</div>
			</div>
		</div>
	</header> <!-- end of header area -->
