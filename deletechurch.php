<?php
require 'core/init.php';
$general->logged_out_protect();

// get id from the url
$id = $_GET['church_id'];

if (isset($_POST['deletechurch'])) { 

	$church->delete_church($id);
	header('Location:home.php');
}

?>