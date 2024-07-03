<?php include('session.php');

 
	if (isset($_POST['submit'])) {

	   $pp_no     	= $_POST['pp_no'];
	   $pp_name     = $_POST['pp_name'];
	   $comment     = $_POST['comment'];
	   $status      = $_POST['status'];

	   $attachment ='attachment' . date('Y-m-d-H-i-s') . '_' . uniqid() . '.pdf';
	   move_uploaded_file($_FILES["attachment"]["tmp_name"], "../uploads/" . $attachment); 
	   
	     if (!empty($_FILES['photo']['name'])) {
		$sql = $conn->prepare("INSERT INTO tbl_passport_check (pp_no,pp_name,comment,status, attachment) VALUES (?,?,?,?,?)");
		$sql->bind_param("sssss",$pp_no,$pp_name,$comment,$status,$attachment);		
		 } else {
		$sql = $conn->prepare("INSERT INTO tbl_passport_check (pp_no,pp_name,comment,status) VALUES (?,?,?,?)");
		$sql->bind_param("ssss",$pp_no,$pp_name,$comment,$status);
		 }
		if ($sql->execute()) {
		   
			$car_id=$conn->insert_id;
		
			echo ("<script LANGUAGE='JavaScript'>
			window.alert('Succesfully Saved');
				window.location.href='list_passport_check.php';
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
    <div class="col-lg-6 col-6 my-auto"> Passport Check <i class="fas fa-angle-right"></i> Add Passport Check </div>
    <div class="col-lg-6 col-6 text-right"> <a href="list_passport_check.php" class="btn btn-outline-primary "> <i class="fas fa-folder-open"></i> All Passport Checks </a> </div>
  </div>
</div>

  <form name="frmUser" method="post" action="" enctype="multipart/form-data">
 
        <div class="mt-3 card-body">
          <div class="form-row">
		     
            <div class="form-group col-md-4">
              <label for="inputEmail4">Passport No</label>
              <input type="text" class="form-control" id="pp_no" required  name="pp_no">
			 </div>
      
            <div class="form-group col-md-4">
              <label for="inputEmail4">Passport Holder Name</label>
              <input type="text" class="form-control"  name="pp_name" required>
            </div>
			

			<div class="form-group col-md-4">
              <label for="inputCity"> Status</label>
				<select name="status" class="form-control" >
						<option >---</option>
						<?php

						$sql = "SELECT * FROM tbl_status";
						$result = $conn->query($sql);	

						if ($result->num_rows > 0) {		
						while($row = $result->fetch_assoc()) {
						?>
				<option value="<?php echo $row["status"]; ?>"><?php echo $row["status"]; ?></option>
							<?php
							}
							}
							?>
					</select>
            </div>
            
			<div class="form-group col-md-12">
              <label for="inputEmail4">Comment</label>
			  <textarea type="text" class="form-control"  name="comment" ></textarea>
            </div>
			
			<div class="form-group col-md-3">
                <label for="inputEmail4">Attachment</label>
				<input type="file"   name="attachment" >
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






