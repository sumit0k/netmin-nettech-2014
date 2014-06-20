<?php
if (substr_count($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip')) ob_start("ob_gzhandler"); else ob_start();
	session_start();
	if (isset($_POST['perform']))
			{$x=$_POST['opt'];
				$a=$_POST['fname'];
				$b=$_POST['spath'];
				$d=$_POST['dpath'];
			if($b==""||$d=="")
			$_SESSION['output']="<b><b>The command could not be executed successfully :(.<br>&nbsp;&nbsp;Folder Path was not provided.&nbsp;&nbsp;</br></br></b><a href=../ff/m.php>Try again</a><br>";
	else
	{
				$c=`sudo find $b`;
				$e=`sudo find $d`;
				$f=`sudo find $d/$a`;
				$g=`sudo find $b/$a`;
				if ($c=="")
				{	 
					$_SESSION['output']="<b><b>The command could not be executed successfully :(.<br>&nbsp;&nbsp;Path ".$b." does not exists&nbsp;&nbsp;</br></br></b><a href=../ff/m.php>Try again</a><br>";
				}
				elseif ($e=="")
				{	 
					$_SESSION['output']="<b><b>The command could not be executed successfully :(.<br>&nbsp;&nbsp;Path ".$b." does not exists&nbsp;&nbsp;</br></br></b><a href=../ff/m.php>Try again</a><br>";
				}
				elseif($f!="")
				{
					$_SESSION['output']="<b><b>The command could not be executed successfully :(.<br>&nbsp;&nbsp;Path ".$d." already contains  File/Folder ".$a.".&nbsp;&nbsp;</br></br></b><a href=../ff/m.php>Try again</a><br>";
				}
				elseif($g=="")
				{
					$_SESSION['output']="<b><b>The command could not be executed successfully :(.<br>&nbsp;&nbsp;Path ".$b." does not contains  File/Folder ".$a.".&nbsp;&nbsp;</br></br></b><a href=../ff/m.php>Try again</a><br>";
				}
		else
		     {
			 if($x=="Copy")
			 {
			 $e=`sudo cp $b/$a $d`;
			 $_SESSION['output']="<b><b>The command was executed successfully :).<br>&nbsp;&nbsp;Path ".$d." now contains  copied File/Folder ".$a." from ".$b.".&nbsp;&nbsp;</br></br></b><a href=../ff/m.php>Copy/Move File/Folder</a><br>";
			 }
			 elseif($x=="Move")
			 {
			 $e=`sudo mv $b/$a $d`;
			 $_SESSION['output']="<b><b>The command was executed successfully :).<br>&nbsp;&nbsp;Path ".$d." now contains  moved File/Folder ".$a." from ".$b.".&nbsp;&nbsp;</br></br></b><a href=../ff/m.php>Copy/Move File/Folder</a><br>";
			 }
			 }
			 }
			 }
if (isset($_POST['change']))
			{$x=$_POST['opt'];
				$a=$_POST['fname'];
				$b=$_POST['path'];
				$f=$_POST['optval'];
			if($b=="")
			$_SESSION['output']="<b><b>The command could not be executed successfully :(.<br>&nbsp;&nbsp;Folder Path was not provided.&nbsp;&nbsp;</br></br></b><a href=../ff/c.php>Try again</a><br>";
	else
	{
				$c=`sudo find $b`;
				if ($c=="")
				{	 
					$_SESSION['output']="<b><b>The command could not be executed successfully :(.<br>&nbsp;&nbsp;Path ".$b." does not exists&nbsp;&nbsp;</br></br></b><a href=../ff/c.php>Try again</a><br>";
				}
		else
		     {
			 if($x=="Change Owner"){
			 $e=`sudo cat /etc/passwd | grep -w $f`;
				if($e=="")
				{
					$_SESSION['output']="<b><b>The command could not be executed successfully :(.<br>&nbsp;&nbsp;".$f." Owner does not exists.&nbsp;&nbsp;</br></br></b><a href=../ff/c.php>Try again</a><br>";	
				}	
			   else
		            {
				$g=`sudo chown $f $b/$a`;
				$_SESSION['output']="<b><b>The command was executed successfully :).<br>&nbsp;&nbsp;".$f." Owner is added to ".$b."/".$a.".&nbsp;&nbsp;</br></br></b><a href=../ff/c.php>Change Configuration</a><br>";
			    }
			 }
			 if($x=="Change Group"){
				$e=`sudo cat /etc/group | grep -w $f`;
				if($e=="")
				{
					$_SESSION['output']="<b><b>The command could not be executed successfully :(.<br>&nbsp;&nbsp;".$f." Group does not exists.&nbsp;&nbsp;</br></br></b><a href=../ff/c.php>Try again</a><br>";	
				}	
			   else
		            {
				$g=`sudo chgrp $f $b/$a`;
				$_SESSION['output']="<b><b>The command was executed successfully :).<br>&nbsp;&nbsp;".$f." Group is added to ".$b."/".$a.".&nbsp;&nbsp;</br></br></b><a href=../ff/c.php>Change Configuration</a><br>";
			    }
			 }
			 if($x=="Change Permission"){
				if($f>=0&&$f<=777)
				{
				$g=`sudo chmod $f $b/$a`;
				$_SESSION['output']="<b><b>The command was executed successfully :).<br>&nbsp;&nbsp;".$f." Permission is added to ".$b."/".$a.".&nbsp;&nbsp;</br></br></b><a href=../ff/c.php>Change Configuration</a><br>";		
				}	
			   else
		            {
					$_SESSION['output']="<b><b>The command could not be executed successfully :(.<br>&nbsp;&nbsp;".$f." Permission does not exists.&nbsp;&nbsp;</br></br></b><a href=../ff/c.php>Try again</a><br>";
					
				
			    }
			 
			 }
			 }
			 }
			 }
	
	
	
		if (isset($_POST['write']))
			{$x=$_POST['opt'];
				$a=$_POST['fname'];
				$b=$_POST['path'];
				$k=$_POST['comment'];
			if($b=="")
			$_SESSION['output']="<b><b>The command could not be executed successfully :(.<br>&nbsp;&nbsp;Folder Path was not provided.&nbsp;&nbsp;</br></br></b><a href=../ff/a.php>Try again</a><br>";
	else
	{
				$c=`sudo find $b`;
				if ($c=="")
				{	 
					$_SESSION['output']="<b><b>The command could not be executed successfully :(.<br>&nbsp;&nbsp;Path ".$b." does not exists&nbsp;&nbsp;</br></br></b><a href=../ff/a.php>Try again</a><br>";
				}
		else
		     {
			 if($x=="New Content")
			 {
				$l=`sudo touch write.sh`;
				$l=`sudo chmod 777 write.sh`;
				$l=`sudo echo "echo $k > $b/$a"> write.sh`;
				$l=`sudo bash write.sh`;
				$l=`sudo rm -rf write.sh`;
				$_SESSION['output']="<b><b>The command was executed successfully :).<br>&nbsp;&nbsp;Path ".$b." now does contains  File ".$a." with new content.&nbsp;&nbsp;</br></br></b><a href=../ff/a.php>Append/New Content to File</a><br>";
			 }
			 elseif($x=="Append Content")
			 {
				$l=`sudo touch write.sh`;
				$l=`sudo chmod 777 write.sh`;
				$l=`sudo echo "echo $k >> $b/$a"> write.sh`;
				$l=`sudo bash write.sh`;
				$l=`sudo rm -rf write.sh`;
				$_SESSION['output']="<b><b>The command was executed successfully :).<br>&nbsp;&nbsp;Path ".$b." now does contains  File ".$a." with appended content.&nbsp;&nbsp;</br></br></b><a href=../ff/a.php>Append/New Content to File</a><br>";
			 }
			 }
			 }
			 }
			
			
			
			if (isset($_POST['execute']))
			{$x=$_POST['opt'];
				$a=$_POST['fname'];
				$b=$_POST['path'];
			if($b=="")
			$_SESSION['output']="<b><b>The command could not be executed successfully :(.<br>&nbsp;&nbsp;Folder Path was not provided.&nbsp;&nbsp;</br></br></b><a href=../ff/n.php>Try again</a><br>";
	else
	{
				$c=`sudo find $b`;
				if ($c=="")
				{	 
					$_SESSION['output']="<b><b>The command could not be executed successfully :(.<br>&nbsp;&nbsp;Path ".$b." does not exists&nbsp;&nbsp;</br></br></b><a href=../ff/n.php>Try again</a><br>";
				}
		else
		     {
			 if ($x=="Create File")
				{
				$d=`sudo find $b/$a`;
				if($d!="")
				{
					$_SESSION['output']="<b><b>The command could not be executed successfully :(.<br>&nbsp;&nbsp;Path ".$b." already contains  File/Folder ".$a.".&nbsp;&nbsp;</br></br></b><a href=../ff/n.php>Try again</a><br>";
				}	
			else
				{
				$e=`sudo touch $b/$a`;	
				$_SESSION['output']="<b><b>The command was executed successfully :).<br>&nbsp;&nbsp;Path ".$b." now contains  File/Folder ".$a.".&nbsp;&nbsp;</br></br></b><a href=../ff/n.php>Create/Delete File/Folder</a><br>";
				}
				}
				elseif ($x=="Create Folder")
				{
				$d=`sudo find $b/$a`;
				if($d!="")
				{
					$_SESSION['output']="<b><b>The command could not be executed successfully :(.<br>&nbsp;&nbsp;Path ".$b." already contains  File/Folder ".$a.".&nbsp;&nbsp;</br></br></b><a href=../ff/n.php>Try again</a><br>";
				}	
			else
				{
				$e=`sudo mkdir $b/$a`;	
				$_SESSION['output']="<b><b>The command was executed successfully :).<br>&nbsp;&nbsp;Path ".$b." now contains  File/Folder ".$a.".&nbsp;&nbsp;</br></br></b><a href=../ff/n.php>Create/Delete File/Folder</a><br>";
				}
				}
				elseif ($x=="Delete")
				{
				$d=`sudo find $b/$a`;
				if($d=="")
				{
					$_SESSION['output']="<b><b>The command could not be executed successfully :(.<br>&nbsp;&nbsp;Path ".$b." does not contains  File/Folder ".$a.".&nbsp;&nbsp;</br></br></b><a href=../ff/n.php>Try again</a><br>";
				}
				else{
				
				$e=`sudo rm -rf $b/$a`;	
				$_SESSION['output']="<b><b>The command was executed successfully :).<br>&nbsp;&nbsp;Path ".$b." now does not contains  File/Folder ".$a.".&nbsp;&nbsp;</br></br></b><a href=../ff/n.php>Create/Delete File/Folder</a><br>";
				}
				}
			 }
			 }
				}
	
				if (isset($_POST['show']))
				{
				if($_POST['path']=="")
			$_SESSION['output']="<b><b>The command could not be executed successfully :(.<br>&nbsp;&nbsp;Folder Path was not provided.&nbsp;&nbsp;</br></br></b><a href=../ff/s.php>Try again</a><br>";
	else
	{
				$d=$_POST['path'];
				$c=`sudo find $d`;
				if ($c=="")
				{	 
					$_SESSION['output']="<b><b>The command could not be executed successfully :(.<br>&nbsp;&nbsp;Path ".$d." does not exists&nbsp;&nbsp;</br></br></b><a href=../ff/s.php>Try again</a><br>";
				}
		else
		     {
				$m=" ";
				$a=`sudo ls -la $d`;
					$b=explode("
",$a);
					$l='<table width=100% style="font:normal 12px;">
					<caption>All Existing Files/Folder</caption>
					<tr bgcolor=#ccc height="30px">
					<td ><b>S. No.</b></td>
					<td ><b>Permission</b></td>
					<td ><b>Owner</b></td>
					<td ><b>Group</b></td>
					<td ><b>Size</b></td>		
					<td ><b>Time Stamp</b></td>
					<td ><b>File/Folder</b></td>
					</tr>';
					for($i=1,$d=1;$i<200;$i++)
				   {
					if($b[$i]==""){break;}
				   else{
					$c=preg_split( "/\s+/",$b[$i]);
					$m=$m.'
					<tr height="30px">
					<td >'.$d.'</td>
					<td >'.$c[0].'</td>
					<td >'.$c[2].'</td>
					<td >'.$c[3].'</td>
					<td>'.$c[4].'</td>
					<td>'.$c[5].$c[6]." ".$c[7].'</td>
					<td>'.$c[8].'</td>
					</tr>
					';
					$d++;
					}
				    }
					$_SESSION['output']=" ".$l.$m."</table>"."<br>" .$b[0]." Connections<br><b><br><a href=../ff/s.php>List All File/Folder</a></b><br>";
				}
			}
			}
header("location:../functions/output.php");
?>