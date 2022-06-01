<?php
include("../Connection/connection.php");
session_start();
if(isset($_POST["submit"]))
{
    $aphoto=$_FILES["photo"]["name"];
    $temp = $_FILES["photo"]["tmp_name"];
    move_uploaded_file($temp,"../Assets/StudentPhoto/".$aphoto);
		$ins="insert into tbl_student(student_name, student_email, student_password, student_address, place_id, student_contact, 
    student_photo, course_id, student_year, college_id)values('".$_POST["name"]."','".$_POST["email"]."',
    '".$_POST["password"]."','".$_POST["address"]."', '".$_POST["place"]."', '".$_POST["contact"]."'
    ,'".$aphoto."','".$_POST["course"]."','".$_POST["year"]."','".$_SESSION["uid"]."')";
		if(mysql_query($ins))
		{
			header("location:student.php");
		}
		else
		{
			echo $ins;
		}
	
}
if(isset($_GET["delid"]))
{
	$del="delete from tbl_student where student_id='".$_GET["delid"]."'";
	mysql_query($del);
}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Student</title>
<script src="../Jq/jQuery.js"></script>


<!-- Bootstrap 3.3.7 -->
<link rel="stylesheet" href="../files/css/bootstrap.min.css">
  <link rel="stylesheet" href="../files/css/AdminLTE.min.css">
  <link rel="stylesheet" href="../files/css/styles.css?v=1">


<script>
function getPlace(did)
{
	//alert(did);
	$.ajax({
	url: "../Ajaxpages/Ajaxplace.php?did="+did,
	 
	  success: function(html){
		$("#place").html(html);
		
	  }
	});
}
function chkpwd(txtrp, txtp)
{
	if((txtrp.value)!=(txtp.value))
	{
		document.getElementById("pass").innerHTML = "<span style='color: red;'>Passwords Mismatch</span>";
	}
}

function checknum(elem)
{
	var numericExpression = /^[0-9]{8,10}$/;
	if(elem.value.match(numericExpression))
	{
		document.getElementById("contact").innerHTML = "";
		return true;
	}
	else
	{
		document.getElementById("contact").innerHTML = "<span style='color: red;'>Numbers Only Allowed</span>";
		elem.focus();
		return false;
	}
}


function checkyear(elem)
{
	var numericExpression = /^[12][0-9]{3}$/;
	if(elem.value.match(numericExpression))
	{
		document.getElementById("year").innerHTML = "";
		return true;
	}
	else
	{
		document.getElementById("year").innerHTML = "<span style='color: red;'>Numbers Only Allowed</span>";
		elem.focus();
		return false;
	}
}


function emailval(elem)
{
	var emailexp=/^([a-zA-Z0-9.\_\-])+\@([a-zA-Z0-9.\_\-])+\.([a-zA-Z]{2,4})$/;
	if(elem.value.match(emailexp))
	{
		document.getElementById("content").innerHTML = "";
		return true;
	}
	else
	{
		
		document.getElementById("content").innerHTML ="<span style='color: red;'>Check Email Address Entered</span>";;
		elem.focus();
		return false;
	}
}
function nameval(elem)
{
	var emailexp=/^([A-Za-z ]*)$/;
	if(elem.value.match(emailexp))
	{
		document.getElementById("name").innerHTML = "";
		return true;
	}
	else
	{
		
		document.getElementById("name").innerHTML = "<span style='color: red;'>Alphabets Are Allowed</span>";
		elem.focus();
		return false;
	}
}
var check = function() {
  if (document.getElementById('password').value ==
    document.getElementById('confirm_password').value) {
    document.getElementById('message').style.color = 'green';
    document.getElementById('message').innerHTML = 'matching';
  } else {
    document.getElementById('message').style.color = 'red';
    document.getElementById('message').innerHTML = 'not matching';
  }
}
</script>
</head>

<body style="font-size: 15px;" class="hold-transition skin-blue sidebar-mini">
<?php require('nav.php'); ?> 
<div class="cover main">
    <h1>Add Student</h1>
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
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Students's Full Name</label>
                    <input type="text" class="form-control" name="name" required="required" autocomplete="off"  onchange="nameval(this)" autofocus="autofocus" title="only alphabets">
                    <div id="name"></div>
                  </div>
                  <!-- /.form-group -->

                  <div class="form-group">
                    <label>Student's Email</label>
                    <input type="email" class="form-control" name="email" id="email" required="required" autocomplete="off" onchange="emailval(this)"/>
                    <div id="content"></div>
                  </div>

                  
                  <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" name="password" id="password" required="required" autocomplete="off" pattern="/^[a-zA-Z0-9!@#\$%\^\&*_=+-]{8,12}$/g" 
                    onkeyup='check();'/>
                    <div id="pass"></div>
                  </div>

                    <div class="form-group">
                    <label>Confirm Password</label>
                    <input type="password" class="form-control" name="confirm_password" id="confirm_password" required="required" autocomplete="off" pattern="/^[a-zA-Z0-9!@#\$%\^\&*_=+-]{8,12}$/g" 
                    onkeyup='check();'>
                    <span id='message'></span>
                  </div>

                  <div class="form-group">
                    <label>Address</label>
                    <input type="text" class="form-control" name="address" id="address" required="required">
                  </div>

                  <div class="form-group">
                  <label>District</label>
                        <select class="form-control select2" name="district" onchange="getPlace(this.value)" style="width: 100%;" required>
                        <option selected="">Choose....</option>
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
                        </select>
                  </div>

                  
                  <!-- /.form-group -->
                </div>
                <!-- /.col -->
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Place</label>
                    <select class="form-control select2" name="place" id="place" required></select>
                </div>
                <div class="form-group">
                    <label>Student's Contact Number</label>
                    <input type="text" class="form-control" name="contact" required="required"  autocomplete="off" onchange="checknum(this)"/>
                    <div id="contact"></div>
                  </div>

                <div class="form-group">
                    <label>Photo</label>
                    <input type="file" class="form-control" name="photo" id="photo" required>
                </div>

                <div class="form-group">
                  <label>Course</label>
                        <select class="form-control select2" name="course" style="width: 100%;" required>
                        <option selected="">Choose....</option>
                        <?php
		$seld="select * from tbl_course";
		$rowd=mysql_query($seld);
		while($datad=mysql_fetch_array($rowd))
		{
		?>
        <option value="<?php echo $datad['course_id']?>">
        <?php echo $datad["course_name"]?></option>
        <?php
		}
		?>
                        </select>
                  </div>

                  <div class="form-group">
                    <label>Year</label>
                    <input type="text" class="form-control" name="year" required="required"  autocomplete="off" onchange="checkyear(this)"/>
                    <div id="year"></div>
                  </div>
                  <!-- /.form-group -->
                  
                  <!-- /.form-group -->
                </div>
                <!-- /.col -->
              </div>

              
              <!-- /.row -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
            <button type="submit" class="btn btn-block btn-primary btn-lg" name="submit">Submit Student's Details</button>
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