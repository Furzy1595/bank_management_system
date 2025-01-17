<?php
$msg="";
include("dbconnection.php");
if(isset($_POST['btnreset'])){
  $username=$_POST['txtusername'];
  $newpassword=$_POST['txtnewpassword'];
  $usertype=$_POST['cmbusertype'];
  $sql="update tbluser set password = '$newpassword'
  where username = '$username' and usertype = '$usertype'";
  if(mysqli_query($conn,$sql)){
    echo "<script>alert('New password has been reset sucessfully')</script>";
  }
  else{
    $msg="Error occured ".mysqli_error($conn);
  }
}
?>
<html>
<head>
  <title>Bank</title>
    <link rel="stylesheet" href="../css/mystyle.css"/>
</head>
<body>
  <?php include "../include/headeradmin.php"; ?>
<center>
<div style="background-color:blue;
width:50%;color:white">
  <h2>Reset Password</h2>
  <form id="frm" name="frm" method="post" action="">
<label style="color:red;"><?php echo $msg; ?></label>
    <label style="color:red">User Name</label>
      <input type="text" name="txtusername"
      id="txtusername"
      onkeypress="return allow_text(event);">
      <label style="color:red">User Type</label>
      <select name="cmbusertype" id="cmbusertype">
      <option selected value="General">General</option>
      <option value="Administrator">Administrator</option>
      </select>
      <br>
      <label style="color:red">New Password</label>
        <input type="password" name="txtnewpassword"
        id="txtnewpassword"><br>
        <label style="color:red">Confirm Password</label>
          <input type="password" name="txtconfirmpassword"
          id="txtconfirmpassword">
<div class="row">
<input type="submit" name="btnreset"
id="btnreset" value="Reset Password"
onclick="return checkdata();">
<a href="/Bank">Log in </a>
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
  else if(frm.txtnewpassword.value.length < 6){
    alert("Password must at least 6 characters");
    return false;
  }
  else if(frm.txtnewpassword.value != frm.txtconfirmpassword.value){
    alert("Confirm password does not match");
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
