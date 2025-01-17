<?php session_start(); ?>
<html>
<head>
  <title>Bank-Admin</title>
  <link rel="stylesheet" href="css/mystyle.css"/>
</head>
<body>
  <?php include "include/headeradmin.php"; ?>
<div style="background-color:white;color:black">
<marquee>
    User Name : <?php echo $_SESSION['username']; ?>
    User Type : <?php echo $_SESSION['usertype']; ?>
</marquee>
  </div>

</body>
</html>
