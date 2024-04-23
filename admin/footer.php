<!-- User Role Value --->
	<input type="hidden" id="role" value="<?php echo $role; ?>">
	<input type="hidden" id="patient_val" value="<?php echo $acc_patient; ?>">
	<input type="hidden" id="idp_val" value="<?php echo $acc_idp; ?>">
	<input type="hidden" id="service_val" value="<?php echo $acc_service; ?>">
<!-- User Role Value End --->
</main>
	</div>
		</div>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
	<script src="../assets/js/scripts.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
	<script src="../assets/plugin/chart/chart-bar-demo.js"></script>
	<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
	<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
	<script src="../assets/plugin/chart/datatables-demo.js"></script>
	<script src='https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.full.js'></script>
	<script src="../assets/plugin/select2/dist/script.js"></script>
	<script src='https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/4.0.6/sweetalert2.min.js'></script>
	<script  src="../assets/plugin/htmlsweetalert/dist/script.js"></script>
	<script src="../assets/js/shortcut.js"></script>
	<script src="../assets/js/user_role.js"></script>
	
    </body>
  <!-- Edtor -->
 <script type="text/javascript">
     $(document).ready(function() {
         $('#code_preview0').summernote({
             height: 300
         });
     });
	 
			// Call the dataTables jQuery plugin
	$(document).ready(function() {
	  $('#dataTable').DataTable();
	  $('#dataTablef').DataTable();
	});
 </script>

 <!-- partial -->
 <script src='https://cdnjs.cloudflare.com/ajax/libs/summernote/0.6.6/summernote.min.js'></script>
<script src="../assets/plugin/editor/script.js"></script>



	  <script>
	  
	///Submit back disable 
	
		if ( window.history.replaceState ) {
		  window.history.replaceState( null, null, window.location.href );
		}
		
	
 


   
	///File Upload Validation 
 
		var _validFilejpeg = [".jpeg", ".jpg", ".png", ".pdf"];

		function validateForSize(oInput, minSize, maxSizejpeg) {
			//if there is a need of specifying any other type, just add that particular type in var  _validFilejpeg
			if (oInput.type == "file") {
				var sFileName = oInput.value;
				if (sFileName.length > 0) {
					var blnValid = false;
					for (var j = 0; j < _validFilejpeg.length; j++) {
						var sCurExtension = _validFilejpeg[j];
						if (sFileName.substr(sFileName.length - sCurExtension.length, sCurExtension.length)
							.toLowerCase() == sCurExtension.toLowerCase()) {
							blnValid = true;
							break;
						}
					}

					if (!blnValid) {
						alert("Sorry, this file is invalid, allowed extension is: " + _validFilejpeg.join(", "));
						oInput.value = "";
						return false;
					}
				}
			}

			fileSizeValidatejpeg(oInput, minSize, maxSizejpeg);
		}

		function fileSizeValidatejpeg(fdata, minSize, maxSizejpeg) {
			if (fdata.files && fdata.files[0]) {
				var fsize = fdata.files[0].size /1024; //The files property of an input element returns a FileList. fdata is an input element,fdata.files[0] returns a File object at the index 0.
				//alert(fsize)
				if (fsize > maxSizejpeg || fsize < minSize) {
					alert('This file size is: ' + fsize.toFixed(2) +
						"KB. Files should be in " + (minSize) + " to " + (maxSizejpeg) + " KB ");
					fdata.value = ""; //so that the file name is not displayed on the side of the choose file button
					return false;
				} else {
					console.log("");
				}
			}
		}
	
	/// Tooltip Active
	
		$(function () {
			$('[data-toggle="tooltip"]').tooltip()
		})
 
</script>