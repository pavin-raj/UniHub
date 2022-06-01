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
          <?php $result = mysql_query("select * from tbl_complaint complaint inner join tbl_college college on complaint.college_id=college.college_id");
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
            echo $data['college_name'];
            $empty=$data['college_name'];
            echo "<a class='button view' href='view_complaints.php?id=$data[complaint_id]'>View</a>";
            echo "</div>";

          }
          ?>


          <br><br><br><br><br><br><br><br><br><br><br><br>

        </div>
      </div>

  </div>
</body>
</html>