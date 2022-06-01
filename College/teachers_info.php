<?php
include("../Connection/connection.php");
session_start();
?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>View Complaints</title>
<link rel="stylesheet" href="../files/css/bootstrap.css">
<link rel="stylesheet" href="../files/css/custom.css">
<link rel="stylesheet" href="../files/css/styles.css?v=1">
</head>

<body>
<?php require 'nav.php'; ?>
  <div class="animated fadeIn">


  <div class="cover main">
    <h1>Teacher's Info</h1>
  </div>

    <div class="div">
        <div class="col-lg-6 ">
              <div class='admin-data'>
                Teacher List
                <a class='button view' href='Teacher.php'><span class="ti-layout-list-thumb-alt"></a>
              </div>
         

                <div class='admin-data'>
                        Add Teachers
                        <a class='button view' href='add_teacher.php'>+</a>
                    </div>
        </div>
        
        <div class="col-lg-6 ">

                    <div class='admin-data'>
                        Allocate Subjects
                        <a class='button view' href='allocate_subject.php'><span class="ti-control-shuffle"></a>
                    </div>
                    
                    

        </div>
      </div>

  </div>
</body>
</html>