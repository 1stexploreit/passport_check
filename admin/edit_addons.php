<?php 
	include('session.php'); 

	if (isset($_POST['submit'])) {		


		$item			= $_POST['item'];
		$charge			= $_POST['charge'];
	 
		$sql = $conn->prepare("UPDATE tbl_addons SET item=?,charge=? WHERE id=?");
		$sql->bind_param("ssi", $item, $charge, $_GET["id"]);
	  	
		if($sql->execute()) {
		echo ("<script LANGUAGE='JavaScript'>
		window.alert('Succesfully Update');
		window.location.href='list_addons.php';
		</script>");
		}  

	}

    $get_id = $_GET['id'];
    $sql= mysqli_query($conn,"SELECT * from tbl_addons WHERE id='$get_id' ");
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
           Addons <i class="fas fa-angle-right"></i> Update Addons
      </div>
      <div class="col-md-3 text-right">
         <a href="list_addons.php" class="btn btn-outline-primary"> <i class="fas fa-folder-open"></i> All Addonss</a>
      </div>
   </div>
</div>
     <div class=" card-body">
 <form name="frmUser" method="post" action="" enctype="multipart/form-data" >
         <div class="form-row">
			<div class="form-group col-md-4">
               <label for="inputCity">Item</label>
               <input type="text" class="form-control"  name="item" value="<?php echo $row["item"]?>">
            </div>            
			
			<div class="form-group col-md-2">
               <label for="inputCity">Charge</label>
               <input type="text" class="form-control"  name="charge" value="<?php echo $row["charge"]?>">
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