<?php require_once("session.php");

	if (isset($_POST['submit'])) {		
		$sql = $conn->prepare("UPDATE tbl_status SET status=?  WHERE id=?");
		$status=$_POST['status'];
 

		$sql->bind_param("si",$status, $_GET["id"]);	
		if($sql->execute()) {
			$success_message = "Edited Successfully";
		} else {
			$error_message = "Problem in Editing Record";
		}
	 echo ("<script LANGUAGE='JavaScript'>
    window.alert('Succesfully Saved');
    window.status.href='list_status.php';
    </script>");
	}

    $get_id = $_GET['id'];
    $sql= mysqli_query($conn,"SELECT * FROM tbl_status WHERE id='$get_id'");
    if(mysqli_num_rows($sql) === 1){
    $row = mysqli_fetch_assoc($sql);
    }
	
	///Header
	 include('header.php'); 
?>
 

<div class="mt-3 page-title">
   <div class="row">
      <div class="col-md-9 my-auto">
         Status <i class="fas fa-angle-right"></i>  Edit Status
      </div>
      <div class="col-md-3 text-right">
            
            <a href="list_status.php" class="btn btn-link btn-sm ">  <i class="fas fa-folder-open text-info"></i>  All Status</a>
      </div>
   </div>
</div>
<div class="card mb-4">
 
   <div class="mt-3 card-body">
 <form name="frmUser" method="post" action="" enctype="multipart/form-data" >
         <div class="form-row">
            <div class="form-group col-md-4">
               <label for="inputEmail4">Status</label>
               <input type="text" class="form-control" required value="<?php echo $row["status"]?>"  name="status" >
            </div>
             
         </div>
         <hr>
         <input type="submit" name="submit" value="Submit" class="btn btn-primary ">
         <button type="reset" class="btn btn-secondary">Reset</button>
      </form>
   </div>
</div>
<?php include('footer.php'); ?>