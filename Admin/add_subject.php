<?php
include ("../Connection/connection.php");
session_start();
if(isset($_POST["Submit"]))
{
  if(isset($_GET["eid"]))
	{
		$up="update tbl_subject set subject_name='".$_POST["SubjectName"]."' where subject_id='".$_GET["eid"]."'";
		if(mysql_query($up))
		{
			header("location:subject.php");
		}
		else
		{
			echo $up;
		}
	}
  else
  {
    $ins="insert into tbl_subject(subject_name, course_id, semester_id)values('".$_POST["SubjectName"]."','".$_POST["Course"]."','".$_POST["Semester"]."')";
    if(mysql_query($ins))
		{
			header("location:subject.php");
		}
		else
		{
			echo $ins;
		}
  }
}

if(isset($_GET["eid"]))
{
	$sel="select * from tbl_subject where subject_id='".$_GET["eid"]."'";
	$row=mysql_query($sel);
	$subject_data=mysql_fetch_array($row);
}
?>

<html>
	<head>
    	<title>Subject</title>
      <!-- Bootstrap 3.3.7 -->
        <link rel="stylesheet" href="../files/css/bootstrap.min.css">
        <link rel="stylesheet" href="../files/css/AdminLTE.min.css">
        <link rel="stylesheet" href="../files/css/styles.css?v=1">
  </head>
  <body style="font-size: 15px;" class="hold-transition skin-blue sidebar-mini">
<?php require('nav.php'); ?> 
<div class="cover main">
    <h1>Add Subject</h1>
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
                    <label>Subject Name</label>
                    <input type="text" class="form-control" name="SubjectName" id="SubjectName" required="required" 
                    autocomplete="off"  onchange="nameval(this)" autofocus="autofocus" title="only alphabets" value="<?php if(isset($subject_data["subject_name"]))
	  echo $subject_data["subject_name"];?>">
                    <div id="name"></div>
                  </div>
                  <!-- /.form-group -->
                </div>
                <!-- /.col -->
                <div class="col-md-6">
                <div class="form-group">
                  <label>Course</label>
                        <select class="form-control select2" name="Course" id="Course" onchange="getPlace(this.value)" style="width: 100%;" required>
                        <option selected="">Choose....</option>
                        <?php
            $seld="select * from tbl_course";
            $rowd=mysql_query($seld);
            while($data_course=mysql_fetch_array($rowd))
            {
                ?>
                <option value="<?php echo $data_course['course_id']?>"><?php echo $data_course["course_name"]?></option>
                <?php
            }
            ?>
                        </select>
                  </div>
                  </div>

                  <div class="col-md-6">
                  <div class="form-group">
                  <label>Semester</label>
                        <select class="form-control select2" name="Semester" id="Semester" onchange="getPlace(this.value)" style="width: 100%;" required>
                        <option selected="">Choose....</option>
                        <?php
            $seld="select * from tbl_semester";
            $rowd=mysql_query($seld);
            while($data_semester=mysql_fetch_array($rowd))
            {
                ?>
                <option value="<?php echo $data_semester['semester_id']?>"><?php echo $data_semester["semester_name"]?></option>
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
            <button type="submit" class="btn btn-block btn-primary btn-lg" name="Submit" id="Submit">Submit Subject Details</button>
            </div>
          </div>
          </form>
      
      <!-- /Form -->

    </section>
    <!-- /.content -->
    </div>
  <!-- /.content-wrapper -->
  


</body>



     
     
     
     





     <!--<body>
         <form name="form1" method="post" action="">
      <table width="200" border="1" align="center">
        <tr>
          <td>Course</td>
          <td><label for="Course"></label>
            <select name="Course" id="Course">
            <option>---Select---</option>
            <?php
            $seld="select * from tbl_course";
            $rowd=mysql_query($seld);
            while($data_course=mysql_fetch_array($rowd))
            {
                ?>
                <option value="<?php echo $data_course['course_id']?>"><?php echo $data_course["course_name"]?></option>
                <?php
            }
            ?>
          </select></td>
        </tr>
        <tr>
          <td>Semester</td>
          <td><label for="Semester"></label>
            <select name="Semester" id="Semester">
            <option>---Select---</option>
            <?php
            $seld="select * from tbl_semester";
            $rowd=mysql_query($seld);
            while($data_semester=mysql_fetch_array($rowd))
            {
                ?>
                <option value="<?php echo $data_semester['semester_id']?>"><?php echo $data_semester["semester_name"]?></option>
                <?php
            }
            ?>
          </select></td>
        </tr>
        <tr>
          <td>Subject Name</td>
          <td><label for="SubjectName"></label>
          <input type="text" name="SubjectName" id="SubjectName"></td>
        </tr>
        <tr>
          <td colspan="2" align="center"> <input type="submit" name="Submit" id="Submit" value="Submit"></td>
        </tr>
      </table>
      <hr />
      
    </form>

     </body>-->
</html>

