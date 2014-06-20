<?php
if (substr_count($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip')) ob_start("ob_gzhandler"); else ob_start();
	session_start();
			if(isset($_POST['execute']))
			{
			$x=$_POST['opt'];
			$a=$_POST['domain'];
			$f=$_POST['address'];
			$y=`sudo find / -name $a.hosts`;
				if($y=="")
				{
				$_SESSION['output']="<b><b>The command could not be executed successfully :(.<br>&nbsp;&nbsp;".$a."Master Domain Name does not exists&nbsp;&nbsp;</br></br></b><a href=../b/e.php>Try again</a><br>";
				}
				elseif($x=="Address Records")
		{
				$g=$_POST['ip'];
				$v=explode(".",$g);
				if(($v[0]<1||$v[0]>255)||
				($v[1]<0||$v[1]>255)||
				($v[2]<0||$v[2]>255)||
				($v[3]<0||$v[3]>255))
			{
				$_SESSION['output']="<b><b>The command could not be executed successfully :(.<br>&nbsp;&nbsp;".$g." IP Address is not valid.&nbsp;&nbsp;</br></br></b><a href=../b/c.php>Try again</a><br>";
			}
		else
	        {	
				if($f=="")
				{
				    $i=`sudo touch address.sh`;
				    $i=`sudo chmod 777 address.sh`;
				    $i=`echo "echo '$a.  IN  A  $g' >> /var/named/chroot/var/named/$a.hosts" > address.sh `;
					    $h=`sudo bash address.sh`;
					    $h=`sudo rm -rf address.sh`;	
					    $_SESSION['output']="<b><b>The command was executed successfully :).<br>&nbsp;&nbsp;".$a.". Address record of Master Zone was created successfully.&nbsp;&nbsp;</br></br></b><a href=../b/e.php>Edit Master Zone</a><br>";
				}
			else
			{

			    	$f=$f.".".$a;
				    $h=`sudo touch address.sh`;
				    $h=`sudo chmod 777 address.sh`;
				    $h=`echo "echo '$f.  IN  A  $g' >> /var/named/chroot/var/named/$a.hosts" > address.sh `;
					    $h=`sudo bash address.sh`;
					    $h=`sudo rm -rf address.sh`;	
					    $_SESSION['output']="<b><b>The command was executed successfully :).<br>&nbsp;&nbsp;".$f.". Address record of Master Zone was created successfully.&nbsp;&nbsp;</br></br></b><a href=../b/e.php>Edit Master Zone</a><br>";
				}
			    }
			}
			elseif($x=="Name Server Records")
		{ 
					    $h=`sudo touch nameserver.sh`;
					    $h=`sudo chmod 777 nameserver.sh`;
					    $h=`echo "echo '$a.  IN  NS  $f' >> /var/named/chroot/var/named/$a.hosts" > nameserver.sh `;
					    $h=`sudo bash nameserver.sh`;
					    $h=`sudo rm -rf nameserver.sh`;	
					    $_SESSION['output']="<b><b>The command was executed successfully :).<br>&nbsp;&nbsp;".$f.". Name Server record of Master Zone was created successfully.&nbsp;&nbsp;</br></br></b><a href=../b/e.php>Edit Master Zone</a><br>";
		}
		elseif($x=="Name Alias Records")
		{ 
					    $h=`sudo touch namealias.sh`;
					    $h=`sudo chmod 777 namealias.sh`;
					    $h=`echo "echo '$f  IN  CNAME  $a' >> /var/named/chroot/var/named/$a.hosts" > namealias.sh `;
					    $h=`sudo bash namealias.sh`;
					    $h=`sudo rm -rf namealias.sh`;	
					    $_SESSION['output']="<b><b>The command was executed successfully :).<br>&nbsp;&nbsp;".$f.". Name Alias record of Master Zone was created successfully.&nbsp;&nbsp;</br></br></b><a href=../b/e.php>Edit Master Zone</a><br>";
		}
		elseif($x=="Mail Server Records")
		{ 
					    $g=$_POST['prio'];
					    $h=`sudo touch mailserver.sh`;
					    $h=`sudo chmod 777 mailserver.sh`;
					    $h=`echo "echo '$a.  IN  MX  $g   $f' >> /var/named/chroot/var/named/$a.hosts" > mailserver.sh `;
					    $h=`sudo bash mailserver.sh`;
					    $h=`sudo rm -rf mailserver.sh`;	
					    $_SESSION['output']="<b><b>The command was executed successfully :).<br>&nbsp;&nbsp;".$f.". Mail Server record of Master Zone was created successfully.&nbsp;&nbsp;</br></br></b><a href=../b/e.php>Edit Master Zone</a><br>";
		}
			}
			elseif(isset($_POST['submit']))
			{					
			$w=$_POST['opt'];
			$a=$_POST['domain'];
			$x=$_POST['email'];
				$y=`sudo find / -name $a.hosts`;
				$q=`sudo cat /etc/named.conf | grep -w /var/named/$a.hosts`;
				$r=`sudo cat /etc/named.conf | grep -w $a`;
				if (`sudo $q >> /dev/null`||$y!=""||$r!="")
				{	 
					$_SESSION['output']="<b><b>The command could not be executed successfully :(.<br>&nbsp;&nbsp;".$a." Domain Name already exists&nbsp;&nbsp;</br></br></b><a href=../b/c.php>Try again</a><br>";
				}
			elseif($w=="Master Zone")
				{
				
				$b=`sudo touch dns.sh`;
				$b=`sudo chmod 777 dns.sh`;
				$b=`echo "echo '
zone \"$a\" {
	type master;
	file \"/var/named/$a.hosts\";
	};' >> /etc/named.conf">dns.sh`;
				$b=`sudo bash dns.sh`;
				$b=`sudo rm -rf dns.sh`;
				$_SESSION['output']="<b><b>The command was executed successfully :).<br>&nbsp;&nbsp;".$a." Domain Name as Master Zone was created successfully.&nbsp;&nbsp;</br></br></b><a href=../b/e.php>Edit Master Zone</a><br>";
				
				$d=`sudo touch /var/named/chroot/var/named/$a.hosts`;
				$d=`sudo chmod 777 /var/named/chroot/var/named/$a.hosts`;			
				$b=`sudo touch dns1.sh`;
				$b=`sudo chmod 777 dns1.sh`;
				$b=`echo "echo '
\$ ttl 38400
$a		    IN    SOA      nettech. $x (
				20062011
				10800
				3600
			   604800
		38400)'  >> /var/named/chroot/var/named/$a.hosts" > dns1.sh`;
				$b=`sudo bash dns1.sh`;
				$b=`sudo rm -rf dns1.sh`;
				$d=`sudo chmod 644 /var/named/chroot/var/named/$a.hosts`;}
			else
			{$v=explode(".",$x);
				if(($v[0]<1||$v[0]>255)||
				($v[1]<0||$v[1]>255)||
				($v[2]<0||$v[2]>255)||
				($v[3]<0||$v[3]>255))
			{
				$_SESSION['output']="<b><b>The command could not be executed successfully :(.<br>&nbsp;&nbsp;".$x." IP Address is not valid.&nbsp;&nbsp;</br></br></b><a href=../b/c.php>Try again</a><br>";
			}
			elseif($w=="Slave Zone")
				{
				$a=$_POST['domain'];
				$x=$_POST['ip'];
				$b=`sudo touch slave.sh`;
				$b=`sudo chmod 777 slave.sh`;
				$b=`echo "echo '
zone \"$a\" {
	type slave;
	masters {
$x;
  };
	file \"/var/named/slaves/$a.hosts\";
	};' >> /etc/named.conf">slave.sh`;
				$b=`sudo bash slave.sh`;
				$b=`sudo rm -rf slave.sh`;
				$_SESSION['output']="<b><b>The command was executed successfully :).<br>&nbsp;&nbsp;".$a." Domain Name as Slave Zone was created successfully.&nbsp;&nbsp;</br></br></b><a href=../b/check.php>Show all Existing Zones</a><br>";
				}
			elseif($w=="Forward Zone")
				{
				$a=$_POST['domain'];
				$x=$_POST['ip'];
				$b=`sudo touch forward.sh`;
				$b=`sudo chmod 777 forward.sh`;
				$b=`echo "echo '
zone \"$a\" {
	type forward;
	forwarders {
$x;
  };
	};' >> /etc/named.conf">forward.sh`;
				$b=`sudo bash forward.sh`;
				$b=`sudo rm -rf forward.sh`;
				$_SESSION['output']="<b><b>The command was executed successfully :).<br>&nbsp;&nbsp;".$a." Domain Name as Forward Zone was created successfully.&nbsp;&nbsp;</br></br></b><a href=../b/check.php>Show all Existing Zones</a><br>";
				}
			}
		     }
			elseif(isset($_POST['sub']))
			{
				$i=`sudo service named restart`;
				$_SESSION['output']=$i."<br><br>The changes have been applied successfully<br><a href=../b/c.php>Create new Zone</a></b><br>";
			}
			else
			{
				$m=" ";
				$a=`sudo cat /etc/named.conf`;
					$b=explode("
zone \"",$a);
					$l='<table width=100%>
					<caption>All Existing Zones</caption>
					<tr bgcolor=#ccc height="30px">
					<td ><b>Sno.</b></td>	
					<td ><b>Zone Name</b></td>		
					</tr>';					
					for($i=1,$d=1;$i<200;$i++)
				   {
					if($b[$i]==""){break;}
				   else{
					$c=explode("\"",$b[$i]);
					$m=$m.'
					<tr height="30px">
					<td >'.$d.'</td>
					<td >'.$c[0].'</td>
					</tr>
					';
					$d++;
					}
				    }
					$_SESSION['output']=" ".$l.$m."</table>"."<b><br><a href=../b/c.php>Create new Zone</a></b><br>";
			}
header("location:../functions/output.php");
?>