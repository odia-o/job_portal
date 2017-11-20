<?php
require_once("../includes/initialize.php");

?>
<!DOCTYPE html>
<html lang="en"> 
<head>
<meta charset="utf-8">
<title>Job Link</title>

<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/colors/green.css" id="colors">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/colors/green.css" id="colors">
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600' rel='stylesheet' type='text/css'>
        <link href="assets/plugins/pace-master/themes/blue/pace-theme-flash.css" rel="stylesheet"/>
        <link href="assets/plugins/uniform/css/uniform.default.min.css" rel="stylesheet"/>
        <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/plugins/fontawesome/css/font-awesome.css" rel="stylesheet" type="text/css"/>
        <link href="assets/plugins/line-icons/simple-line-icons.css" rel="stylesheet" type="text/css"/>	
        <link href="assets/plugins/offcanvasmenueffects/css/menu_cornerbox.css" rel="stylesheet" type="text/css"/>	
        <link href="assets/plugins/waves/waves.min.css" rel="stylesheet" type="text/css"/>	
        <link href="assets/plugins/switchery/switchery.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/plugins/3d-bold-navigation/css/style.css" rel="stylesheet" type="text/css"/>	
        <link href="assets/plugins/slidepushmenus/css/component.css" rel="stylesheet" type="text/css"/>
        <link href="assets/plugins/bootstrap-datepicker/css/datepicker3.css" rel="stylesheet" type="text/css"/>
        
        <!-- Theme Styles -->
        <link href="assets/css/modern.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/themes/green.css" class="theme-color" rel="stylesheet" type="text/css"/>
        <link href="assets/css/custom.css" rel="stylesheet" type="text/css"/>
        
        <script src="assets/plugins/3d-bold-navigation/js/modernizr.js"></script>
        <script src="assets/plugins/offcanvasmenueffects/js/snap.svg-min.js"></script>
</head>

<body>
<div id="wrapper">

<header class="transparent sticky-header full-width">
<div class="container">
	<div class="sixteen columns">
		<div id="logo">
			<h1><a href="index.php"><img src="images/logggz.jpg" alt="Joblink" /></a></h1>
		</div>


		<nav id="navigation" class="menu">
			<ul id="responsive">

				<li><a href="index.html" id="current">Home</a>
			
				</li>

				

				<li><a href="login_registration.php">Candidates</a>
										
				</li>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp

				<li><a href="login_registration.php"> Employers</a>
					
				</li>
				<li><a href="login_registration.php"> Admin</a></li>

				
			</ul>


			

		</nav>

		<!-- Navigation -->
		<div id="mobile-navigation">
			<a href="#menu" class="menu-trigger"><i class="fa fa-reorder"></i> Menu</a>
		</div>

	</div>
</div>
</header>
<div class="clearfix"></div>



<div id="banner" class="with-transparent-header parallax background" style="background-image: url(images/banner-home-02.jpg)" data-img-width="2000" data-img-height="1330" data-diff="300">
    
	<div class="container">
		<div class="sixteen columns">
            
			<form method="post" action="">
            
            
			<div class="search-container">

				<!-- Form -->
				<h2>Find job</h2>
				<input name="val1" type="text" class="ico-01" placeholder="job title, keywords or company name" value=""/>
				<input  name="val2" type="text" class="ico-02" placeholder="city, province or region" value=""/>
				<button name="submit"><i>Search</i></button>

				<!-- Browse Jobs -->
				<div class="browse-jobs">
					Browse job offers by <a href="#"> category</a> or <a href="#">location</a>
				</div>
				
				<!-- Announce -->
				<div class="announce">
					We’ve over <strong>1 00</strong> job offers for you!
				</div>

			</div>
</form>
            <?php
            if(filter_has_var(INPUT_POST, 'submit')) {
                echo "<div class='row'>
                        <div class='col-md-12'>
                            <div class='panel panel-white'>
                                <div class='panel-heading clearfix'>
                                    <h4 class='panel-title'>All Jobs</h4>
                                </div>
                                <h2>Find job</h2>
                                <div class='panel-body'>
                                   <div class='table-responsive'>
                                    <table id='example' class='display table' style='width: 100%; cellspacing: 0;'>
                                        <thead>
                                            <tr>
                                                <th>Job Title</th>
                                                <th>Description</th>
                                                <th>Company</th>
                                                <th>&nbsp;</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Job Title</th>
                                                <th>Description</th>
                                                <th>Company</th>
                                                <th>&nbsp;</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>";
                                             if(!empty($_POST['val1'])){
        $fs = Jobs::find_all_gg($_POST['val1']);
        foreach($fs as $f){
            $d = Company::find_by_id($f->company_id);
            echo "<tr><td>". $f->title. "</td>";
                                                    echo "<td>". $f->description. "</td>";
                                                    echo "<td>". $d->name. "</td>";
                                                    echo "<td><a href='login_registration.php' class='btn btn-success'>Apply</a></td>";
                                                    echo "</tr>";
        }
    }
    if(!empty($_POST['val2'])){
        $ts = Company::find_all_tt($_POST['val2']);
        foreach($ts as $t){
            $ffs = Jobs::find_all_comp($t->id);
            foreach($ffs as $ff){
                echo "<tr><td>". $ff->title. "</td>";
                                                    echo "<td>". $ff->description. "</td>";
                                                    echo "<td>". $t->name. "</td>";
                                                    echo "<td><a href='login_registration.php' class='btn btn-success'>Apply</a></td>";
                                                    echo "</tr>";
            }
            
        }
    }
}
            echo "
                                        </tbody>
                                       </table>  
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>"
   
            ?>
             
		</div>
	</div>
