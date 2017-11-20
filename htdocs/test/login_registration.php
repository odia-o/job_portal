<?php
require_once("../../includes/initialize.php");
if(filter_has_var(INPUT_POST, 'submit2')) {

                $user = new User();
                $user->password = md5("{$_POST['password1']}");
                $user->firstname = $_POST['firstname'];
                $user->lastname = $_POST['lastname'];
                $user->email = $_POST['email'];
                $user->cp = md5("{$_POST['password2']}");
                $user->username = $_POST['username'];
                $user->gender = $_POST['gender'];
                $user->phone = $_POST['phone'];
    $user->access = "b";

                if($user->save()) {
                    $session->message("registration successful.");

                } else {
                    $message = join("<br />", $user->errors);
                }
                        
}
if(filter_has_var(INPUT_POST, 'submit3')) {

                $company = new Company();
                $company->name = $_POST['name'];
                $company->email = $_POST['email'];

                if($company->save()) {
                    $session->message("registration successful.");

                } else {
                    $message = join("<br />", $company->errors);
                }
                        
}

if (isset($_POST['submit1'])) {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']); 
    
    $found_user1 = User::authenticate($username, $password);
    $found_user2 = Company::authenticate($username, $password);
    if($found_user1){
        
            $session->login($found_user1);
            redirect_to("home.php");
    }
    else if($found_user2){
         $session->login($found_user2);
            redirect_to("home.php");
    }
    else {
        $message = "password incorrect.";
    }
}
else {
    $email = "";
    $password = "";
}
?>

<!DOCTYPE html>
<html lang="en"> 
<head>


<meta charset="utf-8">
<title>Job Link</title>

<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/colors/green.css" id="colors">
</head>

<body>

      <div id="wrapper">
<header class="sticky-header">
<div class="container">
	<div class="sixteen columns">

	
		<div id="logo">
			<h1><a href="index1.php"><img src="images/logggz.jpg" alt="Joblink" /></a></h1>
		</div>

		
		<nav id="navigation" class="menu">
			<ul id="responsive">

				<li><a href="index1.php" id="current">Home</a>
			
				</li>

				

				<li><a href="#">Candidates</a>
										
				</li>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp

				<li><a href="#"> Employers</a>
					
				</li>
				<li><a href="#"> Admin</a></li>

				
			</ul>


			

		</nav>
		<div id="mobile-navigation">
			<a href="#menu" class="menu-trigger"><i class="fa fa-reorder"></i> Menu</a>
		</div>

	</div>
</div>
</header>
<div class="clearfix"></div>



<div id="titlebar" class="single">
	<div class="container">

		<div >
			<h2>My Account</h2>
			<nav id="breadcrumbs">
				<ul>
					<li>You are here:</li>
					<li><a href="#">Home</a></li>
					<li>My Account</li>
				</ul>
			</nav>
		</div>

	</div>
</div>



<div class="container">

	<div class="my-account">

		<ul class="tabs-nav">
			<li class=""><a href="#tab1">Login</a></li>
			<li><a href="#tab2">Register</a></li>
			<li><a href="#tab3">Register-<small>company</small></a></li>
		</ul>

		<div class="tabs-container">
			<!-- Login -->
			<div class="tab-content" id="tab1" style="display: none;">
				<form method="post" class="login">
