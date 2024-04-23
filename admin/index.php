<?php include('session.php');

 include('header.php'); ?>
 
   <div class="d-none">
 
	<div class="mt-5 mb-4">
	   <div class="row">
		  <div class="col-md-9 m-auto">
			<h1>Welcome to easy attendance </h1>
		  </div>
		  <div class="col-md-2 text-right">
			  <a href="list_attendance.php" class="btn btn-light btn-sm "> <i class="fas fa-history"></i> Records  </a>
			  </div>
			 	  <div class="col-md-1 text-right">
			  <a href="add_attendance_device.php" class="btn btn-dark btn-sm btn-block"> <i class="fas fa-sync"></i> Sync  </a>
		  </div>
	   </div>
	</div>
  
	  
	  
	  <div class="row">
      <div class="col-xl-7">
      <div class="card border shadow-xs">
         <div class="card-header">
            <i class="fas fa-chart-pie mr-1"></i>
          Attendance Graph
         </div>
         <div class="card-body">
            <canvas id="myPieChart" width="100%" height="38"></canvas>
         </div>
      </div>
   </div>
   <div class="col-xl-5">
 <div class="row">
        <div class="col-xl-6 col-sm-6 mb-xl-0">
          <div class="card border shadow-xs mb-4">
            <div class="card-body text-start p-3 w-100">
              <div class="icon icon-shape icon-sm bg-dark text-white text-center border-radius-sm d-flex align-items-center justify-content-center mb-3">
                <i class="fas fa-users "></i> 
              </div>
              <div class="row">
                <div class="col-12">
                  <div class="w-100">
                    <p class="text-sm text-secondary mb-1">Total Profile</p>
                    <h4 class="mb-2 font-weight-bold"><?php echo $profile["v_alue"]?></h4>
                    <div class="d-flex align-items-center">
                      <span class="text-sm text-success font-weight-bolder">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-6 col-sm-6 mb-xl-0">
          <div class="card border shadow-xs mb-4">
            <div class="card-body text-start p-3 w-100">
              <div class="icon icon-shape icon-sm bg-dark text-white text-center border-radius-sm d-flex align-items-center justify-content-center mb-3">
                 <i class="fas fa-check-circle"></i> 
              </div>
              <div class="row">
                <div class="col-12">
                  <div class="w-100">
                    <p class="text-sm text-secondary mb-1">Present Today</p>
                    <h4 class="mb-2 font-weight-bold"><?php echo $present["v_alue"]?></h4>
                    <div class="d-flex align-items-center">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-6 col-sm-6 mb-xl-0">
          <div class="card border shadow-xs mb-4">
            <div class="card-body text-start p-3 w-100">
              <div class="icon icon-shape icon-sm bg-dark text-white text-center border-radius-sm d-flex align-items-center justify-content-center mb-3">
                 <i class="fa fa-ban"></i> 
              </div>
              <div class="row">
                <div class="col-12">
                  <div class="w-100">
                    <p class="text-sm text-secondary mb-1">Absent Today</p>
                    <h4 class="mb-2 font-weight-bold"><?php echo $absent["v_alue"]?></h4>
                    <div class="d-flex align-items-center">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-6 col-sm-6">
          <div class="card border shadow-xs mb-4">
            <div class="card-body text-start p-3 w-100">
              <div class="icon icon-shape icon-sm bg-dark text-white text-center border-radius-sm d-flex align-items-center justify-content-center mb-3">
                <i class="fa fa-minus-circle"></i> 
              </div>
              <div class="row">
                <div class="col-12">
                  <div class="w-100">
                    <p class="text-sm text-secondary mb-1">Leave Today</p>
                    <h4 class="mb-2 font-weight-bold"><?php echo $leave["v_alue"]?></h4>
                    <div class="d-flex align-items-center">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
	  
   </div> 
</div>
</div>
 

<?php include('footer.php'); 

   $sql = "SELECT tbl_attendance.d_ate , count(tbl_attendance.id) as tvalue  
			FROM tbl_attendance
			WHERE tbl_attendance.status='Present'
			GROUP by tbl_attendance.d_ate 
			order by d_ate desc 
			LIMIT 6 ";
   $result = $conn->query($sql);
   
 
   $sql2 = "SELECT  tbl_attendance.d_ate , count(tbl_attendance.id) as tvalue  
			FROM tbl_attendance
			WHERE tbl_attendance.status='Present'
			GROUP by tbl_attendance.d_ate 
			ORDER by d_ate desc 
			LIMIT 6 ";
   $result2 = $conn->query($sql2);
 
   ?>
   
   
    

   
	<script>
		   // Set new default font family and font color to mimic Bootstrap's default styling
		   Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
		   Chart.defaults.global.defaultFontColor = '#292b2c';
		   // Pie Chart Example
		   var ctx = document.getElementById("myPieChart");
		   var myPieChart = new Chart(ctx, {
			   
			   
			  type: 'bar',
			  data: {
				 labels: [
					<?php
			  if ($result->num_rows > 0) {
				 while ($row = $result->fetch_assoc()) {
			  ?> "<?php $source = $row['d_ate']; $date = new DateTime($source); echo $date->format('d.m.Y'); ?>",
					<?php
			  }
			  }
			  ?>
				 ],
				 
				 
		datasets: [{
				label: "Present",
				lineTension: 0.3,
				backgroundColor: "rgba(2,117,216,0.2)",
				borderColor: "rgba(2,117,216,1)",
				pointRadius: 5,
				pointBackgroundColor: "rgba(2,117,216,1)",
				pointBorderColor: "rgba(255,255,255,0.8)",
				pointHoverRadius: 5,
				pointHoverBackgroundColor: "rgba(2,117,216,1)",
				pointHitRadius: 50,
				pointBorderWidth: 2,
				
				
				
					data: [
					   <?php
			  if ($result2->num_rows > 0) {
				 while ($rows = $result2->fetch_assoc()) {
			  ?>
							 <?php echo $rows["tvalue"]; ?>,
					   <?php
			  }
			  }
			  ?>
					],
					backgroundColor: ['#ccc', '#8BC34A ', '#ccc', '#8BC34A ', '#ccc', '#8BC34A '],
				 }],
				 
				 
			  },
			 options: {
			 scales: {
				xAxes: [{
				   time: {
					  unit: 'date'
				   },
				   gridLines: {
					  display: true
				   },
				   ticks: {
					  maxTicksLimit: 7
				   }
				}],
				yAxes: [{
				   ticks: {
					  min: 0,
					  maxTicksLimit: 8
				   },
				   gridLines: {
					  color: "rgba(0, 0, 0, .125)",
				   }
				}],
			 },
			 legend: {
				display: false
			 }
		  }
	   });
	</script>

 