<?php require_once ('../template/header.php');
echo '<title>NETMIN: Ping Utility</title></head>
 <section id="content">

        <div class="block">
            <div class="inner width-2">
                <div class="box-login">
                    <div class="head">
                        <h2 class="heading-title">Network Utility</h2><em> <h3>Ping an IP Address</h3></em>
</div>
                    <div class="box-form">
					
                        <form action="check.php" method="post" >
                            <p><input type="text" name="address" placeholder="Handle Connections to Address *.*.*.*" required pattern="[.0-9]{7,15}" class="text-input focus"></p>
                            <p><input type="submit" name="submit" value="Ping" class="button large bold"></p></form> </div>
<div class="box-form">
					
                        <form action="check.php" method="post" >
                            <p><input type="submit" name="sub" value="Port Status" class="button large bold"></p></form> </div>
                </div>
            </div>
        </div>
    </section>
 </body>
</html>';
?>