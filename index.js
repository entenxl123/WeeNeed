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
            axios.post("api/controller/login.php?status=login",{Username, Password})
            .then(res => {
                console.log(res.data);
                if(res.data==1){
                    location.href = "default";
                }else{
                    alert('ไม่มีรหัสนี้')
                }
                // res.data.map(items => {

                // })
            }).catch(error => {
                console.error(error+'EEEEEEE');
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