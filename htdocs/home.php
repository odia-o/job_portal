<?php
require_once("../includes/initialize.php");
if(!$session->is_logged_in()) 
{
    redirect_to("login.php");
}
?>
    <?php
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
    $user = User::find_by_id($session->id);
    ?>

<!DOCTYPE html>
<html>
    <head>
        
        <!-- Title -->
        <title>JOB LINK | Dashboard</title>
        
        <meta content="width=device-width, initial-scale=1" name="viewport"/>
        <meta charset="UTF-8">
 
        
        <!-- Styles -->
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
         
        <!-- Theme Styles -->
        <link href="assets/css/modern.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/themes/green.css" class="theme-color" rel="stylesheet" type="text/css"/>
        <link href="assets/css/custom.css" rel="stylesheet" type="text/css"/>
        
        <script src="assets/plugins/3d-bold-navigation/js/modernizr.js"></script>
        <script src="assets/plugins/offcanvasmenueffects/js/snap.svg-min.js"></script>
        
        
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        
    </head>
    <body class="page-header-fixed">
    <form action="" method="post">

        <div class="overlay"></div>
         
        <div class="menu-wrap">
            <nav class="profile-menu">
                <div class="profile"><img src="../assets/images/pic.jpg" width="60" alt="#"/></div>
                <div class="profile-menu-list">
                    <a href="#"><i class="fa fa-star"></i><span>Favorites</span></a>
                    <a href="#"><i class="fa fa-bell"></i><span>Alerts</span></a>
                    <a href="#"><i class="fa fa-envelope"></i><span>Messages</span></a>
                    <a href="#"><i class="fa fa-comment"></i><span>Comments</span></a>
                </div>
            </nav>
            <button class="close-button" id="close-button">Close Menu</button>
        </div>
        
        <main class="page-content content-wrap">
            <div class="navbar">
                <div class="navbar-inner">
                    <div class="sidebar-pusher">
                        <a href="javascript:void(0);" class="waves-effect waves-button waves-classic push-sidebar">
                            <i class="fa fa-bars"></i>
                        </a>
                    </div>
                    <div class="logo-box">
                        <a href="home.php.php" class="logo-text"><span>JOB LINK</span></a>
                    </div><!-- Logo Box -->
                    <div class="search-button">
                        <a href="javascript:void(0);" class="waves-effect waves-button waves-classic show-search"><i class="fa fa-search"></i></a>
                    </div>
                    
      
                    <div class="topmenu-outer">
    
                        <div class="top-menu">
 
                            <ul class="nav navbar-nav navbar-left">
                                <li><a href="logout.php">logout</a></li>
	                               <li><a href="home.php">Home</a></li>
                                <li><a href="contact_us.php">Contact Us</a></li>
                                <li>		
                                    <a href="javascript:void(0);" class="waves-effect waves-button waves-classic toggle-fullscreen"><i class="fa fa-expand"></i></a>
                                </li>
                               
                            </ul>
                            <ul class="nav navbar-nav navbar-right">
                                <li>	
                                    <a href="javascript:void(0);" class="waves-effect waves-button waves-classic show-search"><i class="fa fa-search"></i></a>
                                </li>
                            
                               
                               
                               
                                <li>
                                    <a href="javascript:void(0);" class="waves-effect waves-button waves-classic" id="showRight">
                                        <i class="fa fa-comments"></i>
                                    </a>
                                </li>
                            </ul><!-- Nav -->
                        </div><!-- Top Menu -->
                    </div>
                </div>
            </div><!-- Navbar -->


      <!--user section-->
         <div class="page-sidebar sidebar">
                <div class="page-sidebar-inner slimscroll">
                    <div class="sidebar-header">
                        <div class="sidebar-profile">
                            <a href="javascript:void(0);" id="profile-menu-link">
                                <div class="sidebar-profile-image">
                                    <img src="assets/images/profile-menu-image.png" class="img-circle img-responsive" alt="">
                                </div>
                                <div class="sidebar-profile-details">
                                    <span><?php echo $user->lastname." ".$user->firstname; ?><br><small><?php echo $user->email; ?></small></span>
                                </div>
                            </a>
                        </div>
                    </div>
                     <ul class="menu accordion-menu" role="tablist">
                                                <li role="presentation" class="active"><a href="#tab9" class="waves-effect waves-button" role="tab" data-toggle="tab"><span class="menu-icon glyphicon glyphicon-home"></span><p>Dashboard</p></a></li>
                                                <li role="presentation"><a href="#tab10" class="waves-effect waves-button" role="tab" data-toggle="tab"><span class="menu-icon glyphicon glyphicon-user"></span><p>Profile</p></a></li>
                                                
                                            </ul>
                </div><!-- Page Sidebar Inner -->
            </div><!-- Page Sidebar -->
              <div class="page-inner">
                <div class="page-title">
                    <h3>Dashboard</h3>
                    <div class="page-breadcrumb">
                        <ol class="breadcrumb">
                            <li><a href="index.html">Home</a></li>
                            <li class="active">Dashboard</li>
                        </ol>
                    </div>
                </div>
                <div id="main-wrapper">
                       <div class="panel panel-white">
                                    <div class="panel-body">
                                        <div class="tabs-left" role="tabpanel">
                                            <!-- Nav tabs -->
                                            
                                            <!-- Tab panes -->
                                            <div class="tab-content">
                                                <div role="tabpanel" class="tab-pane active fade in" id="tab9">
                                                           <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-white">
                                <div class="panel-heading clearfix">
                                    <h4 class="panel-title">All Jobs</h4>
                                </div>
                                <h2>Find job</h2>
                                <div class="panel-body">
                                   <div class="table-responsive">
                                    <table id="example" class="display table" style="width: 100%; cellspacing: 0;">
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
                                        <tbody>
                                             <?php 
                                               $all_js = Jobs::find_all();
