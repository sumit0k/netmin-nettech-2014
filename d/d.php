
<?php require_once ('../template/header.php');
echo '<title>NETMIN: Memory Management</title></head>
 <section id="content">

        <div class="block">
            <div class="inner width-2">
                <div class="box-login">
                    <div class="head">
                        <h2 class="heading-title">Memory Management</h2><em> <h3>Show Information</h3></em>
</div>
                    <div class="box-form">
					
                        <form action="check.php" method="post" >
                            <p><p><input type="submit" name="view" value="View Partition Table" class="button large bold"></p><p><input type="submit" name="free" value="Free Disk Space" class="button large bold"></p>
<p><input type="submit" name="ram" value="Status of RAM" class="button large bold"></p>
<p><input type="submit" name="mount" value="Mount Information" class="button large bold"></p><br>
</form> </div>

                </div>
            </div>
        </div>
    </section>
 </body>
</html>';
?>