<?php include('../config.php');

	$page_id = mysqli_real_escape_string($conn, $_GET['passport_no']); // Sanitize input
	$sql = mysqli_prepare($conn, "SELECT * FROM tbl_passport_check WHERE pp_no = ?");
	mysqli_stmt_bind_param($sql, "s", $page_id); // Assuming 'id' is an integer, adjust the type if necessary
	mysqli_stmt_execute($sql);
	$result = mysqli_stmt_get_result($sql);
	$row = mysqli_fetch_assoc($result);

	
include('header.php');?>

    <style>
	
	.navbar{
		
		box-shadow: 0px 0px 8px #ccc;
		
	}
    
 
table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #D6EEEE;
  border-bottom: 1px solid #ddd;
}


</style> 
 
    <div class="container-fluid py-5 mt-5">
        <div class="container">
		     <div class="pb-2">
                <h6 class="text-primary text-uppercase font-weight-bold">Visa Checking</h6>
                <h1 class="mb-5">Visa Information</h1>
            </div>
		
		<table width="100%" border="0">
  <tr>
    <td width="14%" nowrap="nowrap">Passport Number </td>
    <td width="3%">:</td>
    <td width="83%"><strong><?php echo $row['pp_no']; ?></strong></td>
  </tr>
  <tr>
    <td nowrap="nowrap">Name</td>
    <td>:</td>
    <td><strong><?php echo $row['pp_name']; ?></strong></td>
  </tr>
  <tr>
    <td nowrap="nowrap">Status</td>
    <td>:</td>
    <td><strong class="text-success"><?php echo $row['status']; ?></strong></td>
  </tr>
  <tr>
    <td nowrap="nowrap">Comment</td>
    <td>:</td>
    <td><strong><?php echo $row['comment']; ?></strong></td>
  </tr>
  <tr>
    <td nowrap="nowrap">Attechment</td>
    <td>:</td>
    <td> <a href="../uploads/<?php echo $row['attachment']; ?>" style="font-weight: bold">  <i class="fa fa-paperclip" aria-hidden="true"></i> Attechment </a></td>
  </tr>
</table>



      
        </div>
    </div>
 

 <?php include('footer.php');?>
