<?php require_once("session.php");
   $sql = "SELECT * FROM tbl_status ";
   $result = $conn->query($sql);	
   $counter = 0;
   
   include('header.php'); 
   ?>
<div class="mt-4 mb-2 page-title">
   <div class="row">
      <div class="col-md-9 my-auto">
         Status <i class="fas fa-angle-right"></i>     All Statuss
      </div>
      <div class="col-md-3 text-right">
         <a href="add_status.php" class="btn btn-outline-primary">  <i class="fas fa-plus-square "></i> Add Status</a>
      </div>
   </div>
</div>
<div class="card mb-4">
   <div class="card-body">
      <div class="table-responsive">
      
         <table class="table table-hover " id="dataTable" width="100%" cellspacing="0">
            <thead>
               <tr>
                  <th width="20%"> #</th>
                  <th> Status </th>
                  <th width="10%"> </th>
               </tr>
            </thead>
            <tbody>
               <?php
			   
                  if ($result->num_rows > 0) {		
                  	while($row = $result->fetch_assoc()) {
                  ?>
               <tr>
                  <td width="20%" class="bn-font">
                     <?php echo ++$counter; ?>
                  </td>
                  <td>
                     <?php echo $row["status"]; ?>
                  </td>
                  <td width="10%">
                     <a href="edit_status.php?id=<?php echo $row["id"]; ?>" class="btn btn-success btn-sm"> <i class="fa fa-edit ">  </i> </a>  
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
</div>
<script src="//code.jquery.com/jquery-1.10.2.min.js"></script>
<script>
   $(document).on('click','.delete',function(){
   var element = $(this);
   var del_id = element.attr("data-appd");
   var info = 'delstatus=' + del_id;
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