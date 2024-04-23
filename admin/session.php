<?php
   session_start();
   // Check if the user is logged in, if not then redirect him to login page
   if(!isset($_SESSION["oxmsid"]) || $_SESSION["oxmsid"] !== true){
       header("location: login.php");
       exit;
   }
   
   	// dbcon
   	require_once("../config.php");
	
   	
   	// User Information
	$get_userid 	=  htmlspecialchars($_SESSION["id"]);
	$get_clientid	=  htmlspecialchars($_SESSION["clientid"]);
	$get_username	=  htmlspecialchars($_SESSION["fullname"]);
	
	
 	// Cleint Information 
	$sql= mysqli_query($conn,"SELECT * FROM tbl_client where id='$get_clientid'");
	if(mysqli_num_rows($sql) === 1){
	$siteid = mysqli_fetch_assoc($sql);
	}
	
	$institute	=	$siteid["institute"];
	$tagline	=	$siteid["tagline"];
	$address	=	$siteid["address"];
	$mobiles	=	$siteid["mobile"];
	$email		=	$siteid["email"];
	$lan		=	$siteid["language"];
	$version	=	$siteid["version"];
	$created	=	$siteid["created"];
	$extension	=	$siteid["extension"];
	$expire		=	$siteid["expire"];
	$package	=	$siteid["package"];
	$fee		=	$siteid["fee"];
	$smstoken	=	$siteid["smstoken"];
	
	
	
	
	// Hide For All User Role
		function hideforall(){
			if ($_SESSION["role"]=="1" || $_SESSION["role"]=="2") {
				echo "d-none";
			}
		}

	

	 // Manager option hide
		function hideformanager(){
			if ($_SESSION["role"]==1) {
				echo "d-none";
			}
		}	

	// user option hide
		function hideforuser(){
			if ($_SESSION["role"]==2) {
				echo "d-none";
			}
		}

	///<?php hideformanager();  
	///<?php hideforuser();  
	///<?php hideforall();  
	
	// Server Time
	date_default_timezone_set('Asia/Dhaka');
	
 
 

?>