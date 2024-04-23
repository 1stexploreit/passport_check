	/// Start Enter Button Disable

	function stopRKey(evt) {
		var evt = (evt) ? evt : ((event) ? event : null);
		var node = (evt.target) ? evt.target : ((evt.srcElement) ? evt.srcElement : null);
		if ((evt.keyCode == 13) && (node.type == "number")) {
			return false;
		}
		if ((evt.keyCode == 13) && (node.type == "text")) {
			return false;
		}
	}
	document.onkeypress = stopRKey;

	function myFunction() {
		document.getElementById("barcode").focus();
	}


	// Colone Items

	$(document).ready(function () {
		$(".instl").click(function () {
			$(".formi")
				.eq(0)
				.clone()
				.find("input").val("").end() // ***
				.show()
				.insertAfter(".formi:last");


		});
		$('.all').on('click', ".cancel", function () {
			$(this).closest('.formi').remove();
		});
	});


	// Remove Row  
	function deleteRow() {
		$('DIV.items').each(function (index, item) {
			jQuery(':checkbox', this).each(function () {
				if ($(this).is(':checked')) {
					$(item).remove();
				}
			});
		});
	}
	
	
	// Calculate

	function add_calcualte() {

		var grandTotal = 0;
		$("input[name='qty[]']").each(function (index) {
			var qty = $("input[name='qty[]']").eq(index).val();
			var buy = $("input[name='buy[]']").eq(index).val();
			var amount = parseFloat(parseFloat(qty) * parseFloat(buy)).toFixed(2);
			if (!isNaN(amount)) {
				$("input[name='sub_total[]']").eq(index).val(amount);
				grandTotal = parseFloat(parseFloat(grandTotal) + parseFloat(amount)).toFixed(2);
				$('#total').val(grandTotal);
			}
		})

	}


	// Change Caculate Value

	$(".calculate").on('keyup change', function () {

		add_calcualte()

	})
