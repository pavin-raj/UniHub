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
              $stu = mysql_query("SELECT * FROM tbl_student student inner join tbl_teacher teacher 
              on student.college_id = teacher.college_id inner join tbl_college college on college.college_id =
              teacher.college_id where teacher.teacher_id = '".$_SESSION["uid"]."'");
              $count_stu = mysql_num_rows($stu);

              $tea = mysql_query("select * from tbl_teachersubject t inner join tbl_subject s  inner join tbl_course c inner join
              tbl_semester sem on t.subject_id=s.subject_id  and c.course_id = s.course_id and sem.semester_id = s.semester_id
              where teacher_id='".$_SESSION["uid"]."'");
              $count_tea = mysql_num_rows($tea);

              $cmp = mysql_query("select * from tbl_complaint complaint inner join 
              tbl_student student on complaint.student_id=student.student_id inner join 
              tbl_college college on college.college_id = student.college_id inner join 
              tbl_teacher teacher on teacher.college_id = student.college_id
              where teacher.teacher_id = '".$_SESSION["uid"]."'");
              $count_cmp = mysql_num_rows($cmp);

            ?>

            <div class="track theme">
                Total Students <br> <p><?php echo $count_stu;?></p>
            </div>
            <div class="track vio">
                Total Subjects <br> <p><?php echo $count_tea;?></p>
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


            $query=mysql_query("SELECT * FROM tbl_complaint complaint inner join tbl_student student on 
            complaint.student_id = student.student_id inner join tbl_college college on
            student.college_id = college.college_id inner join tbl_teacher teacher on
            teacher.college_id = college.college_id where teacher.teacher_id = '".$_SESSION["uid"]."' order by
            complaint_id desc");
            $name2=mysql_fetch_array($query);
            $new_tea=$name2['student_name'];

             ?>

             <div class="content">
               <div class="div_data">New Student</div>
               <div class="div_data2">New Complaint From</div>
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