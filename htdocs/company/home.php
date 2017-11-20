<?php
require_once("../../includes/initialize.php");
if(!$session->is_logged_in()) 
{
    redirect_to("../login_registration.php");
}
 $user = Company::find_by_id($session->id);

if(filter_has_var(INPUT_POST, 'submit')) {

                $user = new Company();
                $user->id = $c->id;
                $user->password = md5("{$_POST['exampleInputPassword1']}");
                $user->first_name = $_POST['exampleInputName'];
                $user->email = $_POST['exampleInputEmail'];
                $user->cp = md5("{$_POST['exampleInputPassword2']}");
                $user->access = 'c';
               
                state = $_POST['state'];
                num = $_POST['exampleInputQuantity'];
                str_name = $_POST['exampleInputProductName'];
                city = $_POST['exampleInputProductId'];
     $user->address = $num.", ".$str_name.", ".$city.", ".$state.".";
$user->phone = $_POST['exampleInputSecurity'];
$user->staff_number = $_POST['exampleInputCsv'];
$user->clients = $_POST['exampleInputExpiration'];
                if($user->save()) {
                    $session->message("customer uploaded successfully.");

                } else {
                    $message = join("<br />", $user->errors);
                }
                        
}

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
        <link href="../assets/plugins/pace-master/themes/blue/pace-theme-flash.css" rel="stylesheet"/>
        <link href="../assets/plugins/uniform/css/uniform.default.min.css" rel="stylesheet"/>
        <link href="../assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="../assets/plugins/fontawesome/css/font-awesome.css" rel="stylesheet" type="text/css"/>
        <link href="../assets/plugins/line-icons/simple-line-icons.css" rel="stylesheet" type="text/css"/>	
        <link href="../assets/plugins/offcanvasmenueffects/css/menu_cornerbox.css" rel="stylesheet" type="text/css"/>	
        <link href="../assets/plugins/waves/waves.min.css" rel="stylesheet" type="text/css"/>	
        <link href="../assets/plugins/switchery/switchery.min.css" rel="stylesheet" type="text/css"/>
        <link href="../assets/plugins/3d-bold-navigation/css/style.css" rel="stylesheet" type="text/css"/>	
        <link href="../assets/plugins/slidepushmenus/css/component.css" rel="stylesheet" type="text/css"/>
         
        <!-- Theme Styles -->
        <link href="../assets/css/modern.min.css" rel="stylesheet" type="text/css"/>
        <link href="../assets/css/themes/green.css" class="theme-color" rel="stylesheet" type="text/css"/>
        <link href="../assets/css/custom.css" rel="stylesheet" type="text/css"/>
        
        <script src="../assets/plugins/3d-bold-navigation/js/modernizr.js"></script>
        <script src="../assets/plugins/offcanvasmenueffects/js/snap.svg-min.js"></script>
        
        
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

     <!--Company section -->
             <div class="page-sidebar sidebar">
                <div class="page-sidebar-inner slimscroll">
                    <div class="sidebar-header">
                        <div class="sidebar-profile">
                            <a href="javascript:void(0);" id="profile-menu-link">
                                <div class="sidebar-profile-image">
                                    <img src="../assets/images/profile-menu-image.png" class="img-circle img-responsive" alt="">
                                </div>
                                <div class="sidebar-profile-details">
                                    <span><?php echo $user->name; ?><br><small><?php echo $user->email; ?></small></span>
                                </div>
                            </a>
                        </div>
                    </div>
                    <ul class="menu accordion-menu" role="tablist">
                                                <li role="presentation" class="active"><a href="#tab9" class="waves-effect waves-button" role="tab" data-toggle="tab"><span class="menu-icon glyphicon glyphicon-home"></span><p>Dashboard</p></a></li>
                                                <li role="presentation"><a href="#tab10" class="waves-effect waves-button" role="tab" data-toggle="tab"><span class="menu-icon glyphicon glyphicon-user"></span><p>Profile</p></a></li>
                                                <li role="presentation"><a href="#tab11" class="waves-effect waves-button" role="tab" data-toggle="tab"><span class="menu-icon glyphicon glyphicon-edit"></span><p>Add New Job</p></a></li>
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
                                <div class="panel-body">
                                   <div class="table-responsive">
                                    <table id="example" class="display table" style="width: 100%; cellspacing: 0;">
                                        <thead>
                                            <tr>
                                                <th>Job Title</th>
                                                <th>Description</th>
                                                <th>No. Applicants</th>
                                                <th>&nbsp;</th>
                                                <th>&nbsp;</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Job Title</th>
                                                <th>Description</th>
                                                <th>No. Applicants</th>
                                                <th>&nbsp;</th>
                                                <th>&nbsp;</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <?php 
                                               $all_js = Jobs::find_by_job_id($user->id);

                                                foreach($all_js as $js) {  
                                                    $k = Apply::find_by_users_id($js->id);
                                                    echo "<tr><td>". $js->title. "</td>";
                                                    echo "<td>". $js->description. "</td>";
                                                    echo "<td><a href='list_applicants.php?jj={$js->id}'>". count($k). "</a></td>";
                                                    echo "<td><a type='button' class='btn btn-success' href='edit.php?gg={$js->id}'>Update</a></td>";
                                                    echo "<td><a type='button' class='btn btn-danger' href='delete_job.php?gg={$js->id}'>Delete Job</a></td></tr>";
                                                    
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
					<label for="username2">Name:
						<i class="ln ln-icon-Male"></i>
						<input type="text" class="input-text" name="name" id="username2" value="<?php echo $user->name ?>" />
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
                    <p class="form-row form-row-wide">
					<label for="password2">Postal Code:
						<i class="ln ln-icon-Lock-2"></i>
						<input class="input-text" type="number" name="post" id="password2" value="<?php echo $user->postal_code ?>"/>
					</label>
				</p>
                <p class="form-row form-row-wide">
					<label for="password2">Biography:
						<i class="ln ln-icon-Lock-2"></i>
                        <textarea class="input-text" type="text" name="bio" id="password2" value="<?php echo $user->biography ?>"></textarea>
					</label>
				</p>
                <p class="form-row form-row-wide">
					<label for="password2">Address:
						<i class="ln ln-icon-Lock-2"></i>
                        <textarea class="input-text" type="number" name="add" id="password2" value="<?php echo $user->address ?>"></textarea>
					</label>
				</p>
           <?php $s = array("All", "Government", "Civil servants","Youth","children","Adult","jounalists","Computer geeks");?>
            <div class="form-control col-md-12">
                <label for="state">Type Of Clients: </label><select name="exampleInputExpiration">
               <option value="">Select group</option>
                <?php foreach($s as $b) {?>
                        <option value="<?php echo $b ?>" <?php if(isset($_POST['exampleInputExpiration']) && $_POST['exampleInputExpiration'] == $b){echo 'selected="selected"';} ?>><?php echo $b ?></option>

            <?php } ?>
                    </select>
            </div>
                    
				<p class="form-row">
					<input type="submit" class="button border fw margin-top-10" name="submit2" value="Update" />
				</p>

				</form>
                                                    </div>
                                                </div>
                                                <div role="tabpanel" class="tab-pane fade" id="tab11">
                                                    <form method="post">
        <main class="page-content">
            <div class="page-inner">
                <div id="main-wrapper">
                    <div class="row">
                        <div class="col-md-3 center">
                            <div class="login-box">
                                <P class="logo-name text-lg text-center">ADD NEW JOB OPENING</P>
                               
                               
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Job Title" name="jt" value="<?php if(isset($_POST['jt'])){echo $_POST['jt'];} ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <textarea type="text" class="form-control" placeholder="Description" name="desc" value="<?php if(isset($_POST['desc'])){echo $_POST['desc'];} ?>" required></textarea>
                                    </div>
                                                            <?php $s = array("Accounting / Finance", "Automotive Jobs", "Construction / Facilities","Education Training","Healthcare","Restaurant / Food Service","Transportation / Logistics","Telecommunications");?>
                                                            <div class="form-control">
                                                                <label for="state">Category: </label><select name="cat">
                                                               <option value="">Select Category</option>
                                                                <?php foreach($s as $b) {?>
                                                                        <option value="<?php echo $b ?>" <?php if(isset($_POST['cat']) && $_POST['cat'] == $b){echo 'selected="selected"';} ?>><?php echo $b ?></option>

                                                            <?php } ?>
                                                                    </select>
                                                            </div>
                                    <div class="form-group">
                                        <input type="text" name="ed" class="form-control date-picker" placeholder="End Date" required>
                                    </div>
                                    
                               
                                    <button type="submit" name="submit" class="btn btn-success btn-block m-t-xs">Submit</button>
                         
                            </div>
                        </div>
                    </div><!-- Row -->
                </div><!-- Main Wrapper -->
            </div><!-- Page Inner -->
        </main><!-- Page Content -->
        </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> 
                                
                  </div>
            </div>
            
            

                                          
                                
            <!-- end company section -->
       
     </main>
            <div class="cd-overlay"></div>
            
       <script src="../assets/plugins/jquery/jquery-2.1.4.min.js"></script>
        <script src="../assets/plugins/jquery-ui/jquery-ui.min.js"></script>
        <script src="../assets/plugins/pace-master/pace.min.js"></script>
        <script src="../assets/plugins/jquery-blockui/jquery.blockui.js"></script>
        <script src="../assets/plugins/bootstrap/js/bootstrap.min.js"></script>
        <script src="../assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js"></script>
        <script src="../assets/plugins/switchery/switchery.min.js"></script>
        <script src="../assets/plugins/uniform/jquery.uniform.min.js"></script>
        <script src="../assets/plugins/offcanvasmenueffects/js/classie.js"></script>
        <script src="../assets/plugins/offcanvasmenueffects/js/main.js"></script>
        <script src="../assets/plugins/waves/waves.min.js"></script>
        <script src="../assets/plugins/3d-bold-navigation/js/main.js"></script>
        <script src="../assets/plugins/waypoints/jquery.waypoints.min.js"></script>
        <script src="../assets/plugins/jquery-counterup/jquery.counterup.min.js"></script>
        <script src="../assets/plugins/toastr/toastr.min.js"></script>
        <script src="../assets/plugins/flot/jquery.flot.min.js"></script>
        <script src="../assets/plugins/flot/jquery.flot.time.min.js"></script>
        <script src="../assets/plugins/flot/jquery.flot.symbol.min.js"></script>
        <script src="../assets/plugins/flot/jquery.flot.resize.min.js"></script>
        <script src="../assets/plugins/flot/jquery.flot.tooltip.min.js"></script>
        <script src="../assets/plugins/curvedlines/curvedLines.js"></script>
        <script src="../assets/plugins/metrojs/MetroJs.min.js"></script>
        <script src="../assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
        <script src="../assets/js/modern.min.js"></script>
        <script src="../assets/js/pages/dashboard.js"></script>
    </body>
</html>