//    var_dump($all_cs);
//    exit();
                                                foreach($all_js as $js) {
                                                    $cs = Company::find_by_id($js->company_id);
                                                    
                                                    echo "<tr><td>". $js->title. "</td>";
                                                    echo "<td>". $js->description. "</td>";
                                                    echo "<td>". $cs->name. "</td>";
                                                    echo "<td><a href='application.php?dd={$js->id}&jj={$user->id}' class='btn btn-success'>Apply</a></td>";
                                                    echo "</tr>";
                                                    
                                                }
                                            ?>
                                        </tbody>
                                       </table>  
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- Row -->
                                                </div>
                                                <div role="tabpanel" class="tab-pane fade" id="tab10">
                                                    <div class="row">
                                                       <form method="post" class="register">
                    <p class="form-row form-row-wide">
					<label for="username2">FirstName:
						<i class="ln ln-icon-Male"></i>
						<input type="text" class="input-text" name="firstname" id="username2" value="<?php echo $user->firstname ?>" />
					</label>
				</p>
                    <p class="form-row form-row-wide">
					<label for="username2">Lastname:
						<i class="ln ln-icon-Male"></i>
						<input type="text" class="input-text" name="lastname" id="username2" value="<?php echo $user->lastname ?>" />
					</label>
				</p>
					
				<p class="form-row form-row-wide">
					<label for="username2">Username:
						<i class="ln ln-icon-Male"></i>
						<input type="text" class="input-text" name="username" id="username2" value="<?php echo $user->username ?>" />
					</label>
				</p>
					
				<p class="form-row form-row-wide">
					<label for="email2">Email Address:
						<i class="ln ln-icon-Mail"></i>
						<input type="text" class="input-text" name="email" id="email2" value="<?php echo $user->email ?>" />
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
						<input class="input-text" type="number" name="phone" id="password2" value="<?php echo $user->phone ?>"/>
					</label>
				</p>
                    <p>M<input type="radio" name="gender" value='M'/></p>
        <p>F<input type="radio" name="gender" value='F'/></p>
                <p class="form-row">
                    <input type="file" name="cv" placeholder="Browse" /><button type="submit" name="">Upload CV</button>
            </p>
				<p class="form-row">
					<input type="submit" class="button border fw margin-top-10" name="submit2" value="Update" />
				</p>

				</form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> 
                                
                  </div>
            </div>
       
      <!--end user section-->
     <?php

    ?>
             
     </main>
            <div class="cd-overlay"></div>
            
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
        <script src="assets/plugins/waypoints/jquery.waypoints.min.js"></script>
        <script src="assets/plugins/jquery-counterup/jquery.counterup.min.js"></script>
        <script src="assets/plugins/toastr/toastr.min.js"></script>
        <script src="assets/plugins/flot/jquery.flot.min.js"></script>
        <script src="assets/plugins/flot/jquery.flot.time.min.js"></script>
        <script src="assets/plugins/flot/jquery.flot.symbol.min.js"></script>
        <script src="assets/plugins/flot/jquery.flot.resize.min.js"></script>
        <script src="assets/plugins/flot/jquery.flot.tooltip.min.js"></script>
        <script src="assets/plugins/curvedlines/curvedLines.js"></script>
        <script src="assets/plugins/metrojs/MetroJs.min.js"></script>
        <script src="assets/js/modern.min.js"></script>
        <script src="assets/js/pages/dashboard.js"></script>
    </body>
</html>