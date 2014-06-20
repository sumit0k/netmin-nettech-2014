<?php
if (substr_count($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip')) ob_start("ob_gzhandler"); else ob_start();
	session_start();
	$d=" ";
	$a="This action could not be performed.";
	$b=$_POST['service'];
	switch ($b)
	{
	case "Telnet (xinetd)":
	{$c='xinetd';
	break;}
	case "SSH (sshd)":
	{$c='sshd';
	break;}
case "SMTP (sendmail)":
	{$c='sendmail';
	break;}
case "DNS (named)":
	{$c='named';
	break;}
case "IPP (cups)":
	{$c='cups';
	break;}
case "FTP (vsftpd)":
	{$c='vsftpd';
	break;}
case "IMAP/POP3 (dovecot)":
	{$c='dovecot';
	break;}
case "APACHE (httpd)":
	{$c='httpd';
	break;}
case "SAMBA (smb)":
	{$c='smb';
	break;}
case "Firewall (iptables)":
	{$c='iptables';
	break;}	
default :
{

}
	}
			if(isset($_POST['start']))
			{
			if($c=='xinetd')
			{$d=`sudo chkconfig telnet on`;}
			$a=`sudo service $c start`;
			}
			if(isset($_POST['stop']) && $c!='httpd')
			{
			if($c=='xinetd')
			{$d=`sudo chkconfig telnet off`;}
			$a=`sudo service $c stop`;
			}
			if(isset($_POST['status']))
			{
			 $a=`sudo service $c status`;
			}
			if(isset($_POST['restart']))
			{
			if($c=='xinetd')
			{
			$d=`sudo chkconfig telnet off`;
			$d=`sudo chkconfig telnet on`;
			}
			$a=`sudo service $c restart`;
			}
$_SESSION['output']="".$a."</br></br></b><a href=../s/s.php>Manage other Services</a><br><br><a href=../o/check.php>Check Port Status</a><br>";
header("location:../functions/output.php");
?>