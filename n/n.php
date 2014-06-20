<?php require_once ('../template/header.php');
echo '<title>NETMIN: Network Interface Management</title></head>
 <section id="content">

        <div class="block">
            <div class="inner width-2">
                <div class="box-login">
                    <div class="head">
                        <h2 class="heading-title">Network Interfaces</h2><em> <h3>Select the action to perform</h3></em>
</div>
                    <div class="box-form">
					
                        <form action="check.php" method="post" >
<p>&emsp;&emsp;&emsp;<input type="radio" name="typed" id="input" value="0" checked="checked" onchange="return selectp(form)">
<span>Add Interface &emsp;&emsp;</span>
<input type="radio" name="typed" id="input" value="1" onchange="return selectp(form)"><span>Delete Interface</span><br>
<script>
function selectp(thisform){
var protocol=thisform.opt.value;
var add=thisform.typed.value;
if (protocol=="Real Interface")
{
thisform.virtual.type="hidden";
return false;
}
if (protocol=="Virtual Interface")
{
thisform.virtual.type="text";
return false;
}
if (add=="0")
{
thisform.ip.type="text";
thisform.network.type="text";
thisform.netmask.type="text";
thisform.broadcast.type="text";
return false;
}
if (add=="1")
{
thisform.ip.type="hidden";
thisform.network.type="hidden";
thisform.netmask.type="hidden";
thisform.broadcast.type="hidden";
return false;
}
}
</script>
<p>
Select type of Interface<select name="opt" class="text-input focus" required onchange="return selectp(form)"></p>
<option> </option>
<option>Real Interface</option>
<option>Virtual Interface</option>				
</select>
							<p><input type="text" name="name" placeholder="Interface Name" required pattern="[.A-Za-z0-9]{1,50}" class="text-input focus"><input type="hidden" name="virtual" placeholder="Virtual Interface No." required pattern="[0-9]{1,5}" class="text-input focus"></p>
							<p><input type="text" name="ip" placeholder="IP Address *.*.*.*" required pattern="[.0-9]{7,15}" class="text-input focus"></p>
							<p><input type="text" name="network" placeholder="Network Address *.*.*.*" required pattern="[.0-9]{7,15}" class="text-input focus"></p>
							<p><input type="text" name="netmask" placeholder="Subnet Mask Address *.*.*.*" required pattern="[.0-9]{7,15}" class="text-input focus"></p>
							<p><input type="text" name="broadcast" placeholder="Broadcast Address *.*.*.*" required pattern="[.0-9]{7,15}" class="text-input focus"></p>
<p><input type="submit" name="submit" value="Execute" class="button large bold"></p></form> </div>
<div class="box-form">
					
                        <form action="check.php" method="post" >
						<p><input type="submit" name="show" value="Show existing Interfaces" class="button large bold"></p>
						<p><input type="submit" name="subm" value="Apply Changes" class="button large bold"></p>
						</form></div>
                </div>
            </div>
        </div>
    </section>
 </body>
</html>';
?>