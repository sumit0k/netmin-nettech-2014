<?php require_once ('../template/header.php');
echo '
<title>NETMIN:Linux Server Management tool</title>
 <section id="content">

        <div class="block">
            <div class="inner width-2">
			
<div class="box-login" align="center">
<br>
				<img src="../all/home.png"></img>
                    <div class="box-form">
                        <form action="common.php" method="post" >
							<p><textarea name="comment" placeholder="Enter the command (prefix sudo for root commands)!" required class="text-input focus" rows="4" style="height:100px;">
</textarea></p>
                                                        <p><input type="submit" name="submit" value="EXECUTE" class="button large bold"></p>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </section>    
  </body>
</html>'
?>