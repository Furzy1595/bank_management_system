<?php
include("dbconnection.php");
if(isset($_POST['btnsave'])){
  $name=$_POST['txtname'];
  $address=$_POST['txtaddress'];
  $contact=$_POST['txtcontact'];
  $gender=$_POST['cbogender'];
  $dob=$_POST['txtdob'];
  $username=$_POST['txtusername'];
  $sql="insert into tblcustomer(
    customername,address,gender,contactno,dob,username)
  values ('$name','$address','$gender',
  '$contact','$dob','$username')";
  $sql1="insert into tbluser(
    username,password,usertype) values
    ('$username','123456','General')";

  if(mysqli_query($conn,$sql) && mysqli_query($conn,$sql1)){
    echo "<script>alert('New customer has been saved sucessfully')</script>";
  }
  else{
    die ("Error occured ".mysqli_error($conn));
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
  <div class="container">
  <h2>Add New customer</h2>
  <hr>
  <form id="frm" name="frm"
   method="post" action="">
    <div class="row">
      <div class="col-label">
        <label>Customer Name</label>
    </div>
    <div class="col-data">
      <input type="text" name="txtname"
      id="txtname"
      onkeypress="return allow_text(event);">
  </div>
  <div class="col-label">
    <label>Address</label>
</div>
<div class="col-data">
  <input type="text" name="txtaddress"
  id="txtaddress">
</div>
</div>
<div class="row">
  <div class="col-label">
  <label>Gender</label>
  </div>
  <div class="col-data">
  <select name="cbogender" id="cbogender">
    <option>Male</option>
    <option>Female</option>
    <option>Others</option>
  </select>
  </div>
  <div class="col-label">
  <label>Contact No</label>
  </div>
  <div class="col-data">
  <input type="number" name="txtcontact"
  id ="txtcontact">
  </div>
  </div>
  <div class ="row">
    <div class = "col-label">
      <label>Date of Birth</label>
    </div>
    <div class = "col-data">
      <input type="date" name="txtdob" id="txtdob">
    </div>
    <div class = "col-label">
      <label>User Name</label>
    </div>
    <div class = "col-data">
      <input type="text" name="txtusername" id="txtusername">
    </div>
  </div>
  <div class="row">
    <input type="submit" value="Save Data"
    id="btnsave" name="btnsave"
    onclick="checkdata();">
  </div>
  </form>
</div>
</body>
</html>
<script>
function allow_text(e){
var charcode=event?event.keyCode:e.which;
if((charcode>64 && charcode<91)
|| (charcode>96 && charcode<123)
|| charcode==32)
return true;
else
return false;
}
function checkdata(){
  if(txtname.value==""){
    alert("customer name field is required!");
  }
}

</script>
