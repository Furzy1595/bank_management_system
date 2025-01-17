<html>
<head>
  <title>Bank</title>
  <link rel="stylesheet" href="../css/mystyle.css"/>
  </head>
<body>
  <?php include "../include/headeradmin.php"; ?>
  <div class="container">
  <h2>User List</h2>
  <hr>
  <?php
  include("dbconnection.php");
  $sql="select username,password,usertype from tbluser
  order by usertype";
  $result=mysqli_query($conn,$sql);
  if(mysqli_num_rows($result)>0){
  ?>
  <br>
  <table border=1 cellspacing=0 width="50%">
    <tr>
      <th>SN</th>
      <th>UserName</th>
      <th>UerType</th>
    </tr>
  <?php
    $sn=0;
  while($row=mysqli_fetch_array($result)){
    $sn=$sn+1;
   ?>
   <tr>
     <td><?php echo $sn; ?></td>
     <td><?php echo $row['username']; ?></td>
     <td><?php echo $row['usertype']; ?></td>
    </tr>
    <?php
  }
  }
  ?>
  </table>
</div>
</body>
</html>
