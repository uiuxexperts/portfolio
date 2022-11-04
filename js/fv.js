jQuery('#contactform').validate({
	rules:{
		name:"required",
		email:{
			required:true,
			email:true
		},
		requirement:{
			required:true
		},
		phone_number:{
		    required:true
		},
	},messages:{
		name:"Please enter your name",
		email:{
			required:"Please enter email",
			email:"Please enter valid email",
		},
		requirement:{
			required:"Please enter your requirement"
		},
		phone_number:{
			required:"Please enter your number"
		},
	},
	submitHandler:function(form){
	    $('#msgdiv').remove();
	    $.ajax({
                type: "POST",
                url: "https://engineersahab.com/ui-ux/contactUs.php",
                data: $('#contactform').serialize(),
                success: function(msg) {
                    var msg = $.parseJSON(msg);
                    if(msg.type == 'success')
                    {
                        $('#contactform').trigger("reset");
                        //return true;
                        $('.msgdiv').append('<div id="msgdiv" class="alert alert-success">'+msg.text+'</div><img src="images/thumb.png">');
                        $('#msgdiv').delay(5000).fadeOut('slow');
                    }
                    else
                    {
                        $('.msgdiv').append('<div id="msgdiv" class="alert alert-danger">'+msg.text+'</div><img src="images/sad-face.png">');
                        $('#msgdiv').delay(5000).fadeOut('slow');
                        // alert('Server error');
                        // return false;
                    }
                }
            });
		//form.submit();
	}
});