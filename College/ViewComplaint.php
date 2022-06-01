<?php
include("../Connection/connection.php");
session_start();
?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>View Complaints</title>
<link rel="stylesheet" href="../files/css/bootstrap.css">
<link rel="stylesheet" href="../files/css/custom.css">
<link rel="stylesheet" href="../files/css/styles.css?v=1">
</head>

<body>
<?php require 'nav.php'; ?>
  <div class="animated fadeIn">


  <div class="cover main">
    <h1>View Complaints</h1>
  </div>

    <div class="div">
        <div class="col-lg-12 ">
          <?php $result = mysql_query("select * from tbl_complaint complaint inner join tbl_teacher teacher on complaint.teacher_id=teacher.teacher_id 
  inner join tbl_college college on college.college_id = teacher.college_id where college.college_id = '".$_SESSION["uid"]."'");
            $num_rows = mysql_num_rows($result);
            ?>
              <div class='admin-data'>
                Complaints
                <span class='button view' href=''><?php echo "$num_rows";?></a>
              </div>
              <br><br><br><br>
              <br><br>

              <br>
              <br><br>

          <?php

            while($data=mysql_fetch_array($result)) {
            echo"<div class='admin-data'>";
            echo $data['teacher_name'];
            $empty=$data['teacher_name'];
            echo "<a class='button view' href='complaint-view.php?id=$data[complaint_id]'>View</a>";
            echo "</div>";

          }
          ?>


          <br><br><br><br><br><br><br><br><br><br><br><br>

        </div>
      </div>

  </div>








  <!--<table width="200" border="1" align="center" cellpadding="10">
   <tr>
     <td>Sl.no</td>
     <td>Complaint</td>
     <td>Date</td>
     <td>Reply</td>
   </tr>
   <?php
	$sel1="select * from tbl_complaint complaint inner join tbl_teacher teacher on complaint.teacher_id=teacher.teacher_id 
  inner join tbl_college college on college.college_id = teacher.college_id where college.college_id = '".$_SESSION["uid"]."'";
	$rows=mysql_query($sel1);
	$i=0;
	while($data1=mysql_fetch_array($rows))
	{
		$i++;
	?>
      <tr>
      <td><?php echo $i;?>;</td>
      <td><?php echo $data1["complaint_content"];?></td>
      <td><?php echo $data1["complaint_date"];?></td>
      <td><?php echo $data1["complaint_reply"];?><br> 
      <a href="reply.php?rid=<?php echo $data1["complaint_id"];?>">Reply/Edit</a></td>
    </tr> 
    <?php
	}
	?>
    </table>-->
</body>
</html>