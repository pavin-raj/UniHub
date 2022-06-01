<?php
include ("../Connection/connection.php");
session_start();

$id = $_GET['id'];
$result = mysql_query("SELECT * FROM `tbl_complaint` complaint inner join `tbl_teacher` teacher on 
            complaint.teacher_id = teacher.teacher_id WHERE complaint.complaint_id='$id'");
$arry = mysql_fetch_array($result);
if (!$result) {
  die("Error: Data not found..");
}
?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>View Complaits</title>
<!-- Bootstrap 3.3.7 -->
<link rel="stylesheet" href="../files/css/bootstrap.min.css">
<link rel="stylesheet" href="../files/css/AdminLTE.min.css">
<link rel="stylesheet" href="../files/css/styles.css?v=1">
<link rel="stylesheet" href="../files/css/bootstrap.css">
<link rel="stylesheet" href="../files/css/custom.css">
</head>



<body style="font-size: 15px;">
<?php require('nav.php'); ?> 
<div class="cover main">
    <h1>View Complaint</h1>
</div>

<div class="div">
        <div class="col-lg-12 ">

          <?php
          echo "<a class='button logout' href ='m_delete.php?id=$id' onClick=\"javascript:return confirm ('Are you really want to delete ?');\">Delete</a>";
           ?>

           <br><br><br><br>
          <table>
          <?php
            $query1=mysql_query("SELECT * FROM `tbl_complaint` complaint inner join `tbl_teacher` teacher on 
            complaint.teacher_id = teacher.teacher_id WHERE complaint.complaint_id='$id'");
            while( $arry=mysql_fetch_array($query1) ) {

              $id = $arry['complaint_id'];
              $name = $arry['teacher_name'];
              $email = $arry['teacher_email'];
              $phone_no = $arry['teacher_contact'];
              $subject = $arry['complaint_subject'];
              $complain = $arry['complaint_content'];
              $date = $arry['complaint_date'];
            }

               echo "<tr> <td> <b> Complaint Id </b> </td>";
               echo "     <td> ".$id."</td> </tr>";

               echo "<tr> <td> <b> Name </b> </td>";
               echo "     <td> ".$name."</td> </tr>";

               echo "<tr> <td> <b> Email </b> </td>";
               echo "     <td> ".$email."</td> </tr>";

               echo "<tr> <td> <b> Phone no </b> </td>";
               echo "     <td> ".$phone_no."</td> </tr>";

               echo "<tr> <td> <b> Subject </b> </td>";
               echo "     <td> ".$subject."</td> </tr>";

               echo "<tr> <td> <b> Complaint </b> </td>";
               echo "     <td> ".$complain."</td></tr>";

               echo "<tr> <td> <b> Complaint Date </b> </td>";
               echo "     <td> ".$date."</td></tr>";

          ?>
          </table>



         
          <br><br>

      </div>
    </div>
  </div>
    <script src="../files/js/jquery.js"></script>
    <script src="../files/js/bootstrap.min.js"></script>
    <script src="../files/js/script.js"></script>
</body>
