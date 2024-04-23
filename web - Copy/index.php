<?php include('../config.php');


	$sql= mysqli_query($conn,"SELECT * from tbl_page where id =1 ");
	$about = mysqli_fetch_assoc($sql);

	$sql= mysqli_query($conn,"SELECT * from tbl_page where id =2 ");
	$service_one = mysqli_fetch_assoc($sql);

	$sql= mysqli_query($conn,"SELECT * from tbl_page where id =3 ");
	$service_two = mysqli_fetch_assoc($sql);

	$sql= mysqli_query($conn,"SELECT * from tbl_page where id =4 ");
	$service_three = mysqli_fetch_assoc($sql);	
	
	
	$sql= mysqli_query($conn,"SELECT * from tbl_page where id =5 ");
	$counter_one = mysqli_fetch_assoc($sql);	
	
	$sql= mysqli_query($conn,"SELECT * from tbl_page where id =6 ");
	$counter_two = mysqli_fetch_assoc($sql);	
	
	$sql= mysqli_query($conn,"SELECT * from tbl_page where id =7 ");
	$counter_three = mysqli_fetch_assoc($sql);	
	
	$sql= mysqli_query($conn,"SELECT * from tbl_page where id =8 ");
	$counter_four = mysqli_fetch_assoc($sql);	
	
	
	$sql= mysqli_query($conn,"SELECT * from tbl_page where id =9 ");
	$car_rental = mysqli_fetch_assoc($sql);

  include('header.php');
