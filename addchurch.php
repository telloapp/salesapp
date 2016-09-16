<?php
require 'core/init.php';
$general->logged_out_protect();
$id   = htmlentities($user['id']); // storing the user's username after clearning for any html tags.

if (isset($_POST['submit'])) {
	$name 			= htmlentities($_POST['name']);  
	$website 		= htmlentities($_POST['website']);  
	$email 			= htmlentities($_POST['email']);  
	$text 			= htmlentities($_POST['text']);  
	$addr1 			= htmlentities($_POST['addr1']);  
	$addr2 			= htmlentities($_POST['addr2']);  
	$addr3 			= htmlentities($_POST['addr3']);  
	$addr4 			= htmlentities($_POST['addr4']);  
	$cell1 			= htmlentities($_POST['cell1']);  
	$cell2 			= htmlentities($_POST['cell2']);  
	$pastor 		= htmlentities($_POST['pastor']);  
	$pastor_site 	= htmlentities($_POST['pastor_site']);  
	$music_vid 		= htmlentities($_POST['music_vid']);  
	$preach_vid 	= htmlentities($_POST['preach_vid']);  
	$time 			= date('Y-m-d');  

	$addchurch = $church->insert_church($website, $name, $text, $email, $addr1, $addr2, $addr3, $addr4, $cell1, $cell2, $pastor, $pastor_site, $time, $id);
	header('Location:home.php');
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Add Church</title>
</head>
<body>
<h1>Add My Church</h1>

<form method="post" action="">
<label>Church Name</label>
<input type="text" name="name" />
<br>
<label>Church Website</label>
<input type="text" name="website" />
<br>
<label>Description</label>
<input type="text" name="text" placeholder="Short description of your church, please include service times and church ministries" />
<br>
<label>Address</label>
<input type="text" name="addr1" placeholder="Street" />
<input type="text" name="addr2" placeholder="Suburb" />
<input type="text" name="addr3" placeholder="City" />
<input type="text" name="addr4" placeholder="Province" />
<br>
<label>Contact Numbers</label>
<input type="text" name="cell1" />
<input type="text" name="cell2" />
<br>
<label>Email</label>
<input type="text" name="email" />
<br>
<label>Pastor</label>
<input type="text" name="pastor" />
<br>
<label>Pastor's Website</label>
<input type="text" name="pastor_site" />
<br>
<label>How we worship</label>
<input type="text" name="music_vid" placeholder="youtube video link" />
<br>
<label>How we preach</label>
<input type="text" name="preach_vid" placeholder="youtube video link" />
<br>
<input type="submit" value="Save" name="submit" />
</form>

</body>
</html>