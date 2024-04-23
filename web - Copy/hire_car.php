 <?php include('../config.php');
  include('header.php');?>
<style>
    .form-border {
      border: 1px solid rgba(0, 0, 0, 0.125);
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      padding: 20px;
    }
  </style>

 

    <!-- Booking Start -->
    <div class="container-fluid my-4 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
	<div class="row gx-5">
	<div class="col-lg-7 py-5">         
		<div class="row justify-content-center">
		  <div class="col-md-8">
			<form class="form-border" method="get" action="hire_car_select.php" >
			  <div class="mb-3">
				<h4 class="mb-4">Start your booking <hr></h4>
				<div class="row g-3">
				  <div class="col-sm-12">
					<label for="pickupLocation" class="form-label">Pickup Location</label>
					<select class="form-select" name="pickupLocation" id="pickupLocation">
					  <option selected>Select pickup location</option>
						<?php

						$sql = "SELECT * FROM tbl_location";
						$result = $conn->query($sql);	

						if ($result->num_rows > 0) {		
						while($row = $result->fetch_assoc()) {
						?>
				<option value="<?php echo $row["id"]; ?>"><?php echo $row["location"]; ?></option>
							<?php
							}
							}
							?>
					</select>
				  </div>
				  <div class="col-sm-6">
					<label for="pickupDate" class="form-label">Date</label>
					<input type="date" class="form-control" name="pickupDate" id="pickupDate">
				  </div>
				  <div class="col-sm-6">
					<label for="pickupTime" class="form-label">Time</label>
					<input type="time" class="form-control" name="pickupTime" id="pickupTime">
				  </div>
				</div>
			  </div>
			  <br> 
			  <div class="mb-3">
				<h4 class="mb-4">Return <hr></h4>
				<div class="row g-3">
				  <div class="col-sm-12">
					<label for="dropOffLocation" class="form-label">Drop Off Location</label>
					<select class="form-select"  name="dropOffLocation" id="dropOffLocation">
					  <option selected>Select drop off location</option>
					 <?php

						$sql = "SELECT * FROM tbl_location";
						$result = $conn->query($sql);	

						if ($result->num_rows > 0) {		
						while($row = $result->fetch_assoc()) {
						?>
				<option value="<?php echo $row["id"]; ?>"><?php echo $row["location"]; ?></option>
							<?php
							}
							}
							?>
					</select>
				  </div>
				  <div class="col-sm-6">
					<label for="dropOffDate" class="form-label">Date</label>
					<input type="date" class="form-control" name="dropOffDate" id="dropOffDate">
				  </div>
				  <div class="col-sm-6">
					<label for="dropOffTime" class="form-label">Time</label>
					<input type="time" class="form-control" name="dropOffTime" id="dropOffTime">
				  </div>
				</div>
			  </div>
			  <hr> 
			  <input type="text" class="form-control d-none" name="h_ours" id="h_ours">
			  <input type="text" class="form-control d-none" name="d_ays" id="d_ays">
			  <button type="submit" name="submit" class="btn btn-primary">Search</button>
			</form>
		  </div>
		</div>	
					
                </div>
                
                <div class="col-lg-5">
                     <img class="w-100" src="img/car_hire.png" alt="Image">
            </div>
        </div>
    </div>
    </div>
    <!-- Booking End -->


    <!-- Call To Action Start -->
    <div class="container-xxl py-5 wow fadeInUp d-none" data-wow-delay="0.1s">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-8 col-md-6">
                    <h6 class="text-primary text-uppercase">// Call To Action //</h6>
                    <h1 class="mb-4">Have Any Pre Booking Question?</h1>
                    <p class="mb-0">Lorem diam ea sit dolor labore. Clita et dolor erat sed est lorem sed et sit. Diam sed duo magna erat et stet clita ea magna ea sed, sit labore magna lorem tempor justo rebum dolores. Eos dolor sea erat amet et, lorem labore lorem at dolores. Stet ea ut justo et, clita et et ipsum diam.</p>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="bg-primary d-flex flex-column justify-content-center text-center h-100 p-4">
                        <h3 class="text-white mb-4"><i class="fa fa-phone-alt me-3"></i>+012 345 6789</h3>
                        <a href="" class="btn btn-secondary py-3 px-5">Contact Us<i class="fa fa-arrow-right ms-3"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Call To Action End -->
<?php include('footer.php');?>

<!-- Include jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Your HTML code -->

<script>

 

 

	$(document).ready(function() {
		// Function to calculate hours between two times
		function calculateHours(startTime, endTime) {
			var start = new Date("1970-01-01 " + startTime);
			var end = new Date("1970-01-01 " + endTime);
			var diff = Math.abs(end - start);
			var hours = Math.floor(diff / 1000 / 60 / 60);
			return hours;
		}

		// Function to calculate days between two dates
		function calculateDays(startDate, endDate) {
			var start = new Date(startDate);
			var end = new Date(endDate);
			var timeDifference = Math.abs(end.getTime() - start.getTime());
			var daysDifference = Math.ceil(timeDifference / (1000 * 3600 * 24));
			return daysDifference;
		}

		// Function to update calculation
		function updateCalculation() {
			// Get pickup and drop-off times and dates
			var pickupTime = $('#pickupTime').val();
			var dropOffTime = $('#dropOffTime').val();
			var pickupDate = $('#pickupDate').val();
			var dropOffDate = $('#dropOffDate').val();

			// Calculate hours
			var hours = 0;
			var days = calculateDays(pickupDate, dropOffDate);

			if (days == 0) {
				// Calculate hours only if days == 0
				hours = calculateHours(pickupTime, dropOffTime);
			}

			// Set the calculated hours and days to the hidden input fields
			$('#h_ours').val(hours);
			$('#d_ays').val(days);
		}

		// Bind calculation function to change event of input fields
		$('#pickupLocation, #dropOffLocation, #pickupDate, #dropOffDate, #pickupTime, #dropOffTime').change(function() {
			updateCalculation();
		});
	});
	
	
</script>
