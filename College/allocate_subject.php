<?php
include ("../Connection/connection.php");
session_start();
if(isset($_POST["Save"]))
{
	$ins="insert into tbl_teachersubject(teacher_id, subject_id)values('".$_POST["teachers"]."','".$_POST["subjects"]."')";
	mysql_query($ins);
}
?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Allocate Subjects</title>
<!-- Bootstrap 3.3.7 -->
<link rel="stylesheet" href="../files/css/bootstrap.min.css">
<link rel="stylesheet" href="../files/css/AdminLTE.min.css">
<link rel="stylesheet" href="../files/css/styles.css?v=1">
</head>



<body style="font-size: 15px;" class="hold-transition skin-blue sidebar-mini">
<?php require('nav.php'); ?> 
<div class="cover main">
    <h1>Allocate Subjects</h1>
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
                  <label>Teachers</label>
                        <select class="form-control select2" name="teachers" id="Course" onchange="getPlace(this.value)" style="width: 100%;" required>
                        <option selected="">Choose....</option>
                        <?php
            $seld="select * from tbl_teacher where college_id ='".$_SESSION["uid"]."'";
            $rowd=mysql_query($seld);
            while($data_teacher=mysql_fetch_array($rowd))
            {
                ?>
                <option value="<?php echo $data_teacher['teacher_id']?>"><?php echo $data_teacher["teacher_name"]?></option>
                <?php
            }
            ?>
                        </select>
                  </div>
                  </div>

                  <div class="col-md-12">
                  <div class="form-group">
                  <label>Subjects</label>
                        <select class="form-control select2" name="subjects" id="subjects" onchange="getPlace(this.value)" style="width: 100%;" required>
                        <option selected="">Choose....</option>
                        <?php
            $seld1="select * from tbl_subject";
            $rowd1=mysql_query($seld1);
            while($data_subject=mysql_fetch_array($rowd1))
            {
                ?>
                <option value="<?php echo $data_subject['subject_id']?>"><?php echo $data_subject["subject_name"]?></option>
                <?php
            }
            ?>
                        </select>
                  </div>

                </div>
                <!-- /.col -->
              </div>

              
              <!-- /.row -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
            <button type="submit" class="btn btn-block btn-primary btn-lg" name="Save" id="Save">Allocate Subject</button>
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