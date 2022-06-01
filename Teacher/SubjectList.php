<?php
include ("../Connection/connection.php");
session_start();
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Subject List</title>
<!-- Bootstrap 3.3.7 -->
<link rel="stylesheet" href="../files/css/bootstrap.min.css">
  <link rel="stylesheet" href="../files/css/AdminLTE.min.css">
   <link rel="stylesheet" href="../files/css/styles.css?v=1">
</head>

<body>
<?php require 'nav.php'; ?>
    <div class="cover main">
      <?php
      echo "<h1>Subject List</h1>";
       ?>
    </div>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
<section class="content">
     
    <div class="row">
        <div class="col-xs-12">
         
        <br>
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Displaying Subject List</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-hover table-striped">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Subjects</th>
                  <th>Course</th>
                  <th>Semester</th>
                  <th>Action</th>
                </tr>
                </thead>
                <?php
	$sel1="select * from tbl_teachersubject t inner join tbl_subject s  inner join tbl_course c inner join
  tbl_semester sem on t.subject_id=s.subject_id  and c.course_id = s.course_id and sem.semester_id = s.semester_id
  where teacher_id='".$_SESSION["uid"]."'";
	$rows=mysql_query($sel1);
	$i=0;
	while($data1=mysql_fetch_array($rows))
	{
		$i++;
	?>
                <tbody>
                <tr>
                <td><?php echo $i;?></td>
      <td><?php echo $data1["subject_name"];?></td>
      <td><?php echo $data1["course_name"];?></td>
      <td><?php echo $data1["semester_name"];?></td>
      <td><a href="lecture.php?sid=<?php echo $data1["teachersubject_id"];?>">Add Lectures</a></td>
                
                </tr>
                <?php
	}
	?>
            
               
            
                </tbody>
              
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>

    </section>
    <!-- /.content -->
    </div>
  <!-- /.content-wrapper -->

</body>
</html>