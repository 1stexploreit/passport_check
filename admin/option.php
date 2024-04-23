<?php include('session.php');
 
	if (isset($_POST['submit'])) {		
		
		$pad_header	= $_POST['pad_header'];
 
	 
		$sql = $conn->prepare("UPDATE tbl_doctor SET pad_header=?  where id=1");
		$sql->bind_param("sss",$pad_header, $discount, $vat);

		if($sql->execute()) {
			echo ("<script LANGUAGE='JavaScript'>
			window.alert('Succesfully Saved');
			window.location.href='index.php';
			</script>");
		}  
	
	}

	include('header.php'); 
?>
	
 
	<div class="card mt-4 d-none">
	<div class=" card-header">
	Option <i class="fas fa-angle-right"></i>   
	</div>
	<div class="card-body ">
		<form name="frmUser" method="post" action="" enctype="multipart/form-data" >
		<div class="form-group row">
			<label for="staticEmail" class="col-sm-2 col-form-label">Invoice Header off</label>
			<div class="col-sm-8">
			<input type="radio" id="html" name="pad_header" value="0" <?php if($pad_header==0) { echo "checked";} ?> >
			<label for="html">Show</label>
			<input type="radio" id="css" name="pad_header" value="1" <?php if($pad_header==1) {echo "checked";} ?>>
			<label for="css">Hide</label>
		</div>
	</div>
	
 
		
		
	</div>
		<div class="card-footer">
		<input type="submit" name="submit" value="Update"  class="btn btn-success ">
		<button type="reset" class="btn btn-secondary">Reset</button>
	</form>
	</div>
	</div>
	</div>
	</div>
 
<?php include('footer.php'); ?>