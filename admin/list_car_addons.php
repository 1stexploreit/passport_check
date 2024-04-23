<?php include('session.php'); 
		
		$get_car_id = $_GET['car_id'];
		
		$tbl_car = mysqli_query($conn, "SELECT * FROM tbl_car WHERE id = '$get_car_id'");
		$tbl_car = mysqli_fetch_assoc($tbl_car);
		
		
	   $sql = "SELECT * from tbl_car_addons where car_id='$get_car_id'";
	   $result = $conn->query($sql);	
	   $counter = 0;
	   
   include('header.php'); 
   ?>
<div class="mt-4 mb-2 page-title">
   <div class="row">
    <div class="col-md-6 my-auto">
  Addons <i class="fas fa-angle-right"></i>  <?php echo $tbl_car['brand'];?>/<?php echo $tbl_car['model'];?>/<?php echo $tbl_car['reg_no'];?> 
      </div>
             <div class="col-md-6 text-right">
	
		<a href="add_car_addons.php?car_id=<?php echo $get_car_id;?>" class="btn btn-outline-primary"> <i class="fas fa-plus-square"></i>  Add Addons </a>
      </div>
   </div>
</div>
<div class="card mb-4">
   <div class="card-body">
      <div class="table-responsive">
        
         <table class="table table-hover table-striped" id="dataTable" width="100%" cellspacing="0">
            <thead>
               <tr>
                  <th width="0%"> #</th>
                  <th> Item </th>
                  <th> Charge </th>
                  <th width="10%"> </th>
               </tr>
            </thead>
            <tbody>
               <?php
                  if ($result->num_rows > 0) {		
                  	while($row = $result->fetch_assoc()) {
                  ?>
               <tr>
				<td width="0%" class="bn-font"><?php echo ++$counter; ?></td>
				<td  > <?php echo $row["item"]; ?></td>
				<td  > <?php echo $row["charge"]; ?></td>
				<td width="10%">
				<a href="edit_addons.php?id=<?php echo $row["id"]; ?>" class="btn btn-success btn-sm d-none"> <i class="fa fa-edit ">  </i> </a>  
				<a  data-appd="<?php echo $row['id'] ?>" class="delete btn btn-danger btn-sm d-none" href="#"><i class="fa fa-trash "> </i>  </a>
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
<script src="//code.jquery.com/jquery-1.10.2.min.js"></script>
<script>
   $(document).on('click','.delete',function(){
   var element = $(this);
   var del_id = element.attr("data-appd");
   var info = 'deladdons=' + del_id;
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