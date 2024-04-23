 
	$(document).ready(function(){
		
		$(".clears").click(function(){
			$('#barcode').val('');
			$('#category').val('');
			$('#product_name').val('');
			$('#wty').val('');
			$('#qty').val('');
			$('#sales').val('');
			$('#buy').val('');
			$('#sub_buy').val('');
			$(".barcode").focus();
	
			add_calcualte()
		});
		
		// Add Row
	$(".add-row").click(function(){

	// Ceheck Search Input 
		if($('#barcode').val() == ''){
			alert('No Data Found');
			$('#barcode').val('');
			$("#barcode").focus();
			}

 
		else {
 
			var barcode 		= $("#barcode").val();
			var category		= $("#category").val();
			var product_name	= $("#product_name").val();
			var wty 			= $("#wty").val();
			var qty 			= $("#qty").val();
			var sales 			= $("#sales").val();
			var buy 			= $("#buy").val();
			var sub_buy 		= $("#sub_buy").val();
			
			
			// Play Sound	
			var obj = document.createElement("audio");
			obj.src = "../assets/sound/02.wav";
			obj.volume = 0.3;
			obj.autoPlay = false;
			obj.preLoad = true;
			obj.controls = true;
			obj.play();   
	 

        	var markup = "<tr><td><input type='checkbox' name='record'></td><td><input  type='' readonly  value='" + barcode + "' name='barcode[]' required class='table_input'></td><td style='display:none;'><input  type='hidden' readonly  value='" + category  + "' name='category[]' class='table_input'></td><td><input  type='' readonly  value='" + product_name + "' name='product_name[]' class='table_input'></td><td><input  type='' value='" + wty + "' name='wty[]' class='table_input'></td><td><input  type='number' required  value='" + qty + "' name='qty[]'  class='table_input_number qty'></td><td><input  type='number' required  value='" + buy + "' name='buy[]' class='table_input_number buy'></td><td><input  type='number'   value='" + sales + "' name='sales[]' class='table_input_number'></td><td><input  type='number' readonly  value='" + sub_buy + "' name='sub_buy[]' class='table_input_number sub_buy'></td></tr>";
   		$("table tbody").append(markup);
		
		
   		   
		// After Adding Items Keep Empty For The Next Search
			$('#barcode').val('');
			$('#sub_buy').val('');
			$(".barcode").focus();
	 
			
		// Call Caculate Function
		
		add_calcualte()

        }
        
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
			
			add_calcualte()
			add_calcualte()
			
                }
            });
        });
    });    
 
 
 	// SUM OF AMOUNT
	
		function add_calcualte () {
		
			var grandTotal = 0;
			$("input[name='qty[]']").each(function(index) {
				var qty = $("input[name='qty[]']").eq(index).val();
				var buy = $("input[name='buy[]']").eq(index).val();
				var output = parseFloat(parseFloat(qty) * parseFloat(buy)).toFixed(2);
				if (!isNaN(output)) {
					$("input[name='sub_buy[]']").eq(index).val(output);
					grandTotal = parseFloat(parseFloat(grandTotal) + parseFloat(output)).toFixed(2);
					$('#total').val(grandTotal);
				}
			})
			
		}
	
	// Change Caculate Value
		
		$(".calculate").on('keyup change', function() {
		
			add_calcualte()
			
		})
		
	