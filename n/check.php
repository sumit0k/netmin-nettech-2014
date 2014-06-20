<?php
if (substr_count($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip')) ob_start("ob_gzhandler"); else ob_start();
	session_start();
			if(isset($_POST['submit']))
			{					
			$y=$_POST['typed'];
			$x=$_POST['opt'];
			if($y=="0")
			{
			
				$a=$_POST['name'];
				$b=$_POST['ip'];
				$c=$_POST['network'];
				$d=$_POST['netmask'];
				$e=$_POST['broadcast'];
				$f=`sudo find /etc/sysconfig/network-scripts/ifcfg-$a`;
				if ($x=="")
				{	 
					$_SESSION['output']="<b><b>The command could not be executed successfully :(.<br>&nbsp;&nbsp;Please enter the type of Interface.&nbsp;&nbsp;</br></br></b><a href=../n/n.php>Try again</a><br>";
				}
		else
	    {
				$v=explode(".",$b);
				if(($v[0]<1||$v[0]>255)||
				($v[1]<0||$v[1]>255)||
				($v[2]<0||$v[2]>255)||
				($v[3]<0||$v[3]>255))
			{
				$_SESSION['output']="<b><b>The command could not be executed successfully :(.<br>&nbsp;&nbsp;".$b." IP Address is not Valid&nbsp;&nbsp;</br></br></b><a href=../n/n.php>Try again</a><br>";
			}
		else
	        {
				$i=explode(".",$c);
				if(($i[0]<1||$i[0]>255)||
				($i[1]<0||$i[1]>255)||
				($i[2]<0||$i[2]>255)||
				($i[3]<0||$i[3]>255))
			{
				$_SESSION['output']="<b><b>The command could not be executed successfully :(.<br>&nbsp;&nbsp;".$c." Network Address is not Valid&nbsp;&nbsp;</br></br></b><a href=../n/n.php>Try again</a><br>";
			}
		else
	          {
				$net=explode(".",$d);
				if(($net[0]<1||$net[0]>255)||
				($net[1]<0||$net[1]>255)||
				($net[2]<0||$net[2]>255)||
				($net[3]<0||$net[3]>255))
			{
				$_SESSION['output']="<b><b>The command could not be executed successfully :(.<br>&nbsp;&nbsp;".$d." Subnet Mask Address is not Valid&nbsp;&nbsp;</br></br></b><a href=../n/n.php>Try again</a><br>";
			}
		else
	          {
				$bro=explode(".",$e);
				if(($bro[0]<1||$bro[0]>255)||
				($bro[1]<0||$bro[1]>255)||
				($bro[2]<0||$bro[2]>255)||
				($bro[3]<0||$bro[3]>255))
			{
				$_SESSION['output']="<b><b>The command could not be executed successfully :(.<br>&nbsp;&nbsp;".$e." Broadcast Address is not Valid&nbsp;&nbsp;</br></br></b><a href=../n/n.php>Try again</a><br>";
			}
		     elseif($x=="Real Interface")
		    {
			if ($f!="")
				{	 
					$_SESSION['output']="<b><b>The command could not be executed successfully :(.<br>&nbsp;&nbsp;".$a." Network Interface already exists.&nbsp;&nbsp;</br></br></b><a href=../n/n.php>Try again</a><br>";
				}
			else{
				$z=` sudo ls /etc/sysconfig/network-scripts/`;
				$y=explode("
ifcfg-",$z);
				$t=explode("ifcfg-",$y[0]);
				for($x=1,$j=1;$x<15;$x++)
				{
				  $s=` sudo cat /etc/sysconfig/network-scripts/ifcfg-$t[1] `;  
				  $w=` sudo cat /etc/sysconfig/network-scripts/ifcfg-$y[$x] `;
					$q=explode("IPADDR=",$s);
					$u=explode("IPADDR=",$w);
					$p=explode("NETWORK",$q[1]);
					$r=explode("NETWORK",$u[1]);
					$n=explode(".",$p[0]);
					$m=explode(".",$r[0]);
					$k=explode(" ",$n[3]);
					$l=explode(" ",$m[3]);
					$v=explode(".",$b);		
					if(($v[0]==$n[0]&&$v[1]==$n[1]&&$v[2]==$n[2]&&$v[3]==$k[0])||($v[0]==$m[0]&&$v[1]==$m[1]&&$v[2]==$m[2]&&$v[3]=$l[0]))
					if($j==1)
					   {
						$_SESSION['output']="<b><b>The command could not be executed successfully :(.<br>&nbsp;&nbsp;".$b." IP Address is used by another Interface.&nbsp;&nbsp;</br></br></b><a href=../n/n.php>Try again</a><br>";
						$j=0;
					    }
				  }   		 	
					
			if($j==1)
	  {
				
				$g=`sudo touch add.sh`;
				$g=`sudo chmod 777 add.sh`;
				$h=`sudo touch /etc/sysconfig/network-scripts/ifcfg-$a`;
				$h=`sudo chmod 777 /etc/sysconfig/network-scripts/ifcfg-$a`;
				$g=`echo "echo '
BOOTPROTO=static
DEVICE=$a
NETMASK=$d
BROADCAST=$e
IPADDR=$b
NETWORK=$c
ONBOOT=yes
TYPE=Ethernet' >> /etc/sysconfig/network-scripts/ifcfg-$a" > add.sh`;
				$g=`sudo bash add.sh`;
				$g=`sudo rm -rf add.sh`;
				$_SESSION['output']="<b><b>The command was executed successfully :).<br>&nbsp;&nbsp;".$a." Interface was successfully added.&nbsp;&nbsp;</br></br></b><a href=../n/n.php>Show all Existing Interfaces</a><br>";
				}
			      }
				  }
			elseif($x=="Virtual Interface")
		    {
			$vir=$_POST['virtual'];
			if ($f=="")
				{	 
					$_SESSION['output']="<b><b>The command could not be executed successfully :(.<br>&nbsp;&nbsp;".$a." Network Interface does not exists.&nbsp;&nbsp;</br></br></b><a href=../n/n.php>Try again</a><br>";
				}
			else{
				$find=`sudo find /etc/sysconfig/network-scripts/ifcfg-$a:$vir`;
				if($find!="")
				{	 
					$_SESSION['output']="<b><b>The command could not be executed successfully :(.<br>&nbsp;&nbsp;".$a.":".$vir."Virtual Network Interface already exists.&nbsp;&nbsp;</br></br></b><a href=../n/n.php>Try again</a><br>";
				}
		else
       {

				if($vir>=1&&$vir<=20)
	{

				$z=` sudo ls /etc/sysconfig/network-scripts/`;
				$y=explode("
ifcfg-",$z);
				$t=explode("ifcfg-",$y[0]);
				for($x=1,$j=1;$x<15;$x++)
				{
				  $s=` sudo cat /etc/sysconfig/network-scripts/ifcfg-$t[1] `;  
				  $w=` sudo cat /etc/sysconfig/network-scripts/ifcfg-$y[$x] `;
					$q=explode("IPADDR=",$s);
					$u=explode("IPADDR=",$w);
					$p=explode("NETWORK",$q[1]);
					$r=explode("NETWORK",$u[1]);
					$n=explode(".",$p[0]);
					$m=explode(".",$r[0]);
					$k=explode(" ",$n[3]);
					$l=explode(" ",$m[3]);
					$v=explode(".",$b);		
					if(($v[0]==$n[0]&&$v[1]==$n[1]&&$v[2]==$n[2]&&$v[3]==$k[0])||($v[0]==$m[0]&&$v[1]==$m[1]&&$v[2]==$m[2]&&$v[3]=$l[0]))
					if($j==1)
					   {
						$_SESSION['output']="<b><b>The command could not be executed successfully :(.<br>&nbsp;&nbsp;".$b." IP Address is used by another Interface.&nbsp;&nbsp;</br></br></b><a href=../n/n.php>Try again</a><br>";
						$j=0;
					    }
				  }   		 	
					
			if($j==1)
	  {
				
				$g=`sudo touch add.sh`;
				$g=`sudo chmod 777 add.sh`;
				$h=`sudo touch /etc/sysconfig/network-scripts/ifcfg-$a:$vir`;
				$h=`sudo chmod 777 /etc/sysconfig/network-scripts/ifcfg-$a:$vir`;
				$g=`echo "echo '
BOOTPROTO=static
DEVICE=$a:$vir
NETMASK=$d
MTU=\"\"
BROADCAST=$e
IPADDR=$b
NETWORK=$c
ONBOOT=yes
TYPE=Virtual' >> /etc/sysconfig/network-scripts/ifcfg-$a:$vir" > add.sh`;
				$g=`sudo bash add.sh`;
				$g=`sudo rm -rf add.sh`;
				$_SESSION['output']="<b><b>The command was executed successfully :).<br>&nbsp;&nbsp;".$a.":".$vir."Virtual Interface was successfully added.&nbsp;&nbsp;</br></br></b><a href=../n/n.php>Show all Existing Interfaces</a><br>";
				}
			     }				
			else 
			$_SESSION['output']="<b><b>The command could not be executed successfully :(.<br>&nbsp;&nbsp;".$vir." Virtual Interface name not Valid.&nbsp;&nbsp;</br></br></b><a href=../n/n.php>Try again</a><br>";
			}
			      }
				  }
			     }				
			    }
			}
			}
			}
			elseif($y=="1")
			{
			if($x=="Real Interface"){
			
			$a=$_POST['name'];
				$b=` sudo find /etc/sysconfig/network-scripts/ifcfg-$a `;
				if($b=="")
				{	 
					$_SESSION['output']="<b><b>The command could not be executed successfully :((.<br>&nbsp;&nbsp;".$a." Network Interface does not exists.&nbsp;&nbsp;</br></br></b><a href=../n/n.php>Try again</a><br>";
				}
		else
   		 {
				$h=`sudo rm -rf  /etc/sysconfig/network-scripts/ifcfg-$a`;		
				$_SESSION['output']="<b><b>The command was executed successfully :).<br>&nbsp;&nbsp;".$a." Network Interface is deleted.&nbsp;&nbsp;</br></br></b><a href=../n/n.php>Network Interfaces</a><br>";
		}
		}
			if($x=="Virtual Interface"){
			
			$w=$_POST['name'];
				$x=$_POST['virtual'];
				$y=` sudo find /etc/sysconfig/network-scripts/ifcfg-$w:$x `;
				if($y=="")
				{	 
					$_SESSION['output']="<b><b>The command could not be executed successfully :(.<br>&nbsp;&nbsp;".$w.":".$x."Virtual Network Interface does not exists.&nbsp;&nbsp;</br></br></b><a href=../n/n.php>Try again</a><br>";
				}
		else
			{
				$z=`sudo rm -rf  /etc/sysconfig/network-scripts/ifcfg-$w:$x`;		
				$_SESSION['output']="<b><b>The command was executed successfully :).<br>&nbsp;&nbsp;".$w.":".$x."Virtual Network Interface is deleted.&nbsp;&nbsp;</br></br></b><a href=../n/n.php>Network Interfaces</a><br>";
			}
			}
			
			}
		     }
			elseif(isset($_POST['show']))
			{
				$c=`sudo ifconfig`;
				$_SESSION['output']=$c."<a href=../n/n.php>Network Interfaces</a><br>";
			}
			elseif(isset($_POST['subm']))
			{
				$i=`sudo service network restart`;
				$_SESSION['output']=$i."<br><br>The changes have been applied successfully<br><a href=../n/n.php>Network Interfaces</a><br>";
			}
header("location:../functions/output.php");
?>