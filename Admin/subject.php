<?php
include ("../Connection/connection.php");
if(isset($_GET["delid"]))
{
	$del="delete from tbl_subject where subject_id='".$_GET["delid"]."'";
	mysql_query($del);
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
     
     
     
     <body class="hold-transition skin-blue sidebar-mini">
<?php require('nav.php'); ?> 
<div class="cover main">
    <h1>All Subjects</h1>
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
              <h3 class="box-title">Displaying Subjects Info</h3><br><br>
              <h3 class="box-title"><a href="add_subject.php"><button type="button" class="btn btn-block btn-primary btn-sm">Add New Subjects</button></a></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-hover table-striped">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Subject Name</th>
                  <th>Course Name</th>
                  <th>Semester</th>
                  <th>Action</th>
                </tr>
                </thead>
                <?php
        $sel1="select * from tbl_subject s inner join tbl_course c  on s.course_id=c.course_id inner join tbl_semester sr on sr.semester_id=s.semester_id ";
        $rows=mysql_query($sel1);
        $i=0;
        while($data1=mysql_fetch_array($rows))
        {
            $i++;
        ?>
    <tr>
      <td><?php echo $i;?></td>
      <td><?php echo $data1["subject_name"];?></td>
      <td><?php echo $data1["course_name"];?></td>
      <td><?php echo $data1["semester_id"];?></td>
      <td><a href="subject.php?delid=<?php echo $data1["subject_id"];?>">Delete</a>&nbsp; &nbsp; &nbsp;<a href="add_subject.php?eid=<?php echo $data1["subject_id"];?>">Edit</a></td>
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
      <table width="367" border="1" align="center" cellpadding="10">
        <tr>
          <td width="20">Sl. No</td>
          <td width="44">Course</td>
          <td width="56">Semester</td>
          <td width="37">Name</td>
          <td width="86" colspan="2">Action</td>
        </tr>
        <?php
        $sel1="select * from tbl_subject s inner join tbl_course c  on s.course_id=c.course_id inner join tbl_semester sr on sr.semester_id=s.semester_id ";
        $rows=mysql_query($sel1);
        $i=0;
        while($data1=mysql_fetch_array($rows))
        {
            $i++;
        ?>
        <tr>
          <td><?php echo $i;?>;</td>
          <td><?php echo $data1["course_name"];?></td>
          <td><?php echo $data1["semester_name"];?></td>
            <td><?php echo $data1["subject_name"];?></td>
    
          <td><a href="Subject.php?delid=<?php echo $data1["subject_id"];?>">Delete</a>/<a href="Syllabus.php?sid=<?php echo $data1["subject_id"];?>">Add Syllabus</a></td></td>
        </tr>
        <?php
        }
        ?>
      </table>
    </form>

     </body>-->
</html>

