<?php require_once ('../template/header.php');
echo '<title>NETMIN: Linux Users Management</title></head>
 <section id="content">

        <div class="block">
            <div class="inner width-2">
                <div class="box-login">
                    <div class="head">
                        <h2 class="heading-title">Linux Users</h2><em> <h3>Select the function you want to perform</h3></em>
</div>
                    <div class="box-form">
					
                        <form method="post" name="form" action="check.php">
<p><select name="opt" class="text-input focus" required onchange="return selectp(form)"></p>
<option> </option>
<option>Add Users</option>
<option>Delete Users</option>
<option>Change Password</option>				
<option>Show Existing Users</option>
</select>
<script>
function selectp(thisform){
var protocol=thisform.opt.value;
if (protocol=="Show Existing Users")
{
thisform.user.type="hidden";
thisform.pass.type="hidden";
thisform.pass1.type="hidden";
return false;
}
if (protocol=="Add Users")
{
thisform.user.type="text";
thisform.pass.type="password";
thisform.pass1.type="password";
return false;
}
if (protocol=="Delete Users")
{
thisform.user.type="text";
thisform.pass.type="hidden";
thisform.pass1.type="hidden";
return false;
}
if (protocol=="Change Password")
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
</form></div>
                </div>
            </div>
        </div>
    </section>
 </body>
</html>';
?>