<?php include('../config.php');

include('header.php');?>

    <style>
	
	.navbar{
		
		box-shadow: 0px 0px 8px #ccc;
		
	}
    
 


</style> 
 
    <div class="container-fluid  py-5 ">
    <div class="container">
            <div class=" pb-4">
                <h6 class="text-primary text-uppercase font-weight-bold">Testimonial</h6>
                <h1 class="mb-4">Our Clients Say</h1>
            </div>
            
			
			
			    <?php
			   
			      $sql = "SELECT * FROM tbl_page where menu='Testimonial' ";
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
              <br>
               <?php
                  }
                  }
                  ?>
              
            </div>
        </div>
    </div>
 

 <?php include('footer.php');?>
