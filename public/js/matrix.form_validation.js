
$(document).ready(function(){
	
	$('input[type=checkbox],input[type=radio],input[type=file]').uniform();
	
	$('select').select2();
	
	// Form Validation
    $("#basic_validate").validate({
		rules:{
			required:{
				required:true
			},
			email:{
				required:true,
				email: true
			},
			date:{
				required:true,
				date: true
			},
			url:{
				required:true,
				url: true
			}
		},
		errorClass: "help-inline",
		errorElement: "span",
		highlight:function(element, errorClass, validClass) {
			$(element).parents('.control-group').addClass('error');
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).parents('.control-group').removeClass('error');
			$(element).parents('.control-group').addClass('success');
		}
	});
	
        $("#item-validate").validate({
		rules:{
            id:{
				required:true,
                number:true
			},
			product:{
				required:true
			},
            strength:{
				required:true
			},
			packaging:{
				required:true			}
		},
		errorClass: "help-inline",
		errorElement: "span",
		highlight:function(element, errorClass, validClass) {
			$(element).parents('.control-group').addClass('error');
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).parents('.control-group').removeClass('error');
			$(element).parents('.control-group').addClass('success');
		}
	});
    
     $("#delete").validate({
		rules:{
			id:{
				required:true,
                number:true
			}
		},
		errorClass: "help-inline",
		errorElement: "span",
		highlight:function(element, errorClass, validClass) {
			$(element).parents('.control-group').addClass('error');
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).parents('.control-group').removeClass('error');
			$(element).parents('.control-group').addClass('success');
		}
	});
    
        $("#warehouse-validate").validate({
		rules:{
            strength:{
				required:true
			},
            packaging:{
				required:true
			},
            object_id:{
				required:true,
                number:true
			},
            id:{
				required:true,
                number:true
			},
			name:{
				required:true
			},
			notes:{
				required:true
            },
            quantity:{
				required:true,
                number:true
            },
		},
		errorClass: "help-inline",
		errorElement: "span",
		highlight:function(element, errorClass, validClass) {
			$(element).parents('.control-group').addClass('error');
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).parents('.control-group').removeClass('error');
			$(element).parents('.control-group').addClass('success');
		}
	});
    
    
            $("#order-validate").validate({
		rules:{
            issuingofficername:{
				required:true
			},
            supplycompanyname:{
				required:true
			},
            supplyofficername:{
				required:true,
			},
            warehouseitemid:{
				required:true,
                number:true
			},
			numberofitems:{
				required:true,
                number:true
			},
			quantityofliters:{
				required:true,
                number:true
            },
            priceperitem:{
				required:true,
                number:true
            },
            total:{
				required:true,
                number:true
            },
            notes:{
				required:true,
            },
		},
		errorClass: "help-inline",
		errorElement: "span",
		highlight:function(element, errorClass, validClass) {
			$(element).parents('.control-group').addClass('error');
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).parents('.control-group').removeClass('error');
			$(element).parents('.control-group').addClass('success');
		}
	});
    
    $("#sale-validate").validate({
		rules:{
            issuingofficername:{
				required:true
			},
            supplycompanyname:{
				required:true
			},
            salesofficername:{
				required:true,
			},
            warehouseitemid:{
				required:true,
                number:true
			},
			numberofitems:{
				required:true,
                number:true
			},
			quantityofliters:{
				required:true,
                number:true
            },
            priceperitem:{
				required:true,
                number:true
            },
            total:{
				required:true,
                number:true
            },
            notes:{
				required:true,
            },
            amountpaid:{
				required:true,
                number:true
            },
            recipientname:{
				required:true,
            },
		},
		errorClass: "help-inline",
		errorElement: "span",
		highlight:function(element, errorClass, validClass) {
			$(element).parents('.control-group').addClass('error');
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).parents('.control-group').removeClass('error');
			$(element).parents('.control-group').addClass('success');
		}
	});
    
    
        $("#vendor-validate").validate({
		rules:{
			name:{
				required:true
			},
            address:{
				required:true
			},
			region:{
				required:true
            },
            phone:{
				required:true,
                number:true
            },
			hoursofactivity:{
				required:true
            },
            description:{
				required:true
			}
		},
		errorClass: "help-inline",
		errorElement: "span",
		highlight:function(element, errorClass, validClass) {
			$(element).parents('.control-group').addClass('error');
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).parents('.control-group').removeClass('error');
			$(element).parents('.control-group').addClass('success');
		}
	});
    
        $("#supplier-validate").validate({
		rules:{
            id:{
				required:true,
                number:true
			},
			name:{
				required:true
			},
            address:{
				required:true
			},
			region:{
				required:true
            },
            phone:{
				required:true,
                number:true
            },
			hoursofactivity:{
				required:true
            },
            description:{
				required:true
			}
		},
		errorClass: "help-inline",
		errorElement: "span",
		highlight:function(element, errorClass, validClass) {
			$(element).parents('.control-group').addClass('error');
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).parents('.control-group').removeClass('error');
			$(element).parents('.control-group').addClass('success');
		}
	});
    
	$("#number_validate").validate({
		rules:{
			min:{
				required: true,
				min:10
			},
			max:{
				required:true,
				max:24
			},
			number:{
				required:true,
				number:true
			}
		},
		errorClass: "help-inline",
		errorElement: "span",
		highlight:function(element, errorClass, validClass) {
			$(element).parents('.control-group').addClass('error');
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).parents('.control-group').removeClass('error');
			$(element).parents('.control-group').addClass('success');
		}
	});
	
	$("#password_validate").validate({
		rules:{
			pwd:{
				required: true,
				minlength:6,
				maxlength:20
			},
			pwd2:{
				required:true,
				minlength:6,
				maxlength:20,
				equalTo:"#pwd"
			}
		},
		errorClass: "help-inline",
		errorElement: "span",
		highlight:function(element, errorClass, validClass) {
			$(element).parents('.control-group').addClass('error');
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).parents('.control-group').removeClass('error');
			$(element).parents('.control-group').addClass('success');
		}
	});
});
