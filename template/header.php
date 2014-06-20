<?php if (substr_count($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip')) ob_start("ob_gzhandler"); else ob_start();
echo '<!DOCTYPE html>
<html class="no-js" lang="en">
<head>      <link rel="stylesheet" type="text/css" media="screen" href="../css/ddd9b74.css" />
			<link rel="shortcut icon" type="image/png" href="../all/favicon.png">
         <link rel="stylesheet" type="text/css" media="screen" href="../css/e25a9c0.css" >
		     <script src="../js/jquery.min.js"></script>
    <script src="../js/popup.js"></script>
    
    <!--[if lt IE 9]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
    <![endif]-->
      </head>

  <body>

<header id="header">
<nav class="top">
            <h1 class="slogan">NETMIN: Linux Server Management tool</h1>
        <ul class="right"><li class="social">
            <a href="http://www.twitter.com/sumitkumar1209" class="twitter">Twitter</a>
            <a href="http://www.facebook.com/sumitkumar1209" class="facebook">Facebook</a>
            <a href="https://plus.google.com/+sumitkumar1209/posts" class="google">Google +</a>
			<a href="https://plus.google.com/+sumitkumar1209/posts" class="linkedin">LinkedIn</a>
			<a href="netmin.tar.gz" class="down">Download</a>
        </li>
    </ul>
</nav>
<nav class="main" >
<a href="../functions/index.php">
<ab class="heading-title" >&nbsp;<img src="../all/logo.png" />NETMIN</ab></a>
<ul class="menu right" align="right" >
<li >&nbsp;</li>
<li><a href="../functions/index.php">CLI Terminal</a></li>
<li class="dropdown" >
		  Apache Webserver &emsp; 
		 <ul align="left" >
	    <li><a href="../a/v.php">Create a New Virtual Server</a></li>
		<li><a href="../a/check.php">Existing server</a></li>
</ul>
</li>
<li class="dropdown" >
		  BIND DNS Server&emsp; 
		 <ul align="left"  >
	    <li><a href="../b/c.php">Create Zones</a></li>
		<li><a href="../b/e.php">Edit Master Zone</a></li>
		<li><a href="../b/check.php">Existing Zones</a></li></ul>
</li>
<li ><a href="../n/n.php">
		  Network Configuration</a>
</li>
<li class="dropdown" >
		  SAMBA Sharing&emsp; 
		 <ul align="left"  >
	    <li><a href="../sm/c.php">Create File Share</a></li>
		<li><a href="../sm/u.php">SAMBA Users Management</a></li>
		<li><a href="../sm/check.php">Show Existing Shares</a></li>
</ul>
</li>
<li class="dropdown" >
		  File/Folder Management&emsp; 
		 <ul align="left"  >
	    <li><a href="../ff/n.php">Create or Delete</a></li>
		<li><a href="../ff/a.php">Add Content</a></li>
		<li><a href="../ff/s.php">Show All Files</a></li>
		<li><a href="../ff/m.php">Copy/Move file/folder</a></li>
		<li><a href="../ff/c.php">Change Configuration</a></li>
</ul>
</li>
<li><a href="../u/u.php">
		  User Management </a>
</li>
<li ><a href="../s/s.php">
		  Service Management</a> 
</li>
<li ><a href="../g/g.php">
		  Group Management</a>
</li>
<li ><a href="../f/p.php">
		  Linux Firewall</a> 
</li>
<li><a href="../d/d.php">
		  Memory Management</a> 
</li>
<li ><a href="../p/i.php">
		  Process Management</a>
</li>
<li class="dropdown" >
		  Others&emsp;
		 <ul align="left"  >
<a href="../o/check.php"><li>Port Status</li></a>
<a href="../o/p.php"><li>PING Utility</li></a>
		</ul>
</li>
</ul>
</nav>
</header>
';
?>