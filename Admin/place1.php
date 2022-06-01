<?php
include("../Connection/connection.php");
session_start();
if(isset($_GET["delid"]))
{
	$del="delete from tbl_place where place_id='".$_GET["delid"]."'";
	if(mysql_query($del))
		{
			header("location:place1.php");
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
    <title>Place</title>
    
<!-- Bootstrap 3.3.7 -->
<link rel="stylesheet" href="../files/css/bootstrap.min.css">
  <link rel="stylesheet" href="../files/css/AdminLTE.min.css">
  <link rel="stylesheet" href="../files/css/styles.css?v=1">

</head>
<body class="hold-transition skin-blue sidebar-mini">
<?php require('nav.php'); ?> 
<div class="cover main">
    <h1>Place Details</h1>
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
              <h3 class="box-title">Displaying Student's Info</h3><br><br>
              <h3 class="box-title"><a href="add_place.php"><button type="button" class="btn btn-block btn-primary btn-sm">Add New Places</button></a></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-hover table-striped">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Place Name</th>
                  <th>Action</th>
                </tr>
                </thead>
                <?php
	$sel1="select * from tbl_place order by place_id desc";
	$rows=mysql_query($sel1);
	$i=0;
	while($data1=mysql_fetch_array($rows))
	{
		$i++;
	?>
                <tbody>
                <tr>
                <td><?php echo $i;?></td>
      <td><?php echo $data1["place_name"];?></td>
      <td><a href="place1.php?delid=<?php echo $data1["place_id"];?>">Delete</a></td>
                
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