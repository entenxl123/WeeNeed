$(function(){
    $('#endload').hide();
    $.getJSON('api/controller/profile.php?status=ReadProfile&u_id='+$('#u_id').val(),function(rep){
        $('.preload').show();
      
        //console.log(rep);
        $.each(rep,function(keys,values){
            $('.preload').hide();
            $('#endload').show();
            //console.log(values);
            $('#u_username').val(values['emp_username']);
            $('#u_password').val(values['emp_password']);
            $('#u_email').val(values['email_company']);
        })
    })


    $('#btn-update').on('click',function(){
        
        var param  = 'u_username='+$('#u_username').val();
            param += '&u_password='+$('#u_password').val();
            param += '&u_email='+$('#u_email').val();
            param += '&u_id='+$('#u_id').val();
            
            var user_length=$('#u_username').val().trim().length;
            var password_length=$('#u_password').val().trim().length;
            //alert(user_length);
            if(user_length <= '5'){
                alert('กรุณากรอก Username 5ตัวอักษรขึ้นไป');
                $('#u_username').focus();
            }else if(password_length <= '6'){
                alert('กรุณากรอก Password 6ตัวอักษรขึ้นไป');
                $('#u_password').focus();
            }else{
                $('#endload').hide();
                $('.preload').show();
                $.post('api/controller/profile.php?status=UpdateProfile&'+param,function(rep){
                    //console.log(rep);
                    $('.preload').hide();
                    $('#endload').show();
                    if(rep == 1){
                        alert('แก้ไขข้อมูลเรียบร้อย');
                        window.location.href='dashboard.php';
                    }else{
                        alert('ไม่สามารถแก้ไขข้อมูลได้ กรุณาติดต่อแผนกระบบข้อมูล 1303');
                    }
                });
            }
       
    });


})

