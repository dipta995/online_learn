<?php 

  include_once 'ViewClass.php';
  include_once 'sessionclass.php';
  include_once 'InsertClass.php';
  
  $viewcls = new ViewClass();
  $senddata = new InsertClass();
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>WebUni - Education Template</title>
	<meta charset="UTF-8">
	<meta name="description" content="WebUni Education Template">
	<meta name="keywords" content="webuni, education, creative, html">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Favicon -->   
	<link href="img/favicon.ico" rel="shortcut icon"/>

	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Raleway:400,400i,500,500i,600,600i,700,700i,800,800i" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<!-- Stylesheets -->
	<link rel="stylesheet" href="css/bootstrap.min.css"/>
	<link rel="stylesheet" href="css/font-awesome.min.css"/>
	<link rel="stylesheet" href="css/owl.carousel.css"/>
	<link rel="stylesheet" href="css/style.css"/>


	<link rel="icon" type="image/png" href="login/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/css/util.css">
	<link rel="stylesheet" type="text/css" href="login/css/main.css">


	<!--[if lt IE 9]>
	  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

</head>
<body>
	<style type="text/css">
  /* component */
  .header-buttn{
  	margin: 17px 10px;
	color: wheat;
  }

.star-rating {
  border:solid 1px #ccc;
  display:flex;
  flex-direction: row-reverse;
  font-size:1.5em;
  justify-content:space-around;
  padding:0 .2em;
  text-align:center;
  width:5em;
}

 

.star-rating label {
   color:#fc0; 
 
}

 
 
/* explanation */

article {
  background-color:#ffe;
  box-shadow:0 0 1em 1px rgba(0,0,0,.25);
  color:#006;
  font-family:cursive;
  font-style:italic;
  margin:4em;
  max-width:30em;
  padding:2em;
}

</style>
	<!-- Page Preloder -->
	<!-- <div id="preloder">
		<div class="loader"></div>
	</div> -->

	<!-- Header section -->
	<header class="header-section">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-3">
					<div class="site-logo">
						<img src="img/logo.png" alt="">
					</div>
					<div class="nav-switch">
						<i class="fa fa-bars"></i>
					</div>
				</div>
				<div class="col-lg-9 col-md-9">
					<?php
					if (isset($_SESSION['true'])) {
$student_id =$_SESSION['student_id'];


			if (isset($_SESSION['teacher_auth'])=='teacher_auth') {
			}else{
			 
			 ?>
					  <div>
					  	<a href="enrollcart.php">
					  	<p style="font-size: 22px; margin-top: 5px;" class="header-buttn header-btn"><i style="margin-top: 15px;" class="fa fa-book" aria-hidden="true"></i><i style="position: absolute; font-size: 24px;" class="fa fa-comment"></i>
<span style="font-size: 15px;margin-left: 6px;color: #ff162c;position: absolute;">
	
					  		<?php 
					  		
					  		$enroll = $viewcls->enrollcart($student_id);
								if (isset($enroll)) { echo $enroll;}
									 
					  		 ?>
					  	</span></p>
					  	</a>
					  </div>
					<?php } ?>

				
					 
						<a href="?logout=action">
					  	<p style="float:right;font-size: 22px; margin-top: 5px;" class="header-buttn header-btn"><i class="fa fa-sign-out" aria-hidden="true"></i></p></a>
					  		<a style="float: right;" class="header-buttn header-btn" href=""> <?php
						
							
						
					 echo $_SESSION['name'];
					

						if (isset($_GET['logout'])=='action') {
							session_destroy();
							echo "<script> window.location = 'login.php';</script>"; }
						

					 ?></a>

				<?php  }else{ ?>
						<a href="login.php" class="site-btn header-btn">Login</a>
					<?php }  ?>

					<nav class="main-menu">
						<ul>
							<li><a href="index.php">Home</a></li>
							<li><a href="#">About us</a></li>
							<li><a href="courses.php">Courses</a></li>
							<?php 
			if (isset($_SESSION['teacher_auth'])=='teacher_auth') {
			 
			 ?>
			 <li><a href="add_course.php">Upload Course</a></li>
			<?php } ?>
							<!-- <li><a href="blog.php">News</a></li> -->
							<li><a href="contact.php">Contact</a></li>
						</ul>
					</nav>
				</div>
			</div>
		</div>
	</header>
	<!-- Header section end -->