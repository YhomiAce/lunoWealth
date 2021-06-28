$(function(){

	calc();

	$('#calc_plan').on('change', calc);
	$('#inv_amount').bind('change keyup', calc).on('keypress', isNumberKey);

});

function isNumberKey(evt) {
	var charCode = (evt.which) ? evt.which : event.keyCode;
	if (charCode != 46 && charCode > 31 && (charCode < 48 || charCode > 57))
		return false;
	return true;
}


function calc() {

	var plan = $('#calc_plan').val();
	var amount = $('#inv_amount').val();
	var percent;

	switch (plan) {
		case '1':
			switch (true) {
				case (amount<20):
					percent = "   Min 20    ";
					break;
				case (amount<=10000):
					percent = 42;	
					break;
/*				case (amount<=4000):
					percent = 104;
					break;
				case (amount<=8000):
					percent = 107;	
					break;
				case (amount<=15000):
					percent = 114;
					break;
				case (amount<=30000):
					percent = 120;	
					break;
				case (amount<=50000):
					percent = 130;*/
			}
		break;
			case '2':
			switch (true) {
				case (amount<10):
					percent = "   Min 10   ";
					break;
				case (amount<=100000):
					percent = 140;	
					break;
/*				case (amount<=4000):
					percent = 122;
					break;
				case (amount<=8000):
					percent = 140;	
					break;
				case (amount<=15000):
					percent = 180;
					break;
				case (amount<=30000):
					percent = 250;	
					break;
				case (amount<=50000):
					percent = 350;*/
			}
		break;
			case '3':
			switch (true) {
				case (amount<10):
					percent = "   Min 10  ";
					break;
				case (amount<=100000):
					percent = 360;	
					break;
		/*		case (amount<=4000):
					percent = 180;
					break;
				case (amount<=8000):
					percent = 250;	
					break;
				case (amount<=15000):
					percent = 450;
					break;
				case (amount<=30000):
					percent = 600;	
					break;
				case (amount<=50000):
					percent = 1100;*/
			}
		break;
		case '4':
			switch (true) {
				case (amount<10):
					percent = "   Min 10   ";
					break;
				case (amount<=100000):
					percent = 500;	
					break;
	/*			case (amount<=4000):
					percent = 400;
					break;
				case (amount<=8000):
					percent = 600;	
					break;
				case (amount<=15000):
					percent = 1000;
					break;
				case (amount<=30000):
					percent = 1500;	
					break;
				case (amount<=50000):
					percent = 3000;*/
			}
		break;
		case '5':
			switch (true) {
				case (amount<10):
					percent = "   Min 10   ";
					break;
				case (amount<=100000):
					percent = 800;	
					break;
/*				case (amount<=4000):
					percent = 800;
					break;
				case (amount<=8000):
					percent = 1000;	
					break;
				case (amount<=15000):
					percent = 1500;
					break;
				case (amount<=30000):
					percent = 2000;	
					break;
				case (amount<=50000):
					percent = 5000;*/
			}
		break;
		
		case '6':
			 switch (true) {
				case (amount<10 ):
					percent = "   Min 10     ";
					break;
				case (amount<=100000):
					percent = 1200;	
					break;
			/*	case (amount<=3000):
					percent = 85;
					break;
				case (amount<=5000):
					percent = 130;	
					break;
				case (amount<=15000):
					percent = 2500;	
					break;
                    case (amount<=30000):
					percent = 3500;	
					break;
				case (amount<=50000):
					percent = 8000;*/
			}
		break;
		case '7':
		     switch (true) {
				case (amount<10):
					percent = "   Min 10     ";
					break;				
				case (amount<=100000):
					percent = 2500;
					break;
			/*	case (amount<=3000):
					percent = 155 ;	
					break;
			case (amount<=5000):
					percent = 230 ;
					break;
				case (amount<=25000):
					percent = 800;	
				       break;
				case (amount<=25000):
					percent = 2;*/			

			}
			break;		
			
			
			 case '8':
			 switch (true) {
				case (amount<10):
					percent = "   Min 10     ";
					break;				
				case (amount<=100000):
					percent = 5000;
					break;
/*				case (amount<=3500):
					percent = 220;	
					break;
				case (amount<=5000):
					percent = 330;
					break;
				case (amount<=5000):
					percent = 1800;	
					break;
				case (amount<=25000):
					percent = 2251;	*/			





}
			break;		
			
			
			 case '9':
			switch (true) {
				case (amount<10000):
					percent = "   Min 10000     ";
					break;				
				case (amount<=100000):
					percent = 1000;
					break;
				/*case (amount<=50000):
					percent = 4800;	
					break;
				case (amount<=250000):
					percent = 6600;
					break;
				case (amount<=5000):
					percent = 1800;	
					break;
				case (amount<=25000):
					percent = 2251;		*/








			}
			break;		
			
			
			
			
			 case '10':
			switch (true) {
				case (amount<10000):
					percent = "   Min 10000     ";
					break;				
				case (amount<=100000):
					percent = 2000;
					break;
				/*case (amount<=50000):
					percent = 4800;	
					break;
				case (amount<=250000):
					percent = 6600;
					break;
				case (amount<=5000):
					percent = 1800;	
					break;
				case (amount<=25000):
					percent = 2251;		*/








			}
			break;		
			
			
			
			
			 case '11':
			switch (true) {
				case (amount<10000):
					percent = "   Min 10000     ";
					break;				
				case (amount<=100000):
					percent = 3000;
					break;
				/*case (amount<=50000):
					percent = 4800;	
					break;
				case (amount<=250000):
					percent = 6600;
					break;
				case (amount<=5000):
					percent = 1800;	
					break;
				case (amount<=25000):
					percent = 2251;		*/








			}
			break;		
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
	}

	$('#assign_per').val(percent+'%');
	var total = amount*percent/100;
	$('#total_return').val(total);
	$('#net_profit').val((total-amount).toFixed(2)+'$');

}

function limitText(limitField, limitCount, limitNum) {
	if (limitField.value.length > limitNum) {
		limitField.value = limitField.value.substring(0, limitNum);
	} else {
		limitCount.value = limitNum - limitField.value.length;
	}
}