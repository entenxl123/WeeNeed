$(function(){
    $('#user-validate').hide();
    $('#pass-validate').hide();

    //BUTTON LOGIN
    $('#btn-login').on('click',function(){
        var Username = $('#login-user').val();
        var Password = $('#login-pass').val();

        if($('#login-user').val().trim() == ""){
            $('#user-validate').show();
            $('#login-user').focus();
        }else if($('#login-pass').val().trim() == ""){
            $('#pass-validate').show();
            $('#login-pass').focus();
        }else{
			//alert('555');
			$.ajax({ 
					url: "api/controller/login.php" ,
					type: "post",
					data: {"status":"loginPermission",
						   "username":$("#login-user").val(),
						   "password":$("#login-pass").val()
					},success:function(rep){
                        console.log(rep);
                        if(rep == 1){
                            location.href='dashboard.php';
                        }else{
                            $('#pass-validate').show();
                            $('#pass-validate').text('ไม่พบบัญชี Approvcenter ของคุณ');
                        }
                    }
			})
				
        }
    })

    //CHECK VALIDATE USER
    $('#login-user').on('keyup',function(){

        var userKey = $(this).val();
        if(userKey.trim() === ""){
            $('#user-validate').show();
        }else{
            $('#user-validate').hide();
        }
    })

    //CHECK VALIDATE PASSWORD
    $('#login-pass').on('keyup',function(){

        var passKey = $(this).val();
        if(passKey.trim() === ""){
            $('#pass-validate').show();
        }else{
            $('#pass-validate').hide();
        }
    })
})