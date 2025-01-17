<?php
session_start();
$username="";$password="";$usertype="";
if(isset($_POST['btnlogin'])){
include("pages/dbconnection.php");
$username=$_POST['txtusername'];
$password=$_POST['txtpassword'];
$usertype=$_POST['cmbusertype'];
$sql="select username,password,usertype from tbluser
where username='$username' and password ='$password'
and usertype='$usertype'";
$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0){
  $_SESSION['username']=$username;
  $_SESSION['password']=$password;
  $_SESSION['usertype']=$usertype;
  if($_SESSION['usertype']=='Administrator')
  header("Location: admin.php");
  else
  header("Location: main.php");
  exit();
  }
  else{
    echo "<script>alert('Username or password may be wrong')</script>";
  }
}
?>
<html>
<head>
  <title>Bank</title>
  <link rel="stylesheet" href="css/mystyle.css"/>
</head>
<body>
  <?php include "include/headerlogin.php"; ?>
<center>
<div style="background-color:blue;
width:50%;color:white">
  <h2>Please Login here</h2>
  <form id="frm" name="frm" method="post" action="">
    <label style="color:red">User Name</label>
      <input type="text" name="txtusername"
      id="txtusername"
      onkeypress="return allow_text(event);">
      <label style="color:red">Password</label>
        <input type="password" name="txtpassword"
        id="txtpassword">
<label style="color:red">User Type</label>
<select name="cmbusertype" id="cmbusertype">
<option selected value="General">General</option>
<option value="Administrator">Administrator</option>
</select>
<br>
<div class="row">
<input type="submit" name="btnlogin"
id="btnlogin" value="Log in" onclick="return checkdata();">
<a href="/Bank/registeruser.php">Register</a>
<a href="/Bank/changepassword.php">Change Password</a>
</div>
</form>
</div>
</center>
</body>
</html>
<script>
function checkdata(){
  if(frm.txtusername.value==""){
  alert("Please ! Enter your user name");
  return false;
  }
}
function allow_text(e){
var charcode=event?event.keyCode:e.which;
if((charcode>64 && charcode<91)
|| (charcode>96 && charcode<123)
|| charcode==32)
return true;
else
return false;
}
</script>
