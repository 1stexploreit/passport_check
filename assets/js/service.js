$(document).ready(function(){
	
	function getname(val) {

		$.ajax({
                url: 'ajax_get_service.php',
                type: 'POST',
                data: 'id='+val,
                dataType: 'json',
                success:function(data){
                    var len = data.length;
                    if(len > 0){
						var id = data[0]['id'];
						var service = data[0]['service'];
						var qty = 1;
						var price = data[0]['price'];
						var sub_total = 0;
						var commission = data[0]['commission'];
         
										
						
	var markup = "<tr><td style='text-align:center;'><input type='checkbox' name='record'></td><td style='display:none;'><input type='hidden' readonly  value='" + id + "' name='item[]' class='table_input'></td><td><input  type='text'   value='" + service + "' name='service[]' class='table_input'></td><td><input type='number' value='" + qty + "' name='qty[]' class='table_input_number qty'></td><td><input type='number' value='" + price + "' name='price[]' class='table_input_number price'></td><td><input type='number' value='" + sub_total + "' name='sub_total[]' class='table_input_number sub_total'></td><td style='display:none;'><input type='text' value='" + commission + "' name='commission[]' class='table_input_number commission'></td></tr>";
	$("table tbody").append(markup);
		
	$('.searchcode').val('');
	$(".searchcode").focus();
	add_calcualte ()
								
	var obj = document.createElement("audio");
	obj.src = "../assets/sound/03.wav";
	obj.volume = 0.3;
	obj.autoPlay = false;
	obj.preLoad = true;
	obj.controls = true;
	obj.play();
	} 

	else {
	alert('No data found');
	$('.searchcode').val('');
	$(".searchcode").focus();
					}
                },
				
            });

        }
	
	
	$('#searchcode').on( 'change', function() {
		
		var $thisVal = $(this).val();
			
			getname( $thisVal );
		
	} )
	
	
	
	$(document).ready(function() {
		$("#searchcode").autocomplete({
		
			select: function(event, ui){
				
				if (ui.item && ui.item.value){
				   getname( ui.item.value );
					
				} 
				
			}
		});
	});
	
	
	

		
	// Find and remove selected table rows
        $(".delete-row").click(function(){
            $("table tbody").find('input[name="record"]').each(function(){
                if($(this).is(":checked")){
                    $(this).parents("tr").remove();
					
			// Play Sound		
			var obj = document.createElement("audio");
			obj.src = "../assets/sound/trash.wav";
			obj.volume = 0.3;
			obj.autoPlay = false;
			obj.preLoad = true;
			obj.controls = true;
			obj.play();
			add_calcualte ()
			add_calcualte ()
                }
            });
        });
});    
 
 
 	// SUM OF AMOUNT
	
			function add_calcualte () {
			
				var grandTotal = 0;

				$("input[name='qty[]']").each(function(index) {
				
					var qty = $("input[name='qty[]']").eq(index).val();
					var price = $("input[name='price[]']").eq(index).val();
					var subtotal = parseFloat(qty * price).toFixed(2);
					
					
					if (!isNaN(subtotal)) {
			 
						$("input[name='sub_total[]']").eq(index).val(subtotal);	
						grandTotal = parseFloat(parseFloat(grandTotal) + parseFloat(subtotal)).toFixed(2);
						$('#total').val(grandTotal);

						var total = +$("#total").val();
						var discount = +$(".discount").val();
						var adjust = +$(".adjust").val();
						var service = +$(".service").val();
						var paid = +$(".paid").val();
						$("#payable").val(total -adjust- total/100*discount+(total/100*service));
						$("#due").val(total +(total/100*service)- adjust- total/100*discount-paid);
						
					}
				})
		}
 
 
	
	// Change Caculate Value
		
		$(".calculate").on('keyup change', function() {
		
			add_calcualte()
			
		})
		
		
		
	// Get Search Result
		$( function() {
	  
			$( "#searchcode" ).autocomplete({
				source: function( request, response ) {
					
					$.ajax({
						url: "fetchService.php",
						type: 'post',
						dataType: "json",
						data: {
							search: request.term
						},
						success: function( data ) {
							response( data );
						}
					});
				},
				
	 
			});
	 
		
				
				
		});
		
		
		
 	// GET PATIENT INFORMATION 

	$(function() {
	
		$('#getpatientinfo').change(function(){

			var fullname = $('#getpatientinfo').find(':selected').data('fullname');
			$('#fullname').val(fullname);			
			var sex = $('#getpatientinfo').find(':selected').data('sex');
			$('#sex').val(sex);			
			var age = $('#getpatientinfo').find(':selected').data('age');
			$('#age').val(age);
			var mobile = $('#getpatientinfo').find(':selected').data('mobile');
			$('#mobile').val(mobile);
			var address = $('#getpatientinfo').find(':selected').data('address');
			$('#address').val(address);
			
			var patient_id = $('#getpatientinfo').find(':selected').data('patient_id');
			$('#patient_id').val(patient_id);
			
		});

	
		$('#getadmissioninfo').change(function(){

			var fullname = $('#getadmissioninfo').find(':selected').data('fullname');
			$('#fullname').val(fullname);			
			var sex = $('#getadmissioninfo').find(':selected').data('sex');
			$('#sex').val(sex);			
			var age = $('#getadmissioninfo').find(':selected').data('age');
			$('#age').val(age);
			var mobile = $('#getadmissioninfo').find(':selected').data('mobile');
			$('#mobile').val(mobile);
			var address = $('#getadmissioninfo').find(':selected').data('address');
			$('#address').val(address);			
			
			var patient_id = $('#getadmissioninfo').find(':selected').data('patient_id');
			$('#patient_id').val(patient_id);
			
		});


	});
	
 
	
	// Disable Enter Button 
		$(window).ready(function() {
			$("#form-id").on("keypress", function (event) {
				var keyPressed = event.keyCode || event.which;
				if (keyPressed === 13) {
					$("#total").focus();
					$("#searchcode").focus();
					event.preventDefault();
					return false;
				}
			});
		});
 
 
 	// Shourtcut

		shortcut.add("ctrl+s", function() {
		  document.getElementById("save").click();
		}); 
		
	// Indoor Patient Extra
		$('#patient_type').change(function(){
			if($('#patient_type').val() == '1'){
				$('.service').val('0');
				$('.pay').hide();
				$('.payh').show();
			}
			
			else {
			
				$('.service').val('0');
				$('.pay').show();
				$('.payh').hide();
				
			}
		});
			
			
	 