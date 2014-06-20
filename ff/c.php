<?php require_once ('../template/header.php');
echo '<title>NETMIN: File/Folder Management</title></head>
 <section id="content">

        <div class="block">
            <div class="inner width-2">
                <div class="box-login">
                    <div class="head">
                        <h2 class="heading-title">File/Folder Management</h2><em> <h3>Change Configuration File/Folder</h3></em>
</div>
                    <div class="box-form">
					
                        <form method="post" name="form" action="check.php">
<p><select name="opt" class="text-input focus" required onchange="return selectp(form)"></p>
<option> </option>
<option>Change Owner</option>
<option>Change Group</option>
<option>Change Permission</option>
</select>
<script>
function selectp(thisform){
var protocol=thisform.opt.value;
if (protocol=="Change Owner")
{
thisform.optval.placeholder="New Owner";
return false;
}
if (protocol=="Change Group")
{
thisform.optval.placeholder="New Group";
return false;
}
if (protocol=="Change Permission")
{
thisform.optval.placeholder="New Permission in numeric form (0-7)";
thisform.optval.pattern="[0-7]{3}";
return false;
}
}
</script>
<p><input type="text" class="text-input focus" name="fname" placeholder="Enter the File/Folder name" required pattern="[.A-za-z0-9-_]{1,50}"/></p>
<p><input type="text" class="text-input focus" name="path" placeholder="Enter the File/Folder absolute path" required pattern="[/.A-za-z0-9-_]{1,50}"/></p>
<p><input type="text" class="text-input focus" name="optval" placeholder="What to Change" required pattern="[/.A-za-z0-9-_]{1,50}"/></p>
<p><input type="submit" name="change" value="Change" class="button large bold"></p>
</form></div>
                </div>
            </div>
        </div>
    </section>
 </body>
</html>';
?>