</div>




<div class="container">
	<div class="sixteen columns">
		<h3 class="margin-bottom-25">Popular Categories</h3>
		<ul id="popular-categories">
			<li><a href="#"><i class="ln  ln-icon-Bar-Chart"></i> Accounting / Finance</a></li>
			<li><a href="#"><i class="ln ln-icon-Car"></i> Automotive Jobs</a></li>
			<li><a href="#"><i class="ln ln-icon-Worker"></i> Construction / Facilities</a></li>
			<li><a href="#"><i class="ln ln-icon-Student-Female"></i> Education Training</a></li>
			<li><a href="#"><i class="ln  ln-icon-Medical-Sign"></i> Healthcare</a></li>
			<li><a href="#"><i class="ln  ln-icon-Plates"></i> Restaurant / Food Service</a></li>
			<li><a href="#"><i class="ln  ln-icon-Globe"></i> Transportation / Logistics</a></li>
			<li><a href="#"><i class="ln  ln-icon-Laptop-3"></i> Telecommunications</a></li>
		</ul>

		<div class="clearfix"></div>
		<div class="margin-top-30"></div>

		<a href="#" class="button centered">Browse All Categories</a>
		<div class="margin-bottom-50"></div>
	</div>
</div>






<div id="testimonials">

	<div class="container">
		<div class="sixteen columns">
			<div class="testimonials-slider">
				  <ul class="slides">
				    <li>
				      <p>I have already heard back about the internship I applied through Job Finder, that's the fastest job reply I've ever gotten and it's so much better than waiting weeks to hear back.
				      <span>Collis Ta’eed, Envato</span></p>
				    </li>

				    <li>
				       <p>I have already heard back about the internship I applied through Job Finder, that's the fastest job reply I've ever gotten and it's so much better than waiting weeks to hear back.
				      <span>Collis Ta’eed, Envato</span></p>
				    </li>
				    
				    <li>
				       <p>I have already heard back about the internship I applied through Job Finder, that's the fastest job reply I've ever gotten and it's so much better than waiting weeks to hear back.
				      <span>Collis Ta’eed, Envato</span></p>				    </li>

				  </ul>
			</div>
		</div>
	</div>
</div>






<div class="margin-top-15"></div>

<div id="footer">

	<div class="container">

		<div class="seven columns">
			<h4>About</h4>
			<p>Joblink is a job portal application used by individuals in seeking for job!</p>
			<a href="#" class="button">Get Started</a>
		</div>

		<div class="three columns">
			<h4>Company</h4>
			<ul >
				<li><a href="#">About Us</a></li>
				<li><a href="#">Careers</a></li>
		
				<li><a href="#">Terms of Service</a></li>
				
		</div>
		
		
		

	</div>

	<!-- Bottom -->
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
				<div class="copyrights">©  Copyright 2016 by JobLink</a>. All Rights Reserved.</div>
			</div>
		</div>
	</div>

</div>



</div>
<!-- Wrapper / End -->

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

