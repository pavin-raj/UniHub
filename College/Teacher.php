<?php
include("../Connection/connection.php");
session_start();
if(isset($_GET["delid"]))
{
	$del="delete from tbl_teacher where teacher_id='".$_GET["delid"]."'";
	mysql_query($del);
}
?>





<!--?php
include("../Connection/connection.php");
if(isset($_POST["Save"]))
{

	$Aphoto=$_FILES["Photo"]["name"];
  $temp = $_FILES["Photo"]["tmp_name"];
  move_uploaded_file($temp,"../Assets/TeacherPhoto/".$Aphoto);	
  $ins="insert into tbl_teacher (teacher_name, teacher_email, teacher_password, teacher_address, place_id, teacher_contact, 
  teacher_photo)values('".$_POST["Name"]."','".$_POST["Email"]."',
    '".$_POST["Password"]."','".$_POST["Address"]."', '".$_POST["Place"]."', 
    '".$_POST["Contact"]."' ,'".$Aphoto."')";
		if(mysql_query($ins))
		{
			header("location:Teacher.php");
		}
		else
		{
			echo $ins;
		}
	
}
?>-->

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Teacher</title>
<script src="../Jq/jQuery.js"></script>
<script>
function getPlace(did)
{
	//alert(did);
	$.ajax({
	url: "../Ajaxpages/Ajaxplace.php?did="+did,
	 
	  success: function(html){
		$("#Place").html(html);
		
	  }
	});
}
</script>
</head>
<!-- Bootstrap 3.3.7 -->
<link rel="stylesheet" href="../files/css/bootstrap.min.css">
<link rel="stylesheet" href="../files/css/AdminLTE.min.css">
<link rel="stylesheet" href="../files/css/styles.css?v=1">






<body style="font-size: 15px;">
<?php require 'nav.php'; ?>
<div class="cover main">
    <h1>Teacher List</h1>
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
              <h3 class="box-title">Displaying Teacher's Info</h3><br><br>
              <h3 class="box-title"><a href="add_teacher.php"><button type="button" class="btn btn-block btn-primary btn-sm">Add New Teachers</button></a></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-hover table-striped">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>E-mail</th>
                  <th>Place</th>
                  <th>Address</th>
                  <th>Contact</th>
                  <th>Photo</th>
                  <th>Action</th>
                </tr>
                </thead>
                <?php
	$sel1="select * from tbl_teacher t inner join tbl_place p on t.place_id = p.place_id where college_id='".$_SESSION["uid"]."'";
	$rows=mysql_query($sel1);
	$i=0;
	while($data1=mysql_fetch_array($rows))
	{
		$i++;
	?>
                <tbody>
                <tr>
                <td><?php echo $i;?></td>
      <td><?php echo $data1["teacher_name"];?></td>
      <td><?php echo $data1["teacher_email"];?></td>
      <td><?php echo $data1["place_name"];?></td>
      <td><?php echo $data1["teacher_address"];?></td>
      <td><?php echo $data1["teacher_contact"];?></td>
      <td><?php echo $data1["teacher_photo"];?></td>
      <td><a href="Teacher.php?delid=<?php echo $data1["teacher_id"];?>">Delete</a></td>
                
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





<!--body>
<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
  <table width="200" border="1" align="center">
    <tr>
      <td>Name</td>
      <td><label for="Name"></label>
      <input type="text" name="Name" id="Name" /></td>
    </tr>
    <tr>
      <td>Email</td>
      <td><p>
        <label for="Email"></label>
        <input type="text" name="Email" id="Email" />
      </p></td>
    </tr>
    <tr>
      <td>Password</td>
      <td><label for="Password"></label>
      <input type="password" name="Password" id="Password" /></td>
    </tr>
    <tr>
          <td>District</td>
          <td><label for="District"></label>
            <select name="District" id="District" onchange="getPlace(this.value)">
            <option>---Select---</option>
            <?php
            $seld="select * from tbl_district";
            $rowd=mysql_query($seld);
            while($data_district=mysql_fetch_array($rowd))
            {
                ?>
                <option value="<?php echo $data_district['district_id']?>"><?php echo $data_district['district_name']?></option>
                <?php
            }
            ?>
    </tr>
    <tr>
          <td>Place</td>
          <td><label for="Place"></label>
            <select name="Place" id="Place">
    </tr>     
    <tr>
      <td>Address</td>
      <td><label for="Address"></label>
    <textarea name="Address"></textarea></td>
    </tr>
    <tr>
      <td>Contact</td>
      <td><label for="Contact"></label>
      <input type="text" name="Contact" id="Contact" /></td>
    </tr>
    <tr>
      <td>Photo</td>
      <td><label for="Photo"></label>
      <input type="file" name="Photo" id="Photo" /></td>
      </tr>
      <tr>
        <td colspan="2" align="center"><input type="submit" name="Save" id="Save" value="Save" />
        <input type="submit" name="Cancel" id="Cancel" value="Cancel" /></td>
      </tr>
  </table>
  <hr />
  <br />
 <table width="200" border="1" align="center" cellpadding="10">  
    <tr>
      <td>Sl.no</td>
      <td>Name</td>
      <td>E-mail</td>
      <td>Place</td>
      <td>Address</td>
      <td>Contact</td>
      <td>Photo</td>
      <td>Action</td>
    </tr>
    <?php
	$sel1="select * from tbl_teacher t inner join tbl_place p on t.place_id = p.place_id";
	$rows=mysql_query($sel1);
	$i=0;
	while($data1=mysql_fetch_array($rows))
	{
		$i++;
	?>
    <tr>
      <td><?php echo $i;?>;</td>
      <td><?php echo $data1["teacher_name"];?></td>
      <td><?php echo $data1["teacher_email"];?></td>
      <td><?php echo $data1["place_name"];?></td>
      <td><?php echo $data1["teacher_address"];?></td>
      <td><?php echo $data1["teacher_contact"];?></td>
      <td><?php echo $data1["teacher_photo"];?></td>
      <td><a href="Teacher.php?delid=<?php echo $data1["teacher_id"];?>">Delete</a></td>
    </tr>
    <?php
	}
	?>
  </table>
</form>
</body>-->


</html>