<?php
session_start();
	require 'dbconfig/config.php';

function NewUser() 
{ 
	$fullname = $_POST['name']; 
	$userName = $_POST['user']; 
	$email = $_POST['email']; 
	$password = $_POST['pass']; 
	$college = $_POST['college'];
	$city = $_POST['city'];
	$state = $_POST['state'];
	$mobile = $_POST['mobile'];
	$query = "INSERT INTO WebsiteUsers (fullname,userName,email,pass,college,city,state,mobile) VALUES ('$fullname','$userName','$email','$password','$college','$city','$state','$mobile')"; 
	$data = mysql_query ($query)or die(mysql_error()); 
	if($data) 
		{ 
			header("location:login.html");  
		} 
	} 

function SignUp() 
{ 
	if(!empty($_POST['user'])) //checking the 'user' name which is from Sign-Up.html, is it empty or have some text 
{ 
	$query = mysql_query("SELECT * FROM WebsiteUsers WHERE userName = '$_POST[user]' AND pass = '$_POST[pass]'") or die(mysql_error()); 
	if(!$row = mysql_fetch_array($query) or die(mysql_error())) 
		{ 
			NewUser(); 
		} 
		else 
		{ 
			echo "SORRY...YOU ARE ALREADY REGISTERED USER..."; 
		} 
} 
} 
if(isset($_POST['submit'])) 
	{ 
		SignUp(); 
	} 
?>
