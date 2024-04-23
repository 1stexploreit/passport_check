<?php include ('session.php'); 
	if(!empty($_POST["save"])) {
	    
		$itemCount = count($_POST["location"]);
		$itemValues=0;
		
		$query = "INSERT INTO tbl_location (location) VALUES ";
		$queryValue = "";
		for($i=0;$i<$itemCount;$i++) {
			if(!empty($_POST["location"][$i])) {
				$itemValues++;
				if($queryValue!="") {
					$queryValue .= ",";
				}
				$queryValue .= "('" . $_POST["location"][$i] . "')";
			}
		}
		$query = $query.$queryValue;
		if($itemValues!=0) {
		    $result = mysqli_query($conn, $query);
			if(!empty($result)) $message = "Added Successfully.";
			
				echo ("<script LANGUAGE='JavaScript'>
				window.alert('Succesfully Saved');
				window.location.href='list_location.php';
				</script>");
		}
	}
	
 
	
	include ('header.php'); 
?>

<div class="mt-3 mb-3 page-title">
   <div class="row">
      <div class="col-md-10 my-auto">
         Location <i class="fas fa-angle-right"></i> Add Location
      </div>
      <div class="col-md-2 text-right">
         <a href="list_location.php" class="btn btn-outline-primary"><i class="fas fa-folder-open"></i> Location List</a>
      </div>
   </div>
</div>
<form name="frmUser" method="post" action="" enctype="multipart/form-data" >
   <div class="card mb-4">
      <div class="card-body">
         <div class="row row-header">
            <div class="col-md-1 text-center">
               <a  class="btn btn-light btn-blcok btn-sm" name="del_item" onClick="deleteRow();"> <i class="fas fa-trash "></i>  </a> 
            </div>
            <div class="col-md-4">
               <label>Location</label>
            </div>
            <div class="col-md-1"> </div>
         </div>
         <div class="all">
            <div class="formi">
               <div class="row items ">
                  <div class="col-md-1 text-center">
                     <input type="checkbox" class="checkmark text-center add" name="item_index[]" >
                  </div>
                  <div class="col-md-4">
                     <input class="form-control add" type="text" name="location[]">
                  </div>
                  <div class="col-md-1">
                     <div class="col-md-1"> <span class="instl btn btn-outline-primary "><i class="fas fa-plus "></i> </span> </div>
                  </div>
               </div>
               <br>
            </div>
         </div>
      </div>
      <div class="card-footer" >
         <input type="submit" class="btn btn-success add" name="save" value="Submit" />
         <input type="reset" class="btn btn-secondary"  value="Reset" />
      </div>
   </div>
</form>
<?php include('footer.php'); ?>
<script type="text/javascript">
   // Colone Items
    
   	$(document).ready(function() {
   	  $(".instl").click(function() {
   		$(".formi")
   		  .eq(0)
   		  .clone()
   		  .find("input").val("").end() // ***
   		  .show()
   		  .insertAfter(".formi:last");
   		
   	  });
   	  $('.all').on('click', ".cancel", function() {
   		  $(this).closest('.formi').remove();
   		});
   	});
   	
   	
   // Remove Row  
   		function deleteRow() {
   	$('DIV.items').each(function(index, item){
   		jQuery(':checkbox', this).each(function () {
   			if ($(this).is(':checked')) {
   				$(item).remove();
   			}
   		});
   	});
   }
</script>
