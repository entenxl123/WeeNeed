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
    $.getJSON('../../api/controller/mt.php?status=ReadOrder&FRequestID='+$('#FRequestID').val(),function(rep){
        //console.log(rep);
        $('#preload').hide();
        $('#endload').show();
		
        var orderTable = "";
        var TotalAmt = 0;
        var TotalAll = 0;
        var SumAll = 0;
        var unitPrice = 0;
       $.each(rep.listOrder,function(keys,values){
         console.log(values['emp_name']);
            $('#JobISD').text(values['FReqNo']);
            $('#JobDateISD').text(fullDate(values['FReqDate']));
            $('#emp_name').text(values['emp_name']);//ชื่อผู้แจ้ง
            $('#brn_name').text(values['brn_name']);//สาขา
            $('#FTel').text(values['FTel']);//เบอรโทร
            $('#fnc_name').text(values['fnc_name']);//หน่วยงาน
            $('#sec_nameThai').text(values['sec_nameThai']);//แผนก
			
			if(values['FAsset_no']!=null){
                $('#FAsset_no').text(values['FAsset_no']);//เลขที่ทัพย์สิน
			}else{
                $('#FAsset_no').text('-');//เลขที่ทัพย์สิน
			}
			
            $('#FInf_no').text(values['FInf_no']);//เลขที่อ้างอิง
            $('#FSerial').text(values['FSerial']);//Serail No
            $('#brn_place').text(values['FBranchName']+"["+values['comp_code']+"]");//สาขาที่ติดตั้ง
            $('#FLocation').text(values['FLocation']);//อาคาร / สถานที่
            $('#FFloor').text(values['FFloor']);//ชั้น
            $('#FRoom').text(values['FRoom']);//ห้อง
            $('#FRepairGroupName').text(values['FRepairGroupName']);//ขอแจ้งซ่อม
            $('#FRepairGroupItemName').text(values['FRepairGroupItemName']);//รายการซ่อม
            $('#FDetail').html(values['FDetail']);//รายละเอียด / ปัญหา
			
			
            $('#FReciveDate').text(fullDate(values['FReciveDate']));//วันที่รับเรื่อง
            $('#FDueDate').text(fullDate(values['FDueDate']));//วันที่กำหนดเสร็จ
            $('#FJobresultLabel').html('[&#10004;]&nbsp;'+values['FJobresultLabel']);//การทำงาน
			 if(values['FReam']=="Y"){$('#FReam').html('[&#10004;]');
			 }else{$('#FReam').html('[&nbsp;]&nbsp;');}
            
            if(values['FLevelName'] != null){
                $('#FLevelName').html('[&#10004;]&nbsp;'+values['FLevelName']);//ระดับความสำคัญ
            }
			$('#FCharge_contractorLabel').text(values['FCharge_contractorLabel']);//เพิ่มเก็บค่าใช้จ่ายผู้รับเหมา(แพร)
			

          
            if(values['approve_date'] != null){
                $('#FApproveManager_name').text("("+values['FManagerName']+")");
                $('#manager_signature').attr('src',chk_locatSign(values['signature'])); 
				$('#FApproveManager_date').text("วันที่อนุมัติ "+fullDate(values['approve_date'])+" ");
                $('.manager').show();
            }else{
				$('#FApproveManager_name').text("("+values['FManagerName']+")");
                $('#FApproveManager_date').text("วันที่อนุมัติ.................................");
                $('.manager').show();
			}
            
            if(values['FLapAmt'] != null && values['FPartAmt'] !=""){
                $('#FLapAmt').text(parseFloat(values['FLapAmt']).toLocaleString(undefined,{minimumFractionDigits: 2, maximumFractionDigits: 2}));//ค่าแรง
            }else{
                $('#FLapAmt').text(0);
            }
            
            if(values['FPartAmt'] != null && values['FPartAmt'] !=""){
                $('#FPartAmt').text(parseFloat(values['FPartAmt']).toLocaleString(undefined,{minimumFractionDigits: 2, maximumFractionDigits: 2}));//ค่าอะไหล่
            }else{
                $('#FPartAmt').text(0);
            }   

            TotalAmt = values['FLapAmt'] + values['FPartAmt'];
            //console.log(TotalAmt);

            if(TotalAmt != 0){
                    var FLapAmt;
                    var FPartAmt;

                    if(values['FLapAmt'] == null || values['FLapAmt'] == ""){
                        FLapAmt = 0;
                    }else{
                        FLapAmt = parseFloat(values['FLapAmt']);
                    }

                    if(values['FPartAmt'] == null || values['FPartAmt'] == ""){
                        FPartAmt = 0;
                    }else{
                        FPartAmt = parseFloat(values['FPartAmt']);
                    }

                    TotalSum = FLapAmt + FPartAmt;

                    TotalAll = TotalSum;

                    //console.log(FLapAmt + FPartAmt);
                  
               
            }else{
                $('#TotalAmt').text(0);
            }
           
           
           

            $('#FEditDate').text(fullDate(values['FEditDate']));//วันที่เริ่มแก้ไข
            $('#FFinishDate').text(fullDate(values['FFinishDate']));//วันที่เสร็จ
            $('#FOth_detail').html(values['FOth_detail']);//วิเคราะห์ปัญหา

            if(values['FApprove'] != null && values['FApproveManager_status'] != null){
                $('#manager_signature').html('<img src=\"'+chk_locatSign(values['manager_signature'])+'\" class=\"img-fluid\" width=\"100px\">');//ลายเช็นผู้จัดการ
                $('#FApproveManager_name').text("("+values['FApproveManager_name']+")");//ชื่อผู้จัดการ
                $('#FApproveManager_date').text(fullDate(values['FApproveManager_date']));//วันที่ผู้จัดการอนุมัติ
            }
            
       })

		var c=0;	
        $.each(rep.listOrderType,function(orderTypeKeys,orderTypeValues){
        
            
            if(orderTypeValues['FPrice'] == null && orderTypeValues['FPrice'] == ""){
                unitPrice = 0;
            }else{
                unitPrice += parseFloat(orderTypeValues['FPrice']);
            }

		    c++;
            orderTable +="<div class=\"row\">";
            orderTable += " <div class=\"col-md-8 col-6\">"+c+".&nbsp;"+orderTypeValues['FItems']+'&nbsp;'+orderTypeValues['FAmount']+'&nbsp;'+orderTypeValues['FUnit']+"</div>";
            orderTable += " <div class=\"col-md-4 col-6\" >&nbsp;"+ parseFloat(orderTypeValues['FPrice']).toLocaleString(undefined,{minimumFractionDigits: 2, maximumFractionDigits: 2}) +"&nbsp;บาท</div>";
            orderTable +="</div></div>";
       })

       SumAll = parseFloat(TotalAll) + parseFloat(unitPrice);

       $('#TotalAmt').text(TotalAll.toLocaleString(undefined,{minimumFractionDigits: 2, maximumFractionDigits: 2}));//รวมเป็นเงินจำนวน

        $('#detailFPartAmt').html(orderTable);
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
        $.post('../../api/controller/mt.php?status=Approve&FRequestID='+FRequestID,function(rep){
            //console.log(rep);
            if(rep == 2){
                alert('อนุมัติใบแจ้งซ่อมเรียบร้อย');
                //console.log($('#JobStatus').val());
                window.location.href="../../listDetail.php?status=MT";
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
              $.post('../../api/controller/mt.php?status=Modify&FRequestID='+FRequestID+'&Comment='+ModifyText,function(rep){
                  //console.log(rep);
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
              $.post('../../api/controller/mt.php?status=NotApprove&FRequestID='+FRequestID+'&Comment='+ModifyText,function(rep){
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