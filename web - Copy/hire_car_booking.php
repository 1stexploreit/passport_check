 <?php include('../config.php');
 
 
	$pickupLocation = $_GET['pickupLocation'];
	$pickupDate = $_GET['pickupDate'];
	$pickupTime = $_GET['pickupTime'];
	$dropOffLocation = $_GET['dropOffLocation'];
	$dropOffDate = $_GET['dropOffDate'];
	$dropOffTime = $_GET['dropOffTime'];
	$h_ours = $_GET['h_ours'];
	$d_ays = $_GET['d_ays'];
	$car_id = $_GET['car_id'];


	$sql= mysqli_query($conn,"SELECT * FROM tbl_car WHERE id='$car_id'");
	$row = mysqli_fetch_assoc($sql);	
	
	$sql= mysqli_query($conn,"SELECT * FROM tbl_location WHERE id='$pickupLocation'");
	$p_location = mysqli_fetch_assoc($sql);	
	
	$sql= mysqli_query($conn,"SELECT * FROM tbl_location WHERE id='$dropOffLocation'");
	$d_location = mysqli_fetch_assoc($sql);	
	
	$sql= mysqli_query($conn,"SELECT * FROM tbl_pick_drop WHERE location_id='$pickupLocation' and car_id='$car_id'");
	$tbl_pirckup = mysqli_fetch_assoc($sql);	
	
	$sql= mysqli_query($conn,"SELECT * FROM tbl_pick_drop WHERE location_id='$dropOffLocation' and car_id='$car_id'");
	$tbl_drop = mysqli_fetch_assoc($sql);

	
	if (isset($_POST['submit'])) {

    $pickupLocation = $pickupLocation;
    $pickupDate     = $pickupDate;
    $pickupTime     = $pickupTime;
    $dropOffLocation= $dropOffLocation;
    $dropOffDate    = $dropOffDate;
    $dropOffTime    = $dropOffTime;
    $hours          = $h_ours;
    $days           = $d_ays;
    $car_id         = $car_id;
    $fullname       = $_POST['fullname'];
    $address        = $_POST['address'];
    $contact        = $_POST['contact'];
    $email          = $_POST['email'];
    $charge         = $_POST['charge'];
    $pickupCharge   = $_POST['pickupCharge'];
    $dropOffCharge  = $_POST['dropOffCharge'];
    $addons         = $_POST['addons'];
    $total          = $_POST['total'];

	$sql = $conn->prepare("INSERT INTO tbl_order (pickupLocation, pickupDate, pickupTime, dropOffLocation, dropOffDate, dropOffTime, h_ours, d_ays, car_id, fullname, address, contact, email, charge, pcharge, dcharge, addons, total) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
	$sql->bind_param("ssssssssssssssssss", $pickupLocation, $pickupDate, $pickupTime, $dropOffLocation, $dropOffDate, $dropOffTime, $hours, $days, $car_id, $fullname, $address, $contact, $email, $charge, $pickupCharge, $dropOffCharge, $addons, $total);

    if ($sql->execute()) {
       
        $order_no = $conn->insert_id;
    
        echo ("<script LANGUAGE='JavaScript'>
        window.location.href='success.php?order_no=$order_no';
        </script>");
    }
	
	if (!$sql) {
    die('Error: ' . $conn->error);
}

    $sql->close();
    $conn->close();
}


	
	include('header.php');?>
 
 <style>
   .car_box{
   border-right: 1px solid lightgray;
   margin-right: 25px;
   padding-right: 10px;
   
   } 
   hr {margin:10px;}
   
   
    strong {
    font-weight: 500;
   
}


</style>


<!-- Booking Start -->
<div class="container-fluid my-5 wow fadeInUp" data-wow-delay="0.1s">
   <div class="container">
    <form name="frmUser" method="post" action="" enctype="multipart/form-data">
      <div class="row g-4">
	   
         <div class="col-md-1">
         </div>
         <div class="col-md-4">
            <div class="car_box">
               <li> <strong> <?php echo $row['brand']; ?></strong> </li>
               <li> <?php echo $row['model']; ?></li>
               <hr>
				<li> Pickup Location:  <strong> <?php echo $p_location['location']; ?></strong></li>
				<li> Date & TIme: <strong> <?php echo $pickupDate; ?> / <?php echo $pickupTime; ?></strong></li>
				  <hr>
				<li> Drop Off Location: <strong> <?php echo $d_location['location']; ?></strong></li>
				<li> Date & TIme: <strong>  <?php echo $dropOffDate; ?> / <?php echo $dropOffTime; ?></strong></li>
				<br>
				
					<?php

						$sql = "SELECT * FROM tbl_addons";
						$result = $conn->query($sql);	

						if ($result->num_rows > 0) {		
						while($addons = $result->fetch_assoc()) {
						?>
			            <div class="form-check mb-1">
						   <input class="form-check-input addons" type="checkbox"  value="<?php echo $addons['charge']; ?>">
						   <label class="form-check-label" for="ageCheck" style=" color: blueviolet; ">
						   <strong>  <?php echo $addons['item']; ?>/ £ <?php echo $addons['charge']; ?></strong>
						   </label>
						</div>
							<?php
							}
							}
							?>
					<br>
				<div class="alert alert-light mb-4 d-none"> 
					  Per Day: <span style=" float: right; font-weight: bold;" id="rent_per_day"><?php echo $row['rent_per_day']; ?> </span> <br> 
					  Per hour: <span style=" float: right; font-weight: bold;" id="rent_per_hour"><?php echo $row['rent_per_hour']; ?> </span>  <br>
					  hour: <span style=" float: right; font-weight: bold;" id="h_ours"><?php echo $h_ours; ?> </span>  <br>
					  Day: <span style=" float: right; font-weight: bold;" id="d_ays"><?php echo $d_ays; ?> </span>  
				</div> 
				
				
				<div class="alert alert-warning mb-4"> 
					  Charge: <span style=" float: right; font-weight: bold;" id="charge"></span>  
					<br> Additional Pick up Charge: <span style=" float: right; font-weight: bold;" id="pcharge"><?php echo $tbl_pirckup['p_ick']; ?></span>  
					<br> Additional Drop off Charge: <span style=" float: right; font-weight: bold;" id="dcharge"><?php echo $tbl_drop['d_rop']; ?></span> 
					<br> Add Ons : <span style=" float: right; font-weight: bold;" id="addons"></span> 
					 <hr>Total: <span style=" float: right; font-weight: bold;" id="total"></span>  
				</div> 	
	

            </div>
         </div>
         <div class="col-md-5">
            <h2 class="mb-4">
               Booking Form 
               <hr>
            </h2>
            <div class="mb-3">
               <label for="fullname" class="form-label">Full Name</label>
               <input type="text" class="form-control" name="fullname" required >
            </div>
            <div class="mb-3">
               <label for="address" class="form-label">Address</label>
               <textarea class="form-control" name="address" rows="3" required ></textarea>
            </div>
            <div class="mb-3">
               <label for="contact" class="form-label">Contact Number</label>
               <input type="tel" class="form-control" name="contact" required >
            </div>
            <div class="mb-3">
               <label for="email" class="form-label">Email Address</label>
               <input type="email" class="form-control" name="email">
            </div>
            <div class="form-check mb-3">
               <input class="form-check-input" type="checkbox" id="ageCheck" name="ageCheck" required >
               <label class="form-check-label" for="ageCheck">
               I am above 24 years old
               </label>
            </div>
            <br>  
			
				<div class="alert alert-light mb-4 d-none"> 
					 <input name="charge" id="charge_input"/>
					 <input name="pickupCharge" id="pcharge_input"/>
					 <input name="dropOffCharge" id="dcharge_input"/>
					 <input name="addons" id="addons_input"/>
					 <input name="total" id="total_input"/>
				 </div> 
			  
			   
            <button type="submit" name="submit" class="btn btn-primary">Proceed to Checkout</button>
            </form>
         </div>
      </div>
   </div>
</div>
</div>
<!-- Booking End -->

 
<?php include('footer.php');?>

	<script>
		$(document).ready(function(){
			// Function to calculate total charge
			function calculateTotalCharge() {
				var rentPerHour = parseFloat($('#rent_per_hour').text());
				var rentPerDay = parseFloat($('#rent_per_day').text());
				var hours = parseFloat($('#h_ours').text());
				var days = parseFloat($('#d_ays').text());

				var charge = days === 0 ? hours * rentPerHour : days * rentPerDay;
				$('#charge').text(charge.toFixed(2));
				$('#charge_input').val(charge.toFixed(2));  

				var pickupCharge = parseFloat($('#pcharge').text());
				$('#pcharge_input').val(pickupCharge.toFixed(2));
				
				var dropoffCharge = parseFloat($('#dcharge').text());
				 $('#dcharge_input').val(dropoffCharge.toFixed(2));  

				// Calculate total addons charge
				var addonsCharge = 0;
				$('.addons:checked').each(function() {
					addonsCharge += parseFloat($(this).val());
					$('#addons_input').val(addonsCharge.toFixed(2)); 
				});

				$('#addons').text(addonsCharge.toFixed(2));

				var total = charge + pickupCharge + dropoffCharge + addonsCharge;
				$('#total').text(total.toFixed(2));
				 $('#total_input').val(total.toFixed(2)); 
			}

			// Calculate total charge on page load
			calculateTotalCharge();

			// Listen for changes in addons checkboxes
			$('.addons').change(function() {
				calculateTotalCharge();
			});
		});
	</script>