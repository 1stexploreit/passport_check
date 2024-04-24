<?php
/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'passport_check');

 
/* Attempt to connect to MySQL database */
$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// Check connection
if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// Server Time
date_default_timezone_set('Asia/Dhaka');

$info = getdate();
$date = $info['mday'];
$month = $info['mon'];
$year = $info['year'];
$hour = $info['hours'];
$min = $info['minutes'];
$sec = $info['seconds'];

if (!mysqli_set_charset($conn, "utf8")) {
    printf("Error loading character set utf8: %s\n", mysqli_error($conn));
    exit();
} 


 	// Cleint Information 
	$sql= mysqli_query($conn,"SELECT * FROM tbl_client limit 1");
	$siteid = mysqli_fetch_assoc($sql);
	
	$institute		=$siteid["institute"];
	$address		=$siteid["address"];
	$mobile			=$siteid["mobile"];
	$email			=$siteid["email"];
	$logo			=$siteid["logo"];
	$google_map		=$siteid["google_map"];
 

?>