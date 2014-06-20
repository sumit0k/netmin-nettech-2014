<?php require_once ('../template/header.php');
echo '<title>NETMIN: File/Folder Management</title></head>
 <section id="content">

        <div class="block">
            <div class="inner width-2">
                <div class="box-login">
                    <div class="head">
                        <h2 class="heading-title">File/Folder Management</h2><em> <h3>Show list of existing Files of Folder</h3></em>
</div>
                    <div class="box-form">
					
                        <form method="post" name="form" action="check.php">
<p><input type="text" class="text-input focus" name="path" placeholder="Enter the Folder absolute path" required pattern="[/.A-za-z0-9-_]{1,50}"/></p>
<p><input type="submit" name="show" value="List All" class="button large bold"></p>
</form></div>
                </div>
            </div>
        </div>
    </section>
 </body>
</html>';
?>