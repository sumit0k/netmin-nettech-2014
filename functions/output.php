<?php 
require_once ('../template/header.php');
session_start();
echo '<title>NETMIN: Output Page</title></head>
<section id="content">
        <div class="block">
            <div class="inner width-2">
                <div class="box-login">
                    <div class="head">';

	  echo '
<h2 class="heading-title">Output</h2><br/><pre align="left">'.$_SESSION['output'].'</pre><br/><b><a href="../functions/index.php">Home Page</a></b> </div></div></div></div></section>
</body>
</html>';
?>