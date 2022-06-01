<?php
include("../Connection/connection.php");
session_start();
if(isset($_POST["Save"]))
{
		$ins="insert into tbl_complaint(complaint_subject, complaint_content, student_id, complaint_date) values('".$_POST["subject"]."', '".$_POST["complaint"]."', '".$_SESSION["uid"]."', curdate())";
		if(mysql_query($ins))
		{
			header("location:GiveComplaint.php");
		}
		else
		{
			echo $ins;
		}
}
?>




<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Complaints</title>
<link rel="stylesheet" href="../files/css/bootstrap.css">

<link rel="stylesheet" href="../files/css/styles.css?v=1">
<style>
  .text-center h2{
    color: #4db6ac;;
  }
</style>
</head>

<body>
<?php require 'nav.php'; ?>
  <div class="animated fadeIn">


  <div class="cover main">
    <h1>Give Complaint</h1>
  </div>

  <div class="post_content">
          <div class="text-center">
            <br>
            <h2>Anything on your mind</h2><br><br>
            <form class="" action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
                <input type="text" class="post" name="subject" placeholder="Subject"/><br><br>
                <textarea name="complaint" class="post" rows="3" cols="30" placeholder="Story"></textarea><br><br>

                <button type="submit" name="Save" id="Save" class="log">Submit</button>
            </form>
          </div>
        </div>
</body>
</html>