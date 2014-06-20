<?php
if (substr_count($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip')) ob_start("ob_gzhandler"); else ob_start();
	session_start();
			if(isset($_POST['view']))
			{
			 $a=`sudo fdisk -l`;
			}
			if(isset($_POST['free']))
			{
			 $a=`sudo df -h`;
			}
			if(isset($_POST['ram']))
			{
			 $a=`sudo free`;
			}
			if(isset($_POST['mount']))
			{
			 $a=`sudo mount`;
			}
$_SESSION['output']="".$a."</br></br></b><a href=../d/d.php>Show More Information</a><br>";
header("location:../functions/output.php");
?>