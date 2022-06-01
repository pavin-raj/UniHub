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
    <link rel="stylesheet" href="../files/css/styles.css?v=1">
    <style>
    ul li ul.dropdown{
        min-width: 100%; /* Set width of the dropdown */
        background: #1e2019;
        display: none;
        position: absolute;
        z-index: 999;
        left: 0;
    }
    ul li:hover ul.dropdown{
        display: block;	/* Display the dropdown */
    }
    ul li ul.dropdown li{
        display: block;
    }
    </style>
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
              $stu = mysql_query("SELECT * FROM `tbl_student`");
              $count_stu = mysql_num_rows($stu);

              $tea = mysql_query("SELECT * FROM `tbl_teacher`");
              $count_tea = mysql_num_rows($tea);

              $cmp = mysql_query("SELECT * FROM `tbl_complaint`");
              $count_cmp = mysql_num_rows($cmp);

            ?>

            <div class="track theme">
                Total Students <br> <p><?php echo $count_stu;?></p>
            </div>
            <div class="track vio">
                Total Teachers <br> <p><?php echo $count_tea;?></p>
            </div>

            <div class="track red">
                Complaints <br> <p><?php echo $count_cmp;?></p>
            </div>

          </div>

          <div class="textbox">
          <br><br>
            <?php

            $query1=mysql_query("SELECT * FROM `tbl_student` ORDER BY student_id DESC LIMIT 1 ");
            $name=mysql_fetch_array($query1);
            $new_stu=$name['student_name'];


            $query=mysql_query("SELECT * FROM `tbl_teacher` ORDER BY teacher_id DESC LIMIT 1 ");
            $name2=mysql_fetch_array($query);
            $new_tea=$name2['teacher_name'];

             ?>

             <div class="content">
               <div class="div_data">New Student</div>
               <div class="div_data2">New Teacher</div>
             </div>
              <div class="div_data vio1">
                    <span><?php echo $new_stu; ?></span>
              </div>

              <div class="div_data2 blue">
                    <span><?php echo $new_tea; ?></span>
              </div>

          </div>
      </div>
</body>
</html>