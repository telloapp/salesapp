<?php
require 'core/init.php';

$general->logged_out_protect();
// $id   = htmlentities($user['id']);

$view_churches = $church->get_churches();

?>
<!DOCTYPE html>
<html>
<head>
    <title>Sales App</title>
</head>
<body>

<h1>Welcome to the sales app</h1>
<p>What do you want to do ?</p>
<ol>
    <li><a href="addchurch.php">Register My Church</a></li>
    <li><a href="addbiz.php">Register My Business</a></li>
    <li><a href="logout.php">Logout</a></li>
</ol>

<h1>Dashboard</h1>

<?php foreach ($view_churches as $row) { ?>
<label>Church Name</label>
<p><?php echo $row['name']; ?></p>
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
<br><br>
<!-- Click link to edit this church -->
<a href="editchurch.php?id=<?php echo $row['church_id']; ?>">Edit this church</a> 
<br>
<!-- Click link to delete this church -->
<form method="post" action="deletechurch.php?id=<?php echo $row['church_id']; ?>">
    <button type="submit" name="deletechurch">Delete this church</button>    
</form>

<?php } ?>
<hr>

</body>
</html>