<?php $msg = "";if(isset($message)){$msg = $message;}echo output_message($msg); ?>
					<p class="form-row form-row-wide">
						<label for="username">Username:
							<i class="ln ln-icon-Male"></i>
                            
							<input type="text" class="input-text" name="username" id="username" value="<?php if(isset($_POST['username'])){echo $_POST['username'];} ?>" />
						</label>
					</p>

					<p class="form-row form-row-wide">
						<label for="password">Password:
							<i class="ln ln-icon-Lock-2"></i>
							<input class="input-text" type="password" name="password" id="password"/>
						</label>
					</p>

					<p class="form-row">
						<input type="submit" class="button border fw margin-top-10" name="submit1" value="Login" />

						<label for="rememberme" class="rememberme">
						<input name="rememberme" type="checkbox" id="rememberme" value="forever" /> Remember Me</label>
					</p>

					<p class="lost_password">
						<a href="#" >Lost Your Password?</a>
					</p>
					
				</form>
			</div>

			<!-- Register -->
			<div class="tab-content" id="tab2" style="display: none;">

				<form method="post" class="register">
                    <p class="form-row form-row-wide">
					<label for="username2">FirstName:
						<i class="ln ln-icon-Male"></i>
						<input type="text" class="input-text" name="firstname" id="username2" value="" />
					</label>
				</p>
                    <p class="form-row form-row-wide">
					<label for="username2">Lastname:
						<i class="ln ln-icon-Male"></i>
						<input type="text" class="input-text" name="lastname" id="username2" value="" />
					</label>
				</p>
					
				<p class="form-row form-row-wide">
					<label for="username2">Username:
						<i class="ln ln-icon-Male"></i>
						<input type="text" class="input-text" name="username" id="username2" value="" />
					</label>
				</p>
					
				<p class="form-row form-row-wide">
					<label for="email2">Email Address:
						<i class="ln ln-icon-Mail"></i>
						<input type="text" class="input-text" name="email" id="email2" value="" />
					</label>
				</p>

				<p class="form-row form-row-wide">
					<label for="password1">Password:
						<i class="ln ln-icon-Lock-2"></i>
						<input class="input-text" type="password" name="password1" id="password1"/>
					</label>
				</p>

				<p class="form-row form-row-wide">
					<label for="password2">Confirm Password:
						<i class="ln ln-icon-Lock-2"></i>
						<input class="input-text" type="password" name="password2" id="password2"/>
					</label>
				</p>
                    <p class="form-row form-row-wide">
					<label for="password2">Phone Number:
						<i class="ln ln-icon-Lock-2"></i>
						<input class="input-text" type="number" name="phone" id="password2"/>
					</label>
				</p>
                    <p>M<input type="radio" name="gender" value='M'/></p>
        <p>F<input type="radio" name="gender" value='F'/></p>

				<p class="form-row">
					<input type="submit" class="button border fw margin-top-10" name="submit2" value="Register" />
				</p>

				</form>
			</div>
            <div class="tab-content" id="tab3" style="display: none;">
                <form method="post" action="">
                <p class="form-row form-row-wide">
						<label for="password">Name:
							<i class="ln ln-icon-Lock-2"></i>
							<input class="input-text" type="text" name="name" id="password"/>
						</label>
					</p>
                    <p class="form-row form-row-wide">
						<label for="password">Email:
							<i class="ln ln-icon-Lock-2"></i>
							<input class="input-text" type="email" name="email" id="password"/>
						</label>
					</p>
        
        <button type="submit" name="submit3" class="btn btn-success btn-block">Register -<small>company</small></button>
    </form>
                 </div>
            </div>
		</div>
	</div>
</div>




<div class="margin-top-30"></div>

<div id="footer">
	
	<div class="container">

		<div class="seven columns">
			<h4>About</h4>
			<p>Joblink is a job portal application used by individuals in seeking for job!</p>
			<a href="#" class="button">Get Started</a>
		</div>

		<div class="three columns">
			<h4>Company</h4>
			<ul>
				<li><a href="#">About Us</a></li>
				<li><a href="#">Careers</a></li>
				
				<li><a href="#">Terms of Service</a></li>
				
			</ul>
		</div>
		
		

		

	</div>

	
	<div class="container">
		<div class="footer-bottom">
			<div class="sixteen columns">
				<h4>Follow Us</h4>
				<ul class="social-icons">
					<li><a class="facebook" href="#"><i class="icon-facebook"></i></a></li>
					<li><a class="twitter" href="#"><i class="icon-twitter"></i></a></li>
					<li><a class="gplus" href="#"><i class="icon-gplus"></i></a></li>
					<li><a class="linkedin" href="#"><i class="icon-linkedin"></i></a></li>
				</ul>
				<div class="copyrights">©  Copyright 2016 by Joblink. All Rights Reserved.</div>
			</div>
		</div>
	</div>

</div>


<script src="scripts/jquery-2.1.3.min.js"></script>
<script src="scripts/custom.js"></script>
<script src="scripts/jquery.superfish.js"></script>
<script src="scripts/jquery.themepunch.tools.min.js"></script>
<script src="scripts/jquery.themepunch.revolution.min.js"></script>
<script src="scripts/jquery.themepunch.showbizpro.min.js"></script>
<script src="scripts/jquery.flexslider-min.js"></script>
<script src="scripts/chosen.jquery.min.js"></script>
<script src="scripts/jquery.magnific-popup.min.js"></script>
<script src="scripts/waypoints.min.js"></script>
<script src="scripts/jquery.counterup.min.js"></script>
<script src="scripts/jquery.jpanelmenu.js"></script>
<script src="scripts/stacktable.js"></script>
<script src="scripts/headroom.min.js"></script>
<script src="scripts/switcher.js"></script>

</body>
</html>