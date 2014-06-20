<?php require_once ('../template/header.php');
echo '<title>NETMIN: Virtual Server</title></head>
 <section id="content">

        <div class="block">
            <div class="inner width-2">
                <div class="box-login">
                    <div class="head">
                        <h2 class="heading-title">APACHE Webserver</h2><em> <h3>Create a new Virtual Server</h3></em>
</div>
                    <div class="box-form">
					
                        <form action="check.php" method="post" >
                            <p><input type="text" name="address" placeholder="Handle Connections to Address *.*.*.*" required pattern="[.0-9]{7,15}" class="text-input focus"></p>
                            <p><input type="text" name="root" placeholder="Document Root deafult=`/var/www/html`" class="text-input focus"></p>
<p><input type="text" name="server" placeholder="Server Name" required pattern="[\.A-Za-z0-9_-]{1,80}" class="text-input focus"></p><p><input type="submit" name="submit" value="Create Virtual Server" class="button large bold"></p><br></form> </div>
<div class="box-form">
					
                        <form action="check.php" method="post" >
						<p><input type="submit" name="sub" value="Apply changes to Apache Server" class="button large bold"></p>
						<p><input type="submit" name="subd" value="Show Existing Servers" class="button large bold"></p>
						</form> </div>
                </div>
            </div>
        </div>
    </section>
 </body>
</html>';
?>