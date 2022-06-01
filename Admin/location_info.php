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
    <h1>Location Info</h1>
  </div>

    <div class="div">
        <div class="col-lg-12 ">
              <div class='admin-data'>
                Districts
                <a class='button view' href='district1.php'>View</a>
              </div>
          <br><br><br><br><br><br><br><br><br>
                <div class='admin-data'>
                        Places
                        <a class='button view' href='place1.php'>View</a>
                    </div>

        </div>
      </div>

  </div>
</body>
</html>