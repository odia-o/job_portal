<?php
require_once("../../includes/initialize.php");
if(!$session->is_logged_in()) {
    redirect_to("login.php");
}
$f = new Apply();
$f->user_id = $_GET['jj'];
$f->job_id = $_GET['dd'];
if($f->save){
    redirect_to("home.php?suc=t");
}
?>