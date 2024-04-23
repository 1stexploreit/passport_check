<?php include('session.php'); 

 
	$get_car_id = $_GET['car_id'];
	$tbl_car = mysqli_query($conn, "SELECT * FROM tbl_car WHERE id = '$get_car_id'");
	$tbl_car = mysqli_fetch_assoc($tbl_car);
	
	
	if (isset($_POST['submit'])) {
		
		$itemCount = count($_POST["location_id"]);
		$itemValues=0;
	 
		 

			$query = "INSERT INTO tbl_pick_drop (car_id, location_id, p_ick, d_rop) VALUES ";
			$queryValue = "";
			for ($i = 0; $i < $itemCount; $i++) {
				if (!empty($_POST["location_id"][$i])) {
					$itemValues++;
					if ($queryValue != "") {
						$queryValue .= ",";
					}
					$queryValue .= "('" . $get_car_id . "','" . $_POST["location_id"][$i] . "','" . $_POST["p_ick"][$i] . "','" . $_POST["d_rop"][$i] . "')";
				}
			}

			$query = $query . $queryValue;
			if ($itemValues != 0) {
				$result = mysqli_query($conn, $query);

				echo ("<script LANGUAGE='JavaScript'>
				window.location.href='list_car.php';
				</script>");
			}
	 
		  
	} 
 
	 include('header.php'); 
?>

<div class="card mt-4">
	<div class="card-header">
   <div class="row">
      <div class="col-md-8 my-auto">
        Pick/Drop <i class="fas fa-angle-right"></i> Add Pick/Drop <i class="fas fa-angle-right"></i> <?php echo $tbl_car['brand'];?>/<?php echo $tbl_car['model'];?>/<?php echo $tbl_car['reg_no'];?>
      </div>
      <div class="col-md-4 text-right">
 
         <a href="list_pick_drop.php" class="btn btn-outline-primary d-none"> <i class="fas fa-folder-open"></i> All Pick/Drops</a>
      </div>
   </div>
</div>

   <div class="card-body">
 <form name="frmUser" method="post" action="" enctype="multipart/form-data" >
 
 
        
		  <div class="row row-header">
		 
      
         
            <div class=" col-md-1">
               <label for="inputCity">Select</label>
               
            </div>
			
			<div class=" col-md-3">
               <label for="inputCity">Location</label>
             
            </div>    
			
			
            <div class=" col-md-2">
               <label for="inputCity"> Pick up Charge</label>
             
            </div>            
			
			<div class="  col-md-2">
               <label for="inputCity"> Drop off Charge</label>
       
            </div>
           
		    </div>


			      <?php
	  
			$sql = "select * from tbl_location order by location ";
			$result = $conn->query($sql);

			 if ($result->num_rows > 0) {		
			 while($row = $result->fetch_assoc()) {
         ?>
		  <div class="row items  mt-1">
		 
      
         
            <div class=" col-md-1">
        
               <input type="checkbox" style="width: 30px;height: 30px;" name="location_id[]" value="<?php echo $row["id"]; ?>" >
            </div>
			
			<div class=" col-md-3">
            
               <input type="text" class="form-control" value="<?php echo $row["location"]; ?>" readonly >
            </div>    
			
			
            <div class=" col-md-2">
        
               <input type="text" class="form-control" name="p_ick[]" >
            </div>            
			
			<div class="col-md-2">
             
               <input type="text" class="form-control" name="d_rop[]" >
            </div>
           
		    </div>
		   		 <?php
         }
         }
         else {echo "No Data Found" ; }
         ?>
		 
		 
        
         </div>
    <div class="card-footer">
         <input type="submit" name="submit" value="Submit" class="btn btn-success">
         <button type="reset" class="btn btn-secondary">Reset</button>
      </form>
   </div>
</div>

<?php include('footer.php'); ?>
