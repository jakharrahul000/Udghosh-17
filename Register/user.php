<?php
session_start();
	require 'dbconfig/config.php';

function NewUser() 
{ 
	$username = $_POST['user']; 
	$college = $_POST['college'];
	$sports = $_POST['sports'];
	$gender = $_POST['gender'];
	$captain = $_POST['captain'];
	$email = $_POST['email']; 
	$contact = $_POST['contact']; 
	$team_size = $_POST['team_size'];
	$player1 = $_POST['player1']; $contact1 = $_POST['contact1'];
	$player2 = $_POST['player2']; $contact2 = $_POST['contact2'];
	$player3 = $_POST['player3']; $contact3 = $_POST['contact3'];
	$player4 = $_POST['player4']; $contact4 = $_POST['contact4'];
	$player5 = $_POST['player5']; $contact5 = $_POST['contact5'];
	$player6 = $_POST['player6']; $contact6 = $_POST['contact6'];
	$player7 = $_POST['player7']; $contact7 = $_POST['contact7'];
	$player8 = $_POST['player8']; $contact8 = $_POST['contact8'];
	$player9 = $_POST['player9']; $contact9 = $_POST['contact9'];
	$player10 = $_POST['player10']; $contact10 = $_POST['contact10'];
	$player11 = $_POST['player11']; $contact11 = $_POST['contact11'];
	$player12 = $_POST['player12']; $contact12 = $_POST['contact12'];
	$player13 = $_POST['player13']; $contact13 = $_POST['contact13'];
	$player14 = $_POST['player14']; $contact14 = $_POST['contact14'];
	$player15 = $_POST['player15']; $contact15 = $_POST['contact15'];
	$player16 = $_POST['player16']; $contact16 = $_POST['contact16'];
	$query = "INSERT INTO sports_form (username,college,sports,gender,captain,email,contact,team_size,player1,contact1,player2,contact2,player3,contact3,player4,contact4,player5,contact5,player6,contact6,player7,contact7,player8,contact8,player9,contact9,player10,contact10,player11,contact11,player12,contact12,player13,contact13,player14,contact14,player15,contact15,player16,contact16) VALUES ('$username','$college','$sports','$gender','$captain','$email','$contact','$team_size','$player1','$contact1','$player2','$contact2','$player3','$contact3','$player4','$contact4','$player5','$contact5','$player6','$contact6','$player7','$contact7','$player8','$contact8','$player9','$contact9','$player10','$contact10','$player11','$contact11','$player12','$contact12','$player13','$contact13','$player14','$contact14','$player15','$contact15','$player16','$contact16')"; 
	$data = mysql_query ($query)or die(mysql_error()); 
	if($data) 
		{ 
			echo "YOUR REGISTRATION IS COMPLETED..."; 
		} 
	} 

function SignUp() 
{ 
	if(!empty($_POST['user'])) //checking the 'user' name which is from Sign-Up.html, is it empty or have some text 
{ 
	$query = mysql_query("SELECT * FROM sports_form WHERE username = '$_POST[user]' AND college = '$_POST[college]'") or die(mysql_error()); 
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
