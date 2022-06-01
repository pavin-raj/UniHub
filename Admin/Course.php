<?php
include ("../Connection/connection.php");
session_start();
if(isset($_GET["delid"]))
{
	$del="delete from tbl_course where course_id='".$_GET["delid"]."'";
	if(mysql_query($del))
		{
			header("location:Course.php");
		}
		else
		{
			echo $del;
		}
}
if(isset($_GET["eid"]))
{
	$sel="select * from tbl_course where course_id='".$_GET["eid"]."'";
	$row=mysql_query($sel);
	$data=mysql_fetch_array($row);
}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Course</title>
<!-- Bootstrap 3.3.7 -->
<link rel="stylesheet" href="../files/css/bootstrap.min.css">
<link rel="stylesheet" href="../files/css/AdminLTE.min.css">
<link rel="stylesheet" href="../files/css/styles.css?v=1">
</head>

<body class="hold-transition skin-blue sidebar-mini">
<?php require('nav.php'); ?> 
<div class="cover main">
    <h1>All Courses</h1>
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
              <h3 class="box-title">Displaying Course Info</h3><br><br>
              <h3 class="box-title"><a href="add_course.php"><button type="button" class="btn btn-block btn-primary btn-sm">Add New Courses</button></a></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-hover table-striped">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Course Name</th>
                  <th>Action</th>
                </tr>
                </thead>
				<?php
	$sel1="select * from tbl_course";
	$rows=mysql_query($sel1);
	$i=0;
	while($data1=mysql_fetch_array($rows))
	{
		$i++;
	?>
    <tr>
      <td><?php echo $i;?></td>
      <td><?php echo $data1["course_name"];?></td>
      <td><a href="Course.php?delid=<?php echo $data1["course_id"];?>">Delete</a>&nbsp; &nbsp; &nbsp;<a href="add_course.php?eid=<?php echo $data1["course_id"];?>">Edit</a></td>
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