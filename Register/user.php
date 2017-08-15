<?php
	require 'dbconfig/config.php';
	session_start();
	//echo $_SESSION['userName'];
function NewUser()
{
	$username = $_SESSION['userName'];
	$college = $_SESSION['college'];
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
	$player17 = $_POST['player17']; $contact17 = $_POST['contact17'];
	$player18 = $_POST['player18']; $contact18 = $_POST['contact18'];
	$player19 = $_POST['player19']; $contact19 = $_POST['contact19'];
	$player20 = $_POST['player20']; $contact20 = $_POST['contact20'];
	$player21 = $_POST['player21']; $contact21 = $_POST['contact21'];
	$player22 = $_POST['player22']; $contact22 = $_POST['contact22'];
	$player23 = $_POST['player23']; $contact23 = $_POST['contact23'];
	$player24 = $_POST['player24']; $contact24 = $_POST['contact24'];
	$player25 = $_POST['player25']; $contact25 = $_POST['contact25'];
	$player26 = $_POST['player26']; $contact26 = $_POST['contact26'];
	$player27 = $_POST['player27']; $contact27 = $_POST['contact27'];
	$player28 = $_POST['player28']; $contact28 = $_POST['contact28'];
	$player29 = $_POST['player29']; $contact29 = $_POST['contact29'];
	$player30 = $_POST['player30']; $contact30 = $_POST['contact30'];


$query = "INSERT INTO sports_form (username,college,sports,gender,captain,email,contact,team_size,player1,contact1,player2,contact2,player3,contact3,player4,contact4,player5,contact5,player6,contact6,player7,contact7,player8,contact8,player9,contact9,player10,contact10,player11,contact11,player12,contact12,player13,contact13,player14,contact14,player15,contact15,player16,contact16,player17,contact17,player18,contact18,player19,contact19,player20,contact20,player21,contact21,player22,contact22,player23,contact23,player24,contact24,player25,contact25,player26,contact26,player27,contact27,player28,contact28,player29,contact29,player30,contact30) VALUES ('$username','$college','$sports','$gender','$captain','$email','$contact','$team_size','$player1','$contact1','$player2','$contact2','$player3','$contact3','$player4','$contact4','$player5','$contact5','$player6','$contact6','$player7','$contact7','$player8','$contact8','$player9','$contact9','$player10','$contact10','$player11','$contact11','$player12','$contact12','$player13','$contact13','$player14','$contact14','$player15','$contact15','$player16','$contact16','$player17','$contact17','$player18','$contact18','$player19','$contact19','$player20','$contact20','$player21','$contact21','$player22','$contact22','$player23','$contact23','$player24','$contact24','$player25','$contact25','$player26','$contact26','$player27','$contact27','$player28','$contact28','$player29','$contact29','$player30','$contact30')";


	$data = mysql_query ($query)or die(mysql_error());
	if($data)
		{
			echo '<script>cnf=confirm("You have successfully registered for this sport. Do you want to register for another sport?");</script>';
			echo "<script> if(cnf){setTimeout(\"location.href = 'user.html';\",500);} else { setTimeout(\"location.href = '../index.html';\",500); }</script>";
		}

	}

function SignUp()
{
	if(!empty($_SESSION['userName'])) //checking the 'user' name which is from Sign-Up.html, is it empty or have some text
{
	//check for
	$query = mysql_query("SELECT * FROM sports_form WHERE username = '$_SESSION[userName]' AND college = '$_SESSION[college]' AND sports = '$_POST[sports]'") or die(mysql_error());
	if(!$row = mysql_fetch_array($query))
		{
			NewUser();
		}
		else
		{
			echo '<script>cnf=confirm("You have already registered for this sport. Do you want to register for another sport?");</script>';
			echo "<script> if(cnf){setTimeout(\"location.href = 'user.html';\",500);} else { setTimeout(\"location.href = '../index.html';\",500); }</script>";

			//echo '<script></script>';
			//echo "<script>setTimeout(\"location.href = 'login.html';\",1500);</script>";
			//confirm(Do you want to register for another soprt?)
		}

}
}
if(isset($_POST['submit']))
	{
		SignUp();
	}
?>
