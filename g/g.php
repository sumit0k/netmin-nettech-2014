<?php require_once ('../template/header.php');
echo '<title>NETMIN: Linux Groups Management</title></head>
 <section id="content">

        <div class="block">
            <div class="inner width-2">
                <div class="box-login">
                    <div class="head">
                        <h2 class="heading-title">Linux Groups</h2><em> <h3>Select the function you want to perform</h3></em>
</div>
                    <div class="box-form">
					
                        <form method="post" name="form" action="check.php">
<p><select name="opt" class="text-input focus" required pattern="[A-Za-z]" onchange="return selectp(form)"></p>
<option> </option>
<option>Add Group</option>
<option>Delete Group</option>				
<option>Show Existing Groups</option>
</select>
<script>
function selectp(thisform){
var protocol=thisform.opt.value;
if (protocol=="Show Existing Groups")
{
thisform.group.type="hidden";
return false;
}
if (protocol=="Add Group" || protocol=="Delete Group")
{
thisform.group.type="text";
if (protocol=="Delete Group")
thisform.group.placeholder="Enter the Group Name (Primary group would not be deleted)";
return false;
}
}
</script>						
<p><input type="text" class="text-input focus" name="group" placeholder="Enter the Group Name" required pattern="[A-za-z]{1,50}"/></p>
<p><input type="submit" name="execute" value="Execute" class="button large bold"></p>
</form></div>
                </div>
            </div>
        </div>
    </section>
 </body>
</html>';
?>