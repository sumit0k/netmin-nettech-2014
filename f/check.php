<?php
if (substr_count($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip')) ob_start("ob_gzhandler"); else ob_start();
	session_start();
			if(isset($_POST['configure']))
			{
				$a=$_POST['input'];
				$b=$_POST['accept'];
				$e=$_POST['ip'];
				$h=$_POST['protocol'];
				if ($h=="TCP Configuration")
				$c=$_POST['port'];
				if ($h=="ICMP Configuration")
				$c="1";
		if($a!=""&&$b!=""&&$h!=""&&$e!="")
		{
				if($c>0&&$c<=65535)
		  {
				$f=explode(".",$e);
				if(($f[0]>=0&&$f[0]<=255)&&
				   ($f[1]>=1&&$f[1]<=255)&&
				   ($f[2]>=1&&$f[2]<=255))
			{
				$g=explode("/",$f[3]);
				if($g[0]>=1&&$g[0]<=255)
			  {
				if($g[1]>=0&&$g[1]<=32)
			     {
				 if ($h=="TCP Configuration")
				{
				$d=`sudo iptables -A $a -s $e -p tcp --dport $c -j $b`;}
				elseif ($h=="ICMP Configuration")
				{
				$d=`sudo iptables -A $a -s $e -p icmp --icmp-type echo-request -j $b`;
				}
				$_SESSION['output']="".$d."<b>The command was executed successfully :(.<br>&nbsp;&nbsp;Firewall rule has been updated.&nbsp;&nbsp;</br></br></b><a href=../f/p.php>Firewall Configuration</a><br>";
			     }
				elseif($g[1]=="")
			     {
				if ($h=="TCP Configuration")
				{
				$d=`sudo iptables -A $a -s $e -p tcp --dport $c -j $b`;}
				elseif ($h=="ICMP Configuration")
				{
				$d=`sudo iptables -A $a -s $e -p icmp --icmp-type echo-request -j $b`;
				}
				$_SESSION['output']="".$d."<b>The command was executed successfully :(.<br>&nbsp;&nbsp;Firewall rule has been updated.&nbsp;&nbsp;</br></br></b><a href=../f/p.php>Firewall Configuration</a><br>";
			     }
				else 
				$_SESSION['output']="<b>The command could not be executed successfully :(.<br>&nbsp;".$e."&nbsp;IP/Network Address is not Valid.&nbsp;&nbsp;</br></br></b><a href=../f/p.php>Try again</a><br>";
			   }
				else 
				$_SESSION['output']="<b>The command could not be executed successfully :(.<br>&nbsp;".$e."&nbsp;IP/Network Address is not Valid.&nbsp;&nbsp;</br></br></b><a href=../f/p.php>Try again</a><br>";
		        }
				else
				$_SESSION['output']="<b>The command could not be executed successfully :(.<br>&nbsp;".$e."&nbsp;IP/Network Address is not Valid.&nbsp;&nbsp;</br></br></b><a href=../f/p.php>Try again</a><br>";
		    }
				else
				$_SESSION['output']="<b>The command could not be executed successfully :(.<br>&nbsp;".$c."&nbsp;Port Address is not Valid.&nbsp;&nbsp;</br></br></b><a href=../f/p.php>Try again</a><br>";
			}
			}
			if(isset($_POST['save']))
			{
			$a=`sudo service iptables save`;
			$_SESSION['output']="".$a."</br></br><a href=../f/p.php>Firewall Configuration</a><br>";
			}
			if(isset($_POST['rule']))
			{
			 $a=`sudo iptables -L`;
			 $_SESSION['output']="".$a."</br></br><a href=../f/p.php>Firewall Configuration</a><br>";
			}
			if(isset($_POST['flush']))
			{
			$b=`sudo iptables -F`;
			$a="Firewall Rules are successfully flushed from the server.";
			$_SESSION['output']="".$a."</br></br><a href=../f/p.php>Firewall Configuration</a><br>";
			}
header("location:../functions/output.php");
?>