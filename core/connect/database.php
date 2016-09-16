<?php 
$config = array(
	'host'		=> 'localhost',
	'username' 	=> 'salesapp',
	'password' 	=> '',
	'dbname' 	=> 'salesapp'
);

$db = new PDO('mysql:host=' . $config['host'] . ';dbname=' . $config['dbname'], $config['username'], $config['password']);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);