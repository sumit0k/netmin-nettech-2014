<?php
if (substr_count($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip')) ob_start("ob_gzhandler"); else ob_start();
	session_start();
$m="";
if(isset($_POST['rpro']))
	{
	$a=`sudo ps -axu`;
			 $b=explode("
",$a);
					$l='<table  style="font:normal 14px;" width=100%>
					<caption>All running Processes</caption>
					<tr bgcolor="#ccc" height="30px">
					<td ><b>User </b></td>
					<td ><b>PID </b></td>
					<td ><b>%CPU </b></td>
					<td ><b>%MEM </b></td>
					<td ><b>VSZ </b></td>
					<td ><b>RSS </b></td>
					<td ><b>TTY </b></td>
					<td ><b>START </b></td>
					<td ><b>TIME </b></td>
					<td ><b>COMMAND</b></td>
					<td ><b>STAT</b></td>
					</tr>';					
					for($i=1, $c=0;$i<200;$i++)
				   {
					if($b[$i]==""){break;}
				   else{$c++;
					$d=preg_split( "/\s+/",$b[$i]);
					$m=$m.'
					<tr height="30px">
					<td >'.$d[0].'</td>
					<td >'.$d[1].'</td>
					<td >'.$d[2].'</td>
					<td >'.$d[3].'</td>
					<td >'.$d[4].'</td>
					<td >'.$d[5].'</td>
					<td >'.$d[6].'</td>
					<td >'.$d[8].'</td>
					<td >'.$d[9].'</td>
					<td >'.$d[10].'</td>
					<td >'.$d[7].'</td>
					</tr>
					';
					}
				    }
					$_SESSION['output']=" ".$l.$m."</table>"."<br>Total ".$c." Processes<br><b><br><a href=../p/i.php>Show More Information</a></b><br>";
	}
if(isset($_POST['pro']))
	{
	$a=`sudo ps -U root -u root -N`;
			 $b=explode("
",$a);
					$l='<table  style="font:normal 14px;" width=100%>
					<caption>Processes not running as root</caption>
					<tr bgcolor="#ccc" height="30px">
					<td ><b>Sno. </b></td>
					<td ><b>PID </b></td>
					<td ><b>TTY </b></td>
					<td ><b>TIME </b></td>
					<td ><b>COMMAND</b></td>
					</tr>';					
					for($i=1,  $c=1;$i<200;$i++,$c++)
				   {
					if($b[$i]==""){break;}
				   else{
					$d=preg_split( "/\s+/",$b[$i]);
					$m=$m.'
					<tr height="30px">
					<td >'.$c.'</td>
					<td >'.$d[1].'</td>
					<td >'.$d[2].'</td>
					<td >'.$d[3].'</td>
					<td >'.$d[4].'</td>
					</tr>
					';
					}
				    }
					$_SESSION['output']=" ".$l.$m."</table>"."<b><br><a href=../p/i.php>Show More Information</a></b><br>";
	}
if(isset($_POST['sec']))
	{
	$a=`sudo ps -eM`;
			 $b=explode("
",$a);
					$l='<table  style="font:normal 14px;" width=100%>
					<caption>Processes Security Information</caption>
					<tr bgcolor="#ccc" height="30px">
					<td ><b>Sno. </b></td>
					<td ><b>LABEL </b></td>
					<td ><b>PID </b></td>
					<td ><b>TTY </b></td>
					<td ><b>TIME </b></td>
					<td ><b>COMMAND</b></td>
					</tr>';					
					for($i=1,  $c=1;$i<200;$i++,$c++)
				   {
					if($b[$i]==""){break;}
				   else{
					$d=preg_split( "/\s+/",$b[$i]);
					$m=$m.'
					<tr height="30px">
					<td >'.$c.'</td>
					<td >'.$d[0].'</td>
					<td >'.$d[1].'</td>
					<td >'.$d[2].'</td>
					<td >'.$d[3].'</td>
					<td >'.$d[4].'</td>
					</tr>
					';
					}
				    }
					$_SESSION['output']=" ".$l.$m."</table>"."<b><br><a href=../p/i.php>Show More Information</a></b><br>";
	}
if(isset($_POST['thr']))
	{
	$a=`sudo ps -eLF`;
			 $b=explode("
",$a);
					$l='<table  style="font:normal 14px;" width=100%>
					<caption>Processes Threads Information</caption>
					<tr bgcolor="#ccc" height="30px">
					<td ><b>User </b></td>
					<td ><b>PID </b></td>
					<td ><b>PPID </b></td>
					<td ><b>LWP </b></td>
					<td ><b>C </b></td>
					<td ><b>NLWP </b></td>
					<td ><b>SZ </b></td>
					<td ><b>RSS</b></td>
					<td ><b>STIME</b></td>
					<td ><b>TTY</b></td>
					<td ><b>COMMAND</b></td><td ><b>TIME</b></td>
					</tr>';					
					for($i=1, $c=0;$i<200;$i++)
				   {
					if($b[$i]==""){break;}
				   else{$c++;
					$d=preg_split( "/\s+/",$b[$i]);
					$m=$m.'
					<tr height="30px">
					
					<td >'.$d[0].'</td>
					<td >'.$d[1].'</td>
					<td >'.$d[2].'</td>
					<td >'.$d[3].'</td>
					<td >'.$d[4].'</td>
					<td >'.$d[5].'</td>
					<td >'.$d[6].'</td>
					<td >'.$d[7].'</td>
					<td >'.$d[9].'</td>
					<td >'.$d[10].'</td>
					<td >'.$d[12].'</td>
					<td >'.$d[11].'</td>
					</tr>
					';
					}
				    }
					$_SESSION['output']=" ".$l.$m."</table>"."<br>Total ".$c." Threads<br><b><br><a href=../p/i.php>Show More Information</a></b><br>";
	}
if(isset($_POST['proc']))
	{
	$a=`sudo ps -axu`;
			 $b=explode("
",$a);
					$l='<table  style="font:normal 14px;" width=100%>
					<caption>All running Processes</caption>
					<tr bgcolor="#ccc" height="30px">
					<td ><b>User </b></td>
					<td ><b>PID </b></td>
					<td ><b>TTY </b></td>
					<td ><b>START </b></td>
					<td ><b>TIME </b></td>
					<td ><b>COMMAND</b></td>
					</tr>';					
					for($i=1, $c=0;$i<200;$i++)
				   {
					if($b[$i]==""){break;}
				   else{$c++;
					$d=preg_split( "/\s+/",$b[$i]);
					$m=$m.'
					<tr height="30px">
					<td >'.$d[0].'</td>
					<td >'.$d[1].'</td>
					<td >'.$d[6].'</td>
					<td >'.$d[8].'</td>
					<td >'.$d[9].'</td>
					<td >'.$d[10].'</td>
					</tr>
					';
					}
				    }
					$_SESSION['output']=" ".$l.$m."</table>".'<div class="box-form">
<br>Total '.$c.' Processes<br><b><br><a href=../p/i.php>Show More Information</a></b>
				<form action="../p/check.php" method="post">
<input type="text" name="pid" placeholder="Enter the PID of Process to Kill" required pattern="[0-9]{1,4}" class="text-input focus">
<br><input type="submit" name="pkill" value="KILL" class="button large bold">
                        </form>';
	}
if (isset($_POST['pkill']))
	{
$a=$_POST['pid'];
					if($a=="")
					$_SESSION['output']="<b><b>The command could not be executed successfully :(.<br>&nbsp;&nbsp;The PID could not be left blank&nbsp;&nbsp;</br></br></b><a href=../p/i.php>Try again</a><br>";
					$e=`sudo ps -A | grep $a`;
					if($e=="")
					$_SESSION['output']="<b><b>The command could not be executed successfully :(.<br>&nbsp;&nbsp;The PID provided does not exists&nbsp;&nbsp;</br></br></b><a href=../p/i.php>Try again</a><br>";
					else
					{
						$f=`sudo kill -9 $a`;
						$_SESSION['output']="<b><b>The command was executed successfully .<br>&nbsp;&nbsp;The Process with PID ".$a." was killed&nbsp;&nbsp;</br></br></b><a href=../p/i.php>Process Management</a><br>";
					}
				}
if(isset($_POST['users']))
	{
	$a=`sudo who -u`;
			 $b=explode("
",$a);
					$l='<table  style="font:normal 14px;" width=100%>
					<caption>All Logged in users </caption>
					<tr bgcolor="#ccc" height="30px">
					<td ><b>Sr. No.</b></td>
					<td ><b>User </b></td>
					<td ><b>TTY </b></td>
					<td ><b>DATE </b></td>
					<td ><b>TIME </b></td>
					<td ><b>Duration </b></td>
					<td ><b>PID</b></td>
					</tr>';					
					for($i=0, $c=0;$i<200;$i++)
				   {
					if($b[$i]==""){break;}
				   else{$c++;
					$d=preg_split( "/\s+/",$b[$i]);
					$m=$m.'
					<tr height="30px">
					<td >'.$c.'</td>
					<td >'.$d[0].'</td>
					<td >'.$d[1].'</td>
					<td >'.$d[2].' '.$d[3].'</td>
					<td >'.$d[4].'</td>
					<td >'.$d[5].'</td>
					<td >'.$d[6].'</td>
					</tr>
					';
					}
				    }
					$_SESSION['output']=" ".$l.$m."</table>".'<div class="box-form">
<br>Total '.$c.' User(s)<br><b><br><a href=../p/i.php>Show More Information</a></b>
				<form action="../p/check.php" method="post">
<input type="text" name="pid" placeholder="Enter the PID of User to Kill" required pattern="[0-9]{1,4}" class="text-input focus">
<br><input type="submit" name="pkill" value="KILL" class="button large bold">
                        </form>';
	}
if (isset($_POST['pkill']))
	{
$a=$_POST['pid'];
					if($a=="")
					$_SESSION['output']="<b><b>The command could not be executed successfully :(.<br>&nbsp;&nbsp;The PID could not be left blank&nbsp;&nbsp;</br></br></b><a href=../p/i.php>Try again</a><br>";
					$e=`sudo who -u | grep $a`;
					if($e=="")
					$_SESSION['output']="<b><b>The command could not be executed successfully :(.<br>&nbsp;&nbsp;The PID provided does not exists&nbsp;&nbsp;</br></br></b><a href=../p/i.php>Try again</a><br>";
					else
					{
						$f=`sudo kill -9 $a`;
						$_SESSION['output']="<b><b>The command was executed successfully .<br>&nbsp;&nbsp;The User with PID ".$a." was killed&nbsp;&nbsp;</br></br></b><a href=../p/i.php>Process Management</a><br>";
					}
				}
header("location:../functions/output.php");
?>