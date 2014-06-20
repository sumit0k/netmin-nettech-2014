<?php
if (substr_count($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip')) ob_start("ob_gzhandler"); else ob_start();
	session_start();
			if(isset($_POST['submit']))
			{
			$a=$_POST['share'];
				$b=$_POST['dir'];
				$d=$_POST['comment'];
				$z=$_POST['filemode'];
				$m=$_POST['dirmode'];
				$n=$_POST['owner'];
				$y=$_POST['valid'];
				$w=$_POST['group'];
				$u=$_POST['invalid'];
				$f=`sudo find $b`;
			if($f=="")
				{
				    $_SESSION['output']="<b><b>The command could not be executed successfully :(.<br>&nbsp;&nbsp;".$b."Folder in Path does not exists.&nbsp;&nbsp;</br></br></b><a href=../sm/c.php>Try again</a><br>";
				}
		else
	  {			
			
				$search=`sudo cat /etc/samba/smb.conf | grep -w $a`;
				if($search!="")
				{
				$_SESSION['output']="<b><b>The command could not be executed successfully :(.<br>&nbsp;&nbsp;".$a." Share name already exists.&nbsp;&nbsp;</br></br></b><a href=../sm/c.php>Try again</a><br>";
				}
		       else
	 	{
				$e=`sudo touch a.sh`;
				$e=`sudo chmod 777 a.sh`;
				$e=`echo "echo ' 
[$a] ' >> /etc/samba/smb.conf" > a.sh`;
				$e=`sudo bash a.sh`;
	 			$e=`sudo rm -rf a.sh`;

				$k=`sudo cat /etc/passwd `;
				$l=explode($n,$k);
				if($l[1]=="")
				   {
					$_SESSION['output']="<b><b>The command could not be executed successfully :(.<br>&nbsp;&nbsp;".$n." User does not exists.&nbsp;&nbsp;</br></br></b><a href=../sm/c.php>Try again</a><br>";
				   }
		
				$x=explode(",",$y);
				for($q=0;$q<30;$q++)
				{
				$t=explode($x[$q],$k);
				if($t[1]==""&&$x[$q]!="")
				   {
					$v=1;
					$_SESSION['output']="<b><b>The command could not be executed successfully :(.<br>&nbsp;&nbsp;".$x[$q]." User does not exists.&nbsp;&nbsp;</br></br></b><a href=../sm/c.php>Try again</a><br>";
				    }
				 }
				if($v!=1&&$y!="")
				   {  
					$q=`sudo touch k.sh`;
					$q=`sudo chmod 777 k.sh`;
					$q=`echo "echo '      valid users = $y ' >> /etc/samba/smb.conf" > k.sh`;
					$q=`sudo bash k.sh`;
					$q=`sudo rm -rf k.sh`;	
				   }				

				$o=`sudo cat /etc/group `;
				$gr=explode($w,$o);
				if($gr[1]=="")
				   {
					$_SESSION['output']="<b><b>The command could not be executed successfully :(.<br>&nbsp;&nbsp;".$w." Group does not exists.&nbsp;&nbsp;</br></br></b><a href=../sm/c.php>Try again</a><br>";
				   }
				$in=explode(",",$u);
				for($vr=0;$vr<30;$vr++)
				{
				$ex=explode($in[$vr],$k);
				if($ex[1]==""&&$in[$vr]!="")
				   {
					$flag=1;
					$_SESSION['output']="<b><b>The command could not be executed successfully :(.<br>&nbsp;&nbsp;".$in[$vr]." User does not exists.&nbsp;&nbsp;</br></br></b><a href=../sm/c.php>Try again</a><br>";
				    }
				 }
				if($flag!=1&&$u!="")
				   {  
					$inv=`sudo touch k.sh`;
					$inv=`sudo chmod 777 k.sh`;
					$inv=`echo "echo '      invalid users = $u ' >> /etc/samba/smb.conf" > k.sh`;
					$inv=`sudo bash k.sh`;
					$inv=`sudo rm -rf k.sh`;	
				   }


				if($_POST['comment']!="")
				{	$g=`sudo touch p.sh`;
					$g=`sudo chmod 777 p.sh`;
					$g=`sudo echo "echo '      comment =  $d ' >> /etc/samba/smb.conf" > p.sh`;
					$g=`sudo bash p.sh`;
					$g=`sudo rm -rf p.sh`;	
				}
					$h=`sudo touch c.sh`;
					$h=`sudo chmod 777 c.sh`;
					$h=`echo "echo '      path = $b ' >> /etc/samba/smb.conf" > c.sh`;
					$h=`sudo bash c.sh`;
					$h=`sudo rm -rf c.sh`;	
					if($_POST['typed']=="0")
					{
					$h=`sudo touch d.sh`;
				$h=`sudo chmod 777 d.sh`;
					$h=`echo "echo '      writable = yes ' >> /etc/samba/smb.conf" > d.sh`;
				$h=`sudo bash d.sh`;
				$h=`sudo rm -rf d.sh`;
					}
					else
					{
					$i=`sudo touch d.sh`;
				$i=`sudo chmod 777 d.sh`;
				$i=`echo "echo '      writable = no ' >> /etc/samba/smb.conf" > d.sh`;
				$i=`sudo bash d.sh`;
				$i=`sudo rm -rf d.sh`;
					}
				if($_POST['filemode']!="")
					{
					$j=`sudo touch q.sh`;
					$j=`sudo chmod 777 q.sh`;
					$j=`sudo echo "echo '      create mode = $z ' >> /etc/samba/smb.conf" > q.sh`;
					$j=`sudo bash q.sh`;
					$j=`sudo rm -rf q.sh`;	
					}
				if($_POST['dirmode']!="")
					{
					$j=`sudo touch m.sh`;
					$j=`sudo chmod 777 m.sh`;
					$j=`sudo echo "echo '      directory mode = $m ' >> /etc/samba/smb.conf" > m.sh`;
					$j=`sudo bash m.sh`;
					$j=`sudo rm -rf m.sh`;	
					}
				if($l[1]!="")
					{
				$j=`sudo touch k.sh`;
					$j=`sudo chmod 777 k.sh`;
					$j=`sudo echo "echo '      force user = $n ' >> /etc/samba/smb.conf" > k.sh`;
					$j=`sudo bash k.sh`;
					$j=`sudo rm -rf k.sh`;
					}
					if($gr[1]!="")
					{
				$gro=`sudo touch k.sh`;
					$gro=`sudo chmod 777 k.sh`;
					$gro=`sudo echo "echo '      force group = $w ' >> /etc/samba/smb.conf" > k.sh`;
					$gro=`sudo bash k.sh`;
					$gro=`sudo rm -rf k.sh`;
					}

				$_SESSION['output']=$b."<b><b>The command was executed successfully :).<br>&nbsp;&nbsp;".$a." File Share created successfully.&nbsp;&nbsp;</br></br></b><a href=../sm/c.php>Create SAMBA File Share</a><br></br></b><a href=../sm/check.php>List all SAMBA File Shares</a><br>";
				}	
			}
			}			
			elseif(isset($_POST['execute']))
			{$a=$_POST['name'];
			$x=$_POST['opt'];
			if($x=="Convert Unix users to SAMBA Users")
			{$o=`cat /etc/passwd `;
				$c=explode($a,$o);
				if($c[1]=="")
				   {
					$_SESSION['output']="<b><b>The command could not be executed successfully :(.<br>&nbsp;&nbsp;User does not exists.&nbsp;&nbsp;</br></br></b><a href=../sm/u.php>Try again</a><br>";
				   }
				else
                                   {
				$b=`sudo smbpasswd -a $a`;
				$_SESSION['output']=$b."<b><b>The command was executed successfully :).<br>&nbsp;&nbsp;".$a." User converted to SAMBA user.&nbsp;&nbsp;</br></br></b><a href=../sm/u.php>SAMBA User Management</a><br>";
				   }}
			elseif($x=="Change Password of SAMBA Users")
			{
				$pass1=$_POST['pass1'];
				$pass=$_POST['pass'];
				$p=`sudo cat /etc/passwd`;
				$r=explode($a,$p);
				if($r[1]=="")
				   {
					$_SESSION['output']="<b><b>The command could not be executed successfully :(.<br>&nbsp;&nbsp;User does not exists.&nbsp;&nbsp;</br></br></b><a href=../sm/u.php>Try again</a><br>";
				   }
				else
                               {
				$o=`sudo cat /etc/samba/smbpasswd`;
				$b=explode($a,$o);
				if($b[1]=="")
				   {
					$_SESSION['output']="<b><b>The command could not be executed successfully :(.<br>&nbsp;&nbsp;SAMBA User does not exists (only Normal User is present).&nbsp;&nbsp;</br></br></b><a href=../sm/u.php>Try again</a><br>";
				   }
				else
                                      {
					if($pass1!=$pass)
						{
							$_SESSION['output']="<b><b>The command could not be executed successfully :(.<br>&nbsp;&nbsp;Passwords do not match.&nbsp;&nbsp;</br></br></b><a href=../sm/u.php>Try again</a><br>";
						}
					else
						{
					$c=`sudo touch passwd.sh`;
					$c=`echo "echo $pass1 | smbpasswd --stdin $a " > passwd.sh`;
					$c=`sudo bash passwd.sh`;
					$c=`sudo rm -rf passwd.sh`;
					$_SESSION['output']=$b."<b><b>The command was executed successfully :).<br>&nbsp;&nbsp;".$a." Users Password changed successfully.&nbsp;&nbsp;</br></br></b><a href=../sm/u.php>SAMBA User Management</a><br>";
					}
				}
			}
			}
			}
			elseif(isset($_POST['sub']))
			{
				$i=`sudo service smb restart`;
				$_SESSION['output']=$i."<br><br>The changes have been applied successfully<br><a href=../sm/c.php>Create new File Share</a><br>";
			}
			else
			{
				$m=" ";
				$a=`sudo cat /etc/samba/smb.conf`;
					$b=explode("
[",$a);
					$l='<table width=100%>
					<caption>All Existing Shares</caption>
					<tr bgcolor=#ccc height="30px">
					<td ><b>Sno.</b></td>	
					<td ><b>Share Name</b></td>		
					</tr>';					
					for($i=2,$d=1;$i<200;$i++)
				   {
					if($b[$i]==""){break;}
				   else{
					$c=explode("]",$b[$i]);
					$m=$m.'
					<tr height="30px">
					<td >'.$d.'</td>
					<td >'.$c[0].'</td>
					</tr>
					';
					$d++;
					}
				    }
					$_SESSION['output']=" ".$l.$m."</table>"."<b><br><a href=../sm/c.php>Create new File Share</a></b><br>";
			}
header("location:../functions/output.php");
?>