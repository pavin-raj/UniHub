<?php
include("../Connection/connection.php");
session_start();
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>View Lectures</title>
<link rel="stylesheet" href="../files/css/bootstrap.min.css">
<link rel="stylesheet" href="../files/css/AdminLTE.min.css">
<link rel="stylesheet" href="../files/css/styles.css?v=1">
<script src="../Jq/jQuery.js"></script>
<script>
function getSubject(sid)
{
	//alert(sid);
	$.ajax({
	url: "../Ajaxpages/Ajaxsubject.php?sid="+sid,
	 
	  success: function(html){
		$("#Subjects").html(html);
		
	  }
	});
}
</script>
</head>




<body style="font-size: 15px;" class="hold-transition skin-blue sidebar-mini">
<?php require('nav.php'); ?> 
<div class="cover main">
    <h1>Select Lecture</h1>
</div>

<div class="content-wrapper">

    <!-- Main content -->
    <section class="content">

         <!-- Forms -->
     
         <br>
        <div class="box box-default">
          <div class="box-header with-border">
            <h3 class="box-title">Please select the lecture</h3>

            
          </div>
          <!-- /.box-header -->
          

            <div class="box-body">
              <div class="row">
                <form method="POST" class="" enctype="multipart/form-data">
                <div class="col-md-6">
                <div class="form-group">
                  <label>Semester</label>
                        <select class="form-control select2" name="semester" onchange="getSubject(this.value)" style="width: 100%;" required>
                        <option selected="">Choose....</option>
                        <?php
            $sel1="select * from tbl_semester";
            $row1=mysql_query($sel1);
            while($data_semester=mysql_fetch_array($row1))
            {
                ?>
                <option value="<?php echo $data_semester['semester_id']?>"><?php echo $data_semester['semester_name']?></option>
                <?php
            }
            ?>
                        </select>
                  </div>
                  <!-- /.form-group -->
                </div>
                <!-- /.col -->
                <div class="col-md-6">
                <div class="form-group">
                    <label>Subject</label>
                    <select class="form-control select2" name="Subjects" id="Subjects" required></select>
                </div>
                  <!-- /.form-group -->
                </div>
                <!-- /.col -->
              </div>
            <div class="box-footer">
            <button type="submit" class="btn btn-block btn-primary btn-lg" name="submit">Get Lectures</button>
            </div>
              
              <!-- /.row -->
            </div>
            <!-- /.box-body -->

            
          </div>
          </form>
      
      <!-- /Form -->


      <div class="row">
        <div class="col-xs-12">
         
        <br>
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Displaying All Available Lectures</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-hover table-striped">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Teacher Name</th>
                  <th>Action</th>
                </tr>
                </thead>
                <?php
  if(isset($_POST["submit"]))
  {
    $sel2="select * from tbl_teacher teacher inner join tbl_teachersubject teachersubject on 
    teacher.teacher_id = teachersubject.teacher_id inner join tbl_subject subject on
    teachersubject.subject_id = subject.subject_id inner join tbl_student student on
    student.course_id = subject.course_id and student.college_id = teacher.college_id where
    student.student_id = '".$_SESSION["uid"]."' AND teachersubject.subject_id = '".$_POST["Subjects"]."'";
    $row2=mysql_query($sel2);
    $i=0;
    while($data2=mysql_fetch_array($row2))
    {
      $i++;
    ?>
        <tr>
        <td><?php echo $i;?></td>
        <td><?php echo $data2["teacher_name"];?></td>
        <td><a href="ViewLecture.php?sid=<?php echo $data2["teachersubject_id"];?>">View Lectures</a></td>
      </tr> 
      <?php
    }
      die(mysql_error());
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

  

<!--<body>
<br />
<br />
<br />
<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
<div align="center">
  <table width="200" border="0" cellpadding="10">
  <tr>
          <td>Semester</td>
          <td><label for="Semester"></label>
            <select name="Semester" id="Semester" onchange="getSubject(this.value)">
            <option>---Select---</option>
            <?php
            $sel1="select * from tbl_semester";
            $row1=mysql_query($sel1);
            while($data_semester=mysql_fetch_array($row1))
            {
                ?>
                <option value="<?php echo $data_semester['semester_id']?>"><?php echo $data_semester['semester_name']?></option>
                <?php
            }
            ?>
          </select></td>
    </tr>
    <tr>
      <td>Subjects</td>
      <td><label for="Subjects"></label>
        <select name="Subjects" id="Subjects">
    </tr>
    <tr>
    <td colspan="2"><div align="right"><input type="submit" name="submit" id="submit" value="Submit" /></div></td>
    </tr>
  </table>
  <hr />
  <br />

 <table width="200" border="1" align="center" cellpadding="10">
   <tr>
     <td>Sl.no</td>
     <td>Teacher Name</td>
     <td>Action</td>
   </tr>
   <?php
  if(isset($_POST["submit"]))
  {
    $sel2="select * from tbl_teacher t inner join tbl_teachersubject ts on 
    t.teacher_id=ts.teacher_id inner join tbl_subject s on s.subject_id = ts.subject_id 
	where s.subject_id ='".$_POST["Subjects"]."'";
    $row2=mysql_query($sel2);
    $i=0;
    while($data2=mysql_fetch_array($row2))
    {
      $i++;
    ?>
        <tr>
        <td><?php echo $i;?>;</td>
        <td><?php echo $data2["teacher_name"];?></td>
        <td><a href="ViewLecture.php?sid=<?php echo $data2["teachersubject_id"];?>">View Lectures</a></td>
      </tr> 
      <?php
    }
  }
	?>
    </table>
  </div>
</form>
<br />
<br />-->

</body>

</html>