<?php include('session.php'); 
 
	
		$sql = "SELECT tbl_order.*, tbl_car.brand,tbl_car.model,tbl_car.reg_no,
				(select location from tbl_location where id=tbl_order.pickupLocation) as pickupLocation,
				(select location from tbl_location where id=tbl_order.dropOffLocation) as dropOffLocation
			
				FROM tbl_order
				left join tbl_car on tbl_car.id=tbl_order.car_id
				where status='Pending'
				 ";
	   $result = $conn->query($sql);	
	   $counter = 0;
	   
   include('header.php'); 
   ?>
<div class="mt-4 mb-2 page-title">
   <div class="row">
    <div class="col-md-6 my-auto">
 Booking <i class="fas fa-angle-right"></i> Verified
      </div>
	<div class="col-md-6 text-right">
		<a href="list_order_pending.php" class="btn btn-outline-primary"> <i class="fas fa-folder"></i> New</a>
      </div>
   </div>
</div>
<div class="card mb-4">
   <div class="card-body">
      <div class="table-responsive">
        
         <table class="table table-hover table-striped" id="dataTable" width="100%" cellspacing="0">
            <thead>
               <tr>
                  <th nowrap> Booking Info</th>
                  <th> Vehicle Info  </th>
                  <th> Pickup  </th>
                  <th> Drop off </th>
                  <th> Customer Info </th>
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
				<td > #<?php echo $row["order_id"]; ?><br> <?php echo $row["created"]; ?><br><?php echo $row["status"]; ?></td>
				<td > <?php echo $row["brand"]; ?><br> <?php echo $row["model"]; ?><br><?php echo $row["reg_no"]; ?></td>
				<td> <?php echo $row["pickupLocation"]; ?><br> <?php echo $row["pickupTime"]; ?><br> <?php echo $row["pickupTime"]; ?></td>
				<td> <?php echo $row["dropOffLocation"]; ?><br> <?php echo $row["dropOffDate"]; ?><br> <?php echo $row["dropOffTime"]; ?></td>
				<td> <?php echo $row["fullname"]; ?><br> <?php echo $row["contact"]; ?><br> <?php echo $row["email"]; ?></td>
				<td> Charge: <?php echo $row["charge"]; ?><br> Addons: <?php echo $row["addons"]; ?><br> Total: <?php echo $row["total"]; ?></td>
				<td nowrap>
				 <a  data-appd="<?php echo $row['id'] ?>" class="delete btn btn-danger btn-sm" href="#"><i class="fa fa-trash "> </i>  </a>
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
   var info = 'delsupplier=' + del_id;
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
   
   
   
  $(document).ready(function(){
    $('.order-update').click(function(e){
        e.preventDefault(); // Prevent default link behavior

        // Get the order ID from the data attribute
        var orderId = $(this).data('order-id');
        var row = $(this).closest('tr'); // Get the parent row

        // AJAX request to update the tbl_order
        $.ajax({
            url: 'order_update.php',
            method: 'POST',
            data: { orderId: orderId },
            success: function(response) {
                // If update is successful, you can handle the response here
                console.log('Order status updated successfully.');
                // Hide the row
                row.hide();
                // Show an alert
                alert('Order status verified successfully.');
            },
            error: function(xhr, status, error) {
                // If there's an error, you can handle it here
                console.error('Error updating order status:', error);
            }
        });
    });
});


</script>
<?php include('footer.php'); ?>