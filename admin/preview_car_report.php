<?php require_once("session.php");
require_once("header_report.php");
?>
<div class="report-title"> 
All Cars </div> 
<?php 

	
	
$sql = "SELECT tbl_car.*, tbl_location.location
				FROM tbl_car
				left join tbl_location on tbl_car.location_id=tbl_location.id ";
	   $result = $conn->query($sql);	
      $counter = 0;
?>
 
<table width="100%" border="1" cellpadding="0" cellspacing="0" class="RFtable">
  <thead>
               <tr>
			      <th align="center">#</th>
				  <th>Photo</th>
                  <th>Brand</th>
                  <th>Model</th>
                  <th>Reg No</th>
                  <th>Type</th>
                  <th>Rent Per Day</th>            
                  <th>Features</th>            
                  <th>Full Specifications</th>            
                  <th>Requirements</th>            
                  <th>Location</th> 
               </tr>
  </thead>
            <tbody>
               <?php
                  if ($result->num_rows > 0) {		
                  	while($row = $result->fetch_assoc()) {
                  ?>
               <tr>
				  <td width="0%" class="bn-font"><?php echo ++$counter; ?></td>
				  <td width="0%" class="bn-font"><img src="../uploads/<?php echo $row["photo"] ?>" class="img" height="54" onError="this.onerror=null;this.src='../assets/img/profile.png';" style="border-radius: 50%;" ></td>
				  <td> <?php echo $row["brand"]; ?> </td>
				  <td> <?php echo $row["model"]; ?> </td>
                  <td> <?php echo $row["reg_no"]; ?> </td>                  
                  <td> <?php echo $row["car_type"]; ?> </td>                  
                  <td align="right"> <?php echo $row["rent_per_day"]; ?> </td> 
					<td> <?php echo mb_strimwidth($row['features'], 0, 50, "..."); ?></td>
					<td> <?php echo mb_strimwidth($row['full_specifications'], 0, 50, "..."); ?></td>
					<td> <?php echo mb_strimwidth($row['requirements'], 0, 50, "..."); ?></td>
                  <td> <?php echo $row["location"]; ?> </td> 
                
               </tr>
               <?php
                  }
                  }
                  ?>
				
            </tbody>
            <tfoot>
</table>
<br>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script>

//// SUM OF AMOUNT

calc_total();
function calc_total(){
	var sum = 0;
	$(".total").each(function(){
	sum += parseFloat($(this).text());
	});
	$('#sum').text(sum);
}

function goBack() {
				window.history.back();
			}
</script>
