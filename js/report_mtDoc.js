$(function(){

    $('#preload').show();
    $('#endload').hide();
	function chk_locatSign(data){
		var tmp = data.split('/');
		 var data_last=tmp[tmp.length-1]; 
      var pathName = window.location.origin;
		  if(pathName == "http://localhost" || pathName == "http://10.2.1.195" || pathName == "http://10.2.1.233"){
			  var data_reture=data;
		  }else{
			  var data_reture="http://110.170.166.6/signature/"+data_last;
		  }
		return data_reture;
	}

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
    $('.super').hide();
    var viewReport = $('#statusView').val();
    $('#back_page').hide();
    if(viewReport == "view"){
        $('#view_approve').hide();
        $('#back_page').show();
    }
//alert($('#FRequestID').val());
    var totalPrice = 0;
    $.getJSON('../../api/controller/mt.php?status=ReadOrderDoc&Fdoc_app_id='+$('#Fdoc_app_id').val(),function(rep){
        //console.log(rep);
        $('#preload').hide();
        $('#endload').show();
		
        var orderTable = "";
        var TotalAmt = 0;
        var TotalAll = 0;
        var SumAll = 0;
        var unitPrice = 0;
       $.each(rep.listOrder,function(keys,values){
         //console.log(values);
            $('#comp_name').text(values['comp_name']);
            $('#Fdoc_app_project').text(values['Fdoc_app_project']);
            $('#Fdoc_app_date').text(fullDate(values['Fdoc_app_date']));
            $('#brn_name').text(values['brn_name']);
		   
		    if(values['FworkSt']=='Y'){
				 $('#FworkSt').html('<img src="../../asset/img/checked.jpg" width="17" height="15" >');
			 }else{
				 $('#FworkSt').html('<img src="../../asset/img/unchecked.jpg" width="15" height="15" >');
			 }
		    if(values['Fwork_price'] == NaN || values['Fwork_price'] == "" || values['Fwork_price'] ==null){
				$('#Fwork_price').text(" ");
             }else{
                $('#Fwork_price').text(parseFloat(values['Fwork_price']).toLocaleString(undefined,{minimumFractionDigits: 2, maximumFractionDigits: 2}));//ค่าแรง
			}
		   
           $('#Fdoc_app_no').text(values['Fdoc_app_no']);
           $('#Fdoc_app_name').text(values['Fdoc_app_name']);
		   
		   if(values['Fmaterial_constructionSt']=='1'){
				 $('#Fmaterial_constructionSt1').html('<img src="../../asset/img/checked.jpg" width="17" height="15" >');
			}else{
				 $('#Fmaterial_constructionSt1').html('<img src="../../asset/img/unchecked.jpg" width="15" height="15" >');
			 }
				
			 if(values['Fmaterial_constructionSt']=='2'){
				 $('#Fmaterial_constructionSt2').html('<img src="../../asset/img/checked.jpg" width="17" height="15" >');
			}else{
				 $('#Fmaterial_constructionSt2').html('<img src="../../asset/img/unchecked.jpg" width="15" height="15" >');
			 }
				
           $('#Fcontractor').text(values['Fcontractor']);
           $('#sup_fname').text(values['sup_fname']);
           $('#owner_name').text('คุณ'+values['owner_first_name']+' '+values['owner_last_name']);
           $('#FJobLevel_name').text(values['FJobLevel_name']);
           $('#Fattach_infor').text(values['Fattach_infor']);
           $('#Fmachine_year').text(thaiYear(values['Fmachine_year']));
		   
		    if(values['Fmachine_price'] == NaN || values['Fmachine_price'] == "" || values['Fmachine_price'] ==null){
				$('#Fmachine_price').text(" ");
             }else{
                $('#Fmachine_price').text(parseFloat(values['Fmachine_price']).toLocaleString(undefined,{minimumFractionDigits: 2, maximumFractionDigits: 2}));//ค่าแรง
			}
		   
		    if(values['Fmachine_hisRepair_amt'] == NaN || values['Fmachine_hisRepair_amt'] == "" || values['Fmachine_hisRepair_amt'] ==null){
				$('#Fmachine_hisRepair_amt').text(" ");
             }else{
                $('#Fmachine_hisRepair_amt').text(parseFloat(values['Fmachine_hisRepair_amt']).toLocaleString(undefined,{minimumFractionDigits: 2, maximumFractionDigits: 2}));//ค่าแรง
			}
		     
		   if(values['FdamagedSt']=='1'){
				 $('#FdamagedSt1').html('<img src="../../asset/img/checked.jpg" width="17" height="15" >');
			}else{
				 $('#FdamagedSt1').html('<img src="../../asset/img/unchecked.jpg" width="15" height="15" >');
			 }
				
			 if(values['FdamagedSt']=='2'){
				 $('#FdamagedSt2').html('<img src="../../asset/img/checked.jpg" width="17" height="15" >');
			}else{
				 $('#FdamagedSt2').html('<img src="../../asset/img/unchecked.jpg" width="15" height="15" >');
			 }
 			
		   if(values['FAcknowledgeSt']=='Y'){
				 $('#FAcknowledgeSt').html('<img src="../../asset/img/checked.jpg" width="17" height="15" >');
			 }else{
				 $('#FAcknowledgeSt').html('<img src="../../asset/img/unchecked.jpg" width="15" height="15" >');
			 }
		   
		   if(values['FAsk_for_approvalSt']=='Y'){
				 $('#FAsk_for_approvalSt').html('<img src="../../asset/img/checked.jpg" width="17" height="15" >');
			 }else{
				 $('#FAsk_for_approvalSt').html('<img src="../../asset/img/unchecked.jpg" width="15" height="15" >');
			 }
		   
		   if(values['FTo_approveSt']=='Y'){
				 $('#FTo_approveSt').html('<img src="../../asset/img/checked.jpg" width="17" height="15" >');
			 }else{
				 $('#FTo_approveSt').html('<img src="../../asset/img/unchecked.jpg" width="15" height="15" >');
			 }
		   
		   if(values['FexpressSt']=='Y'){
				 $('#FexpressSt').html('<img src="../../asset/img/checked.jpg" width="17" height="15" >');
			 }else{
				 $('#FexpressSt').html('<img src="../../asset/img/unchecked.jpg" width="15" height="15" >');
			 }
		   
		   if(values['FPlease_considerSt']=='Y'){
				 $('#FPlease_considerSt').html('<img src="../../asset/img/checked.jpg" width="17" height="15" >');
			 }else{
				 $('#FPlease_considerSt').html('<img src="../../asset/img/unchecked.jpg" width="15" height="15" >');
			 }
		   
		   
		   $('#Fdoc_app_detail').html(values['Fdoc_app_detail']);
		   
		  if(values['FownerApp']=='Y'){
			 // alert(chk_locatSign(values['owner_signature']));
			   $("#ownerSignature").html('<img src="'+chk_locatSign(values['owner_signature'])+'" height="50" width="150">');
		   	  $('#FownerApp_date').text(fullDate(values['FownerApp_date']));
			  
		 }	
		   
			$("#Fowner_comment").html(values['Fowner_comment']);
			$("#ownerPostName").html(values['owner_post_name']);
			$("#ownerName1").html('คุณ'+values['owner_first_name']+' '+values['owner_last_name']);
			$("#ownerName2").html('คุณ'+values['owner_first_name']+' '+values['owner_last_name']);
					
					
					if(values['Fmanager_mtApp']=='Y'){
					   $("#manager_mtSignature").html('<img src="'+chk_locatSign(values['manager_mt_signature'])+'" height="50" width="150">');
		   				$('#Fmanager_mtApp_date').text(fullDate(values['Fmanager_mtApp_date']));
					 }
		   
				    $("#Fmanager_mt_comment").html(values['Fmanager_mt_comment']);
					$("#manager_mtName").html('คุณ'+values['manager_mt_first_name']+' '+values['manager_mt_last_name']);
					$("#manager_mtPostName").html(values['manager_mt_post_name']);
					//alert(values['manager_bpgs_signature']);
					if(values['FmanagerBP_GSApp']=='Y'){
					   $("#managerBP_GSSignature").html('<img src="'+chk_locatSign(values['manager_bpgs_signature'])+'" height="50" width="150">');
		   			$('#FmanagerBP_GSApp_date').text(fullDate(values['FmanagerBP_GSApp_date']));
					}	
		   			
		   
		   			if(values['FmanagerBP_GSID']!='' && values['FmanagerBP_GSID']!=null && values['FmanagerBP_GSID']!=NaN){
					   $("#show_bp_gs").show();
					 }else{
					   $("#show_bp_gs").hide();
					 }
					$("#FmanagerBP_GS_comment").html(values['FmanagerBP_GS_comment']);
					$("#manager_bpgsName").html(values['manager_bpgs_fname']);
					$("#managerBP_GSPostName").html(values['manager_bpgs_post_name']);
					
					 if(values['FSupervisorApp']=="Y"){
					   $("#SupervisorSignature").html('<img src="'+chk_locatSign(values['manager_sup_signature'])+'" height="50" width="150">');
		   				$('#FSupervisorApp_date').text(fullDate(values['FSupervisorApp_date']));
					 }	
					$("#SupervisorPostName").html(values['sup_post_name']);
					$("#SupervisorName1").html(values['sup_fname']);
					$("#SupervisorName2").html(values['sup_fname']);
		   
		   if(values['return_edit_empid']!='' && values['return_edit_empid']!=null && values['return_edit_empid']!=NaN){
			   $("#show_return_edit").show();
					$("#return_edit_emp_name").html('<font color="#F8070B">('+fullDate(values['return_edit_date'])+')คุณ'+values['return_edit_emp_name']+'ตีกลับแผนกซ่อมบำรุงด้วยเหตุผล <b>'+values['return_edit_comment']+'</b></font>');
			   
			   
		   }
		   			
					
            
       })

		var c=0;	
		
	    var pathName = window.location.origin;
		
        $.each(rep.listAttach,function(orderAttachKeys,orderAttachValues){
			//alert(pathName);
		 if(pathName == "http://localhost" || pathName == "http://10.2.1.195" || pathName == "http://10.2.1.233"){	
			 var part="http://10.2.1.167/TNBSystems/docapp_attach/reqNo-"+orderAttachValues['Fdoc_app_id']+"/"+orderAttachValues['FAttachLink'];
		 }else{
			  var part="http://110.170.166.7/TNBSystems/docapp_attach/reqNo-"+orderAttachValues['Fdoc_app_id']+"/"+orderAttachValues['FAttachLink'];
			 
		 }
		
            orderTable +="<div class=\"row\">";
            orderTable += " <div class=\"col-md-12 col-12\"><a href="+part+"   target=\"new\">"+orderAttachValues['FAttachName']+"</a></div>";
            orderTable +="</div></div>";
			
       })

        $('#attach-list').html(orderTable);
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
        var Fdoc_app_id = $('#Fdoc_app_id').val();
       
        swal({
            title: 'ยืนยันการอนุมัติ ?',
            input: 'text',
            inputAttributes: {
              autocapitalize: 'off'
            },
            showCancelButton: true,
            confirmButtonText: 'ยืนยัน',
            cancelButtonText: 'ยกเลิก',
            cancelButtonColor: '#c0392b',
            showLoaderOnConfirm: true,
  			inputPlaceholder: 'ความคิดเห็น',
            preConfirm: (ModifyText) => {
              //console.log(modifyText);
              $.post('../../api/controller/mt.php?status=ApproveDoc&Fdoc_app_id='+Fdoc_app_id+'&Comment='+ModifyText,function(rep){
                  console.log(rep);
				  //alert(rep);
                  if(rep == 2){
                     alert('อนุมัติใบแจ้งซ่อมเรียบร้อย');
                      window.location.href="../../listDetail.php?status=MT";
                  }else{
                      alert('ไม่สามารถดำเนินการได้ กรุณาติดต่อแผนกระบบข้อมูล 1303');
                  }
              })
            },
            allowOutsideClick: () => !swal.isLoading()
          })
		
		
    })




    
    $('#btn-modify').on('click',function(){

        var Fdoc_app_id = $('#Fdoc_app_id').val()
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
  			inputPlaceholder: 'ความคิดเห็น',
            preConfirm: (ModifyText) => {
              //console.log(modifyText);
              $.post('../../api/controller/mt.php?status=ModifyDoc&Fdoc_app_id='+Fdoc_app_id+'&Comment='+ModifyText,function(rep){
                  console.log(rep);
                  if(rep == 1){
                      alert('ดำเนินการตีกลับเพื่อแก้ไขเรียบร้อย');
                      window.location.href="../../listDetail.php?status=MT";
                  }else{
                      alert('ไม่สามารถดำเนินการได้ กรุณาติดต่อแผนกระบบข้อมูล 1303');
                  }
              })
            },
            allowOutsideClick: () => !swal.isLoading()
          })
      
    })



    $('#btn-cancel').on('click',function(){
        var Fdoc_app_id = $('#Fdoc_app_id').val()
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
  			inputPlaceholder: 'ความคิดเห็น',
            preConfirm: (ModifyText) => {
              //console.log(modifyText);
              $.post('../../api/controller/mt.php?status=NotApproveDoc&Fdoc_app_id='+Fdoc_app_id+'&Comment='+ModifyText,function(rep){
                 //console.log(rep);
                 if(rep == 1){
                    alert('ดำเนินการไม่อนุมัติเรียบร้อย');
                    window.location.href="../../listDetail.php?status=MT";
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