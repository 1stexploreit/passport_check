<?php include('../config.php');

include('header.php');?>

    <style>
	
	.navbar{
		
		box-shadow: 0px 0px 8px #ccc;
		
	}
    
 


</style> 
 
    <div class="container-fluid bg-secondary py-5 ">
     <div class="container">
            <div class="pb-2">
                <h6 class="text-primary text-uppercase font-weight-bold">Our Services</h6>
                <h1 class="mb-5">Visa Process</h1>
            </div>
            <div class="row pb-3">
			
			    <?php
			   
			      $sql = "SELECT * FROM tbl_page where menu='Visa Process'";
					$result = $conn->query($sql);
                  if ($result->num_rows > 0) {		
                  	while($row = $result->fetch_assoc()) {
                  ?>
				  
                <div class="col-lg-4 col-md-6 text-center mb-5">
                    <div style="  padding: 12px; background: #fff;padding-bottom: 20px; ">
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
 

 <?php include('footer.php');?>
