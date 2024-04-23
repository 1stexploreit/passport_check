<?php include('session.php'); 

	///Supplier Add 	
	if (isset($_POST['submit'])) {
		

		$item			= $_POST['item'];
		$charge			= $_POST['charge'];
		
		$sql = $conn->prepare("INSERT INTO tbl_addons (item,charge) VALUES (?,?)");  
		$sql->bind_param("ss", $item, $charge);
		
		if($sql->execute()) {
			echo ("<script LANGUAGE='JavaScript'>
			window.alert('Succesfully Saved');
			window.location.href='list_addons.php';
			</script>");
		 
		}  
		$sql->close();   
		$conn->close();
	} 
	///Header
	 include('header.php'); 
?>

<div class="card mt-4">
	<div class="card-header">
   <div class="row">
      <div class="col-md-8 my-auto">
        Addons <i class="fas fa-angle-right"></i> Add Addons
      </div>
      <div class="col-md-4 text-right">
 
         <a href="list_addons.php" class="btn btn-outline-primary"> <i class="fas fa-folder-open"></i> All Addonses</a>
      </div>
   </div>
</div>

   <div class="mt-3 card-body">
 <form name="frmUser" method="post" action="" enctype="multipart/form-data" >
         <div class="form-row">
            <div class="form-group col-md-4">
               <label for="inputCity">Item</label>
               <input type="text" class="form-control"  name="item" >
            </div>            
			
			<div class="form-group col-md-2">
               <label for="inputCity">Charge</label>
               <input type="text" class="form-control"  name="charge" >
            </div>
           
         </div>
         </div>
    <div class="card-footer">
         <input type="submit" name="submit" value="Submit" class="btn btn-success">
         <button type="reset" class="btn btn-secondary">Reset</button>
      </form>
   </div>
</div>

<?php include('footer.php'); ?>
