$(function(){

    $('#preload').show();
    $('#endload').hide();

    $("#signOut").on('click',function(){
        $.ajax({
            url:'../../logout.php?status=logOut',
            success:function(rep){
                if(rep==1){
                    location.href='../../index.html'
                }
            }
        })
    });

    $('.manager').hide();
    $('.show_table').hide();
    var viewReport = $('#statusView').val();
    $('#back_page').hide();
    if(viewReport == "view"){
        $('#view_approve').hide();
        $('#back_page').show();
    }

    $.getJSON('../../api/controller/cm.php?status=ReadOrder&FRequestID='+$('#FRequestID').val(),function(rep){
      //console.log(rep);
      $('#preload').hide();
      $('#endload').show();
      var pathName = window.location.origin;
       var orderTable_A = "";
       $.each(rep.listOrder,function(keys,values){
           //console.log(values);
            $('#FRequestDate').text(fullDate(values['FRequestDate']));
			$('#FLastUpdate').text(fullDate(values['FLastUpdate']));
            $('#comp_name').text(values['comp_name']);
            $('#brn_name').text(values['brn_name']);
            $('#sec_nameThai').text(values['sec_nameThai']);
            $('#sec_name_user').text(values['sec_name_user']);
            $('#brn_name_user').text(values['brn_name_user']);
			$('#FRequestTitle_user').text(values['FRequestTitle_user']);
            $('#FAreaTarger').text(values['FAreaTarger']);
            $('#FTelNo').text(values['FTelNo']);
			$('#FApproveDate').text(values['FApproveDate']);
            
            if(pathName == "http://localhost" || pathName == "http://10.2.1.195" || pathName == "http://10.2.1.233"){
                $('#FPhoto_1').attr("src","http://10.2.1.167/TNBSystems/uploads/cm-data/reqNo-"+values['FRequestID']+"/"+values['FPhoto_1']);
                $('#FPhoto_2').attr("src","http://10.2.1.167/TNBSystems/uploads/cm-data/reqNo-"+values['FRequestID']+"/"+values['FPhoto_2']);
                $('#FPhoto_3').attr("src","http://10.2.1.167/TNBSystems/uploads/cm-data/reqNo-"+values['FRequestID']+"/"+values['FPhoto_3']);
                $('#FPhoto_4').attr("src","http://10.2.1.167/TNBSystems/uploads/cm-data/reqNo-"+values['FRequestID']+"/"+values['FPhoto_4']);
            }else{
                $('#FPhoto_1').attr("src","http://110.170.166.7/TNBSystems/uploads/cm-data/reqNo-"+values['FRequestID']+"/"+values['FPhoto_1']);
                $('#FPhoto_2').attr("src","http://110.170.166.7/TNBSystems/uploads/cm-data/reqNo-"+values['FRequestID']+"/"+values['FPhoto_2']);
                $('#FPhoto_3').attr("src","http://110.170.166.7/TNBSystems/uploads/cm-data/reqNo-"+values['FRequestID']+"/"+values['FPhoto_3']);
                $('#FPhoto_4').attr("src","http://110.170.166.7/TNBSystems/uploads/cm-data/reqNo-"+values['FRequestID']+"/"+values['FPhoto_4']);
            }
            
            if(values['FApprove'] == "Y"){
                $('#manager_signature').attr("src",values['signature']);//ลายเช็นผู้จัดการ
                $('#FName').text("("+values['FName']+")");//ชื่อผู้จัดการ
                $('#FApproveDate').text(fullDate(values['FApproveDate']));//วันที่ผู้จัดการอนุมัติ
            }else{
				$('#FName').text("("+values['FName']+")");
                $('#manager_signature').text("ลงชื่อ...................................................");
                $('.manager').show();
			}
            
       })
	})
	   
	$.getJSON('../../api/controller/cm.php?status=ReadOrder_A&FRequestID='+$('#FRequestID').val(),function(rep){
        var pathName = window.location.origin;
	   $.each(rep.listOrder_A,function(keysA,valuesA){
		    var orderTable_A = "";
			 $('.show_table').show();
          
            if(pathName == "http://localhost" || pathName == "http://10.2.1.195" || pathName == "http://10.2.1.233"){
                var url_file="http://10.2.1.195/TNBSystems/uploads/cm-data/reqNo-"+valuesA['FRequestID']+"/"+valuesA['FAttachLink'];
            }else{
                var url_file="http://110.170.166.7/TNBSystems/uploads/cm-data/reqNo-"+valuesA['FRequestID']+"/"+valuesA['FAttachLink'];
            }
		
	
			orderTable_A += "<tr>";
               orderTable_A += "<td><a href="+url_file+" target='_blank'>"+ valuesA['FAttachLink'] +"</a></td>";
            orderTable_A += "</tr>";
			 
            $("#orderTable_A tbody").append(orderTable_A);
       })

    })
	

    $('#btn-back').on('click',function(){
        window.history.back();
    })






    /***************************************************
     * 
     * APPROVE
     * 
     * ************************************************/

    $('#btn-approve').on('click',function(){
        var FRequestID = $('#FRequestID').val();
        $.post('../../api/controller/cm.php?status=Approve&FRequestID='+FRequestID,function(rep){
            console.log(rep);
            if(rep == 1 || rep == 2){
                alert('อนุมัติใบแจ้งซ่อมเรียบร้อย');
                //console.log($('#JobStatus').val());
                window.location.href="../../listDetail.php?status=CM";
            }else{
                alert('ไม่สามารถทำการอนุมัติได้ กรุณาติดต่อระบบข้อมูล 1303');
            }
        })
    })


   
    $('#btn-modify').on('click',function(){

        var FRequestID = $('#FRequestID').val()
        swal({
            title: 'ยืนยันการตีกลับแก้ไข ?',
            input: 'text',
            inputAttributes: {
              autocapitalize: 'off'
            },
            showCancelButton: true,
            confirmButtonText: 'ยืนยัน',
            cancelButtonText: 'ยกเลิก',
            cancelButtonColor: '#c0392b',
            showLoaderOnConfirm: true,
            preConfirm: (ModifyText) => {
              //console.log(modifyText);
              $.post('../../api/controller/cm.php?status=Modify&FRequestID='+FRequestID+'&Comment='+ModifyText,function(rep){
                  //console.log(rep);
                  if(rep == 1){
                      alert('ดำเนินการตีกลับเพื่อแก้ไขเรียบร้อย');
                      window.location.href="../../listDetail.php?status=CM";
                  }else{
                      alert('ไม่สามารถดำเนินการได้ กรุณาติดต่อแผนกระบบข้อมูล 1303');
                  }
              })
            },
            allowOutsideClick: () => !swal.isLoading()
          })
      
    })



    $('#btn-cancel').on('click',function(){
		//alert(55);
        var FRequestID = $('#FRequestID').val()
        swal({
            title: 'ยืนยันการไม่อนุมัติ ?',
            input: 'text',
            inputAttributes: {
              autocapitalize: 'off'
            },
            showCancelButton: true,
            confirmButtonText: 'ยืนยัน',
            cancelButtonText: 'ยกเลิก',
            cancelButtonColor: '#c0392b',
            showLoaderOnConfirm: true,
            preConfirm: (ModifyText) => {
              //console.log(modifyText);
              $.post('../../api/controller/cm.php?status=NotApprove&FRequestID='+FRequestID+'&Comment='+ModifyText,function(rep){
                //console.log(rep);
                 if(rep == 1){
                    alert('ดำเนินการไม่อนุมัติเรียบร้อย');
                    window.location.href="../../listDetail.php?status=CM";
                }else{
                    alert('ไม่สามารถดำเนินการได้ กรุณาติดต่อแผนกระบบข้อมูล 1303');
                }
              })
            },
            allowOutsideClick: () => !swal.isLoading()
          })
    })
     /***************************************************
     * 
     * END APPROVE
     * 
     * ************************************************/
})