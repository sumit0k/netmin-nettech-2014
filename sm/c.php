<?php require_once ('../template/header.php');
echo '<title>NETMIN: SAMBA Windows sharing</title></head>
 <section id="content">

        <div class="block">
            <div class="inner width-2">
                <div class="box-login">
                    <div class="head">
                        <h2 class="heading-title">SAMBA Windows sharing</h2><em> <h3>Create a New File Share</h3></em>
</div>
                    <div class="box-form">
					
                        <form action="check.php" method="post" >
							<p><input type="text" name="share" placeholder="Share Name" required class="text-input focus"><p></p><input type="text" name="dir" placeholder="Directory/Folder To Share(Absolute Path)" required class="text-input focus"></p>
							<p>Do you want to make File Share Writable&emsp;&emsp;&emsp;&emsp; <input type="radio" name="typed" id="input" value="0" checked="checked" ">
<span>Yes &emsp;&emsp;</span>
<input type="radio" name="typed" id="input" value="1" "><span>No</span></p>
							<p><input type="text" name="comment" placeholder="Any comment to be attached" required class="text-input focus"></p>
							<p><input type="text" name="filemode" placeholder="New Unix File Creation Mode  [optional]" required class="text-input focus"></p>
							<p><input type="text" name="dirmode" placeholder="New Unix Directory Creation Mode  [optional]" required  class="text-input focus"></p>
							<p><input type="text" name="owner" placeholder="Owner Of New Files  [optional]" required  class="text-input focus"></p>
							<p><input type="text" name="group" placeholder="Group Of New Files  [optional]" required  class="text-input focus"></p>
							<p><input type="text" name="valid" placeholder="List of valid users separated by comma (,)" required  class="text-input focus"></p>
							<p><input type="text" name="invalid" placeholder="List of invalid users separated by comma (,)" required  class="text-input focus"></p>
<p><input type="submit" name="submit" value="Create File Share" class="button large bold"></p></form> </div>
<div class="box-form">
					
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