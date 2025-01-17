<html>
<head>
  <title>Bank Management System</title>
  <link rel="stylesheet" href="css/mystyle.css"/>
</head>
<body>
  <?php include "include/headerlogin.php"; ?>
  <center>
  <div style="background-color:blue;
  width:50%;color:white">
  <h2>Forget Password</h2>
  <form id="frm" name="frm" method="post" action="">
  <label style="color:black">User Name</label>
  <input type="text" name="txtusername"
  id="txtuername"
  onkeypress="return allow_text(event);">
  <label style="color:black">User Type</label>
  <select name="cmbusertype" id="cmbusertype">
  <option selected value="general">General</option>
  <option value="admin">Administration</option>
  </select>
  <label style="color:black">Password</label>
  <input type="text" name="txtpassword"
  id="txtpassword"><br>
  <label style="color:black">Confirm Password</label>
  <input type="text" name="txtconfirmpassword"
  id="txtconfirmpassword"
  onkeypress="return allow_text(event);">
  <br>
  <div class="row">
  <input type="submit" name="btnforgetpassword"
  id="btnforgetpassword" value="Forget">
 <a href="/bank">Login</a>
  </div>
  </form>
  </div>
  </center>
<hr>
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
</script>