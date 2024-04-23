<?php 
 //database connection
 include('session.php');

//delcontact  delete
if($_POST['dellocation']!=""):
    extract($_POST);
    $sql = $conn->query("DELETE FROM tbl_location WHERE id='$dellocation' ");
    $dellocation=mysqli_real_escape_string($conn,$appd);
endif;

//delgroup  delete
if($_POST['delgroup']!=""):
    extract($_POST);
    $sql = $conn->query("DELETE FROM tbl_group WHERE id='$delgroup' ");
    $delgroup=mysqli_real_escape_string($conn,$appd);
endif;

//Csv  delete
if($_POST['dellcsv']!=""):
    extract($_POST);
    $sql = $conn->query("DELETE FROM tbl_attendance WHERE csv_id='$dellcsv' ");
    $dellcsv=mysqli_real_escape_string($conn,$appd);
endif;

//Csv  delete
if($_POST['delcar']!=""):
    extract($_POST);
    $sql = $conn->query("DELETE FROM tbl_car WHERE id='$delcar' ");
    $delcar=mysqli_real_escape_string($conn,$appd);
endif;

//Csv  delete
if($_POST['deladdons']!=""):
    extract($_POST);
    $sql = $conn->query("DELETE FROM tbl_addons WHERE id='$deladdons' ");
    $deladdons=mysqli_real_escape_string($conn,$appd);
endif;








