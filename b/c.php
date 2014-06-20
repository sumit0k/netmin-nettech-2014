<?php require_once ('../template/header.php');
echo '<title>NETMIN: Bind DNS Server Management</title></head>
 <section id="content">

        <div class="block">
            <div class="inner width-2">
                <div class="box-login">
                    <div class="head">
                        <h2 class="heading-title">Bind DNS Server</h2><em> <h3>Create Zones</h3></em>
</div>
                    <div class="box-form">
					
                        <form action="check.php" method="post" >
						<script>
function selectp(thisform){
var protocol=thisform.opt.value;
if (protocol=="Master Zone")
{
thisform.email.placeholder="Email address";
thisform.email.pattern="[.A-Za-z0-9@]{10,80}";
return false;
}
if (protocol=="Slave Zone"||protocol=="Forward Zone")
{
thisform.email.placeholder="IP Address of Master Zone";
thisform.email.pattern="[.0-9]{7,15}";
return false;
}
}
</script>
<p>
Select type of Interface<select name="opt" class="text-input focus" required onchange="return selectp(form)"></p>
<option> </option>
<option>Master Zone</option>
<option>Slave Zone</option>
<option>Forward Zone</option>
</select>
							<p><input type="text" name="domain" placeholder="Domain Name" required pattern="[.A-Za-z0-9]{1,50}" class="text-input focus"></p>
							<p><input type="email" name="email" placeholder="Email address" required pattern="[.A-Za-z0-9@]{10,80}" class="text-input focus"></p>
<p><input type="submit" name="submit" value="Create" class="button large bold"></p></form> </div>
<div class="box-form">
					
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