?>

    <!-- Carousel Start -->
    <div class="container-fluid p-0 mb-5">
        <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" src="img/carousel-bg-1.jpg" alt="Image">
                    <div class="carousel-caption d-flex align-items-center">
                        <div class="container">
                            <div class="row align-items-center justify-content-center justify-content-lg-start">
                                <div class="col-12 col-lg-12 text-center text-lg-start">
                                    <h6 class="text-white text-uppercase mb-3 animated slideInDown">// F1 AUTOMOTIVES //</h6>
                                    <h1 class="display-3 text-white mb-4 pb-3 animated slideInDown">HIRE A CAR</h1>
                                    <a href="hire_car.php" class="btn btn-primary py-3 px-5 animated slideInDown">Read More<i class="fa fa-arrow-right ms-3"></i></a>
                                </div>
                               
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="w-100" src="img/carousel-bg-3.jpg" alt="Image">
                    <div class="carousel-caption d-flex align-items-center">
                        <div class="container">
                            <div class="row align-items-center justify-content-center justify-content-lg-start">
                                <div class="col-12 col-lg-12 text-center text-lg-start">
                                    <h6 class="text-white text-uppercase mb-3 animated slideInDown">// F1 AUTOMOTIVES//</h6>
                                    <h1 class="display-3 text-white mb-4 pb-3 animated slideInDown">HIRE A CHAUFFEUR</h1>
                                    <a href="" class="btn btn-primary py-3 px-5 animated slideInDown">Read More<i class="fa fa-arrow-right ms-3"></i></a>
                                </div>
                            
                            </div>
                        </div>
                    </div>
                </div>        
				<div class="carousel-item">
                     <img class="w-100" src="img/carousel-bg-4.jpg" alt="Image">
                    <div class="carousel-caption d-flex align-items-center">
                        <div class="container">
                            <div class="row align-items-center justify-content-center justify-content-lg-start">
                                <div class="col-12 col-lg-12 text-center text-lg-start">
                                    <h6 class="text-white text-uppercase mb-3 animated slideInDown">// F1 AUTOMOTIVES//</h6>
                                    <h1 class="display-3 text-white mb-4 pb-3 animated slideInDown">BREAKDOWN COVERAGE</h1>
                                    <a href="" class="btn btn-primary py-3 px-5 animated slideInDown">Read More<i class="fa fa-arrow-right ms-3"></i></a>
                                </div>
                            
                            </div>
                        </div>
                    </div>
                </div>			

				<div class="carousel-item">
                    <img class="w-100" src="img/carousel-bg-5.jpg" alt="Image">
                    <div class="carousel-caption d-flex align-items-center">
                        <div class="container">
                            <div class="row align-items-center justify-content-center justify-content-lg-start">
                                <div class="col-12 col-lg-12 text-center text-lg-start">
                                    <h6 class="text-white text-uppercase mb-3 animated slideInDown">// F1 AUTOMOTIVES//</h6>
                                    <h1 class="display-3 text-white mb-4 pb-3 animated slideInDown">EXPERIENCE DAY</h1>
                                    <a href="" class="btn btn-primary py-3 px-5 animated slideInDown">Read More<i class="fa fa-arrow-right ms-3"></i></a>
                                </div>
                            
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#header-carousel"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <!-- Carousel End -->


    <!-- Service Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="d-flex py-5 px-4">
                        <i class="fa fa-certificate fa-3x text-primary flex-shrink-0"></i>
                        <div class="ps-4">
                            <h5 class="mb-3"><?php echo $service_one['title']; ?></h5>
                            <p><?php echo implode(' ', array_slice(explode(' ', $service_one['contants']), 0, 10)); ?></p>
                            <a class="text-secondary border-bottom" href="page.php?id=2">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="d-flex bg-light py-5 px-4">
                        <i class="fa fa-users-cog fa-3x text-primary flex-shrink-0"></i>
                        <div class="ps-4">
                            <h5 class="mb-3"><?php echo $service_two['title']; ?></h5>
                            <p><?php echo implode(' ', array_slice(explode(' ', $service_two['contants']), 0, 10)); ?></p>
                            <a class="text-secondary border-bottom" href="page.php?id=3">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="d-flex py-5 px-4">
                        <i class="fa fa-tools fa-3x text-primary flex-shrink-0"></i>
                        <div class="ps-4">
                            <h5 class="mb-3"><?php echo $service_three['title']; ?></h5>
                            <p><?php echo implode(' ', array_slice(explode(' ', $service_three['contants']), 0, 10)); ?></p>
                            <a class="text-secondary border-bottom" href="page.php?id=4">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Service End -->


    <!-- About Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 pt-4" style="min-height: 400px;">
                    <div class="position-relative h-100 wow fadeIn" data-wow-delay="0.1s">
                        <img class="position-absolute img-fluid w-100 h-100" src="../uploads/<?php echo $about['photo']; ?>" style="object-fit: cover;" alt="">
                        <div class="position-absolute top-0 end-0 mt-n4 me-n4 py-4 px-5" style="background: rgba(0, 0, 0, .08);">
                            <h1 class="display-4 text-white mb-0">15 <span class="fs-4">Years</span></h1>
                            <h4 class="text-white">Experience</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <h6 class="text-primary text-uppercase">// About Us //</h6>
                    <h1 class="mb-4"><span class="text-primary">F1 AUTOMOTIVES</span> Is The Best Place For   Care</h1>
                   <?php echo $about['contants']; ?>
                    <a href="page.php?id=1" class="btn btn-primary py-3 px-5">Read More<i class="fa fa-arrow-right ms-3"></i></a>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->


    <!-- Fact Start -->
    <div class="container-fluid fact bg-dark my-5 py-5">
        <div class="container">
            <div class="row g-4">
                <div class="col-md-6 col-lg-3 text-center wow fadeIn" data-wow-delay="0.1s">
                    <i class="fa fa-check fa-2x text-white mb-3"></i>
                    <h2 class="text-white mb-2" data-toggle="counter-up"><?php echo $counter_one['contants']; ?></h2>
                    <p class="text-white mb-0"><?php echo $counter_one['title']; ?></p>
                </div>
                <div class="col-md-6 col-lg-3 text-center wow fadeIn" data-wow-delay="0.3s">
                    <i class="fa fa-map-marker-alt fa-2x text-white mb-3"></i>
                    <h2 class="text-white mb-2" data-toggle="counter-up"><?php echo $counter_two['contants']; ?></h2>
                    <p class="text-white mb-0"><?php echo $counter_two['title']; ?></p>
                </div>
                <div class="col-md-6 col-lg-3 text-center wow fadeIn" data-wow-delay="0.5s">
                    <i class="fa fa-users fa-2x text-white mb-3"></i>
                    <h2 class="text-white mb-2" data-toggle="counter-up"><?php echo $counter_three['contants']; ?></h2>
                    <p class="text-white mb-0"><?php echo $counter_three['title']; ?></p>
                </div>
                <div class="col-md-6 col-lg-3 text-center wow fadeIn" data-wow-delay="0.7s">
                    <i class="fa fa-car fa-2x text-white mb-3"></i>
                    <h2 class="text-white mb-2" data-toggle="counter-up"><?php echo $counter_four['contants']; ?></h2>
                    <p class="text-white mb-0"><?php echo $counter_four['title']; ?></p>
                </div>
            </div>
        </div>
    </div>
    <!-- Fact End -->


    <!-- Service Start -->
    <div class="container-xxl service py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="text-primary text-uppercase">// Our Services //</h6>
                <h1 class="mb-5">Explore Our Vehicles</h1>
            </div>
            <div class="row g-4 wow fadeInUp" data-wow-delay="0.3s">
                <div class="col-lg-3">
                    <div class="nav w-100 nav-pills me-4">
                        <button class="nav-link w-100 d-flex align-items-center text-start p-4 mb-4 active" data-bs-toggle="pill" data-bs-target="#tab-pane-1" type="button">
                            <i class="fa fa-car fa-2x me-3"></i>
                            <h4 class="m-0">Car</h4>
                        </button>
                        <button class="nav-link w-100 d-flex align-items-center text-start p-4 mb-4" data-bs-toggle="pill" data-bs-target="#tab-pane-2" type="button">
                            <i class="fa fa-truck fa-2x me-3"></i>
                            <h4 class="m-0">Van</h4>
                        </button>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="tab-content w-100">
                        <div class="tab-pane fade show active" id="tab-pane-1">
                            <div class="row g-4">
                                    
                             	  <?php
			   
									  $sql = "SELECT  * from  tbl_car where car_type='Car'";
										$result = $conn->query($sql);
									  if ($result->num_rows > 0) {		
										while($row = $result->fetch_assoc()) {
									  ?>
                                <div class="col-md-4 text-center">
								<a href="#"> 
									<div style="padding: 30px; color: grey; padding-bottom: 20px;     border: 1px solid lightgray;">
									<div class="text-center">
									<img class="" src="../uploads/<?php echo $row['photo']; ?>" style="height: 100px"/> <hr>
									</div>
								<div style="font-weight:bold"><i class="fa fa-solid fa-car text-danger"></i>  <?php echo $row['brand']; ?></div>
								<div style=""> <?php echo $row['model']; ?></div>
								<div style="">  <?php echo $row['features']; ?></div>
                                </div>
								</a>
                                </div>
								
								 
								 <?php
                  }
                  }
                  ?>
                          
                        </div>
                                 
                            </div>
                 
 
                    
                    <div class="tab-pane fade show " id="tab-pane-2">
                            <div class="row g-4">
                                    
                             	  <?php
			   
									  $sql = "SELECT  * from  tbl_car where car_type='Van'";
										$result = $conn->query($sql);
									  if ($result->num_rows > 0) {		
										while($row = $result->fetch_assoc()) {
									  ?>
                             <div class="col-md-4 text-center ">
									<div style="1pxsolid #607d8b36;padding: 30px; padding-bottom: 20px; box-shadow: 0px 7px 12px 0px #cccccca3;">
									<div class="text-center">
									<img class="" src="../uploads/<?php echo $row['photo']; ?>" style="height: 100px"/> <hr>
									</div>
								<div style="font-weight:bold"><i class="fa fa-solid fa-car text-danger"></i>  <?php echo $row['brand']; ?></div>
								<div style=""> <?php echo $row['model']; ?></div>
								<div style="">  <?php echo $row['features']; ?></div>
                                </div>
                                </div>
								
								 
								 <?php
                  }
                  }
                  ?>
                          
                        </div>
                                 
                            </div>
                  
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Service End -->


    <!-- Booking Start -->
    <div class="container-fluid bg-secondary booking my-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="row gx-5">
                <div class="col-lg-6 py-5">
                    <div class="py-5">
                        <h1 class="text-white mb-4"><?php echo $car_rental['title']; ?></h1>
                        <p class="text-white mb-0"><?php echo $car_rental['contants']; ?></p>
                    </div>
                </div>
                <div class="col-lg-6">
                   
                </div>
            </div>
        </div>
    </div>
    <!-- Booking End -->

 

    <!-- Testimonial Start -->
    <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="text-center">
                <h6 class="text-primary text-uppercase">// Testimonial //</h6>
                <h1 class="mb-5">Our Clients Say!</h1>
            </div>
            <div class="owl-carousel testimonial-carousel position-relative">
				  <?php
			   
			      $sql = "SELECT  * from  tbl_page where menu='Testimonial'";
					$result = $conn->query($sql);
                  if ($result->num_rows > 0) {		
                  	while($row = $result->fetch_assoc()) {
                  ?>
			
                <div class="testimonial-item text-center">
                    <img class="bg-light rounded-circle p-2 mx-auto mb-3" src="../uploads/<?php echo $row['photo']; ?>" style="width: 80px; height: 80px;">
                    <h5 class="mb-0"><?php echo $row['title']; ?></h5>
                    <p>Customer</p>
                    <div class="testimonial-text bg-light text-center p-4">
                    <p class="mb-0"> <?php echo $row['contants']; ?>.</p>
                    </div>
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