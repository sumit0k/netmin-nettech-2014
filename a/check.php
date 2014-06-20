<?php
if (substr_count($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip')) ob_start("ob_gzhandler"); else ob_start();
	session_start();
if(!isset($_POST['submit']))
	{$m="";	
					$a=`sudo cat /etc/httpd/conf/httpd.conf | grep ServerName`;
					$g=`sudo cat /etc/httpd/conf/httpd.conf | grep VirtualHost`;
					$h=`sudo cat /etc/httpd/conf/httpd.conf | grep DocumentRoot`;
					$b=explode("
ServerName ",$a);
					$e=explode("
<VirtualHost ",$g);
					$k=explode("
DocumentRoot ",$h);
					$l='<table width=100%>
					<caption>All Virtual Servers</caption>
					<tr bgcolor=#ccc height="30px">
					<td ><b>Sno.</b></td>	
					<td ><b>Virtual Server name</b></td>
					<td ><b>Virtual Host name</b></td>			<td ><b>Document Root</b></td>		
					</tr>';					
					for($i=1,$d=1;$i<40;$i++)
				   {
					if($b[$i]==""){break;}
				   else{
					$c=explode(" ",$b[$i]);
					$f=explode(">",$e[$i]);
					$j=explode(" ",$k[$i+1]);
					$m=$m.'
					<tr height="30px">
					<td >'.$d.'</td>
					<td >'.$c[0].'</td>
					<td >'.$f[0].'</td>
					<td>'.$j[0].'</td>
					</tr>
					';
					$d++;
					}
				    }
					$_SESSION['output']=" ".$l.$m."</table>"."<b><br><a href=../a/v.php>Create a virtual server</a></b><br>";}
else{
$a=$_POST['address'];
$b=$_POST['server'];
$c=$_POST['root'];
if ($c=="")
{
	$c="/var/www/html";
}
			if($a==""||$b=="")
{				$_SESSION['output']="<b>The command could not be executed successfully :(.<br>&nbsp;&nbsp;All required entries were not provided&nbsp;&nbsp;</br></br></b><a href=../a/v.php>Try again</a><br>";}
		else
	{			
				$v=explode(".",$a);
				if(($v[0]<1||$v[0]>255)||
				($v[1]<0||$v[1]>255)||
				($v[2]<0||$v[2]>255)||
				($v[3]<0||$v[3]>255))
			{
				$_SESSION['output']="<b>The command could not be executed successfully :(.<br>&nbsp;&nbsp;IP Address Entry was not correctly provided&nbsp;&nbsp;</br></br></b><a href=../a/v.php>Try again</a><br>";
			}	
		else
		{		

				
				$e=` sudo find $c `;
				if($e=="")
				{
				   $_SESSION['output']=$e."<b><b>The command could not be executed successfully :(.<br>&nbsp;&nbsp;Document root provided does not exists.&nbsp;&nbsp;</br></br></b><a href=../a/v.php>Try again</a><br>";
				}
		   else
	{ 

				$j=` sudo cat /etc/httpd/conf/httpd.conf | grep $b `;
				if($j!="")
				{
					$_SESSION['output']=$j."<b><b>The command could not be executed successfully :(.<br>&nbsp;&nbsp;Server name already exists&nbsp;&nbsp;</br></br></b><a href=../a/v.php>Try again</a><br>";
				}			
		
		else
	        {

				$d=`sudo touch create.sh`;
				$d=`sudo chmod 777 create.sh`;
				$d=`echo "echo '<VirtualHost $a> ' >> /etc/httpd/conf/httpd.conf " > create.sh`;
				$d=`sudo bash create.sh`;
				if($e!=""&&$c!="")
				{
				$f=`echo "echo 'DocumentRoot \"$c\" ' >> /etc/httpd/conf/httpd.conf " > create.sh`;
				$f=`sudo bash create.sh`;
				}
				$g=`echo "echo 'ServerName $b ' >> /etc/httpd/conf/httpd.conf " > create.sh`;
				$g=`sudo bash create.sh`;				
				if($e!=""&&$c!="")
				{
				$h=`echo "echo '<Directory \"$c\">
allow from all
Options +Indexes
</Directory> ' >> /etc/httpd/conf/httpd.conf " > create.sh`;
				$h=`sudo bash create.sh`;
				}
				$i=`echo "echo '</VirtualHost> ' >> /etc/httpd/conf/httpd.conf " > create.sh`;
				$i=`sudo bash create.sh`;
				$i=`sudo rm -rf create.sh`;
				$c=`sudo service httpd start`;
				$_SESSION['output']="<b>The command was executed successfully. :)<br>&nbsp;&nbsp;New Virtual Server created.&nbsp;&nbsp;</br></br></b><a href=../a/v.php>Create another?</a><br></br></br></b><a href=../a/check.php>Show existing Virtual Server</a><br>";
						}

					}
				}
			}
			}
			if(isset($_POST['sub']))
			{
				$c=`sudo service httpd start`;
				$_SESSION['output']=$c."<b><b>The command was executed successfully. :)<br>&nbsp;&nbsp;Apache Server restarted&nbsp;&nbsp;</br></br></b><a href=../a/v.php>Create a virtual server</a><br><a href=../a/e.php>Show existing virtual servers</a><br>";
			}
header("location:../functions/output.php");
?>