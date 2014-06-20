<?php require_once ('../template/header.php');
echo '<title>NETMIN: Firewall Management</title></head>
 <section id="content">

        <div class="block">
            <div class="inner width-2">
                <div class="box-login">
                    <div class="head">
                        <h2 class="heading-title">Linux Firewall</h2><em> <h3>Select the Configuration you want to insert</h3></em>
</div>
                    <div class="box-form">
					
                        <form method="post" name="form" action="check.php">
<p><select name="protocol" class="text-input focus" required pattern="[A-Za-z]" onchange="return selectp(form)"></p>
<option> </option>
<option>TCP Configuration</option>
<option>ICMP Configuration</option>				
</select>
<script>
function selectp(thisform){
var protocol=thisform.protocol.value;
if (protocol=="ICMP Configuration")
{
thisform.port.type="hidden";
return false;
}
if (protocol=="TCP Configuration")
{
thisform.port.type="text";
return false;
}
}
</script>						
<p>How to modify the connections<select name="input" class="text-input focus" required pattern="[A-Z]{4,5}">
<option></option>
<option>INPUT</option>
<option>OUTPUT</option>				
</select></p>
<p>What to do to connections<select name="accept" class="text-input " required pattern="[A-Z]{4,6}">
<option></option>
<option>ACCEPT</option>
<option>REJECT</option>
<option>DROP</option>				
</select></p>
<p><input type="text" class="text-input focus" name="port" placeholder="Enter the Port No." required pattern="[0-9]{1,5}"/></p>
<p><input type="text" class="text-input focus" name="ip" required pattern="[/.0-9]{7,15}" placeholder="Enter the IP Address (in CIDR format *.*.*.*/xx)"/></p>
<p><input type="submit" name="configure" value="Configure" class="button large bold"></p>
</form></div>
<div class="box-form">
					
                        <form method="post" action="check.php"><input type="submit" name="save" value="Save Firewall Configuration" class="button large bold"></p>
<p><input type="submit" name="flush" value="Flush Firewall Configuration" class="button large bold"></p>
<p><input type="submit" name="rule" value="List all Firewall Rules" class="button large bold"></p>
</form> </div>
                </div>
            </div>
        </div>
    </section>
 </body>
</html>';
?>