<?php 
	include('session.php'); 

	if (isset($_POST['submit'])) {		

		$car_id			= $_POST['car_id'];
		$location_id	= $_POST['location_id'];
		$p_ick			= $_POST['p_ick'];
		$d_rop			= $_POST['d_rop'];
	 
		$sql = $conn->prepare("UPDATE tbl_pick_drop SET car_id=?,location_id=?,p_ick=?,d_rop=? WHERE id=?");
		$sql->bind_param("ssssi", $car_id, $location_id,  $p_ick, $d_rop, $_GET["id"]);
	  	
		if($sql->execute()) {
		echo ("<script LANGUAGE='JavaScript'>
		window.alert('Succesfully Update');
		window.location.href='list_pick_drop.php';
		</script>");
		}  

	}

    $get_id = $_GET['id'];
    $sql= mysqli_query($conn,"SELECT tbl_pick_drop.*, tbl_location.location, tbl_car.brand,tbl_car.model,tbl_car.reg_no
				FROM tbl_pick_drop
				left join tbl_location on tbl_pick_drop.location_id=tbl_location.id
				left join tbl_car on tbl_pick_drop.car_id=tbl_car.id 
				WHERE tbl_pick_drop.id='$get_id' ");
    if(mysqli_num_rows($sql) === 1){
    $row = mysqli_fetch_assoc($sql);
    }
	
	///Header
	 include('header.php'); 
?>



<div class="card mt-4">
 <div class="card-header">
   <div class="row">
      <div class="col-md-9 my-auto">
           Pick/Drop <i class="fas fa-angle-right"></i> Update Pick/Drop
      </div>
      <div class="col-md-3 text-right">
         <a href="list_pick_drop.php" class="btn btn-outline-primary"> <i class="fas fa-folder-open"></i> All Pick/Drops</a>
      </div>
   </div>
</div>
     <div class=" card-body">
 <form name="frmUser" method="post" action="" enctype="multipart/form-data" >
         <div class="form-row">
		
            
            <div class="form-group col-md-4">
              <label for="inputCity"> Car</label>
				<select name="car_id" class="form-control" >
						<option value="<?php echo $row["car_id"]?>"><?php echo $row["brand"]?></option>
						<?php

						$sql = "SELECT * FROM tbl_car";
						$result = $conn->query($sql);	

						if ($result->num_rows > 0) {		
						while($ca = $result->fetch_assoc()) {
						?>
				<option value="<?php echo $ca["id"]; ?>"><?php echo $ca["brand"]; ?> <?php echo $ca["model"]; ?> / <?php echo $ca["reg_no"]; ?></option>
							<?php
							}
							}
							?>
					</select>
            </div>
            <div class="form-group col-md-4">
              <label for="inputCity"> Location</label>
				<select name="location_id" class="form-control" >
						<option value="<?php echo $row["location_id"]?>"><?php echo $row["location"]?></option>
						<?php

						$sql = "SELECT * FROM tbl_location";
						$result = $conn->query($sql);	

						if ($result->num_rows > 0) {		
						while($loc = $result->fetch_assoc()) {
						?>
				<option value="<?php echo $loc["id"]; ?>"><?php echo $loc["location"]; ?></option>
							<?php
							}
							}
							?>
					</select>
            </div>
         
            <div class="form-group col-md-2">
               <label for="inputCity">Pick</label>
               <input type="text" class="form-control"  name="p_ick" value="<?php echo $row["p_ick"]?>">
            </div>            
			
			<div class="form-group col-md-2">
               <label for="inputCity">Drop</label>
               <input type="text" class="form-control"  name="d_rop" value="<?php echo $row["d_rop"]?>">
            </div>
           
         </div>
         </div>
      <div class="card-footer">
         <input type="submit" name="submit" value="Submit" class="btn btn-primary" >
         <button type="reset" class="btn btn-secondary">Reset</button>
      </form>
   </div>
</div>
<?php include('footer.php'); ?>