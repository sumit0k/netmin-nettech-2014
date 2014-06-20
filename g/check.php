<?php
if (substr_count($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip')) ob_start("ob_gzhandler"); else ob_start();
	session_start();
			if(isset($_POST['execute']))
			{
				
				$b=$_POST['opt'];
				if ($b=="Add Group" || $b=="Delete Group")
				{$a=$_POST['group'];
				if($a=="")
					{
						$_SESSION['output']="<b><b>The command could not be executed successfully :(.<br>&nbsp;&nbsp;Please enter the Group name&nbsp;&nbsp;</br></br></b><a href=../g/g.php>Try again</a><br>";
					}
			  	elseif($b=="Add Group")
					{
					$o=`cat /etc/group`;
					$x=explode($a,$o);
					if($x[1]!="")
				        $_SESSION['output']="<b><b>The command could not be executed successfully :(.<br>&nbsp;&nbsp;".$a." Group already exists.&nbsp;&nbsp;</br></br></b><a href=../g/g.php>Try again</a><br>";
					else
						{
					$b=`sudo groupadd $a`;
					$_SESSION['output']=$b."<b><b>The command was executed successfully :(.<br>&nbsp;&nbsp;".$a." Group successfully added.&nbsp;&nbsp;</br></br></b><a href=../g/g.php>Group Management</a><br>";
						}
					}
				elseif($b=="Delete Group")
					{
					$o=`cat /etc/group`;
					$x=explode($a,$o);
					if($x[1]=="")
				        $_SESSION['output']="<b><b>The command could not be executed successfully :(.<br>&nbsp;&nbsp;".$a." Group does not exists.&nbsp;&nbsp;</br></br></b><a href=../g/g.php>Try again</a><br>";
					else
						{
					$b=`sudo groupdel $a`;
					$_SESSION['output']=$b."<b><b>The command was executed successfully :(.<br>&nbsp;&nbsp;".$a." Group successfully deleted.&nbsp;&nbsp;</br></br></b><a href=../g/g.php>Group Management</a><br>";
						}
					}
					}
				if ($b=="Show Existing Groups")
				{
				$m=" ";
				$a=`sudo cat /etc/group`;
					$b=explode("
",$a);
					$l='<table width=100%>
					<caption>All Existing Groups (Groups with no members are only Primary Groups)</caption>
					<tr bgcolor=#ccc height="30px">
					<td ><b>Sno.</b></td>	
					<td ><b>Group Name</b></td>
					<td ><b>Group ID</b></td>
					<td ><b>Members</b></td>		
					</tr>';					
					for($i=0,$d=1;$i<200;$i++)
				   {
					if($b[$i]==""){break;}
				   else{
					$c=explode(":",$b[$i]);
					$m=$m.'
					<tr height="30px">
					<td >'.$d.'</td>
					<td >'.$c[0].'</td>
					<td >'.$c[2].'</td>
					<td>'.$c[3].'</td>
					</tr>
					';
					$d++;
					}
				    }
					$_SESSION['output']=" ".$l.$m."</table>"."<b><br><a href=../g/g.php>Group Management</a></b><br>";
				}
			}
header("location:../functions/output.php");
?>