<?php include('../config.php');


	$sql= mysqli_query($conn,"SELECT * from tbl_page where id =1 ");
	$about = mysqli_fetch_assoc($sql);

	$sql= mysqli_query($conn,"SELECT * from tbl_page where id =2 ");
	$quote = mysqli_fetch_assoc($sql);


include('header.php');?>

   <!-- Header Start -->
    <div class="jumbotron jumbotron-fluid mb-5">
        <div class="container text-center py-5">
            <h1 class="text-primary mb-4">Current Status</h1>
            <h1 class="text-white display-3 mb-5">Visa Checking </h1>
            <div class="mx-auto" style="width: 100%; max-width: 600px;">
			<form id="visa_checking" enctype="multipart/form-data" action="visa_info.php" method="GET">
                <div class="input-group">
                    <input type="text" name="passport_no" required tabindex="0" autofocus class="form-control border-light" style="padding: 30px;" placeholder="Passport No.">
                   
				   <div class="input-group-append">
                        <button id="search-btn" type="submit" tabindex="1" disabled class="btn btn-primary px-3">Search</button>
                    </div>
                </div>
				</form>
			 
				 <div id="status" style="color: #21ff07 !important; margin-top: 14px; font-size: 1.1rem;"></div>
            </div>
        </div>
    </div>
    <!-- Header End -->
 
    <!-- Services Start -->
    <div class="container-fluid pt-5">
        <div class="container">
            <div class="text-center pb-2">
                <h6 class="text-primary text-uppercase font-weight-bold">Our Services</h6>
                <h1 class="mb-5">Visa Process</h1>
            </div>
            <div class="row pb-3">
			
			    <?php
			   
			      $sql = "SELECT * FROM tbl_page where menu='Visa Process' limit 6";
					$result = $conn->query($sql);
                  if ($result->num_rows > 0) {		
                  	while($row = $result->fetch_assoc()) {
                  ?>
				  
                <div class="col-lg-4 col-md-6 text-center mb-5">
                    <div style="  padding: 12px; background: #fff;padding-bottom: 20px;border-bottom: 3px solid darkorange; ">
                        <img style="max-height: 200px;width: 100%;border-radius: 8px;" src="../uploads/<?php echo $row['photo']; ?>"/> 
                    
					
                    <p>   <h5 class="text-success font-weight-medium m-0"><?php echo $row['title']; ?></h5>
					
					<?php echo substr($row['contants'], 0, 120); ?></p>
                    <a class="border-bottom text-decoration-none" href="page.php?id=<?php echo $row['id']; ?>">Read More</a>
                </div>
				</div>
                 <?php
                  }
                  }
                  ?>
            </div>
        </div>
    </div>
    <!-- Services End -->


 
 <!-- About Start -->
    <div class="container-fluid bg-secondary py-5 pt-5">
        <div class="container"> 
		<br>
		<br>
            <div class="row">
                <div class="col-lg-5 pb-4 pb-lg-0">
                    <img class="img-fluid w-100" style=" border-radius:8px;" src="../uploads/<?php echo $about['photo']; ?>" alt="">
                   
                </div>
                <div class="col-lg-7">
                    <h6 class="text-primary text-uppercase font-weight-bold">About Us</h6>
                    <h1 class="mb-4"><?php echo $about['title']; ?></h1>
                    <p class="mb-4">   <?php echo substr($about['contants'], 0, 820); ?> <a href="page.php?id=<?php echo $about['id']; ?>"> Read More... </a></p>
					
                    
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->
	
	
   
    <!-- Testimonial Start -->
    <div class="container-fluid py-5   mb-0">
        <div class="container">
            <div class="text-center pb-2">
                <h6 class="text-primary text-uppercase font-weight-bold">Testimonial</h6>
                <h1 class="mb-4">Our Clients Say</h1>
            </div>
            <div class="owl-carousel testimonial-carousel">
			
			
			    <?php
			   
			      $sql = "SELECT * FROM tbl_page where menu='Testimonial'  ";
					$testimonial = $conn->query($sql);
                  if ($testimonial->num_rows > 0) {		
                  	while($row = $testimonial->fetch_assoc()) {
                  ?>
				  
				  
                <div class="position-relative bg-secondary p-4">
                    <i class="fa fa-3x fa-quote-right text-primary position-absolute" style="top: -6px; right: 0;"></i>
                    <div class="d-flex align-items-center mb-3">
                        <img class="img-fluid rounded-circle" src="../uploads/<?php echo $row['photo']; ?>" style="width: 60px; height: 60px;" alt="">
                        <div class="ml-3">
                            <h6 class="font-weight-semi-bold m-0"><?php echo $row['title']; ?></h6>
                            <small>- Client</small>
                        </div>
                    </div>
                    <p class="m-0"> <?php echo substr($row['contants'], 0, 820); ?> </p>
                </div>
              
               <?php
                  }
                  }
                  ?>
              
            </div>
        </div>
    </div>
    <!-- Testimonial End -->
 
<?php include('footer.php');?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
    $('input[name="passport_no"]').on('keyup', function(){
        var passportNo = $(this).val();
        if(passportNo.length >= 4) {
            $.ajax({
                url: 'check_passport.php',
                type: 'POST',
                data: {passport_no: passportNo},
                success: function(response) {
                    if(response == 'valid') {
                        $('#status').text('');
                        $('#search-btn').prop('disabled', false);
                    } else {
                        $('#status').text('No Match Passport Number Found...');
                        $('#search-btn').prop('disabled', true);
                    }
                }
            });
        }
    });
});

</script>