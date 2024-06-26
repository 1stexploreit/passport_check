<?php include('session.php'); 

	if (isset($_POST['submit'])) {		
		$fullname=$_POST['fullname'];
		$email=$_POST['email'];
		$mobile=$_POST['mobile'];
		
		$photo='photo' . date('Y-m-d-H-i-s') . '_' . uniqid() . '.png';
		move_uploaded_file($_FILES["photo"]["tmp_name"], "../uploads/" . $photo);
		
		if(!empty($_FILES['photo']['name'])) {
			$sql = $conn->prepare("UPDATE tbl_admin SET fullname=?,email=?, mobile=? WHERE id=?");
			$sql->bind_param("sssi",$fullname,$email,$mobile, $get_userid);
		} 
		
		else {
			$sql = $conn->prepare("UPDATE tbl_admin SET fullname=?,email=?, mobile=? WHERE id=?");
			$sql->bind_param("sssi",$fullname,$email,$mobile, $get_userid);
		}
		if($sql->execute()) {
			echo ("<script LANGUAGE='JavaScript'>
			window.alert('Succesfully Update');
			window.location.href='index.php';
			</script>");
		}  
	}
    $sql= mysqli_query($conn,"SELECT * FROM tbl_admin WHERE id='$get_userid'");
    if(mysqli_num_rows($sql) === 1){
    $row = mysqli_fetch_assoc($sql);
    }
	
	///Header
	 include('header.php'); 
?>
  

<div class="card mt-4">
	 <div class="card-header">
	 User Information <i class="fas fa-angle-right"></i>    User Login Information
</div>

		 <div class="mt-3 card-body">
 <form name="frmUser" method="post" action="" enctype="multipart/form-data" >
         <div class="form-row">
            <div class="form-group col-md-4">
               <label for="inputEmail4"> User Name</label>
               <input type="text" class="form-control" required value="<?php echo $row["fullname"]?>"  name="fullname" >
            </div>
			<div class="form-group col-md-4">
               <label for="inputEmail4">Email</label>
               <input type="text" class="form-control" required value="<?php echo $row["email"]?>"  name="email" >
            </div>	  
			<div class="form-group col-md-4">
               <label for="inputEmail4">Mobile</label>
               <input type="number" class="form-control" required value="<?php echo $row["mobile"]?>"  name="mobile" >
            </div>
	 
			<div class="form-group col-md-4">
               <label for="inputEmail4"> Photo</label>
               <input type="file" class="form-control"   name="photo" >
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