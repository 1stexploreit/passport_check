<?php 
	include ('session.php'); 
	include ('header.php'); 
?>
<div class="mt-3 page-title"> Reports  </div>
<div class="card mb-4">
   <div class="card-body">
          <div class="row">  
            <div class="col-sm-7">
              <div class="form-group">
                <select id="reportelector" class="form-control" requaid>
                  <option value="">Select Report</option>
					<optgroup label="Profile Reports">
						<option value="1001">Employee List</option>
						<option style="display:<?php if($version==0) {echo "none";}?>" value="1002">Student List</option>
					</optgroup>
					<optgroup label="Attendance Reports">
						<option value="2001"> Employee Attendance</option>
						<option value="2005"> Employee Attendance Summary</option>
						<option value="2002"> Individual Employee Attendance </option>
						<option  style="display:<?php if($version==0) {echo "none";}?>" value="2003"> Student Attendance </option>
						<option  style="display:<?php if($version==0) {echo "none";}?>" value="2006"> Employee Attendance Summary</option>
						<option  style="display:<?php if($version==0) {echo "none";}?>" value="2004"> Individual Student Attendance </option>
				    </optgroup>
                </select>
              </div>
            </div>
          </div>
	    
		<div id="1001" class="report" style="display:none">
        <form method="get" action="preview_all_employee.php">
        <div class="row">
          
		  <div class="col-sm-2">
            <div class="form-group">
              <label class="control-label"> Profile Type</label>
              <select name="type" required class="form-control"  >
					<option>------</option>
					<option value="Employee">Employee</option>
					<option value="Student">Student</option>
				</select>
            </div>
          </div>
		  
		  <div class="col-sm-2">
            <div class="form-group">
              <label class="control-label"> Class</label>
              <select name="class_id" class="form-control" >
						<option value="">------</option>
							<?php
							   $sql = "SELECT * FROM tbl_class";
							   $result = $conn->query($sql);	
							   if ($result->num_rows > 0) {		
							   while($row = $result->fetch_assoc()) {
							?>
						<option value="<?php echo $row["class"]; ?>"><?php echo $row["class"]; ?></option>
							<?php
							   }
							   }
							?>
					</select>
            </div>
          </div>
		  <div class="col-sm-2">
            <div class="form-group">
              <label class="control-label"> Section</label>
              <select name="section" class="form-control" >
						<option value="">------</option>
							<?php
							   $sql = "SELECT * FROM tbl_section";
							   $result = $conn->query($sql);	
							   if ($result->num_rows > 0) {		
							   while($row = $result->fetch_assoc()) {
							?>
						<option value="<?php echo $row["section"]; ?>"><?php echo $row["section"]; ?></option>
							<?php
							   }
							   }
							?>
					</select>
            </div>
          </div>
          
        </div>
        <hr>
        <button type="submit"  class="btn btn-primary" ><i class="fa fa-print"></i> Print</button>
		 </form>
        </div>
		
		
		<div id="2001" class="report" style="display:none">
			<form method="get" action="preview_date_attendance.php">
				<div class="row">
				  <div class="col-sm-3">
					<div class="form-group">
					  <label class="control-label"> Date </label>
					  <input type="date" name="d1" required class="form-control" />
					</div>
				  </div>
				  
			   <div class="form-group col-md-2">
				<label for="type">Source </label>
				<select id="source" name="source" required class="form-control">
					<option value="">------</option>
					<option value="device">Device</option>
					<option value="others">Others</option>
				</select>
				</div>
			</div>
			<hr>
				<button type="submit"  class="btn btn-primary" ><i class="fa fa-print"></i> Print</button>
			 </form>
        </div>		
		
		<div id="2005" class="report" style="display:none">
			<form method="get" action="preview_date_attendance_summary.php">
				<div class="row">
				  <div class="col-sm-2">
					<div class="form-group">
					  <label class="control-label"> From Date </label>
					  <input type="date" name="d1" required class="form-control" />
					</div>
				  </div>
				  <div class="col-sm-2">
					<div class="form-group">
					  <label class="control-label"> To Date </label>
					  <input type="date" name="d2" required class="form-control" />
					</div>
				  </div>
				<div class="form-group col-md-2">
				<label for="type">Source </label>
				<select id="source" name="source" required class="form-control">
					<option value="">------</option>
					<option value="device">Device</option>
					<option value="others">Others</option>
				</select>
				</div>
				</div>
			<hr>
				<button type="submit"  class="btn btn-primary" ><i class="fa fa-print"></i> Print</button>
			 </form>
        </div>
		 
		<div id="2002" class="report" style="display:none">
        <form method="get" action="preview_date_attendance_individual.php">
        <div class="row">
          <div class="col-sm-2">
            <div class="form-group">
              <label class="control-label"> From</label>
              <input type="date" name="d1" required class="form-control" />
            </div>
          </div>
          <div class="col-sm-2">
            <div class="form-group">
              <label class="control-label"> To</label>
              <input type="date" name="d2" required class="form-control" />
            </div>
          </div>
		  
			<div class="form-group col-md-2">
				<label for="type">Source </label>
				<select id="source" name="source" required class="form-control">
					<option value="">------</option>
					<option value="device">Device</option>
					<option value="others">Others</option>
				</select>
				</div>
				
		  <div class="form-group col-md-3">
               <label for="inputexpire4">Profile Id#</label>
               <select name="employee_id" class="form-control js-select2"  >
                <option >---</option>
				<?php

				$sql = "SELECT * FROM tbl_profile where type='Employee'";
				$result = $conn->query($sql);	

				if ($result->num_rows > 0) {		
				while($row = $result->fetch_assoc()) {
				?>
				<option value="<?php echo $row["profile_id"]; ?>"><?php echo $row["profile_id"]; ?>/<?php echo $row["fullname"]; ?></option>
				<?php
				}
				}
				?>
              </select>
            </div>
        </div>
        <hr>
        <button type="submit"  class="btn btn-primary" ><i class="fa fa-print"></i> Print</button>
		 </form>
        </div>     
			
		<div id="2003" class="report" style="display:none">
            <form method="get" action="preview_attendance_student.php">
               <div class="row">
                  <div class="col-sm-2">
            <div class="form-group">
              <label class="control-label"> Date</label>
              <input type="date" name="d1" required class="form-control" />
            </div>
          </div>
          
                  <div class="form-group col-md-2">
                     <label for="inputEmail4">Class </label>
                     <select id="class_id" name="class_id" class="form-control">
				<option value="">------</option>
				<?php
				$sql = "SELECT * FROM tbl_class";
				$result = $conn->query($sql);
				if ($result->num_rows > 0) {
					while ($row = $result->fetch_assoc()) {
						?>
						<option value="<?php echo $row["class"]; ?>"><?php echo $row["class"]; ?></option>
						<?php
					}
				}
				?>
			</select>
                  </div>
				  <div class="form-group col-md-2">
                     <label for="inputEmail4">Section </label>
                     <select   class="form-control" name="section" required>
                        <option value="">----</option>
                        <?php
                           $sql = "SELECT * FROM tbl_section  ";
                           $result = $conn->query($sql);	
                           
                           
                           if ($result->num_rows > 0) {		
                           while($row = $result->fetch_assoc()) {
                           ?>
                        <option value="<?php echo $row["section"]; ?>" ><?php echo $row["section"]; ?></option>
                        <?php
                           }
                           }
                           ?>
                     </select>
                  </div>
				  
				<div class="form-group col-md-2">
				<label for="type">Source </label>
				<select id="source" name="source" required class="form-control">
					<option value="">------</option>
					<option value="device">Device</option>
					<option value="others">Others</option>
				</select>
				</div>
				
				
               </div>
               <hr>
               <button type="submit"  class="btn btn-primary" ><i class="fa fa-print"></i> Print</button>
            </form>
         </div>	
		 
		<div id="2006" class="report" style="display:none">
            <form method="get" action="preview_date_attendance_summary_student.php">
               <div class="row">
                  <div class="col-sm-2">
            <div class="form-group">
              <label class="control-label"> From Date</label>
              <input type="date" name="d1" required class="form-control" />
            </div>
          </div>
		  
		  <div class="col-sm-2">
            <div class="form-group">
              <label class="control-label"> To Date</label>
              <input type="date" name="d2" required class="form-control" />
            </div>
          </div>
		  
		  		<div class="form-group col-md-2">
				<label for="type">Source </label>
				<select id="source" name="source" required class="form-control">
					<option value="">------</option>
					<option value="device">Device</option>
					<option value="others">Others</option>
				</select>
				</div>
				
				
          </div>
              <div class="row">
                  <div class="form-group col-md-2">
                     <label for="inputEmail4">Class </label>
                     <select id="class_id" name="class_id" class="form-control">
				<option value="">------</option>
				<?php
				$sql = "SELECT * FROM tbl_class";
				$result = $conn->query($sql);
				if ($result->num_rows > 0) {
					while ($row = $result->fetch_assoc()) {
						?>
						<option value="<?php echo $row["class"]; ?>"><?php echo $row["class"]; ?></option>
						<?php
					}
				}
				?>
			</select>
                  </div>
				  <div class="form-group col-md-2">
                     <label for="inputEmail4">Section </label>
                     <select   class="form-control" name="section" required>
                        <option value="">----</option>
                        <?php
                           $sql = "SELECT * FROM tbl_section  ";
                           $result = $conn->query($sql);	
                           
                           
                           if ($result->num_rows > 0) {		
                           while($row = $result->fetch_assoc()) {
                           ?>
                        <option value="<?php echo $row["section"]; ?>" ><?php echo $row["section"]; ?></option>
                        <?php
                           }
                           }
                           ?>
                     </select>
                  </div>
				  
	
				
               </div>
               <hr>
               <button type="submit"  class="btn btn-primary" ><i class="fa fa-print"></i> Print</button>
            </form>
         </div>	
		  
		 <div id="2004" class="report" style="display:none">
            <form method="get" action="preview_attendance_student_indv.php">
               <div class="row">
                <div class="col-sm-2">
					<div class="form-group">
					  <label class="control-label"> From Date</label>
					  <input type="date" name="d1" required class="form-control" />
					</div>
				</div>           
				<div class="col-sm-2">
					<div class="form-group">
					  <label class="control-label"> To Date</label>
					  <input type="date" name="d2" required class="form-control" />
					</div>
				</div>
           
		   
		    <div class="form-group col-md-3">
               <label for="inputexpire4">Profile Id#</label>
               <select name="employee_id" class="form-control js-select2"  >
                <option >---</option>
				<?php

				$sql = "SELECT * FROM tbl_profile where type='Student'";
				$result = $conn->query($sql);	

				if ($result->num_rows > 0) {		
				while($row = $result->fetch_assoc()) {
				?>
				<option value="<?php echo $row["profile_id"]; ?>"><?php echo $row["profile_id"]; ?>/<?php echo $row["fullname"]; ?></option>
				<?php
				}
				}
				?>
              </select>
            </div>
			
			
				
			<div class="form-group col-md-2">
				<label for="type">Source </label>
				<select id="source" name="source" required class="form-control">
					<option value="">------</option>
					<option value="device">Device</option>
					<option value="others">Others</option>
				</select>
				</div>
				
               </div>
               <hr>
               <button type="submit"  class="btn btn-primary" ><i class="fa fa-print"></i> Print</button>
            </form>
         </div>
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script>
    $(function() {
        $('#reportelector').change(function(){
            $('.report').hide();
            $('#' + $(this).val()).show();
        });
    });
</script>
<?php include('footer.php'); ?>