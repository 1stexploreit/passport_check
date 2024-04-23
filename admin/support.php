<?php include('session.php'); 
 include('header.php'); ?>
<div class="mt-3 page-title"> ড্যাশবোর্ড <i class="fas fa-angle-right"></i> অভিযোগ </div>
         <div class="card mb-4">
   <div class="card-body">
                <div class="table-responsive-xl">
                    <table class="mb-0 table table-hover" id="dataTable">
                        <thead>
                            <tr>
                                <th  nowrap class="align-middle bt-0"> ছবি </th>
                                <th class="align-middle bt-0">অভিযোগ</th>
                                <th nowrap width="10"  class="align-middle bt-0 text-right"> </th>
                            </tr>
                        </thead>
                        <tbody>
							<?php 
									$sql = "SELECT
											   tbl_support.*,
											   tbl_client.client_name,
											   tbl_client.photo AS client_photo,
											   tbl_staff.name AS name,
											   tbl_staff.photo 
											FROM
											   (
												  tbl_support 
												  LEFT JOIN
													 tbl_staff 
													 ON tbl_support.staff = tbl_staff.id
											   )
											   INNER JOIN
												  tbl_client 
												  ON tbl_support.client_id = tbl_client.id 
												  Where tbl_support.userid='$get_userid'
											order by
											   tbl_support.id desc ;";
									$result = $conn->query($sql);	
									if ($result->num_rows > 0) {		
									while($support = $result->fetch_assoc()) {
									?>
                            <tr>
                                    <td nowrap class="align-middle">
									<a href="#">
                                    <div class="avatar-image avatar-image--loaded">
                                        <div class="avatar avatar--md avatar-image__image">
                                            <div class="avatar__content"><img src="../uploads/<?php echo $support["client_photo"];?>"></div>
                                        </div>
                                    </div>
									</a>
                                </td>
                                <td class="align-middle">
                                    <div><a href="view_profile.php?id=<?php echo $support["client_id"]; ?>"><?php echo $support["client_name"];?></a></div><?php echo $support["comment"];?>
									</a> </td>
                                <td nowrap class="align-middle text-right">
								   <a href="support_reply.php?id=<?php echo $support["id"]; ?>&client_id=<?php echo $support["client_id"]; ?>"> <i class="fa fa-reply text-success"></i>  </a>
								     <a  data-appd="<?php echo $support['id'] ?>" class="delete" href="#"><i class="fa fa-trash text-danger "> </i>  </a>
                                </td>
                            </tr>
                              <?php
					}
				}
			?>
                        </tbody>
                    </table>
                </div>
            </div>
			

<?php include('footer.php'); ?>


<script>
   $(document).on('click','.delete',function(){
   var element = $(this);
   var del_id = element.attr("data-appd");
   var info = 'delsupport=' + del_id;
   if(confirm("Are you sure you want to delete this?"))
   {
    $.ajax({
      type: "POST",
      url: "ajaxdelete.php",
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


