<?php
include("../Connection/connection.php");
session_start();
if(isset($_POST["btn_save"]))
{
		$ins="insert into tbl_place(district_id,place_name)values('".$_POST["sel_district"]."','".$_POST["txt_place"]."')";
		if(mysql_query($ins))
		{
			header("location:place1.php");
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
<title>Place</title>
<!-- Bootstrap 3.3.7 -->
<link rel="stylesheet" href="../files/css/bootstrap.min.css">
  <link rel="stylesheet" href="../files/css/AdminLTE.min.css">
  <link rel="stylesheet" href="../files/css/styles.css?v=1">
</head>



<body style="font-size: 15px;" class="hold-transition skin-blue sidebar-mini">
<?php require('nav.php'); ?> 
<div class="cover main">
    <h1>Add Place</h1>
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
                  <label>District</label>
                        <select class="form-control select2" name="sel_district" id="sel_district" onchange="getPlace(this.value)" style="width: 100%;" required>
                        <option selected="">Choose....</option>
                        <?php
		$seld="select * from tbl_district";
		$rowd=mysql_query($seld);
		while($datad=mysql_fetch_array($rowd))
		{
		?>
        <option value="<?php echo $datad['district_id']?>"><?php echo $datad["district_name"]?></option>
        <?php
		}
		?>
                        </select>
                  </div>

                  <div class="form-group">
                    <label>Place</label>
                    <input type="text" class="form-control select2" name="txt_place" id="txt_place" required />
                </div>
                  <!-- /.form-group -->
                </div>
                <!-- /.col -->
                
              </div>

              
              <!-- /.row -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
            <button type="submit" class="btn btn-block btn-primary btn-lg" name="btn_save" id="btn_save">Submit Place Details</button>
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
<form id="form1" name="form1" method="post" action="">
  <table width="200" border="1" align="center" cellpadding="10" style="border-collapse:collapse;">
    <tr>
      <td>District</td>
      <td><label for="sel_district"></label>
        <select name="sel_district" id="sel_district">
        <option>---Select---</option>
        <?php
		$seld="select * from tbl_district";
		$rowd=mysql_query($seld);
		while($datad=mysql_fetch_array($rowd))
		{
		?>
        <option value="<?php echo $datad['district_id']?>"><?php echo $datad["district_name"]?></option>
        <?php
		}
		?>
      </select></td>
    </tr>
    <tr>
      <td>Place</td>
      <td><label for="txt_place"></label>
      <input type="text" name="txt_place" id="txt_place" /></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btn_save" id="btn_save" value="Save" /></td>
    </tr>
  </table>
 <hr />
  <br />
</form>
</body>-->
</html>