<?php

include("../Connection/connection.php");
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <link rel="stylesheet" href="../files/css/bootstrap.css">
   <link rel="stylesheet" href="../files/css/themify-icons.css">
   <link rel="stylesheet" href="../files/css/styles.css?v=1">
</head>
<body>
    <!--bgcolor="#efefef"-->
    <?php require 'nav.php'; ?>
    <div class="cover main">
      <?php
      if (isset($_SESSION["uid"])===true) {echo "<h1> Welcome, ".$_SESSION["username"]."</h1>";}
       ?>
    </div>

<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>


<div class="div">
      <div class="col-lg-12">
          <div class="analysis">
          <?php
              $stu = mysql_query("SELECT * FROM `tbl_college`");
              $count_stu = mysql_num_rows($stu);

              $tea = mysql_query("SELECT * FROM `tbl_student`");
              $count_tea = mysql_num_rows($tea);

              $cmp = mysql_query("SELECT * FROM `tbl_complaint` where college_id > 0");
              $count_cmp = mysql_num_rows($cmp);

            ?>

            <div class="track theme">
                Total Colleges <br> <p><?php echo $count_stu;?></p>
            </div>
            <div class="track vio">
                Total Students <br> <p><?php echo $count_tea;?></p>
            </div>

            <div class="track red">
                Complaints <br> <p><?php echo $count_cmp;?></p>
            </div>

          </div>

          <div class="textbox">
          <br><br>
            <?php

            $query1=mysql_query("SELECT * FROM `tbl_college` ORDER BY college_id DESC LIMIT 1 ");
            $name=mysql_fetch_array($query1);
            $new_stu=$name['college_name'];


            /*$query=mysql_query("SELECT * FROM `tbl_teacher` ORDER BY teacher_id DESC LIMIT 1 ");
            $name2=mysql_fetch_array($query);
            $new_tea=$name2['teacher_name'];*/

            $query3=mysql_query("select * from tbl_complaint complaint inner join tbl_college college on complaint.college_id=college.college_id 
            where complaint.college_id>0 ORDER BY complaint.college_id DESC LIMIT 1");
            $name3=mysql_fetch_array($query3);
            $new_te=$name3['college_name'];

             ?>

             <div class="content">
               <div class="div_data">New College</div>
               <div class="div_data2">New Complaint From</div>
             </div>
              <div class="div_data vio1">
                    <span><?php echo $new_stu; ?></span>
              </div>

              <div class="div_data2 blue">
                    <span><?php echo $new_te; ?></span>
              </div>

          </div>
      </div>
</body>
</html>