<?php

include ("../Connection/connection.php");
session_start();

		$id = $_GET['id'];
		mysql_query("DELETE FROM `tbl_complaint` WHERE complaint_id='$id'")or die(mysql_error());
		header("Location:complaints.php");

?>
