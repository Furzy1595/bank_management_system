<?php
$msg="";
include("pages/dbconnection.php");
if(isset($_POST['btnregister'])){
  $username=$_POST['txtusername'];
  $password=$_POST['txtpassword'];
  $usertype=$_POST['cmbusertype'];
  $sql="insert into tbluser(
    username,password,usertype)
  values ('$username','$password','$usertype')";
  if(mysqli_query($conn,$sql)){
    echo "<script>alert('New user has beeb created sucessfully')</script>";
  }
  else{
    $msg="Error occured ".mysqli_error($conn);
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
  <h2>Register New User</h2>
  <form id="frm" name="frm" method="post" action="">
<label style="color:red;"><?php echo $msg; ?></label>
    <label style="color:red">User Name</label>
      <input type="text" name="txtusername"
      id="txtusername"
      onkeypress="return allow_text(event);">
      <label style="color:red">User Type</label>
      <select name="cmbusertype" id="cmbusertype">
      <option selected value="Administrator">Administrator</option>
      <option selected value="General">General</option>
      </select>

      <br>
      <label style="color:red">Password</label>
        <input type="password" name="txtpassword"
        id="txtpassword"><br>
        <label style="color:red">Confirm Password</label>
          <input type="password" name="txtconfirmpassword"
          id="txtconfirmpassword">


<div class="row">
<input type="submit" name="btnregister"
id="btnregister" value="Register"
onclick="return checkdata();">
<a href="/Bank">Login</a>
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
  else if(frm.txtpassword.value.length < 6){
    alert("Password must at least 6 characters");
    return false;
  }
  else if(frm.txtpassword.value != frm.txtconfirmpassword.value){
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
