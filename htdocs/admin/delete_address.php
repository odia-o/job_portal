<?php
require_once("../../includes/initialize.php");
if(!$session->is_logged_in()) {
    redirect_to("login.php");
}

if(empty($_GET['gg'] && $_GET['tf'])) {
    $session->message("No ID was provided.");
    redirect_to('list_addresses.php');
}

$d = Addresses::find_by_id($_GET['gg']);
$f = Balance::find_by_address_id($_GET['tf']);

if($d->destroy() && $f->destroy()) {
    redirect_to("list_addresses.php?gg=".$_GET['tt']);
}
else {
    $session->message(message("address could not be deleted."));
    redirect_to("list_addresses.php".$_GET['tt']);
}

?>