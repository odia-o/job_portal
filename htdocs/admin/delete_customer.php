<?php
require_once("../../includes/initialize.php");
if(!$session->is_logged_in()) {
    redirect_to("login.php");
}

if(empty($_GET['gg']) {
    $session->message("No ID was provided.");
    redirect_to('login.php');
}

$d = User::find_by_id($_GET['gg']);


if($d->destroy()) {
    redirect_to("login.php");
}
else {
    $session->message(message("customer could not be deleted."));
    redirect_to("login.php");
}

?>