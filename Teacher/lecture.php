<?php
include("../Connection/connection.php");
if(isset($_POST["Save"]))
{
    $lecture=$_FILES["File"]["name"];
    $temp = $_FILES["File"]["tmp_name"];
    move_uploaded_file($temp,"../Assets/Lecture/".$lecture);
		$ins="insert into tbl_lecture(lecture_title, lecture_file, lecture_date, teachersubject_id)values('".$_POST["Title"]."','".$lecture."', curdate(),'".$_GET["sid"]."')";
		if(mysql_query($ins))
		{
			header("location:lecture.php");
		}
		else
		{
			echo $ins;
		}
	
}
?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="../files/css/bootstrap.min.css">
<link rel="stylesheet" href="../files/css/AdminLTE.min.css">
<link rel="stylesheet" href="../files/css/styles.css?v=1">
<title>Lecture</title>
</head>

<body style="font-size: 15px;" class="hold-transition skin-blue sidebar-mini">
<?php require('nav.php'); ?> 
<div class="cover main">
    <h1>Add Lectures</h1>
</div>

<div class="content-wrapper">

    <!-- Main content -->
    <section class="content">

         <!-- Forms -->
     
         <br>
        <div class="box box-default">
          <div class="box-header with-border">
            <h3 class="box-title">Please add the lecture</h3>

            
          </div>
          <!-- /.box-header -->
          

            <div class="box-body">
              <div class="row">
                <form method="POST" class="" enctype="multipart/form-data">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Lecture Title</label>
                    <input type="text" class="form-control" name="Title" required="required" autocomplete="off"  onchange="nameval(this)" autofocus="autofocus" title="only alphabets">
                    <div id="name"></div>
                  </div>
                  <!-- /.form-group -->
                </div>
                <!-- /.col -->
                <div class="col-md-6">
                <div class="form-group">
                    <label>File</label>
                    <input type="file" class="form-control" name="File" id="File" required>
                </div>
                  <!-- /.form-group -->
                </div>
                <!-- /.col -->
              </div>

              
              <!-- /.row -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
            <button type="submit" class="btn btn-block btn-primary btn-lg" name="Save">Submit Lecture</button>
            </div>
          </div>
          </form>
      
      <!-- /Form -->

    </section>
    <!-- /.content -->
    </div>
  <!-- /.content-wrapper -->
  


</body>


</html>