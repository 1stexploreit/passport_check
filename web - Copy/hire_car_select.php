 <?php include('../config.php');
 
 
	$pickupLocation = $_GET['pickupLocation'];
	$pickupDate = $_GET['pickupDate'];
	$pickupTime = $_GET['pickupTime'];
	$dropOffLocation = $_GET['dropOffLocation'];
	$dropOffDate = $_GET['dropOffDate'];
	$dropOffTime = $_GET['dropOffTime'];
	$h_ours = $_GET['h_ours'];
	$d_ays = $_GET['d_ays'];
	

		// Get the original URL's query string
	$queryString = $_SERVER['QUERY_STRING'];

	// Parse the query string to get the GET parameters
	parse_str($queryString, $queryParams);

	// Filter out duplicate 'car_id' parameters
	if(isset($queryParams['car_id'])) {
		$queryParams['car_id'] = array_unique((array) $queryParams['car_id']);
	}

	// Rebuild the URL only with the filtered GET parameters
	$newUrl = 'hire_car_booking.php?' . http_build_query($queryParams);
	 
	 
	 
	 
	
	include('header.php');?>
 
 
 
 <style>
 .car_box{
 padding: 20px; border: 1px solid lightgray;
 }
 
  .car_box:hover{
	box-shadow: 0px 0px 12px #cccccca1;
 }
 
 
 </style> 

    <!-- Booking Start -->
    <div class="container-fluid my-5 wow fadeInUp" data-wow-delay="0.1s">
		<div class="container">
	            <div class="row g-4">
                                    
                             	  <?php
			   
									  $sql = "SELECT  * from  tbl_car where location_id='$pickupLocation'";
										$result = $conn->query($sql);
									  if ($result->num_rows > 0) {		
										while($row = $result->fetch_assoc()) {
									  ?>
                                <div class="col-md-12">
								<div class="car_box">
								<div class="row g-4">
                                <div class="col-md-2">
										<img class="" src="../uploads/<?php echo $row['photo']; ?>" style="height: 100px"/>
									 </div>
									  <div class="col-md-6">
									  <h5><i class="fa fa-solid fa-car text-danger"></i>  <?php echo $row['brand']; ?></h5>
								<div style=""><i class="fas fa-angle-right"></i>    <?php echo $row['model']; ?></div>
								<div style=""> <i class="fas fa-angle-right"></i>     <?php echo $row['features']; ?></div>
								<div style=""> <i class="fas fa-angle-right"></i>     <?php echo $row['full_specifications']; ?></div>
								<div style=""> <i class="fas fa-angle-right"></i>     <?php echo $row['requirements']; ?></div>
									   </div>
									   
									   <div class="col-md-2 my-auto">
									   
								<strong> GBP <?php echo $row['rent_per_day']; ?>/Day</strong> <br>
								<strong> GBP <?php echo $row['rent_per_hour']; ?>/Hour</strong> 
                                </div>   
								
								<div class="col-md-2 my-auto">
									   
								<a href="<?php echo $newUrl . '&car_id=' . $row['id']; ?>" class="btn btn-primary"> Book Now</a> 
                                </div>
                                </div>
							 
                                </div>
                                </div>
								
								 
								 <?php
                  }
                  }
                  ?>
                          
                        </div>
		</div>
    </div>
    <!-- Booking End -->

 
<?php include('footer.php');?>