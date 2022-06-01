<?php
include("../Connection/connection.php");
session_start();
if(isset($_GET["delid"]))
{
	$del="delete from tbl_student where student_id='".$_GET["delid"]."'";
	mysql_query($del);
}
?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students Info</title>
    <!-- Bootstrap 3.3.7 -->
<link rel="stylesheet" href="../files/css/bootstrap.min.css">
  <link rel="stylesheet" href="../files/css/AdminLTE.min.css">
  <link rel="stylesheet" href="../files/css/styles.css?v=1">
</head>
<body style="font-size: 15px;">
<?php require 'nav.php'; ?>
<div class="cover main">
    <h1>Students Info</h1>
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
              <h3 class="box-title">Displaying Student's Info</h3><br><br>
              <h3 class="box-title"><a href="student.php"><button type="button" class="btn btn-block btn-primary btn-sm">Add New Students</button></a></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-hover table-striped">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Student's Name</th>
                  <th>E-mail</th>
                  <th>Address</th>
                  <th>Contact</th>
                  <th>Photo</th>
                  <th>Course</th>
                  <th>Year</th>
                  <th>Action</th>
                </tr>
                </thead>
                <?php
	$sel1="select * from tbl_student s inner join tbl_course c on s.course_id=c.course_id 
  where college_id = '".$_SESSION["uid"]."'";
	$rows=mysql_query($sel1);
	$i=0;
	while($data1=mysql_fetch_array($rows))
	{
		$i++;
	?>
                <tbody>
                <tr>
                <td><?php echo $i;?></td>
      <td><?php echo $data1["student_name"];?></td>
      <td><?php echo $data1["student_email"];?></td>
      <td><?php echo $data1["student_address"];?></td>
      <td><?php echo $data1["student_contact"];?></td>
      <td><?php echo $data1["student_photo"];?></td>
      <td><?php echo $data1["course_name"];?></td>
      <td><?php echo $data1["student_year"];?></td>
      <td><a href="student.php?delid=<?php echo $data1["student_id"];?>">Delete</a></td>
                
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



