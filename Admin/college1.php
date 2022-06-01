<?php
include("../Connection/connection.php");
session_start();
if(isset($_GET["delid"]))
{
	$del="delete from tbl_college where college_id='".$_GET["delid"]."'";
	if(mysql_query($del))
		{
			header("location:college1.php");
		}
		else
		{
			echo $del;
		}
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Location Info</title>
<link rel="stylesheet" href="../files/css/bootstrap.min.css">
<link rel="stylesheet" href="../files/css/AdminLTE.min.css">
<link rel="stylesheet" href="../files/css/styles.css?v=1">
</head>



<body style="font-size: 15px;" class="hold-transition skin-blue sidebar-mini">
    <?php require('nav.php'); ?> 
    <div class="cover main">
        <h1>College Details</h1>
    </div>
    
    <div class="content-wrapper">
    
        <!-- Main content -->
        <section class="content">
    
          <div class="row">
            <div class="col-xs-12">
             
            <br>
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Displaying All Colleges</h3><br><br>
                  <h3 class="box-title"><a href="college.php"><button type="button" class="btn btn-block btn-primary btn-sm">Add New Colleges</button></a></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-hover table-striped">
                    <thead>
                    <tr>
                      <th>#</th>
                      <th>College Name</th>
                      <th>College Contact</th>
                      <th>College Email</th>
                      <th>College Address</th>
                      <th>Place</th>
                      <th>Action</th>
                    </tr>
                    </thead>
                    <?php
	$sel1="select * from tbl_college college inner join tbl_place place on college.place_id = place.place_id";
	$rows=mysql_query($sel1);
	$i=0;
	while($data1=mysql_fetch_array($rows))
	{
		$i++;
	?>
    <tr>
      <td><?php echo $i;?></td>
      <td><?php echo $data1["college_name"];?></td>
      <td><?php echo $data1["college_contact"];?></td>
      <td><?php echo $data1["college_email"];?></td>
      <td><?php echo $data1["college_address"];?></td>
      <td><?php echo $data1["place_name"];?></td>
      <td><a href="college1.php?delid=<?php echo $data1["college_id"];?>">Delete</a>
      &nbsp;&nbsp;&nbsp;<a href="college.php?eid=<?php echo $data1["college_id"];?>">Edit</a></td>
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
    
</body>
</html>