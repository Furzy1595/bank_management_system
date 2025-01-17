<?php session_start(); ?>
<?php
$msg="";
include("dbconnection.php");
if(isset($_POST['btnchange'])){
  $username=$_POST['txtusername'];
  $newpassword=$_POST['txtnewpassword'];
  $usertype=$_POST['txtusertype'];
  $oldpassword=$_POST['txtoldpassword'];
  if($_SESSION['password']!=$oldpassword){
    echo "<script>alert('Old password does not match')</script>";
  }
  else{
    $sql="update tbluser set password = '$newpassword'
    where username = '$username' and usertype = '$usertype'";
      if(mysqli_query($conn,$sql)){
        echo "<script>alert('Password has been changed sucessfully')</script>";
      }
  else{
    $msg="Error occured ".mysqli_error($conn);
  }
}
}
?>
<html>
<head>
  <title>Bank</title>
    <link rel="stylesheet" href="../css/mystyle.css"/>
</head>
<body>
  <?php include "../include/header.php"; ?>
<center>
<div style="background-color:blue;
width:50%;color:white">
  <h2>Change Password</h2>
  <form id="frm" name="frm" method="post" action="">
<label style="color:red;"><?php echo $msg; ?></label>
    <label style="color:red">User Name</label>
      <input type="text" name="txtusername"
      id="txtusername" value = "<?php echo $_SESSION['username']; ?>"
      readonly="true">
      <label style="color:red">User Type</label>
      <input type="text" name="txtusertype"
      id="txtusertype" value = "<?php echo $_SESSION['usertype']; ?>"
      readonly="true">
      <br>
      <label style="color:red">Old Password</label>
        <input type="password" name="txtoldpassword"
        id="txtoldpassword"><br>
      <label style="color:red">New Password</label>
        <input type="password" name="txtnewpassword"
        id="txtnewpassword"><br>
        <label style="color:red">Confirm Password</label>
          <input type="password" name="txtconfirmpassword"
          id="txtconfirmpassword">
<div class="row">
<input type="submit" name="btnchange"
id="btnchange" value="Change Password"
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
</script>
