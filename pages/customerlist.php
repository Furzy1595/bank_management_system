<?php session_start(); ?>
<html>
<head>
  <title>Bank</title>
  <link rel="stylesheet" href="../css/mystyle.css"/>
  <style>
  table tr:not(:first-child){
  cursor: pointer;transition: all .25s ease-in-out;
  }
  table tr:not(:first-child):hover{background-color: #ddd;}
  </style>
  </head>
<body>
  <?php include "../include/headeradmin.php"; ?>
  <div class="container">
  <h2>Customer List</h2>
  <hr>
  <form name="frm" id="frm" method="post" action="">
  Search Customer Name :
<input type="text" id="txtsearch" name="txtsearch">
  <input type="submit" name="btnsearch" id="btnsearch"
  value="Search">
  <table border=1 cellspacing=0 width="100%"
  id="table1" name="table1">
    <tr>
      <th>ID</th>
      <th>Customer Name</th>
      <th>Address</th>
      <th>Gender</th>
      <th>ContactNo</th>
      <th>DateOfBirth</th>
      <th>UserName</th>
    </tr>
  <?php
  include("dbconnection.php");
  if(isset($_POST['btnsearch'])){
  $search=$_POST['txtsearch'];
  $sql="select ID,customername,address,gender,
  contactno,dob,username from tblcustomer
  where customername like '$search%'";
  $result=mysqli_query($conn,$sql);
  if(mysqli_num_rows($result)>0){
  while($row=mysqli_fetch_array($result)){
   ?>
   <tr>
     <td><?php echo $row['ID']; ?></td>
     <td><?php echo $row['customername']; ?></td>
     <td><?php echo $row['address']; ?></td>
     <td><?php echo $row['gender']; ?></td>
     <td><?php echo $row['contactno']; ?></td>
     <td><?php echo $row['dob']; ?></td>
     <td><?php echo $row['username']; ?></td>
    </tr>
    <?php
  }
  }
  }
  ?>
  </table>
</div>
</form>
</body>
</html>
<script>
var table = document.getElementById('table1');
for(var i = 1; i < table.rows.length; i++){
table.rows[i].onclick = function(){
//rIndex = this.rowIndex;
//alert("test"+this.cells[0].innerHTML);
var id=this.cells[0].innerHTML;
window.location.href="updatecustomer.php?id="+id;
//document.write('<a href="updatecustomer.php?id='+id+'">
//another page</a>');
};
}
</script>
