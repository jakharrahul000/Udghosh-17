<?php
session_start();
	require 'dbconfig/config.php';

function SignIn() 
{ 
session_start(); //starting the session for user profile page 
if(!empty($_POST['user'])) //checking the 'user' name which is from Sign-In.html, is it empty or have some text 
{ 
	$query = mysql_query("SELECT * FROM WebsiteUsers where userName = '$_POST[user]' AND pass = '$_POST[pass]'") or die(mysql_error()); 
	$row = mysql_fetch_array($query) or die(mysql_error()); 
	if(!empty($row['userName']) AND !empty($row['pass'])) 
		{ 
			$_SESSION['userName'] = $row['pass'];
			header("location:user.html");
		} 
		else 
		{ 
			echo "SORRY... YOU ENTERD WRONG ID AND PASSWORD... PLEASE RETRY..."; 
		} 
} 
} 
if(isset($_POST['submit'])) 
	{ 
		SignIn(); 
	} 

?>

