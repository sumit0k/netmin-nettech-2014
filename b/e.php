<?php require_once ('../template/header.php');
echo '<title>NETMIN: Bind DNS Server Management</title></head>
 <section id="content">

        <div class="block">
            <div class="inner width-2">
                <div class="box-login">
                    <div class="head">
                        <h2 class="heading-title">Bind DNS Server</h2><em> <h3>Edit Master Zone</h3></em>
</div>
                    <div class="box-form">
					
                        <form method="post" name="form" action="check.php">
<p><select name="opt" class="text-input focus" required pattern="[A-Za-z]" onchange="return selectp(form)"></p>
<option> </option>
<option>Address Records</option>
<option>Name Server Records</option>				
<option>Name Alias Records</option>
<option>Mail Server Records</option>				
</select>
<script>
function selectp(thisform){
var protocol=thisform.opt.value;
if (protocol=="Address Records")
{
thisform.ip.type="text";
thisform.address.placeholder="Name of Address record";
return false;
}
if (protocol=="Name Server Records" || protocol=="Name Alias Records")
{
thisform.ip.type="hidden";
thisform.address.placeholder="Name Server record for Domain Name(must end with a .(dot))";
if (protocol=="Name Alias Records")
thisform.address.placeholder="Name Alias record for Domain Name(must end with a .(dot))";
return false;
}
if (protocol=="Mail Server Records")
{
thisform.ip.type="text";
thisform.address.placeholder="Mail Server record for Domain Name(must end with a .(dot))";
thisform.ip.placeholder="Priority (0-10)";
return false;
}
}
</script>						
<p><input type="text" class="text-input focus" name="domain" placeholder="Domain Name of Master Zone" required pattern="[/.A-za-z0-9]{1,80}"/></p>
<p><input type="text" class="text-input focus" name="address" placeholder="Address record for Domain Name(must end with a .(dot))" pattern="[/.A-za-z0-9]{1,80}"/></p>
<p><input type="text" class="text-input focus" name="ip" placeholder="IP Address" required pattern="[.0-9]{7,15}"/></p>
<p><input type="submit" name="execute" value="Create" class="button large bold"></p>
</form></div><div class="box-form">
					
                        <form action="check.php" method="post" >
						<p><input type="submit" name="show" value="Show existing Zones" class="button large bold"></p>
						<p><input type="submit" name="sub" value="Restart Name Server" class="button large bold"></p>
						</form></div>
                </div>
            </div>
        </div>
    </section>
 </body>
</html>';
?>