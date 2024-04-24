<?php require_once("session.php");

	   $sql = "SELECT tbl_passport_check.*, tbl_status.status
				FROM tbl_passport_check
				left join tbl_status on tbl_passport_check.status=tbl_status.id
				 ";
	   $result = $conn->query($sql);	
      $counter = 0;
      
      include('header.php'); 
      
      ?>
	  
	  <style>
	  .img:hover {
  transform: scale(5.5); /* (150% zoom - Note: if the zoom is too large, it will go outside of the viewport) */
  z-index:1000;
  transition: transform .5s ease;
   
}
</style> 
      
<div class="mt-4 mb-2 page-title">
   <div class="row">
        <div class="col-md-6 my-auto">
         Passport Check  <i class="fas fa-angle-right"></i>  All Passport Checks 
      </div>
       <div class="col-md-6 text-right">
         <a href="add_passport_check.php" class="btn btn-outline-primary"><i class="fas fa-plus"></i> Add Passport Check  </a>
      </div>
   </div>
</div>

<div class="card mb-2">
   <div class="card-body ">
      <div class="table-responsive">
        
         <table class="table table-hover table-striped  " id="dataTable" width="100%" cellspacing="0">
            <thead>
               <tr>
			   <th width="5%"> # </th>
                  <th>Passport No</th>
                  <th>Passport Holder Name</th>
                  <th>Status</th>
                  <th>Comment</th>
                  <th width="10%"> </th>
               </tr>
            </thead>
            <tbody>
               <?php
                  if ($result->num_rows > 0) {		
                  	while($row = $result->fetch_assoc()) {
                  ?>
               <tr>
			   <td width="5%"><?php echo ++$counter; ?></td>
				  <td> <?php echo $row["pp_no"]; ?> </td>
				  <td> <?php echo $row["pp_name"]; ?> </td>
                  <td> <?php echo $row["status"]; ?> </td>                  
                  <td> <?php echo $row["comment"]; ?> </td>                  
                  <td  align="right" width="10%" nowrap>
					<a class="btn btn-outline-info btn-sm" href="../uploads/<?php echo $row["attachment"] ?>"> <i class="fa fa-print"> </i> View </a>
					<a class="btn btn-outline-success btn-sm" href="edit_passport_check.php?id=<?php echo $row["id"]; ?>"><i class="fa fa-edit"></i>   </a>
					<a data-appd="<?php echo $row['id'] ?>" class="btn btn-outline-danger btn-sm delete" href="#"><i class="fa fa-trash text-danger"> </i>   </a>
                  </td>
               </tr>
               <?php
                  }
                  }
                  ?>
            </tbody>
            <tfoot>
         </table>
      </div>
   </div>
</div>

<script src="//code.jquery.com/jquery-1.10.2.min.js"></script>
<script>
	$(document).on('click','.delete',function(){
	var element = $(this);
	var del_id = element.attr("data-appd");
	var info = 'delpassport_check=' + del_id;
	if(confirm("Are you sure you want to delete this?"))
	{
	 $.ajax({
	   type: "POST",
	   url: "ajax_delete.php",
	   data: info,
	   success: function(){
	 }
	});
	  $(this).parents("tr").animate({ backgroundColor: "#003" }, "slow")
	  .animate({ opacity: "hide" }, "slow");
	 }
	return false;
	});
</script>

<?php include('footer.php'); ?>