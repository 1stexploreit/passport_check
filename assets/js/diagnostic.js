$(document).ready(function(){
	
	function getname(val) {

		$.ajax({
                url: 'ajax_get_test.php',
                type: 'POST',
                data: 'id='+val,
                dataType: 'json',
                success:function(data){
                    var len = data.length;
                    if(len > 0){
                        var id = data[0]['id'];
                        var test_name = data[0]['test_name'];
                        var price = data[0]['price'];
                        var commission = data[0]['commission'];
         
										
						
	var markup = "<tr><td><input type='checkbox' name='record'></td><td style='display:none;'><input type='hidden' readonly  value='" + id + "' name='item[]' class='table_input'></td><td><input  type='text'   value='" + test_name + "' name='test_name[]' class='table_input'></td><td><input type='number' value='" + price + "' name='price[]' class='table_input_number price'></td><td><input style='display:none' type='text' value='" + commission + "' name='commission[]' class='table_input_number commission'></td></tr>";
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
		
 
			var price = 0;
			$("input[class *= 'price']").each(function(){
				price += +$(this).val();
			});
			$(".total").val(price);

			
			// Calculate Grand Total
			var total = +$(".total").val();
			var discount = +$(".discount").val();
			var adjust = +$(".adjust").val();
			var service = +$(".service").val();
			var paid = +$(".paid").val();
			$("#payable").val(total -adjust- total/100*discount+(total/100*service));
			$("#due").val(total +(total/100*service)- adjust- total/100*discount-paid);
 
			
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
						url: "fetchData.php",
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
			
			
	 