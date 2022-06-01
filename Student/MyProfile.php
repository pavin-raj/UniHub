<?php
include("../Connection/connection.php");
session_start();
 
$selstudent="select * from tbl_student where student_id='".$_SESSION["uid"]."'";
$row=mysql_query($selstudent);
$data=mysql_fetch_array($row);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="../files/css/bootstrap.css">
<link rel="stylesheet" href="../files/css/styles.css">
<title>My Profile</title>
</head>

<body>

<?php require 'nav.php'; ?>
<div class="cover main">
<h1>My Profile</h1>
</div>

<div class="div profile">
          <div class = "col-lg-12">
            <form class="" action="" method="post" autocomplete="off">
                  <?php
                  $query1=mysql_query("SELECT * FROM tbl_student WHERE student_id='".$_SESSION["uid"]."'");
            			while( $arry1=mysql_fetch_array($query1)) {
                  ?>
              <table>
                  <tr>
                      <td><h4>Update your data</h4><br><br></td>
                  </tr>
                  <tr>
                    <td>Name</td>
                    <td><input type="text" name="name" placeholder="<?php echo $arry1['student_name'];?>"></td>
                  </tr>
                  <tr>
                    <td>E-mail</td>
                    <td><input type="textarea" name="username" placeholder="<?php echo $arry1['student_email'];?>"></td>
                  </tr>
                  <tr>
                    <td>Password</td>
                    <td><input type="text" name="password" placeholder="<?php echo $arry1['student_password'];?>"></td>
                  </tr>
                  <tr>
                    <td>Address</td>
                    <td><input type="textarea" name="username" size="25" placeholder="<?php echo $arry1['student_address'];?>"></td>
                  </tr>
                  <tr>
                    <td></td>
                    <td><button name="update" type="submit" class="log">Save</button></td>
                  </tr>
              </form>
              <?php
                    }
              ?>
          </table>
          </div>
    </div>
</body>
</html>