<?php require_once ('../template/header.php');
echo '<title>NETMIN: Service Management</title></head>
 <section id="content">

        <div class="block">
            <div class="inner width-2">
                <div class="box-login">
                    <div class="head">
                        <h2 class="heading-title">Service Management</h2><em> <h3>Select the Service you want to Manage</h3></em>
</div>
                    <div class="box-form">
					
                        <form action="check.php" method="post" >
<select name="service" class="text-input focus" required pattern="[A-Za-z]">
<option> </option>
<option>Telnet (xinetd)</option>
<option>SSH (sshd)</option>
<option>SMTP (sendmail)</option>
<option>DNS (named)</option>
<option>IPP (cups)</option>
<option>FTP (vsftpd)</option>
<option>IMAP/POP3 (dovecot)</option>
<option>APACHE (httpd)</option>
<option>SAMBA (smb)</option>
<option>Firewall (iptables)</option>				
</select>						
                            <p><p><input type="submit" name="start" value="Start the Service" class="button large bold"></p><p><input type="submit" name="stop" value="Stop the Service" class="button large bold"></p>
<p><input type="submit" name="status" value="Status of Service" class="button large bold"></p>
<p><input type="submit" name="restart" value="Restart the Service" class="button large bold"></p><br>
</form> </div>

                </div>
            </div>
        </div>
    </section>
 </body>
</html>';
?>