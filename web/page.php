<?php include('../config.php');

	$page_id = mysqli_real_escape_string($conn, $_GET['id']); // Sanitize input
	$sql = mysqli_prepare($conn, "SELECT * FROM tbl_page WHERE id = ?");
	mysqli_stmt_bind_param($sql, "i", $page_id); // Assuming 'id' is an integer, adjust the type if necessary
	mysqli_stmt_execute($sql);
	$result = mysqli_stmt_get_result($sql);
	$page = mysqli_fetch_assoc($result);

	
include('header.php');?>

    <style>
	
	.navbar{
		
		box-shadow: 0px 0px 8px #ccc;
		
	}
    
 


</style> 
 
    <div class="container-fluid py-5 mt-5">
        <div class="container">
            <div class="row ">
                <div class="col-lg-4 pb-4 pb-lg-0">
                    <img class="img-fluid w-100" src="../uploads/<?php echo $page['photo']; ?>" alt="">

                </div>
                <div class="col-lg-8">
                    <h6 class="text-primary text-uppercase font-weight-bold d-none">About Us</h6>
                    <h1 class="mb-4"><?php echo $page['title']; ?></h1>
                    <p class="mb-4">   <?php echo $page['contants']; ?> </p>
               
                </div>
            </div>
        </div>
    </div>
 

 <?php include('footer.php');?>
