<?php
include("../Connection/connection.php");
if(isset($_POST["btnSubmit"]))
{
    $Afile=$_FILES["Syllabus"]["name"];
    $temp = $_FILES["Syllabus"]["tmp_name"];
    move_uploaded_file($temp,"../Assets/Syllabus/".$Afile);
		$ins="insert into tbl_syllabus(syllabus_file,subject_id) values('".$Afile."','".$_GET["sid"]."')";
    if(mysql_query($ins))
		{
			header("location:Syllabus.php");
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
<title>Syllabus</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="" enctype="multipart/form-data">
  <table width="200" border="1" align="center">
    <tr>
      <td>Syllabus File</td>
      <td><label for="Syllabus"></label>
      <input type="file" name="Syllabus" id="Syllabus" />  </td>
    </tr>
    <tr>
      <td colspan="2" align="center">
      <input type="submit" name="btnSubmit" id="btnSubmit" value="Submit" />
      <input type="submit" name="btnCancel" id="btnCancel" value="Cancel" /></td>
    </tr>
  </table>
</form>
</body>
</html>