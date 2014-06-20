<?php
if (substr_count($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip')) ob_start("ob_gzhandler"); else ob_start();
	session_start();
			if(isset($_POST['execute']))
			{
				
				$b=$_POST['opt'];
				if ($b=="Add Users" || $b=="Delete Users" || $b=="Change Password")
				{$a=$_POST['user'];
				if($a=="")
					{
						$_SESSION['output']="<b><b>The command could not be executed successfully :(.<br>&nbsp;&nbsp;Please enter the User name&nbsp;&nbsp;</br></br></b><a href=../u/u.php>Try again</a><br>";
					}
			  	else
				{if($b=="Add Users")
					{
					$pass=$_POST['pass'];
					$pass1=$_POST['pass1'];
					$o=`cat /etc/passwd`;
					$x=explode($a,$o);
					if($x[1]!="")
				        $_SESSION['output']="<b><b>The command could not be executed successfully :(.<br>&nbsp;&nbsp;".$a." User already exists.&nbsp;&nbsp;</br></br></b><a href=../u/u.php>Try again</a><br>";
					else
						{
					if($pass1!=$pass)
						{
							$_SESSION['output']="<b><b>The command could not be executed successfully :(.<br>&nbsp;&nbsp; Password do not match.&nbsp;&nbsp;</br></br></b><a href=../u/u.php>Try again</a><br>";
						}
					else
						{
					$b=`sudo useradd $a`;
					$b=`echo $pass |sudo passwd --stdin $a`;
					$_SESSION['output']=$b."<b><b>The command was executed successfully :).<br>&nbsp;&nbsp;".$a." User successfully added.&nbsp;&nbsp;</br></br></b><a href=../u/u.php>Users Management</a><br>";
						}
					}
					}
				elseif($b=="Delete Users")
					{
					$o=`cat /etc/passwd`;
					$x=explode($a,$o);
					if($x[1]=="")
				        $_SESSION['output']="<b><b>The command could not be executed successfully :(.<br>&nbsp;&nbsp;".$a." Users does not exists.&nbsp;&nbsp;</br></br></b><a href=../u/u.php>Try again</a><br>";
					else
						{
					$b=`sudo userdel -rf $a`;
					$_SESSION['output']=$b."<b><b>The command was executed successfully :).<br>&nbsp;&nbsp;".$a." Users successfully deleted.&nbsp;&nbsp;</br></br></b><a href=../u/u.php>Users Management</a><br>";
						}
					}
				
				elseif($b=="Change Password")
				{
				$pass1=$_POST['pass1'];
				$pass=$_POST['pass'];
				if($pass1!=""&&$pass!="")
			{
				$o=`cat /etc/passwd `;
				$x=explode($a,$o);
				if($x[1]=="")
				   {
					$_SESSION['output']="<b><b>The command could not be executed successfully :(.<br>&nbsp;&nbsp;".$a." Users does not exists.&nbsp;&nbsp;</br></br></b><a href=../u/u.php>Try again</a><br>";
				   }
				else
					{
					if($pass1!=$pass)
						{
							$_SESSION['output']="<b><b>The command could not be executed successfully :(.<br>&nbsp;&nbsp; Password do not match.&nbsp;&nbsp;</br></br></b><a href=../u/u.php>Try again</a><br>";
						}
					else
						{
					$b=`echo $pass | sudo passwd --stdin $a`;
					$_SESSION['output']=$b."<b><b>The command was executed successfully :).<br>&nbsp;&nbsp;".$a." Users password was successfully changed.&nbsp;&nbsp;</br></br></b><a href=../u/u.php>Users Management</a><br>";
						}
 		             }		
			        }
				}
				}
				}
				if ($b=="Show Existing Users")
				{
				$m=" ";
				$a=`sudo cat /etc/passwd`;
					$b=explode("
",$a);
					$l='<table width=100% style="font:normal 12px;">
					<caption>All Existing Users</caption>
					<tr bgcolor=#ccc height="30px">
					<td ><b>User Name</b></td>
					<td ><b>Usr ID</b></td>
					<td ><b>Grp ID</b></td>
					<td ><b>Full Name</b></td>
					<td ><b>Home Directory</b></td>		
					<td ><b>Shell</b></td>
					</tr>';					
					for($i=0,$d=1;$i<200;$i++)
				   {
					if($b[$i]==""){break;}
				   else{
					$c=explode(":",$b[$i]);
					$m=$m.'
					<tr height="30px">
					<td >'.$c[0].'</td>
					<td >'.$c[2].'</td>
					<td >'.$c[3].'</td>
					<td>'.$c[4].'</td>
					<td>'.$c[5].'</td>
					<td>'.$c[6].'</td>
					</tr>
					';
					$d++;
					}
				    }
					$_SESSION['output']=" ".$l.$m."</table>"."<br>Total ".$d." Users<br><b><br><a href=../u/u.php>Users Management</a></b><br>";
				}
			}
header("location:../functions/output.php");
?>