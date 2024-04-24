<?php include('session.php');

    $get_id = $_GET['id'];

	if (isset($_POST['submit'])) {		

    $pp_no     	 = $_POST['pp_no'];
	$pp_name     = $_POST['pp_name'];
	$comment     = $_POST['comment'];
	$status      = $_POST['status'];

   $attachment ='attachment' . date('Y-m-d-H-i-s') . '_' . uniqid() . '.pdf';
   move_uploaded_file($_FILES["attachment"]["tmp_name"], "../uploads/" . $attachment); 
   
		if(!empty($_FILES['attachment']['name'])) {

            $sql = $conn->prepare("UPDATE tbl_passport_check SET pp_no=?,  pp_name=? ,comment=? ,status=?, attachment=? WHERE id=?");
            $sql->bind_param("sssssi",$pp_no,$pp_name,$comment,$status,$attachment,$_GET["id"]);

			} 
			else {
				$sql = $conn->prepare("UPDATE tbl_passport_check SET pp_no=?, pp_name=? ,comment=? ,status=? WHERE id=?");
            $sql->bind_param("ssssi",$pp_no,$pp_name,$comment,$status,$_GET["id"]);
				
			} 
			
			
			
			
		if($sql->execute()) {

         echo ("<script LANGUAGE='JavaScript'>
        window.alert('Succesfully Updated');
		window.location.href='list_passport_check.php';
         </script>");
		}  

	}
	
		$sql= mysqli_query($conn,"SELECT tbl_passport_check * FROM tbl_passport_check
				WHERE tbl_passport_check.id='$get_id' ");
    $row = mysqli_fetch_assoc($sql);
	///Header
	 include('header.php'); 
?>



<div class="card mt-4">
	
	<div class="card-header">
   <div class="row">
      <div class="col-md-9 my-auto">
        Passport Check  <i class="fas fa-angle-right"></i>    Update Passport Check
      </div>
      <div class="col-md-3 text-right">
      
         <a href="list_passport_check.php" class="btn btn-outline-primary"> <i class="fas fa-folder-open"></i> All Passport Checks</a>
      </div>
   </div>
</div>

  <form name="frmUser" method="post" action="" enctype="multipart/form-data">
 
        <div class="card-body">
         <div class="form-row">
		 
      
           
      
            <div class="form-group col-md-3">
              <label for="inputEmail4">Passport No</label>
              <input type="text" class="form-control" id="pp_no" required  name="pp_no"  value="<?php echo $row["pp_no"]?>">
			 </div>
      
            <div class="form-group col-md-3">
              <label for="inputEmail4">Passport Holder Name</label>
              <input type="text" class="form-control"  name="pp_name" required  value="<?php echo $row["pp_name"]?>">
            </div>
			

			<div class="form-group col-md-3">
              <label for="inputCity"> Status</label>
				<select name="status" class="form-control" >
						<option  value="<?php echo $row["status"]?>"><?php echo $row["status"]?></option>
						<?php

						$sql = "SELECT * FROM tbl_status";
						$result = $conn->query($sql);	

						if ($result->num_rows > 0) {		
						while($sta = $result->fetch_assoc()) {
						?>
				<option value="<?php echo $sta["status"]; ?>"><?php echo $sta["status"]; ?></option>
							<?php
							}
							}
							?>
					</select>
            </div>
            <div class="form-group col-md-3">
                <label for="inputEmail4">Attachment</label>
				<input type="file" class="form-control"  name="attachment"  value="<?php echo $row["attachment"]?>">
            </div>
			<div class="form-group col-md-6">
              <label for="inputEmail4">Comment</label>
			  <input type="text" class="form-control"  name="comment"  value="<?php echo $row["comment"]?>">
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

 