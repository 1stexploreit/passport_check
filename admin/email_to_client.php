<?php include 'session.php';
if (isset($_POST['submit'])) {
	
	$to =$_POST['email'];
	$subject = $_POST['subject'];
	$txt = $_POST['msg'];
	$headers = "From:  ";
	mail($to, $subject, $txt, $headers);
}

 

include('header.php');
?>
<script src="form.js"></script>
<!-- Page Content -->
<div class="container">
	<div class="row">
		<!-- Sidebar Widgets Column -->

		<!-- Post Content Column -->
		<div class="col-lg-12">
			<!-- Title -->
			<h3 class="mt-4"> <i class="fa fa-envelope" aria-hidden="true"></i> Compose Email</h3>
			<!-- Comments Form -->
			<div class="card my-4">
				<div class="card-body">
				 
					 
							<form enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

								<div class="row">

									<div class="col-sm-4 form-group">
										<label for="email"> Email Address:</label>
										<input type="email" class="form-control"   id="email" name="email" required>
									</div>
									<div class="col-sm-6 form-group">
										<label for="email"> Subject:</label>
										<input type="email" class="form-control"  id="subject" name="subject" required>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-12 form-group">
										<label for="message"> Message:</label>
										<textarea class="form-control" type="textarea" name="msg" id="message" maxlength="6000" rows="5"></textarea>
									</div>
								</div>
							 
								</div>
							 
								<div class="card-footer">
								 
										<input type="submit" name="submit" id="submit" value="Send" class="btn btn-primary">
							 
								</div>

							</form>
						</div>
					</div>
				</div>
				<?php include 'footer.php'; ?>