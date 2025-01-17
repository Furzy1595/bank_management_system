<?php session_start(); ?>
<html>
<head>
  <title>Bank</title>
  <link rel="stylesheet" href="css/mystyle.css"/>
</head>
<body>
  <?php include "include/header.php"; ?>
<div style="background-color:white;color:black">
<marquee>
    User Name : <?php echo $_SESSION['username']; ?>
    User Type : <?php echo $_SESSION['usertype']; ?>
</marquee>
  </div>
<img src="images/back.jpg"
style="width:100%;height=100%">

</body>
</html>
