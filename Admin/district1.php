<?php
include("../Connection/connection.php");
session_start();
if(isset($_POST["btn_save"]))
{
	if($_GET["eid"])
	{
		$up="update tbl_district set district_name='".$_POST["txt_district"]."' where district_id='".$_GET["eid"]."'";
		if(mysql_query($up))
		{
			header("location:district1.php");
		}
		else
		{
			echo $up;
		}
	}
	else
	{
		$ins="insert into tbl_district(district_name)values('".$_POST["txt_district"]."')";
		if(mysql_query($ins))
		{
			header("location:district1.php");
		}
		else
		{
			echo $ins;
		}
	} 
}
if(isset($_GET["delid"]))
{
	$del="delete from tbl_district where district_id='".$_GET["delid"]."'";
	if(mysql_query($del))
		{
			header("location:district1.php");
		}
		else
		{
			echo $del;
		}
}
if(isset($_GET["eid"]))
{
	$sel="select * from tbl_district where district_id='".$_GET["eid"]."'";
	$row=mysql_query($sel);
	$district_data=mysql_fetch_array($row);
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
        <h1>District Details</h1>
    </div>
    
    <div class="content-wrapper">
    
        <!-- Main content -->
        <section class="content">
    
             <!-- Forms -->
         
             <br>
            <div class="box box-default">
              <div class="box-header with-border">
                <h3 class="box-title">Please Add A District</h3>
    
                
              </div>
              <!-- /.box-header -->
              
    
                <div class="box-body">
                  <div class="row">
                    <form method="POST" class="" enctype="multipart/form-data">
                    <div class="col-md-12">
                    <div class="form-group">
                        <label>District</label>
                        <input type="text" class="form-control" name="txt_district" id="txt_district"  value="<?php if(isset($district_data["district_name"]))
	  echo $district_data["district_name"];?>" required="required" autocomplete="off"  onchange="nameval(this)" autofocus="autofocus" title="only alphabets">
                    <div id="name"></div>
                    </div>
                      <!-- /.form-group -->
                    </div>
                    <!-- /.col -->
                  </div>
                <div class="box-footer">
                <button type="submit" class="btn btn-block btn-primary btn-lg" name="btn_save" id="btn_save" >Save District</button>
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
                  <h3 class="box-title">Displaying All Districts</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-hover table-striped">
                    <thead>
                    <tr>
                      <th>#</th>
                      <th>District Name</th>
                      <th>Action</th>
                    </tr>
                    </thead>
                    <?php
	$sel1="select * from tbl_district";
	$rows=mysql_query($sel1);
	$i=0;
	while($data1=mysql_fetch_array($rows))
	{
		$i++;
	?>
    <tr>
      <td><?php echo $i;?></td>
      <td><?php echo $data1["district_name"];?></td>
      <td><a href="district1.php?delid=<?php echo $data1["district_id"];?>">Delete</a>
      &nbsp;&nbsp;&nbsp;<a href="district1.php?eid=<?php echo $data1["district_id"];?>">Edit</a></td>
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