<div id="style-switcher">
	<h2>Style Switcher <a href="#"></a></h2>
	
	<div>
		<h3>Predefined Colors</h3>
		<ul class="colors" id="color1">
			<li><a href="#" class="green" title="Green"></a></li>
			<li><a href="#" class="blue" title="Blue"></a></li>
			<li><a href="#" class="orange" title="Orange"></a></li>
			<li><a href="#" class="navy" title="Navy"></a></li>
			<li><a href="#" class="yellow" title="Yellow"></a></li>
			<li><a href="#" class="peach" title="Peach"></a></li>
			<li><a href="#" class="beige" title="Beige"></a></li>
			<li><a href="#" class="purple" title="Purple"></a></li>
			<li><a href="#" class="celadon" title="Celadon"></a></li>
			<li><a href="#" class="pink" title="Pink"></a></li>
			<li><a href="#" class="red" title="Red"></a></li>
			<li><a href="#" class="brown" title="Brown"></a></li>
			<li><a href="#" class="cherry" title="Cherry"></a></li>
			<li><a href="#" class="cyan" title="Cyan"></a></li>
			<li><a href="#" class="gray" title="Gray"></a></li>
			<li><a href="#" class="olive" title="Olive"></a></li>
		</ul>
		
		<h3>Layout Style</h3>
		<div class="layout-style">
			<select id="layout-style"> 
				<option value="2">Wide</option>
				<option value="1">Boxed</option>
			</select>
		</div>
			
		<h3>Header Style</h3>
		<div class="layout-style">
			<select id="header-style"> 
				<option value="1">Style 1</option>
				<option value="2">Style 2</option>
				<option value="3">Style 3</option>
			</select>
		</div>
	
		<h3>Background Image</h3>
		<ul class="colors bg" id="bg">
			<li><a href="#" class="bg1"></a></li>
			<li><a href="#" class="bg2"></a></li>
			<li><a href="#" class="bg3"></a></li>
			<li><a href="#" class="bg4"></a></li>
			<li><a href="#" class="bg5"></a></li>
			<li><a href="#" class="bg6"></a></li>
			<li><a href="#" class="bg7"></a></li>
			<li><a href="#" class="bg8"></a></li>
			<li><a href="#" class="bg9"></a></li>
			<li><a href="#" class="bg10"></a></li>
			<li><a href="#" class="bg11"></a></li>
			<li><a href="#" class="bg12"></a></li>
			<li><a href="#" class="bg13"></a></li>
			<li><a href="#" class="bg14"></a></li>
			<li><a href="#" class="bg15"></a></li>
			<li><a href="#" class="bg16"></a></li>
		</ul>
		
		<h3>Background Color</h3>
		<ul class="colors bgsolid" id="bgsolid">
			<li><a href="#" class="green-bg" title="Green"></a></li>
			<li><a href="#" class="blue-bg" title="Blue"></a></li>
			<li><a href="#" class="orange-bg" title="Orange"></a></li>
			<li><a href="#" class="navy-bg" title="Navy"></a></li>
			<li><a href="#" class="yellow-bg" title="Yellow"></a></li>
			<li><a href="#" class="peach-bg" title="Peach"></a></li>
			<li><a href="#" class="beige-bg" title="Beige"></a></li>
			<li><a href="#" class="purple-bg" title="Purple"></a></li>
			<li><a href="#" class="red-bg" title="Red"></a></li>
			<li><a href="#" class="pink-bg" title="Pink"></a></li>
			<li><a href="#" class="celadon-bg" title="Celadon"></a></li>
			<li><a href="#" class="brown-bg" title="Brown"></a></li>
			<li><a href="#" class="cherry-bg" title="Cherry"></a></li>
			<li><a href="#" class="cyan-bg" title="Cyan"></a></li>
			<li><a href="#" class="gray-bg" title="Gray"></a></li>
			<li><a href="#" class="olive-bg" title="Olive"></a></li>
		</ul>
	</div>
	
	<div id="reset"><a href="#" class="button color">Reset</a></div>
		
</div>
<script src="assets/plugins/jquery/jquery-2.1.4.min.js"></script>
        <script src="assets/plugins/jquery-ui/jquery-ui.min.js"></script>
        <script src="assets/plugins/pace-master/pace.min.js"></script>
        <script src="assets/plugins/jquery-blockui/jquery.blockui.js"></script>
        <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js"></script>
        <script src="assets/plugins/switchery/switchery.min.js"></script>
        <script src="assets/plugins/uniform/jquery.uniform.min.js"></script>
        <script src="assets/plugins/offcanvasmenueffects/js/classie.js"></script>
        <script src="assets/plugins/offcanvasmenueffects/js/main.js"></script>
        <script src="assets/plugins/waves/waves.min.js"></script>
        <script src="assets/plugins/3d-bold-navigation/js/main.js"></script>
        <script src="assets/plugins/twitter-bootstrap-wizard/jquery.bootstrap.wizard.min.js"></script>
        <script src="assets/plugins/jquery-validation/jquery.validate.min.js"></script>
        <script src="assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
        <script src="assets/js/modern.min.js"></script>
        <script src="assets/js/pages/form-wizard.js"></script>
    
    <script src="assets/plugins/jquery/jquery-2.1.4.min.js"></script>
        <script src="assets/plugins/jquery-ui/jquery-ui.min.js"></script>
        <script src="assets/plugins/pace-master/pace.min.js"></script>
        <script src="assets/plugins/jquery-blockui/jquery.blockui.js"></script>
        <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js"></script>
        <script src="assets/plugins/switchery/switchery.min.js"></script>
        <script src="assets/plugins/uniform/jquery.uniform.min.js"></script>
        <script src="assets/plugins/offcanvasmenueffects/js/classie.js"></script>
        <script src="assets/plugins/offcanvasmenueffects/js/main.js"></script>
        <script src="assets/plugins/waves/waves.min.js"></script>
        <script src="assets/plugins/3d-bold-navigation/js/main.js"></script>
        <script src="assets/plugins/jquery-mockjax-master/jquery.mockjax.js"></script>
        <script src="assets/plugins/moment/moment.js"></script>
        <script src="assets/plugins/datatables/js/jquery.datatables.min.js"></script>
        <script src="assets/plugins/x-editable/bootstrap3-editable/js/bootstrap-editable.js"></script>
        <script src="assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
        <script src="assets/js/modern.min.js"></script>
        <script src="assets/js/pages/table-data.js"></script>

</body>
</html>