<?php 
   include('session.php'); 
   
   if (isset($_POST['submit'])) {
   
   	if($_POST['profile_type']=='Employee') {$profile_id=$_POST['empl_id'];} else {$profile_id=$_POST['doct_id'];};
   	
	$profile_type=$_POST['profile_type'];
   	$mobile		=$_POST['mobile'];
   	$email		=$_POST['email'];
   	$role		=$_POST['role'];
   	$passwordd 	= $_POST['password'];
   	$password 	= password_hash($passwordd, PASSWORD_DEFAULT);
   	
   	$sql = $conn->prepare("INSERT INTO tbl_admin (profile_id,profile_type,mobile,email,password,role) VALUES (?,?,?,?,?,?)");  
   	$sql->bind_param("ssssss",  $profile_id,$profile_type, $mobile, $email,$password,$role); 
   	
   	if($sql->execute()) {
   		echo ("<script LANGUAGE='JavaScript'>
   		window.alert('Succesfully Saved');
   		window.location.href='list_user.php';
   		</script>");
   	}  
   } 
   ///Header
    include('header.php'); 
   ?>
<div class="mt-4 mb-2 page-title">
   <div class="row">
      <div class="col-md-9 my-auto">
         User <i class="fas fa-angle-right"></i> Add User
      </div>
      <div class="col-md-3 text-right">
         <a href="list_user.php" class="btn btn-outline-primary"> <i class="fas fa-folder-open"></i>  User List</a>
      </div>
   </div>
</div>
<form method="post" action="" enctype="multipart/form-data" >
   <div class="card mb-2">
      <div class="card-body">
         <div class="form-row">
            <div class="form-group col-md-3">
               <label for="inputAddress2">Profile Type</label>
               <select  class="form-control" name="profile_type" id="selectBox" >
                  <option value="">----</option>
                  <option value="Employee">Employee</option>
                  <option value="Doctor">Doctor</option>
               </select>
            </div>
            <div class="form-group col-md-3" id="div1" style="display:none">
               <label for="inputEmail4">Employee Id </label>
               <select class="js-select2"  name="empl_id"  >
                  <option value="0"> Select   </option>
                  <option >---</option>
                  <?php
                     $sql = "SELECT * FROM tbl_hr";
                     $result = $conn->query($sql);	
                     
                     if ($result->num_rows > 0) {		
                     while($row = $result->fetch_assoc()) {
                     ?>
                  <option value="<?php echo $row["id"]; ?>"><?php echo $row["empl_id"]; ?> / <?php echo $row["fullname"]; ?></option>
                  <?php
                     }
                     }
                     ?>
               </select>
            </div>
            <div class="form-group col-md-3" id="div2" style="display:none">
               <label for="inputEmail4">Doctor Id </label>
               <select class="js-select2"  name="doct_id" >
                  <option value="0"> Select   </option>
                  <option >---</option>
                  <?php
                     $sql = "SELECT * FROM tbl_doctor";
                     $result = $conn->query($sql);	
                     
                     if ($result->num_rows > 0) {		
                     while($row = $result->fetch_assoc()) {
                     ?>
                  <option value="<?php echo $row["id"]; ?>"><?php echo $row["nid"]; ?> / <?php echo $row["name"]; ?></option>
                  <?php
                     }
                     }
                     ?>
               </select>
            </div>
            <div class="form-group col-md-3">
               <label for="inputCity">Mobile</label>
               <input type="number" class="form-control"  name="mobile">
            </div>
         </div>
      </div>
   </div>
   <div class="card mb-3">
      <div class="card-body pb-0 pt-2">
         <div class="form-row">
            <div class="form-group col-md-3">
               <label for="inputCity">Email</label>
               <input type="email" class="form-control" name="email" >
            </div>
            <div class="form-group col-md-3">
               <label for="inputAddress2">Password</label>
               <input type="password" class="form-control" name="password" >
            </div>
            <div class="form-group col-md-3">
               <label for="inputAddress2">Role</label>
               <select id="inputState" class="form-control" name="role" >
                  <option>----</option>
                  <option value="">----</option>
                  <option value="1">Manager</option>
                  <option value="2">Accountant</option>
                  <option value="3">Receptionist</option>
                  <option value="4">Lab Technician</option>
                  <option value="5">Doctor</option>
                  <option value="6">Pharmacist</option>
               </select>
            </div>
         </div>
      </div>
      <div class="card-footer">
         <input type="submit" name="submit" value="Submit" id="register" class="btn btn-primary ">
         <button type="reset" class="btn btn-secondary">Reset</button>
</form>
</div>
</div>
<?php include('footer.php'); ?>
<script>
   document.getElementById("selectBox").addEventListener("change", function(){
     if (this.value === "Employee") {
       document.getElementById("div1").style.display = "block";
       document.getElementById("div2").style.display = "none";
     } else if (this.value === "Doctor") {
       document.getElementById("div2").style.display = "block";
       document.getElementById("div1").style.display = "none";
     } else {
       document.getElementById("div1").style.display = "none";
       document.getElementById("div2").style.display = "none";
     }
   });
   
   
    $(function () {
      $('[data-toggle="tooltip"]').tooltip()
    })
     $(document).ready(function(){  
       $('#email').blur(function(){
         var email = $(this).val();
         $.ajax({
          url:'check.php',
          method:"POST",
          data:{email:email},
          success:function(data)
          {
           if(data != '0')
           {
            $('#availability').html('<span class="text-danger">   আপনার প্রদত্ত ইউজার আইডি ইতোমধ্যে ব্যবহার করা হয়েছে। </span>');
            $('#register').attr("disabled", true);
           }
           else
           {
            $('#availability').html('<span class="text-success"></span>');
            $('#register').attr("disabled", false);
           }
          }
         })
      });
     });  
</script>