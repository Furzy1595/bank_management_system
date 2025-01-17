<?php session_start(); ?>
<?php
include("dbconnection.php");
$cid = $_GET['id'];
if(isset($_POST['btnsave'])){
  $name=$_POST['txtname'];
  $address=$_POST['txtaddress'];
  $contact=$_POST['txtcontact'];
  $gender=$_POST['cbogender'];
  $dob=$_POST['txtdob'];
  $username=$_POST['txtusername'];
  $sql="update tblcustomer set customername='$name',
  address='$address', dob='$dob', gender='$gender', contactno='$contact', username='$username'
  where id = '$cid'";
  if(mysqli_query($conn,$sql)){
    echo "<script>
    alert('Customer Record has been updated sucessfully')
    </script>";
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
  <h2>Update Customer</h2>
  <hr>
  <form id="frm" name="frm" method="post" action="">
<?php
  $sql = "select ID,customername,address,gender,
  contactno,dob,username from tblcustomer where id=$cid";
    $result=mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)>0){
    while($row=mysqli_fetch_array($result)){
    ?>
    <div class="row">
      <div class="col-label">
        <label>Customer ID</label>
      </div>
    <div class="col-data">
      <input type="text" name="txtid"
      id="txtid" readonly value="<?php echo $cid; ?>">
    </div>
    </div>
    <div class="row">
      <div class="col-label">
        <label>Customer Name</label>
      </div>
    <div class="col-data">
      <input type="text" name="txtname" id="txtname"
      value = "<?php echo $row['customername']; ?>"
      onkeypress="return allow_text(event);">
    </div>
  <div class="col-label">
    <label>Address</label>
</div>
<div class="col-data">
  <input type="text" name="txtaddress"
  id="txtaddress"
  value = "<?php echo $row['address']; ?>">
</div>
</div>
<div class="row">
  <div class="col-label">
  <label>Gender</label>
  </div>
  <div class="col-data">
  <select name="cbogender" id="cbogender">
    <?php $g=$row['gender'];
    if ($g==='Male'){
      echo "<option selected value = '$g'>$g</option>";
      echo "<option  value = 'Female'>Female</option>";
      echo "<option  value = 'Others'>Others</option>";
    }
    else if(($g==='Female')){
      echo "<option value = 'Male'>Male</option>";
      echo "<option selected value = '$g'>$g</option>";
      echo "<option  value = 'Others'>Others</option>";
    }
    else{
      echo "<option  value = 'Male'>Male</option>";
      echo "<option  value = 'Female'>Female</option>";
      echo "<option selected value = '$g'>$g</option>";
      }
    ?>
  </select>
  </div>
  <div class="col-label">
  <label>Contact No</label>
  </div>
  <div class="col-data">
  <input type="number" name="txtcontact"
  value = "<?php echo $row['contactno']; ?>"
  id ="txtcontact">
  </div>
  </div>
  <div class ="row">
    <div class = "col-label">
      <label>Date of Birth</label>
    </div>
    <div class = "col-data">
      <input type="date" name="txtdob" id="txtdob"
      value = "<?php echo $row['dob']; ?>">
    </div>
    <div class = "col-label">
      <label>User Name</label>
    </div>
    <div class = "col-data">
      <input type="text" name="txtusername" id="txtusername"
      value = "<?php echo $row['username']; ?>" readonly>
    </div>
  </div>
  <div class="row">
    <input type="submit" value="Save Data"
    id="btnsave" name="btnsave"
    onclick="checkdata();">
  </div>
<?php } } ?>
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
    alert("Customer name field is required!");
  }
}

</script>
