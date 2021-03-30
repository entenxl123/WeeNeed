$(function(){

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

    $.getJSON('../../api/controller/isd.php?status=ReadOrder&FRequestID='+$('#FRequestID').val(),function(rep){
        //console.log(rep);
        var orderTable = "";
        var TotalAmt = 0;
        var detailRequest = [];
        var detailOrder = "";
       $.each(rep.listOrder,function(keys,values){
           //console.log(values);
            $('#JobISD').text("ISD " + values['FReqNo']);
            $('#JobDateISD').text(fullDate(values['FReqDate']));
            $('#emp_name').text(values['emp_name']);//ชื่อผู้แจ้ง
            $('#brn_name').text(values['brn_name']);//สาขา
            $('#FTel').text(values['FTel']);//เบอรโทร
            $('#fnc_name').text(values['fnc_name']);//หน่วยงาน
            $('#sec_nameThai').text(values['sec_nameThai']);//แผนก
            $('#FAsset_no').text(values['FAsset_no']);//เลขที่ทัพย์สิน
            $('#FInf_no').text(values['FInf_no']);//เลขที่อ้างอิง
            $('#FSerial').text(values['FSerial']);//Serail No
            $('#brn_place').text(values['FRepair_branch_name']+"["+values['comp_code']+"]");//สาขาที่ติดตั้ง
            $('#FLocation').text(values['FLocation']);//อาคาร / สถานที่
            $('#FFloor').text(values['FFloor']);//ชั้น
            $('#FRoom').text(values['FRoom']);//ห้อง
            $('#FDetail').html(values['FDetail']);//รายละเอียด / ปัญหา
            $('#FCondition').html(values['FCondition']);//เงื่อนไข / ข้อมูลที่ต้องการ
            $('#FReciveDate').text(fullDate(values['FReciveDate']));//วันที่รับเรื่อง
            $('#FDueDate').text(fullDate(values['FDueDate']));//วันที่กำหนดเสร็จ
            $('#FJobLevelName').text(values['FJobLevelName']);//ประเภทงาน
            $('#FLevelName').text(values['FLevelName']);//ระดับความสำคัญ
            $('#FJobresultLabel').text(values['FJobresultLabel']);//การทำงาน


            if(values['reg_type_oth'] == "Y"){
                $('#checkGeneral').prop('checked',true);
            }

            if(values['reg_type_newtops'] == "Y"){
                $('#checkNewtop').prop('checked',true);
                detailRequest.push({ 
                    "detailNewtop":[{
                             "reg_type_newtops":values['reg_type_newtops'],  
                             "emp_code_newtops":values['emp_code_newtops'],
                             "id_card_newtops":values['id_card_newtops'],
                             "emp_nameTh_newtops":values['emp_nameTh_newtops'],
                             "emp_naQMSg_newtops":values['emp_naQMSg_newtops'],
                             "emp_position_newtops":values['emp_position_newtops'],
                             "emp_adderss_newtops":values['emp_adderss_newtops'],
                             "emp_birthday_newtops":values['emp_birthday_newtops'],
                             "emp_copy_user_newtops":values['emp_copy_user_newtops']
                      }]
                });
            }

            if(values['reg_type_email'] == "Y"){
                $('#checkEmail').prop('checked',true);
                detailRequest.push({
                    "detailEmail":[{
                        "reg_type_email":values['reg_type_email'],
                        "emp_nameTh_email":values['emp_nameTh_email'],
                        "emp_naQMSg_email":values['emp_naQMSg_email']
                    }]
                })
            }

            if(values['reg_type_net'] == "Y"){
                $('#checkInternet').prop('checked',true);
                detailRequest.push({
                    "detailInternet":[{
                        "reg_type_net":values['reg_type_net'],
                        "emp_code_net":values['emp_code_net'],
                        "emp_reg_web_net":values['emp_reg_web_net']
                    }]
                })
            }

            if(values['reg_type_printer'] == "Y"){
                $('#checkPrinter').prop('checked',true);
            }






            if(values['FApprove'] != null && values['FApprove'] !="N"){
                $('#FApproveManager_name').text("("+values['FManagerName']+")");
                $('#manager_signature').text("ลงชื่อ...................................................");
                $('.manager').show();
            }
            
            if(values['FApprove_super'] != null && values['FApprove_super'] !="N"){
                $('#FApproveSuper_name').text("("+values['FSupervisorName']+")");
                $('#super_signature').text("ลงชื่อ...................................................");
                $('.super').show()
            }

            

            if(values['FLapAmt'] != null){
                $('#FLapAmt').text(parseFloat(values['FLapAmt']).toLocaleString(undefined,{minimumFractionDigits: 2, maximumFractionDigits: 2}));//ค่าแรง
            }else{
                $('#FLapAmt').text(0);
            }

            if(values['FPartAmt'] != null){
                $('#FPartAmt').text(parseFloat(values['FPartAmt']).toLocaleString(undefined,{minimumFractionDigits: 2, maximumFractionDigits: 2}));//ค่าอะไหล่
                
            }else{
                $('#FPartAmt').text(0);
            }       

            TotalAmt = values['FLapAmt'] +values['FPartAmt'];
            //console.log(TotalAmt);

            if(TotalAmt != 0){
                    var FLapAmt;
                    var FPartAmt;

                    if(values['FLapAmt'] == null){
                        FLapAmt = 0;
                    }else{
                        FLapAmt = parseFloat(values['FLapAmt']);
                    }

                    if(values['FPartAmt'] == null){
                        FPartAmt = 0;
                    }else{
                        FPartAmt = parseFloat(values['FPartAmt']);
                    }

                    TotalSum = FLapAmt + FPartAmt;

                    //console.log(FLapAmt + FPartAmt);
                $('#TotalAmt').text(TotalSum.toLocaleString(undefined,{minimumFractionDigits: 2, maximumFractionDigits: 2}));//รวมเป็นเงินจำนวน
            }else{
                $('#TotalAmt').text(0);
            }
           
           
           

            $('#FEditDate').text(fullDate(values['FEditDate']));//วันที่เริ่มแก้ไข
            $('#FFinishDate').text(fullDate(values['FFinishDate']));//วันที่เสร็จ
            $('#FReciveDetail').html(values['FReciveDetail']);//วิเคราะห์ปัญหา

            if(values['FApprove'] != null && values['FApproveManager_status'] != null && values['FApprove'] !="N"){
                $('#manager_signature').attr("src",values['manager_signature']);//ลายเช็นผู้จัดการ
                $('#FApproveManager_name').text("("+values['FApproveManager_name']+")");//ชื่อผู้จัดการ
                $('#FApproveManager_date').text(fullDate(values['FApproveManager_date']));//วันที่ผู้จัดการอนุมัติ
            }
            
            if(values['FApprove_super'] != null  && values['FApproveSuper_status'] !=null && values['FApprove_super'] !="N"){
                $('#super_signature').attr("src",values['super_signature']);//ลายเซ็นผู้อำนวยการ
                $('#FApproveSuper_name').text("("+values['FApproveSuper_name']+")");//ชื่อผู้อำนวยการ
                $('#FApproveSuper_date').text(fullDate(values['FApproveSuper_date']));//วันที่ผู้จัดการอนุมัติ
            }

       })


       $.each(rep.listOrderType,function(orderTypeKeys,orderTypeValues){
          // console.log(orderTypeValues);
            orderTable +="<span>";
                orderTable += " [&#10004;]"+orderTypeValues['FISDRepairType'];
            orderTable +="</span>";
          
       })


       $.each(detailRequest,function(keys,values){
           
            $.each(values['detailNewtop'],function(keyNewtop,valuesNewtop){
                //console.log(valuesNewtop);
                if(valuesNewtop['reg_type_newtops'] == "Y"){
                    detailOrder += "<h6><strong>ขอรหัส New Topserv</strong></h6> <br>";
                    detailOrder += "<strong>รหัสพนักงาน</strong> : "+valuesNewtop['emp_code_newtops']+"<br>";
                    detailOrder += "<strong>เลขบัตรประชาชน</strong> : "+valuesNewtop['id_card_newtops']+"<br>";
                    detailOrder += "<strong>ชื่อ - สกุล (ภาษาไทย)</strong> : "+valuesNewtop['emp_nameTh_newtops']+"<br>";
                    detailOrder += "<strong>ชื่อ - สกุล (ภาษาอังกฤษ)</strong> : "+ valuesNewtop['emp_naQMSg_newtops']+"<br>";
                    detailOrder += "<strong>ที่อยู่</strong> : "+ valuesNewtop['emp_adderss_newtops']+"<br>";
                    detailOrder += "<strong>วัน/เดือน/ปี เกิด</strong> : "+valuesNewtop['emp_birthday_newtops']+"<br>";
                    detailOrder += "<strong>สิทธิ์ผู้ใช้งานเหมือน</strong> : "+valuesNewtop['emp_copy_user_newtops']+"<br>";
                    detailOrder += "<hr>";
                }
            })

            $.each(values['detailEmail'],function(keyEmail,valuesEmail){
                //console.log(valuesEmail);
                if(valuesEmail['reg_type_email'] == "Y"){
                    detailOrder += "<h6><strong>ขอใช้ E-mail</strong></h6> <br>";
                    detailOrder += "<strong>ชื่อ - สกุล (ภาษาไทย)</strong> : "+valuesEmail['emp_nameTh_email']+"<br>";
                    detailOrder += "<strong>ชื่อ - สกุล (ภาษาอังกฤษ)</strong> : "+ valuesEmail['emp_naQMSg_email']+"<br>";
                    detailOrder += "<hr>";
                }
                
            })
          
            $.each(values['detailInternet'],function(keyInternet,valuesInternet){
                //console.log(valuesInternet);
                if(valuesInternet['reg_type_net'] == "Y"){
                    detailOrder += "<h6><strong>ขอใช้ Internet</strong></h6> <br>";
                    detailOrder += "<strong>รหัสพนักงาน</strong> : "+valuesInternet['emp_code_net']+"<br>";
                    detailOrder += "<strong>ใช้งานเว็บ</strong> : "+ valuesInternet['emp_reg_web_net']+"<br>";
                    detailOrder += "<hr>";
                }
            })
            
            //console.log(detailOrder);
            $('#typeDetail').html(detailOrder);
       })
       //console.log(detailRequest);


        $('#orderType').html(orderTable);
    })



    $.getJSON('../../api/controller/isd.php?status=ReadAttach&FRequestID='+$('#FRequestID').val(),function(rep){
        //console.log(rep);
        var listAttach = "";
        $.each(rep,function(keys,values){
            listAttach += "<ul>";
                listAttach += "<li> <a href='http://10.2.1.195/TNBSystems/isd_attachment/reqNo-"+values['FRequestID']+"/"+values['FAttachLink']+"' target='_black'>"+values['FAttachName']+"</a></li>";
            listAttach += "</ul>";
        })

        $('#listAttach').html(listAttach);
    });



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

        //console.log(FRequestID);
        $.post('../../api/controller/isd.php?status=Approve&FRequestID='+FRequestID,function(rep){
            //console.log(rep);
			//alert(rep);
            if(rep == 1 || rep == 2){
                alert('อนุมัติใบแจ้งซ่อมเรียบร้อย');
                //console.log($('#JobStatus').val());
                window.location.href="../../listDetail.php?status=ISD";
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
              $.post('../../api/controller/isd.php?status=Modify&FRequestID='+FRequestID+'&Comment='+ModifyText,function(rep){
                  //console.log(rep);
				  //alert(rep);
                  if(rep == 1){
                      alert('ดำเนินการตีกลับเพื่อแก้ไขเรียบร้อย');
                      window.location.href="../../listDetail.php?status=ISD";
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
              $.post('../../api/controller/isd.php?status=NotApprove&FRequestID='+FRequestID+'&Comment='+ModifyText,function(rep){
                 //console.log(rep);
                 if(rep == 1){
                    alert('ดำเนินการไม่อนุมัติเรียบร้อย');
                    window.location.href="../../listDetail.php?status=ISD";
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