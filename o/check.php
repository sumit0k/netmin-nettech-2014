<?php
if (substr_count($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip')) ob_start("ob_gzhandler"); else ob_start();
session_start();
if(!isset($_POST['submit']))
{	$b=`nmap localhost`;
	$_SESSION['output']=" ".$b."</br></br></b><a href=../o/check.php>Look again</a><br><br><a href=../s/s.php>Service Management</a><br>";}
else
{
$a=$_POST['address'];
if($a=="")
				{
						$_SESSION['output']="<b><b>The command could not be executed successfully :(.<br>&nbsp;&nbsp;IP Address not provided.&nbsp;&nbsp;</br></br></b><a href=../o/p.php>Try again</a><br>";
				}
		else
		{
				$v=explode(".",$a);
				if(($v[0]<1||$v[0]>255)||
				($v[1]<0||$v[1]>255)||
				($v[2]<0||$v[2]>255)||
				($v[3]<0||$v[3]>255))
			{
				$_SESSION['output']="<b><b>The command could not be executed successfully :(.<br>&nbsp;&nbsp;IP Address not valid.&nbsp;&nbsp;</br></br></b><a href=../o/p.php>Try again</a><br>";
			}
		else
	        {
					$c=`sudo ping -c 4 $a`;
					$_SESSION['output']=" ".$c."</br></br></b><a href=../o/p.php>Ping again</a><br>";
					if(!$c)
						$_SESSION['output']="<b><b>The command could not be executed successfully :(.<br>&nbsp;&nbsp;IP Address not found.&nbsp;&nbsp;</br></br></b><a href=../o/p.php>Try again</a><br>";
					}	
				}

}
header("location:../functions/output.php");
?>