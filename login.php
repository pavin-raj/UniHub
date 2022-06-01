<?php
include("Connection/connection.php");
session_start();

if(isset($_POST["btnlogin"]))
{
	$username=$_POST["txtusername"];
	$password=$_POST["txtpassword"];
	
	$sel="select * from tbl_college where college_email='".$username."' and college_password='".$password."'";
	$rows=mysql_query($sel);
	$count=mysql_num_rows($rows);
	
	$sel1="select * from  tbl_student where student_email='".$username."' and student_password='".$password."'";
	$rows1=mysql_query($sel1);
	$count1=mysql_num_rows($rows1);
	//echo $sel1;
	
	$sel2="select * from tbl_admin where admin_username='".$username."' and admin_password='".$password."'";
	$rows2=mysql_query($sel2);
	$count2=mysql_num_rows($rows2);
		
	$sel3="select * from tbl_teacher where teacher_email='".$username."' and teacher_password='".$password."'";
	$rows3=mysql_query($sel3);
	$count3=mysql_num_rows($rows3);
	
	if($count1>0)
	
	{
		$data1=mysql_fetch_array($rows1);	
		$_SESSION["uid"]=$data1['student_id'];
		$_SESSION["username"]=$data1['student_name'];
		header("location:Student/Homepage.php");	
	}
	else if($count>0)
	{
		$data=mysql_fetch_array($rows);
		$_SESSION["uid"]=$data['college_id'];
		$_SESSION["username"]=$data['college_name'];
		header("location:College/Homepage.php");	
	}
	else if($count2>0)
	{
		$data2=mysql_fetch_array($rows2);
		$_SESSION["uid"]=$data2['admin_id'];
		$_SESSION["username"]=$data2['admin_username'];
		header("location:Admin/Dashboard.php");
	}
	else if($count3>0)
	{
		$data3=mysql_fetch_array($rows3);
		$_SESSION["uid"]=$data3['teacher_id'];
		$_SESSION["username"]=$data3['teacher_name'];
		header("location:Teacher/Homepage.php");	
	}
	
		
	else
	{
		echo "<script>alert('Invalid Username Or Password')</script>";
	}
	
}
?>





<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Uni Hub</title>
    <link rel="stylesheet" href="../ComplaintMgSystem-PHP/files/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="files/css/styles.css?v=1">
  </head>
  <br><br><br><br><br><br><br><br>
  <body style="background-image: url('files/img/user.jpg');">
    <div class=" user text-center" style="text-align: center;">
    <br> 
   <span class="ti-package"></span>
    <!--<svg fill="#fff" height="148" viewBox="0 0 24 24" width="148" xmlns="http://www.w3.org/2000/svg" class="shad">
    <path d="M19 7.001c0 3.865-3.134 7-7 7s-7-3.135-7-7c0-3.867 3.134-7.001 7-7.001s7 3.134 7 7.001zm-1.598 7.18c-1.506 1.137-3.374 1.82-5.402 1.82-2.03 0-3.899-.685-5.407-1.822-4.072 1.793-6.593 7.376-6.593 9.821h24c0-2.423-2.6-8.006-6.598-9.819z"/>
    </svg>-->
    <br>
	<br>
	<a href="index.php"></a>
    <h2 class="login-heading">USER LOGIN</h2><br><br>
    </div>
    <form method="POST">
    <div class="login-area">
        <div class="login-content">
          <input type="text" name="txtusername" placeholder="Username/Email" />
          <input type="password" name="txtpassword" placeholder="Password" />
          <input type="submit" name="btnlogin" value="Login" />
        </div>
      </div> 
  </form>  
</body>
</html>
