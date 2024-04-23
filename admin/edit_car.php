<?php include('session.php');

    $get_id = $_GET['id'];

	if (isset($_POST['submit'])) {		

   $brand     				= $_POST['brand'];
   $model      				= $_POST['model'];
   $reg_no      			= $_POST['reg_no'];
   $car_type      			= $_POST['car_type'];
   $features				= $_POST['features'];
   $full_specifications     = $_POST['full_specifications'];
   $requirements         	= $_POST['requirements'];
   $rent_per_day      		= $_POST['rent_per_day'];
   $location_id      		= $_POST['location_id'];

   $photo ='photo' . date('Y-m-d-H-i-s') . '_' . uniqid() . '.png';
   move_uploaded_file($_FILES["photo"]["tmp_name"], "../uploads/" . $photo); 
   
		if(!empty($_FILES['photo']['name'])) {

            $sql = $conn->prepare("UPDATE tbl_car SET brand=?,  model=? ,reg_no=? ,car_type=? , features=? ,full_specifications=?,requirements=?,rent_per_day=?,location_id=?, photo=? WHERE id=?");
            $sql->bind_param("ssssssssssi",$brand,$model,$reg_no,$car_type,$features,$full_specifications,$requirements,$rent_per_day,$location_id,$photo,$_GET["id"]);

			} 
			else {
				$sql = $conn->prepare("UPDATE tbl_car SET brand=?, model=? ,reg_no=? ,car_type=? , features=? ,full_specifications=?,requirements=?,rent_per_day=?,location_id=? WHERE id=?");
            $sql->bind_param("sssssssssi",$brand,$model,$reg_no,$car_type,$features,$full_specifications,$requirements,$rent_per_day,$location_id,$_GET["id"]);
				
			} 
			
			
			
			
		if($sql->execute()) {

         echo ("<script LANGUAGE='JavaScript'>
        window.alert('Succesfully Updated');
		window.location.href='list_car.php';
         </script>");
		}  

	}
	
		$sql= mysqli_query($conn,"SELECT tbl_car.*, tbl_location.location
			FROM tbl_car
			left join tbl_location on tbl_car.location_id=tbl_location.id WHERE tbl_car.id='$get_id'  ");
    $row = mysqli_fetch_assoc($sql);
	///Header
	 include('header.php'); 
?>



<div class="card mt-4">
	
	<div class="card-header">
   <div class="row">
      <div class="col-md-9 my-auto">
        Car  <i class="fas fa-angle-right"></i>    Update Car
      </div>
      <div class="col-md-3 text-right">
      
         <a href="list_car.php" class="btn btn-outline-primary"> <i class="fas fa-folder-open"></i> All Cars</a>
      </div>
   </div>
</div>

  <form name="frmUser" method="post" action="" enctype="multipart/form-data">
 
        <div class="card-body">
         <div class="form-row">
		 
      
            <div class="form-group col-md-4">
              <label for="inputEmail4">Brand</label>
              <input type="text" class="form-control" id="brand" required  name="brand" value="<?php echo $row["brand"]?>">
			 </div>
      
            <div class="form-group col-md-4">
              <label for="inputEmail4">Model</label>
              <input type="text" class="form-control"  name="model" required value="<?php echo $row["model"]?>">
            </div>
			<div class="form-group col-md-2">
              <label for="inputEmail4">Reg No</label>
			  <input type="text" class="form-control"  name="reg_no" required value="<?php echo $row["reg_no"]?>">
            </div>
            <div class="form-group col-md-2">
              <label for="inputEmail4">Type</label>
				<select name="car_type"  class="form-control"  >
				  <option value="<?php echo $row["car_type"]?>"><?php echo $row["car_type"]?></option>
				  <option value="Car">Car</option>
				  <option value="Van">Van</option>
				</select>
            </div>
			<div class="form-group col-md-4">
              <label for="inputCity">Features</label>
			  <textarea type="text" class="form-control" name="features" rows="3" cols="50"><?php echo $row["features"]?></textarea>
            </div>
            <div class="form-group col-md-4">
              <label for="inputCity">Full Specifications</label>
			  <textarea type="text" class="form-control" name="full_specifications" rows="3" cols="50"><?php echo $row["full_specifications"]?></textarea>
            </div>
            <div class="form-group col-md-4">
              <label for="inputCity">Requirements</label>
			  <textarea type="text" class="form-control" name="requirements" rows="3" cols="50"><?php echo $row["requirements"]?></textarea>
            </div>
			<div class="form-group col-md-2">
              <label for="inputCity">Rent Per Day</label>
              <input type="text" class="form-control"  name="rent_per_day" value="<?php echo $row["rent_per_day"]?>">
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
            <div class="form-group col-md-6">
              <label for="inputEmail4">Photo</label>
              <input type="file" class="form-control" name="photo" accept="image/*" onchange="validateForSize(this,10,200);" value="<?php echo $row["photo"]?>">
            </div>
        </div>
      </div>
 
     
       <div class="card-footer">

         <input type="submit" name="submit" value="Submit" class="btn btn-primary ">
         <button type="reset" class="btn btn-secondary">Reset</button>
      </form>
   </div>
</div>
<?php include('footer.php'); ?>

 