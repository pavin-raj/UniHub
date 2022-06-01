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
              $stu = mysql_query("SELECT * FROM tbl_lecture lecture inner join tbl_teachersubject teachersubject
              on lecture.teachersubject_id = teachersubject.teachersubject_id inner join tbl_subject subject
              on subject.subject_id = teachersubject.subject_id inner join tbl_student student on student.course_id =
              subject.course_id inner join tbl_teacher teacher on teacher.college_id = student.college_id
              where student.student_id = '".$_SESSION["uid"]."'");
              $count_stu = mysql_num_rows($stu);

              $tea = mysql_query("select * from tbl_subject subject inner join tbl_teachersubject teachersubject on
              subject.subject_id = teachersubject.subject_id inner join tbl_teacher teacher on teacher.teacher_id = 
              teachersubject.teacher_id inner join tbl_student student on student.college_id = teacher.college_id
              AND subject.course_id = student.course_id where student.student_id = '".$_SESSION["uid"]."'");
              $count_tea = mysql_num_rows($tea);

              $cmp = mysql_query("select * from tbl_teacher teacher inner join tbl_teachersubject teachersubject
              on teacher.teacher_id = teachersubject.teacher_id inner join tbl_subject subject on 
              teachersubject.subject_id = subject.subject_id inner join tbl_student student on 
              student.course_id = subject.course_id AND teacher.college_id = student.college_id
              where student.student_id = '".$_SESSION["uid"]."'");
              $count_cmp = mysql_num_rows($cmp);

            ?>

            <div class="track theme">
                Total Lectures <br> <p><?php echo $count_stu;?></p>
            </div>
            <div class="track vio">
                Total Subjects <br> <p><?php echo $count_tea;?></p>
            </div>

            <div class="track red">
                Total Teachers <br> <p><?php echo $count_cmp;?></p>
            </div>

          </div>

          <div class="textbox">
          <br><br>
            <?php

            $query1=mysql_query("SELECT * FROM tbl_lecture lecture inner join tbl_teachersubject teachersubject on
            lecture.teachersubject_id = teachersubject.teachersubject_id inner join tbl_teacher teacher 
            on teacher.teacher_id = teachersubject.teacher_id inner join tbl_student student on
            student.college_id = teacher.college_id inner join tbl_subject subject on subject.course_id = student.course_id
            where student.student_id = '".$_SESSION["uid"]."' order by lecture.lecture_id desc");
            $name1=mysql_fetch_array($query1);
            $new_lecture_from=$name1['teacher_name'];

            $query2=mysql_query("select * from tbl_teacher teacher inner join tbl_teachersubject teachersubject
            on teacher.teacher_id = teachersubject.teacher_id inner join tbl_subject subject on 
            teachersubject.subject_id = subject.subject_id inner join tbl_student student on 
            student.course_id = subject.course_id AND teacher.college_id = student.college_id
            where student.student_id = '".$_SESSION["uid"]."' order by teacher.teacher_id desc limit 1");
            $name2=mysql_fetch_array($query2);
            $new_tea=$name2['teacher_name'];

             ?>

             
<div class="content">
               <div class="div_data">New Lecture From</div>
               <div class="div_data2">New Teacher</div>
             </div>
              <div class="div_data vio1">
                    <span><?php echo $new_lecture_from; ?></span>
              </div>

              <div class="div_data2 blue">
                    <span><?php echo $new_tea; ?></span>
              </div>

          </div>
      </div>
            

</body>
</html>