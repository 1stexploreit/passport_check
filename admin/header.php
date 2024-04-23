<!DOCTYPE php>
<php lang="en">
<head>
   <meta charset="utf-8" />
   <meta http-equiv="X-UA-Compatible" content="IE=edge" />
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
   <meta name="description" content="" />
   <meta name="author" content="" />
   <title> f1automotives 1.0</title>
   <link href="../assets/css/styles.css" rel="stylesheet" />
   <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
   <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
   <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
   <link rel='stylesheet' href='../assets/plugin/select2/dist/select2.min.css'>
   <link href="../assets/plugin/select2/dist/style.css" rel="stylesheet" />
   	<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/summernote/0.6.6/summernote.min.css'>
  	<link rel="stylesheet" href="../assets/plugin/editor/css/style.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
  <link href="../assets/css/theme.css?vr=2.3" rel="stylesheet" />
 
</head>
<body class="sb-nav-fixed">
   <nav class="sb-topnav navbar navbar-expand navbar-light bg-light">
      <a class="navbar-brand " href="index.php"> <img src="../uploads/<?php echo $siteid["logo"]; ?>" alt="" class="thumb-sm rounded-circle  animate__animated animate__pulse"> f1automotives <span style="color: #;"> </span>  </a>
      <button class="btn btn-link btn-sm order-1 order-lg-0 " id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
      <div class=" form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
      </div>
      <!-- Navbar Search-->
	  
      <!-- Navbar-->
      <ul class="navbar-nav ">
	  
	  <li class="nav-item dropdown nav-item d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-1 my-2 my-md-0 ">
			<a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> ‍<div class=" d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-q my-2 my-md-0"> </div> <i class="fas fa-info-circle"></i>  <div class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0"> Info </div> </a>
			<div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
				<a class="nav-link" href="#"> Changed Logo </a>
			</div>
			</li>

         <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               ‍
               <div class=" d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0"> </div>
               <i class="fas fa-cogs"></i> 
               <div class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0"> Settings </div>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
				<a class="nav-link" href="sys_informtaion.php"> Site Info</a>
               <a class="nav-link" href="option.php"> Option</a>
            </div>
         </li>
      </ul>
	  
      <ul class="navbar-nav ">
         <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               <img src="../uploads/<?php echo $_SESSION["photo"]; ?>" alt="" class="thumb-sm rounded-circle mr-2 animate__animated animate__pulse"> ‍
               <div class=" d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0"> Admin </div>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
			        <a class="dropdown-item" href="user_profile.php">  Profile</a>
               <a class="dropdown-item" href="user_reset-password.php">Change Password</a>
               <div class="dropdown-divider"></div>
               <a class="dropdown-item" href="logout.php">Logout</a>
            </div>
         </li>
      </ul>
   </nav>
   <div id="layoutSidenav">
   <div id="layoutSidenav_nav">
      <nav class="sb-sidenav accordion sb-sidenav-light " id="sidenavAccordion">
         <div class="sb-sidenav-menu">
            <div class="nav">
            
               <a class="nav-link dahboard-btn " style="padding:9px;" href="index.php">
                  <div class="sb-nav-link-icon "><i class="fas fa-tachometer-alt" style="color: #fff!important;"></i></div>
                  Dashboard
               </a>
			   
			   
               <a class="nav-link collapsed patient" href="#" data-toggle="collapse" data-target="#car" aria-expanded="false" aria-controls="collapseLayouts">
                  <div class="sb-nav-link-icon"><i class="fas fa-car"></i></div>
                 Car  List
                  <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
               </a>
               <div class="collapse" id="car" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                  <nav class="sb-sidenav-menu-nested nav">
                     <a class="nav-link" href="add_car.php"> Add Car </a>
                     <a class="nav-link" href="list_car.php"> All Cars   </a>
                  </nav>
               </div>


               <a class="nav-link collapsed patient" href="#" data-toggle="collapse" data-target="#Booking" aria-expanded="false" aria-controls="collapseLayouts">
                  <div class="sb-nav-link-icon"><i class="fas fa-th"></i></div>
                 Booking
                  <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
               </a>
               <div class="collapse" id="Booking" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                  <nav class="sb-sidenav-menu-nested nav">
                     <a class="nav-link" href="list_order_new.php"> New Booking </a>
                     <a class="nav-link" href="list_order_verified.php"> Verified Booking  </a>
                  </nav>
               </div>
			   
			   
					 <a class="nav-link d-none" href="reports.php" ><div class="sb-nav-link-icon"><i class="fas fa-print"></i></div>Reports</a>
			   
			   <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#setup" aria-expanded="true" aria-controls="collapseLayouts">
                  <div class="sb-nav-link-icon"><i class="fas fa-cogs"></i></div>
                  Setup 
                  <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
               <div class="collapse" id="setup" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                  <nav class="sb-sidenav-menu-nested nav">

                     <a class="nav-link" href="list_location.php"> Location </a>
                     <a class="nav-link" href="list_addons.php"> Addons </a>
 
				</nav>
				  
				  
				  
               </div>
		                   <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#page" aria-expanded="false" aria-controls="collapseLayouts">
                     <div class="sb-nav-link-icon"><i class="fas fa-globe"></i></div>
                     Font Page
                     <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                  </a>
                  <div class="collapse" id="page" aria-labelledby="headingOne" data-bs-parent="#expense">
                     <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="page_create.php"> Create Page</a>
                        <a class="nav-link" href="page_archive.php"> Page List</a>
                     </nav>
                  </div>
			 
	 
            </div>
         </div>
		 
 
      <div class="card border-radius-md" style=" background: #1e293b21; border-radius: 3px; color: #fff; font-size: .8rem!important; ">
        <div class="card-body  text-start  p-3 w-100">
          
          <div class="docs-info">
            <h6 class="font-weight-bold up mb-1">Need help?</h6>
            <a href="#" target="_blank" class="font-weight-bold text-sm mb-0 icon-move-right mt-auto w-100 mb-0">
              Documentation
            </a>
          </div>
        </div>
      </div>
   
	
	
         <div class="sb-sidenav-footer">
            <div class="small">V 1.0.1 Last Update: 01-03-24</div>
         </div>
      </nav>
   </div>
   <div id="layoutSidenav_content">
   <main>
   <div class="container-fluid">