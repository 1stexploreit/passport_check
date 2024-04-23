<!DOCTYPE php>
<php lang="en">
<head>
   <meta charset="utf-8" />
   <meta http-equiv="X-UA-Compatible" content="IE=edge" />
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
   <meta name="description" content="" />
   <meta name="author" content="" />
   <title> easy attendance 1.0</title>
	<link rel="stylesheet " href="../assets/css/print.css?v=1">
   </head>
   <body>
   
   <!-- Print Button -->
      <div class="bt-div">
         <INPUT TYPE="button" class="button blue" title="Print" onClick="window.print()" value="Print">
         <button class="button blue" onClick="goBack()">Back</button>
      </div>
	     <!-- Print Button End -->
      <div class="wraper">

  <!-- Header -->
  			<img class="logo" src="../uploads/<?php echo $siteid["logo"]; ?>" width="70" alt="" > 
			<div style="text-align: center; "> 
			<h2 style="margin:0"> <?php echo $siteid["institute"]; ?> </h2>
			<div><?php echo $siteid["address"]; ?> </div>
			</div>
   <!-- Header End -->
         <hr>