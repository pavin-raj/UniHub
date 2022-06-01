<?php
include("../Connection/connection.php");
session_start();
if(isset($_POST["Save"]))
{
		$ins="insert into tbl_feedback(feedback_content, student_id, feedback_date) values('".$_POST["feedback"]."', '".$_SESSION["uid"]."',curdate())";
		echo $ins;
		if(mysql_query($ins))
		{
			//header("location:complaint.php");
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
<title>Feebacks</title>
</head>

<body id="Content">
<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
  <table width="200" border="1">
    <tr>
      <td>Content</td>
      <td id="Content"><label for="feedback"></label>
        <textarea name="feedback" id="feedback" cols="45" rows="5"></textarea>
        <label for="Name.txt"></label></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="Save" id="Save" value="Save" />
        <input type="submit" name="Cancel" id="Cancel" value="Cancel" /></td>
    </tr>
  </table>
</form>
</body>
</html>