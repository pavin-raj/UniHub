<?php
include ("../Connection/connection.php");
session_start();
if(isset($_POST["btn_save"]))
{
	if($_GET["eid"])
	{
		$up="update tbl_course set course_name='".$_POST["txt_course"]."' where course_id='".$_GET["eid"]."'";
		if(mysql_query($up))
		{
			header("location:Course.php");
		}
		else
		{
			echo $up;
		}
	}
	else
	{
		$ins="insert into tbl_course(course_name)values('".$_POST["txt_course"]."')";
		if(mysql_query($ins))
		{
			header("location:Course.php");
		}
		else
		{
			echo $ins;
		}
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

<body style="font-size: 15px;" class="hold-transition skin-blue sidebar-mini">
<?php require('nav.php'); ?> 
<div class="cover main">
    <h1>Add Course</h1>
</div>

<div class="content-wrapper">

    <!-- Main content -->
    <section class="content">

         <!-- Forms -->
     
         <br>
        <div class="box box-default">
          <div class="box-header with-border">
            <h3 class="box-title">Please fill up the details below</h3>

            
          </div>
          <!-- /.box-header -->
          

            <div class="box-body">
              <div class="row">
                <form method="POST" class="" enctype="multipart/form-data">
                <div class="col-md-12">

                  <div class="form-group">
                  <label for="txt_course">Course Name</label>
                  <input type="text" class="form-control select2" name="txt_course" id="txt_course"  
                  value="<?php if(isset($data["course_name"])) echo $data["course_name"];?>" required/>
                  </div>
                </div>
                <!-- /.col -->
                
              </div>

              
              <!-- /.row -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
            <button type="submit" class="btn btn-block btn-primary btn-lg" name="btn_save" id="btn_save">Submit Course Details</button>
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