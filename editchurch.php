<?php
require 'core/init.php';
$general->logged_out_protect();


// Get  id from the url 
$id = $_GET['church_id'];

// Get all data from the db for this user
// assign variable $churchdata to the object
$churchdata = $church->churchdata($id);

// Post the edited data
if (isset($_POST['edit_church'])) {
	$website 		= htmlentities($_POST['website']);  
	$name 			= htmlentities($_POST['name']);  
	$text 			= htmlentities($_POST['text']); 	
	$email 			= htmlentities($_POST['email']);  
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

	// call the update function
	$church->update_church($website, $name, $text, $email, $addr1, $addr2, $addr3, $addr4, $cell1, $cell2, $pastor, $pastor_site, $music_vid, $preach_vid);
	header('Location:home.php');
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Edit Church</title>
</head>
<body>
<h1>Edit My Church</h1>

<form method="post" action="">
<label>Church Name</label>
<input type="text" name="name" value="<?php echo $churchdata->name; ?>">
<br>
<label>Church Website</label>
<input type="text" name="website" value="<?php echo $churchdata->website; ?>">
<br>
<label>Description</label>
<input type="text" name="text" placeholder="Short description of your church, please include service times and church ministries" value="<?php echo $churchdata->text; ?>">
<br>
<label>Address</label>
<input type="text" name="addr1" placeholder="Street" value="<?php echo $churchdata->addr1; ?>">
<input type="text" name="addr2" placeholder="Suburb" value="<?php echo $churchdata->addr2; ?>">
<input type="text" name="addr3" placeholder="City" value="<?php echo $churchdata->addr3; ?>">
<input type="text" name="addr4" placeholder="Province" value="<?php echo $churchdata->addr4; ?>">
<br>
<label>Contact Numbers</label>
<input type="text" name="cell1" value="<?php echo $churchdata->cell1; ?>">
<input type="text" name="cell2" value="<?php echo $churchdata->cell2; ?>">
<br>
<label>Email</label>
<input type="text" name="email" value="<?php echo $churchdata->email; ?>">
<br>
<label>Pastor</label>
<input type="text" name="pastor" value="<?php echo $churchdata->pastor; ?>">
<br>
<label>Pastor's Website</label>
<input type="text" name="pastor_site" value="<?php echo $churchdata->pastor_site; ?>">
<br>
<label>How we worship</label>
<input type="text" name="music_vid" placeholder="youtube video link" value="<?php echo $churchdata->music_vid; ?>">
<br>
<label>How we preach</label>
<input type="text" name="preach_vid" placeholder="youtube video link" value="<?php echo $churchdata->preach_vid; ?>">
<br>
<input type="submit" value="Save" name="edit_church" />
</form>

</body>
</html>