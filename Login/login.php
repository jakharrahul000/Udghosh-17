<?php
session_start();
	require 'dbconfig/config.php';


function SignIn()
{

	//echo "yoyo !!";
//session_start(); //starting the session for user profile page
if(!empty($_POST['user'])) //checking the 'user' name which is from Sign-In.html, is it empty or have some text
{
	//echo ' <br> connect to DB';
	//echo '<br>'.$_POST[user];
	//echo '<br>'.$_POST[pass];


	$query = mysql_query("SELECT * FROM WebsiteUsers where userName = '$_POST[user]' AND pass = '$_POST[pass]'") ;//or die(mysql_error());
	$row = mysql_fetch_array($query);// or die(mysql_error());

	//echo die("incoorrct",mysql_error());
	//echo '<br>'.$row['userName'];
	//echo '<br>'.$row['pass'];

	if(!empty($row['userName']) AND !empty($row['pass']))
		{
			$_SESSION['fullName'] = $row['fullname'];
			$_SESSION['college'] = $row['college'];
			$_SESSION['userName'] = $row['userName'];

			setcookie(fullName,$row['fullName']);
			setcookie(college,$row['college']);
			setcookie(userName,$row['userName']);


			echo "<script>setTimeout(\"location.href = '../TeamDetails/';\",1);</script>";
			echo "<script>alert(\"Welcome ".$_SESSION['fullName']." from ".$_SESSION['college']." college\");</script>";


		}
		else
		{
			//echo "SORRY... YOU ENTERD WRONG ID AND PASSWORD... PLEASE RETRY...";
			echo '<script>alert("Enter correct username and password.");</script>';
			echo "<script>setTimeout(\"location.href = '../Login/';\",1500);</script>";

			//$_SESSION['message'] = "Enter correct userName and password!!";
			//echo $_SESSION[message];
			//header("location:login.html");

		}
}

}
if(isset($_POST['submit']) && !empty($_POST['submit']))
	{
		//echo "entered";
		SignIn();
	}
?>
