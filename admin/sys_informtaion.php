<?php
include('session.php');
 
	if (isset($_POST['submit'])) {		
		
		$institute=$_POST['institute'];
		$tagline=$_POST['tagline'];
		$address=$_POST['address'];
		$mobile=$_POST['mobile'];
		$email=$_POST['email'];
		$web=$_POST['web'];
		$google_map=$_POST['google_map'];
		$face_book=$_POST['face_book'];
		$you_tube=$_POST['you_tube'];
		$owner=$_POST['owner'];
		
		$logo = 'logo' . date('Y-m-d-H-i-s') . '_' . uniqid() . '.png';
		move_uploaded_file($_FILES["logo"]["tmp_name"], "../uploads/" . $logo);

		if (!empty($_FILES['logo']['name'])) {
			$sql = $conn->prepare("UPDATE tbl_client SET institute=?, tagline=?, address=?, mobile=?, email=?, web=?, google_map=?, face_book=?, you_tube=?, owner=?, logo=? WHERE id=1");
			$sql->bind_param("sssssssssss", $institute, $tagline, $address, $mobile, $email, $web, $google_map, $face_book, $you_tube, $owner, $logo);
		} else {
			$sql = $conn->prepare("UPDATE tbl_client SET institute=?, tagline=?, address=?, mobile=?, email=?, web=?, google_map=?, face_book=?, you_tube=?, owner=? WHERE id=1");
			$sql->bind_param("ssssssssss", $institute, $tagline, $address, $mobile, $email, $web, $google_map, $face_book, $you_tube, $owner);
		}

		if ($sql->execute()) {
			echo ("<script LANGUAGE='JavaScript'>
				window.alert('Successfully Updated');
				window.location.href='index.php';
				</script>");
		}
	}

	$sql= mysqli_query($conn,"SELECT * from tbl_client WHERE tbl_client.id=1");
    $row = mysqli_fetch_assoc($sql);

//Header
	 include('header.php'); 
?>

 
<div class="card mt-4">
	
	     <div class=" card-header">
		   Dashboard <i class="fas fa-angle-right"></i>    Site Information
		   </div>
     <div class="card-body">
	 
	<div class="row">
	<div class="col-sm-5">
	

 <form name="frmUser" method="post" action="" enctype="multipart/form-data" >
 
 		<div class="form-group row">
		<label for="staticEmail" class="col-sm-4 col-form-label">Organization Name</label>
		<div class="col-sm-8">
	 <input type="text" name="institute" class="form-control" value="<?php echo $row["institute"]; ?>" >
		</div>
	</div> 		

	<div class="form-group row">
		<label for="staticEmail" class="col-sm-4 col-form-label">Propritor/Slogan </label>
		<div class="col-sm-8">
 <input type="text" name="tagline" class="form-control" value="<?php echo $row["tagline"]; ?>" >
		</div>
	</div>

	<div class="form-group row">
		<label for="staticEmail" class="col-sm-4 col-form-label">Address</label>
		<div class="col-sm-8">
	 <input type="text" name="address" id="last_name" class="form-control" value="<?php echo $row["address"]; ?>"  >
              </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6">
              <div class="form-group">
		</div>
	</div>
	
	<div class="form-group row">
		<label for="staticEmail" class="col-sm-4 col-form-label">Mobile</label>
		<div class="col-sm-8">
	 <input   class="form-control" name="mobile"  value="<?php echo $row["mobile"]; ?>" >
		</div>
	</div>
	
		<div class="form-group row">
		<label for="staticEmail" class="col-sm-4 col-form-label">Email</label>
		<div class="col-sm-8">
 <input   class="form-control" name="email"  value="<?php echo $row["email"]; ?>" autocomplete="off" >
		</div>
	</div>
	
	<div class="form-group row">
		<label for="staticEmail" class="col-sm-4 col-form-label">Web Address</label>
		<div class="col-sm-8">
	 <input   class="form-control" name="web"  value="<?php echo $row["web"]; ?>" >
		</div>
	</div>
	<div class="form-group row">
		<label for="staticEmail" class="col-sm-4 col-form-label">Google Map</label>
		<div class="col-sm-8">
	 <textarea name="google_map" class="form-control"> <?php echo $row["google_map"]; ?>" > </textarea>
		</div>
	</div>
	<div class="form-group row">
		<label for="staticEmail" class="col-sm-4 col-form-label">Facebook Link</label>
		<div class="col-sm-8">
	 <input   class="form-control" name="face_book"  value="<?php echo $row["face_book"]; ?>" >
		</div>
	</div>
	<div class="form-group row">
		<label for="staticEmail" class="col-sm-4 col-form-label">Youtube Link</label>
		<div class="col-sm-8">
	 <input   class="form-control" name="you_tube"  value="<?php echo $row["you_tube"]; ?>" >
		</div>
	</div>
	<div class="form-group row">
		<label for="staticEmail" class="col-sm-4 col-form-label">Owner</label>
		<div class="col-sm-8">
	 <input   class="form-control" name="owner"  value="<?php echo $row["owner"]; ?>" >
		</div>
	</div>
	
	<div class="form-group row">
		<label for="staticEmail" class="col-sm-4 col-form-label">Logo </label>
		<div class="col-sm-8">
 <input type="file"  class="form-control" name="logo"  >
		</div>
	</div>
	
	
	
 
	
		</div>
		</div>
		</div>
		     <div class="card-footer">
      <input type="submit" name="submit" value="Submit"  class="btn btn-success ">
         <button type="reset" class="btn btn-secondary">Reset</button>
  
  
      </form>
   </div>
   
   
   
</div>
</div>
</div>
 
<?php include('footer.php'); ?>