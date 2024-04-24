<?php 
 //database connection
 include('session.php');

//delcontact  delete
if($_POST['delstatus']!=""):
    extract($_POST);
    $sql = $conn->query("DELETE FROM tbl_status WHERE id='$delstatus' ");
    $delstatus=mysqli_real_escape_string($conn,$appd);
endif;


//Csv  delete
if($_POST['delpassport_check']!=""):
    extract($_POST);
    $sql = $conn->query("DELETE FROM tbl_passport_check WHERE id='$delpassport_check' ");
    $delpassport_check=mysqli_real_escape_string($conn,$appd);
endif;








