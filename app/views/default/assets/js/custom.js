/**
 *	Custom JS
 *
 *	Theme by: www.cutearts.org
 **/


$(document).ready(function() {
	
	$('#clicks').click(function(){
		var package = $('#packagePrice').val();
		$("#TotalAmount").val(package);
	});

	// SELECT ALL CHECKBOX
    $('#selectallMeals').click(function() {
	    var c = this.checked;
	    $('.meal-yes').prop('checked',c);
	    totalAmtCalculator();
	});

	$('#selectallEntrance').click(function() {
	    var c = this.checked;
	    $('.entrance-yes').prop('checked',c);
	    totalAmtCalculator();
	});

	$('#selectallCabins').click(function() {
	    var c = this.checked;
	    $('.cabin-yes').prop('checked',c);
	    totalAmtCalculator();
	});

	$('#selectallTents').click(function() {
	    var c = this.checked;
	    $('.tent-yes').prop('checked',c);
	    totalAmtCalculator();
	});


	// Amount Calculator Function
	var totalAmtCalculator = function() {
		$totalamount = 0;
		$('.amt').each(function(){
			if(this.checked == true) {
				$totalamount += Math.floor($(this).val());
			}
		});

		var $paid = $('#PaidAmount').val();
		var $bal = Math.floor($totalamount-$paid);
		var $exc = Math.floor($paid-$totalamount);
		
		$('#Balance').val($bal);
		$('#Excess').val();
		if($paid > $totalamount) {
			$('#Balance').val(0);
			$('#Excess').val($exc);
		}
		if($paid > $totalamount || $paid == $totalamount) {
			$('#cleared').val(1);
		}else{
			$('#cleared').val(0);
		}

		$('#TotalAmount').val($totalamount);

		// Calculate total amount ONCHANGE values

		return $totalamount;
	}
	
	if ($(".amt, .owntent").is(':checked')){
	    totalAmtCalculator();	    
	}
	
	$('.amt').change(function(){
		totalAmtCalculator();
	});

	if ($(".owntent").is(':checked')){
		var $cls = '.'+$('.owntent').attr('rel');
		var $ownTentPrice = $("#owntentPrice").val();
		totalAmtCalculator();

		$($cls).each(function(){
			$('.tent-yes').val($ownTentPrice);
			totalAmtCalculator();
		});
	}else{
		var $tentPrice = $("#tentPrice").val();
		$($cls).each(function(){
			$('.tent-yes').val($tentPrice);
			totalAmtCalculator();
		});
	}



	// Status Select
	$('#package-status').on('change', function() {
		var $value = this.value;

		$('.status1, .status2, .status3, .status4, .status5, .status6').removeClass('show');
		$('#cabins, #tents').removeAttr('required');
		$('.status1, .status2, .status3, .status4, .status5, .status6').hide();

		$('.amt, .selectall').each(function(){
			this.checked = false;
			totalAmtCalculator();
		});


		// Cabin (Lodge Only)
		if($value == 2){
			$('#cabins').attr('required','');
			$('.status1, .status3, .status2, .status4').slideDown();
			$('.status5, .status6').slideUp();
			$('#selectallMeals').click();
			$('#selectallCabins').click();
			totalAmtCalculator();
		}

		// Infant
		if($value == 5){
			$('.status1, .status2, .status3, .status4, .status5, .status6').slideUp();
			totalAmtCalculator();
		}

		// Package (full)
		if($value == 1){
			$('#cabins').attr('required','');
			$("#packfull").click();
			$('.status3').slideDown();
			$('.status1, .status2, .status4, .status5, .status6').slideUp();
			totalAmtCalculator();
		}

		// Tent (Lodge Only)
		if($value == 3){
			$('#tents').attr('required','');
			$('.status1, .status2, .status5, .status6').slideDown();
			$('.status3, .status4').slideUp();

			$('#selectallMeals').click();
			$('#selectallTents').click();
			totalAmtCalculator();
		}

		// Walk In
		if($value == 4){ 
			$('.status1, .status2').slideDown();
			$('.status3, .status4, .status5, .status6').slideUp();

			$('#selectallMeals').click();
			$('#selectallEntrance').click();
			totalAmtCalculator();
		}

	});

	$('.owntent').click(function(){
		var $cls = '.'+$(this).attr('rel');	
		var $ownTent = $("#owntentPrice").val();
		var $tent = $("#tentPrice").val();

		if(this.checked) {
			$($cls).each(function(){
				$(this).val($ownTent);
				totalAmtCalculator();
			});
		} else {
			$($cls).each(function(){
				$(this).val($tent);
				totalAmtCalculator();
			});
		}
	});

	// Calculate total amount ONCHANGE values
	$('#PaidAmount').change(function(){
		var $total = totalAmtCalculator();					
		var $paid = $('#PaidAmount').val();
		var $bal = Math.floor($total-$paid);
		var $exc = Math.floor($paid-$total);
		
		$('#Balance').val($bal);
		$('#Excess').val(0);
		if($paid > $total) {
			$('#Balance').val(0);
			$('#Excess').val($exc);
		}
		if($paid > $total || $paid == $total) {
			$('#cleared').val(1);
		}
	});


});

