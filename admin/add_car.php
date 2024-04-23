<?php include('session.php');

 
	if (isset($_POST['submit'])) {

	   $brand     				= $_POST['brand'];
	   $model      				= $_POST['model'];
	   $reg_no      			= $_POST['reg_no'];
	   $car_type      			= $_POST['car_type'];
	   $features				= $_POST['features'];
	   $full_specifications     = $_POST['full_specifications'];
	   $requirements         	= $_POST['requirements'];
	   $rent_per_day      		= $_POST['rent_per_day'];
	   $rent_per_hour      		= $_POST['rent_per_hour'];
	   $location_id      		= $_POST['location_id'];

	   $photo ='photo' . date('Y-m-d-H-i-s') . '_' . uniqid() . '.png';
	   move_uploaded_file($_FILES["photo"]["tmp_name"], "../uploads/" . $photo); 
	   
	   
		$sql = $conn->prepare("INSERT INTO tbl_car (brand,model,reg_no,car_type,features,full_specifications,requirements,rent_per_day,rent_per_hour,location_id, photo) VALUES (?,?,?,?,?,?,?,?,?,?,?)");
		$sql->bind_param("sssssssssss",$brand,$model,$reg_no,$car_type,$features,$full_specifications,$requirements,$rent_per_day,$rent_per_hour,$location_id,$photo);

		if ($sql->execute()) {
		   
			$car_id=$conn->insert_id;
		
			echo ("<script LANGUAGE='JavaScript'>
			window.location.href='add_pick_drop.php?car_id=$car_id';
			</script>");
		}

		   $sql->close();
		   $conn->close();

	}
 
	include('header.php');
?>



<div class="card mt-4">
	
	<div class="card-header">
  <div class="row">
    <div class="col-lg-6 col-6 my-auto"> Car <i class="fas fa-angle-right"></i> Add Car </div>
    <div class="col-lg-6 col-6 text-right"> <a href="list_car.php" class="btn btn-outline-primary "> <i class="fas fa-folder-open"></i> All Cars </a> </div>
  </div>
</div>

  <form name="frmUser" method="post" action="" enctype="multipart/form-data">
 
        <div class="mt-3 card-body">
          <div class="form-row">
		     
            <div class="form-group col-md-4">
              <label for="inputEmail4">Brand</label>
              <input type="text" class="form-control" id="brand" required  name="brand">
			 </div>
      
            <div class="form-group col-md-4">
              <label for="inputEmail4">Model</label>
              <input type="text" class="form-control"  name="model" required>
            </div>
			<div class="form-group col-md-2">
              <label for="inputEmail4">Reg No</label>
			  <input type="text" class="form-control"  name="reg_no" required>
            </div>
			<div class="form-group col-md-2">
              <label for="inputEmail4">Type</label>
				<select name="car_type"  class="form-control"  >
				  <option >-----</option>
				  <option value="Car">Car</option>
				  <option value="Van">Van</option>
				</select>
            </div>
            
			<div class="form-group col-md-4">
              <label for="inputCity">Features</label>
			  <textarea type="text" class="form-control" name="features" rows="2" cols="50"></textarea>
            </div>
            <div class="form-group col-md-4">
              <label for="inputCity">Full Specifications</label>
			  <textarea type="text" class="form-control" name="full_specifications" rows="2" cols="50"></textarea>
            </div>
            <div class="form-group col-md-4">
              <label for="inputCity">Requirements</label>
			  <textarea type="text" class="form-control" name="requirements" rows="2" cols="50"></textarea>
            </div>
			<div class="form-group col-md-2">
              <label for="inputCity">Rent Per Day</label>
              <input type="text" class="form-control"  name="rent_per_day" >
            </div>		

			<div class="form-group col-md-2">
              <label for="inputCity">Rent Per Hour</label>
              <input type="text" class="form-control"  name="rent_per_hour" >
            </div>
			<div class="form-group col-md-4">
              <label for="inputCity"> Pick Up Location</label>
				<select name="location_id" class="form-control" >
						<option >---</option>
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
            <div class="form-group col-md-3">
              <label for="inputEmail4">Photo</label> <br>
              <input type="file"   name="photo" accept="image/*" onchange="validateForSize(this,10,100);">
            </div>

        </div>
    </div>
    
<div class="card-footer">
    <input type="submit" name="submit" id="register" value="Submit" class="btn btn-success ">
    <button type="reset" class="btn btn-secondary">Reset</button>
  </form>
</div>
</div>


<?php include('footer.php'); ?>






