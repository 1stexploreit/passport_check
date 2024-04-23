<?php require_once("session.php");

	   $sql = "SELECT tbl_car.*, tbl_location.location
				FROM tbl_car
				left join tbl_location on tbl_car.location_id=tbl_location.id
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
         Car  <i class="fas fa-angle-right"></i>  All Cars 
      </div>
       <div class="col-md-6 text-right">
         <a href="preview_car_report.php" class="btn btn-outline-primary"><i class="fas fa-print"></i>  Print  </a>
         <a href="add_car.php" class="btn btn-outline-primary"><i class="fas fa-plus"></i> Add Car  </a>
      </div>
   </div>
</div>

<div class="card mb-2">
   <div class="card-body ">
      <div class="table-responsive">
        
         <table class="table table-hover table-striped  " id="dataTable" width="100%" cellspacing="0">
            <thead>
               <tr>
                  <th>Photo</th>
                  <th>Brand</th>
                  <th>Model</th>
                  <th>Reg No</th>
                  <th>Type</th>
                  <th>Rent Per Day</th>            
                  <th>Features</th>            
                  <th>Location</th>            
                             
                  <th width="10%"> </th>
               </tr>
            </thead>
            <tbody>
               <?php
                  if ($result->num_rows > 0) {		
                  	while($row = $result->fetch_assoc()) {
                  ?>
               <tr>
			     <td width="0%" class="bn-font"><img src="../uploads/<?php echo $row["photo"] ?>" class="img" height="54" onError="this.onerror=null;this.src='../assets/img/profile.png';" style="border-radius: 50%;" ></td>
				  <td> <?php echo $row["brand"]; ?> </td>
				  <td> <?php echo $row["model"]; ?> </td>
                  <td> <?php echo $row["reg_no"]; ?> </td>                  
                  <td> <?php echo $row["car_type"]; ?> </td>                  
                  <td> <?php echo $row["rent_per_day"]; ?> </td> 
					<td> <?php echo mb_strimwidth($row['features'], 0, 50, "..."); ?></td>
                  <td> <?php echo $row["location"]; ?> </td>                  
                                  
                  <td  align="right">
				  				 

					<div class="dropdown">
					  <button class="btn btn-primary dropdown-toggle btn-sm" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Option
					  </button>
					  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
						<a class="dropdown-item" href="edit_car.php?id=<?php echo $row["id"]; ?>"><i class="fa fa-edit"></i> Edit  </a>
						<a class="dropdown-item" href="list_pick_drop.php?car_id=<?php echo $row["id"]; ?>"><i class="fa fa-map"></i> Pick & Drop  </a>
						<a class="dropdown-item" href="list_car_addons.php?car_id=<?php echo $row["id"]; ?>"><i class="fa fa-list"></i> Addons  </a>
						<a data-appd="<?php echo $row['id'] ?>" class="delete dropdown-item <?php hideforall(); ?>" href="#"><i class="fa fa-trash text-danger"> </i> Delete  </a>
					  </div>
					</div>
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
	var info = 'delcar=' + del_id;
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