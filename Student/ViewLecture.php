<?php
include("../Connection/connection.php");
session_start();
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
    <h1>All Lectures</h1>
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
              <h3 class="box-title">Displaying All Available Lectures</h3><br><br>  
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-hover table-striped">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Lecture Name</th>
                  <th>File</th>
                  <th>Uploaded On</th>
                  <th>Action</th>
                </tr>
                </thead>
                <?php
    $sel="select * from tbl_lecture where teachersubject_id = '".$_GET["sid"]."'";
    $row=mysql_query($sel);
    $i=0;
    while($data2=mysql_fetch_array($row))
    {
      $i++;
    ?>
        <tr>
        <td><?php echo $i;?>;</td>
        <td><?php echo $data2["lecture_title"];?></td>
        <td><?php echo $data2["lecture_file"];?></td>
        <td><?php echo $data2["lecture_date"];?></td>
        <td><a href="../Assets/Lecture/<?php echo $data2["lecture_file"];?>" target="_blank">Download</a></td>
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























<!--DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Your Lectures</title>
</head>
<body>
	 <table width="200" border="1" align="center" cellpadding="10">
   <tr>
     <td>Sl.no</td>
     <td>Title</td>
     <td>File</td>
     <td>Date</td>
     <td>Action</td>
   </tr>
   <?php
    include("../Connection/connection.php");
	session_start();
    $sel="select * from tbl_lecture where teachersubject_id = '".$_GET["sid"]."'";
    $row=mysql_query($sel);
    $i=0;
    while($data2=mysql_fetch_array($row))
    {
      $i++;
    ?>
        <tr>
        <td><?php echo $i;?>;</td>
        <td><?php echo $data2["lecture_title"];?></td>
        <td><?php echo $data2["lecture_file"];?></td>
        <td><?php echo $data2["lecture_date"];?></td>
        <td><a href="../Assets/StudentPhoto/<?php echo $data2["lecture_file"];?>" target="_blank">Download</a></td>
      </tr> 
      <?php
    }
	?>
    </table>
  </div>
</form>
<br />
<br />

</body>
</html-->