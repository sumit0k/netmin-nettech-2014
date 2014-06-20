<?php require_once ('../template/header.php');
echo '<title>NETMIN: Process Management</title></head>
 <section id="content">

        <div class="block">
            <div class="inner width-2">
                <div class="box-login">
                    <div class="head">
                        <h2 class="heading-title">Process Management</h2><em> <h3>Show Information</h3></em>
</div>
                    <div class="box-form">
					
                        <form action="check.php" method="post" >
                            <p><p><input type="submit" name="rpro" value="All Running Processes" class="button large bold"></p><p><input type="submit" name="pro" value="Processes not Running as Root" class="button large bold"></p>
<p><input type="submit" name="sec" value="Security Information" class="button large bold"></p>
<p><input type="submit" name="thr" value="Threads Information" class="button large bold"></p><br>
							<p><input type="submit" name="proc" value="Kill Running Processes" class="button large bold"></p><p><input type="submit" name="users" value="Kill Logged in Users" class="button large bold"></p></form> </div>

                </div>
            </div>
        </div>
    </section>
 </body>
</html>';
?>