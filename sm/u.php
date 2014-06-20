<?php require_once ('../template/header.php');
echo '<title>NETMIN: SAMBA Windows sharing</title></head>
 <section id="content">

        <div class="block">
            <div class="inner width-2">
                <div class="box-login">
                    <div class="head">
                        <h2 class="heading-title">SAMBA Windows sharing</h2><em> <h3>SAMBA User Management</h3></em>
</div>
                    <div class="box-form">
					
                        <form method="post" name="form" action="check.php">
<p><select name="opt" class="text-input focus" required onchange="return selectp(form)"></p>
<option> </option>
<option>Convert Unix users to SAMBA Users</option>
<option>Change Password of SAMBA Users</option>
</select>
<script>
function selectp(thisform){
var protocol=thisform.opt.value;
if (protocol=="Convert Unix users to SAMBA Users")
{
thisform.user.type="text";
thisform.pass.type="hidden";
thisform.pass1.type="hidden";
return false;
}
if (protocol=="Change Password of SAMBA Users")
{
thisform.user.type="text";
thisform.pass.type="password";
thisform.pass1.type="password";
return false;
}
}
</script>						
<p><input type="text" class="text-input focus" name="user" placeholder="Enter the Users Name" required pattern="[A-za-z]{1,50}"/></p>
<p><input type="text" class="text-input focus" name="pass" placeholder="Enter the Password" required /></p>
<p><input type="text" class="text-input focus" name="pass1" placeholder="Enter the Password Again" required/></p>
<p><input type="submit" name="execute" value="Execute" class="button large bold"></p>
</form></div><div class="box-form">
					
                        <form action="check.php" method="post" >
						<p><input type="submit" name="show" value="Show existing Shares" class="button large bold"></p>
						<p><input type="submit" name="sub" value="Restart SAMBA Servers" class="button large bold"></p>
						</form></div>
                </div>
            </div>
        </div>
    </section>
 </body>
</html>';
?>