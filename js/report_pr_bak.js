$(function(){
    $("#CMS").hide();
    $("#OTHER").hide();
    $('#preload').show();
    $('#endload').hide();
    var pr_id = $('#pr_id').val();
    var pathName = window.location.origin;

    var viewReport = $('#statusView').val();
    var viewReportApp = $('#statusViewApp').val();
    $('#back_page').hide();
    if(viewReport == "view"){
        $('#view_approve').hide();
        $('#back_page').show();
    }

    if(viewReportApp == "approvecenter"){
        $('#view_approve').hide();
        $('#back_page').hide();
        $('#navPR').hide();
    }

    
    $('#btn-back').on('click',function(){
        window.history.back();
    })


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
	
	

    //CHECK VALUSE
    $.get("../../api/controller/pr.php?status=ReadOrderTable&pr_id="+pr_id,function(rep){
        //console.log(rep);
    })


   
    //READ COMPANY
    $.getJSON('../../api/controller/pr.php?status=ReadCompany',function(rep){
        //console.log(rep);
        $.each(rep,function(keys,values){
            //console.log(values.comp_name);
            $("#subTopicCompany").text("ใบขออนุมัติสั่งซื้อ (PR)");
        })
    
    })



    //READ ORDER
    $.getJSON("../../api/controller/pr.php?status=ReadOrder&pr_id="+pr_id,function(rep){
        //console.log(rep);
        $('#preload').hide();
        $('#endload').show();
        var approvTable = "";
        var jobISD = "";

       
        var pad = "0000"; 
    
        $.each(rep,function(keys,values){
           //console.log(values);

            //About contract
           if(values.Perfix_code == "CMS"){
               $("#CMS").show();
               $("#OTHER").hide();
           }else{
                $("#CMS").hide();
                $("#OTHER").show();
           }

           //Detail order
            $('#Perfix_code').text(values.Perfix_code+" "+values.pr_year+"/"+ pad.substring(0,pad.length - values['pr_no'].length) +  values['pr_no']);
            $('#pr_date').text(formatDate(values.pr_date));
            $('#sec_name_by').text(values.sec_name_By);
            $('#fnc_name_by').text(values.fnc_name_By);
            $('#brn_name_by').text(values.brn_name_By);
            $('#sec_name_to').text(values.sec_name_To);
            $('#fnc_name_to').text(values.fnc_name_To);
            $('#brn_name_to').text(values.brn_name_To);
            $('#pr_remark').text(values.pr_remark);
            $("#topicCompany").text(values.comp_name);
            //$('#prefix').text(values.Perfix_code2+" "+values.Perfix_notype);

            if(viewReportApp != "approvecenter"){
                if(values.Perfix_refer == "CMS"){
                    $('#prefix').html("<a href='../cm/report_cm.php?statusView=view&FRequestID="+values.FRequestID_Perfix_codetype+"'>"+values.Perfix_refer+" "+values.Perfix_notype+"</a>");
                }else if(values.Perfix_refer == "MTS"){
                    $('#prefix').html("<a href='../mt/report_mt.php?statusView=view&FRequestID="+values.FRequestID_Perfix_codetype+"'>"+values.Perfix_refer+" "+values.Perfix_notype+"</a>");
                }else if(values.Perfix_refer == "PRS"){

                }else if(values.Perfix_refer == "QMS"){

                }else if(values.Perfix_refer == "ISD"){
                    $('#prefix').html("<a href='../isd/report_isd.php?statusView=view&FRequestID="+values.FRequestID_Perfix_codetype+"'>อ้างอิงถึง "+ values.Perfix_refer+" "+values.Perfix_notype +"</a>");
                }
            }else{
                if(values.Perfix_refer == "CMS"){
                    $('#prefix').html("<a href='#'>"+values.Perfix_refer+" "+values.Perfix_notype+"</a>");
                }else if(values.Perfix_refer == "MTS"){
                    $('#prefix').html("<a href='#'>"+values.Perfix_refer+" "+values.Perfix_notype+"</a>");
                }else if(values.Perfix_refer == "PRS"){

                }else if(values.Perfix_refer == "QMS"){

                }else if(values.Perfix_refer == "ISD"){
                    $('#prefix').html("<a href='#'>อ้างอิงถึง "+ values.Perfix_refer+" "+values.Perfix_notype +"</a>");
                }
            }


            //CHECKBOX
            if(values.job_policy != "0"){
                $('#job_policy').prop('checked',true);
                $('#job_policy_detail').text(values.policy_case+ " งบประมาณ " + values.policy_pay + " บาท ");
            }

            if(values.in_policy != "0"){
                $('#in_policy').prop('checked',true);
                $('#in_policypay').text(values.in_policypay+" บาท");
            }

            if(values.out_policy != "0"){
                $('#out_policy').prop('checked',true);
                $('#ov_budamt').text(values.ov_budamt+" บาท");
            }

            if(values.job_project != "0"){
                $('#job_project').prop('checked',true);
                $('#project_desc').text(values.project_desc);
            }

            if(values.job_activity != "0"){
                $('#job_activity').prop('checked',true)
                $('#activity_name').text(values.activity_name);
            }

            if(values.pay_other != "0"){
                $('#pay_other').prop('checked',true);
                $('#pay_other_remark').text(values.pay_ohter_remark);
            }

            if(values.estimate_main != "0"){
                $('#estimate_main').prop('checked',true);
            }

            if(values.estimate_main_in != "0"){
                $('#estimate_main_in').prop('checked',true);
            }

            if(values.estimate_main_out != "0"){
                $('#estimate_main_out').prop('checked',true);
            }

            if(values.pay_stock != "0"){
                $('#pay_stock').prop('checked',true);
            }

            if(values.pay_asset != "0"){
                $('#pay_asset').prop('checked',true);
            }

            if(values.pay_repair != "0"){
                $('#pay_repair').prop('checked',true);
            }

            $('#contractEmp').hide();
            $('#chiefEmp').hide();
            $('#approveEmp').hide();
            $('#emp_manager').hide();
            $('#empVice').hide();
            $('#emp_president').hide();
           //LIST APPROVE
           var contractEmpSign = "";
           var emp_chief_Sign = "";
           var approveEmp_Sign = "";
           var emp_manager_Sign = "";
           var emp_vice_Sign = "";
           var emp_president_Sign = "";
            if(values.contactEmpName != "" && values.contactEmpName != 0 && values.contactEmpName != null){
                
             $('#contractEmp').show();

                if(values.contactEmp_date !="" && values.contactEmp_date != 0 && values.contactEmp_date != null){
                    contractEmpSign = values.contactEmp_Signature;
                    $('#spanContractEmp').hide();
                    
                }else{
                    contractEmpSign = "";
                }
              
                var subSignEmp = contractEmpSign.split("http://10.2.1.233/");
                
                if(pathName == "http://10.2.1.233"){
                    $('#contractEmpSign').attr('src',contractEmpSign);
                }else{
                    if(contractEmpSign == ""){
                        $('#contractEmpSign').attr('src',contractEmpSign);
                    }else{
                        $('#contractEmpSign').attr('src','http://www.nontrcms.com/'+subSignEmp[1]);
                    }
                  
                }

                $('#contactEmpFullName').text("( "+values.contactEmpName+" )");
                $('#contractEmpDate').text(fullDate(values.contactEmp_date));
            
                $('#contactEmpName').val(values.contactEmpId);
            }

            if(values.emp_chief_name != "" && values.emp_chief_name != 0 && values.emp_chief_name != null){
                $('#chiefEmp').show();
               
                if(values.emp_chief_date !="" && values.emp_chief_date != 0 && values.emp_chief_date != null){
                    emp_chief_Sign = values.emp_chief_Signature;
                    $('#spanChiefEmp').hide();
                }else{
                    emp_chief_Sign = "";
                }

                var subSignChief = emp_chief_Sign.split("http://10.2.1.233/");
                if(pathName == "http://10.2.1.233"){
                    $('#emp_chief_Sign').attr('src',emp_chief_Sign);
                }else{
                    if (emp_chief_Sign == ""){
                        $('#emp_chief_Sign').attr('src',emp_chief_Sign);
                    } else {
                        $('#emp_chief_Sign').attr('src','http://www.nontrcms.com/'+subSignChief[1]);
                    }
                   
                }

                //$('#emp_chief_Sign').attr('src',emp_chief_Sign);
                $('#emp_chief_Name').text("( "+values.emp_chief_name+" )");
                $('#emp_chief_Date').text(fullDate(values.emp_chief_date));
                //console.log(values.emp_chief_Signature);
                
                $('#emp_chief_name').val(values.emp_chief_id);
            }
            if(values.approveEmpName != "" && values.approveEmpName != 0 && values.approveEmpName != null){
              
                $('#approveEmp').show();
             
                if(values.approveEmp_date !="" && values.approveEmp_date != 0 && values.approveEmp_date != null){
                    approveEmp_Sign = values.approveEmp_Signature;
                   $('#spanApproveEmp').hide();
                }else{
                    approveEmp_Sign = "";
                }

                var subSignApprove = approveEmp_Sign.split("http://10.2.1.233/");
                if(pathName == "http://10.2.1.233"){
                    $('#approveEmpSign').attr('src',approveEmp_Sign);
                }else{
                    if (approveEmp_Sign == ""){
                        $('#approveEmpSign').attr('src',approveEmp_Sign);
                    } else {
                        $('#approveEmpSign').attr('src','http://www.nontrcms.com/'+subSignApprove[1]);
                    }
                   
                }

                //$('#approveEmpSign').attr('src',approveEmp_Sign);
                $('#approveEmpName').text("( "+values.approveEmpName+" )");
                $('#approveEmpDate').text(fullDate(values.approveEmp_date));
                
                $('#approveEmpName').val(values.approveEmpId);
            }
            if(values.emp_manager_name != "" && values.emp_manager_name != 0 && values.emp_manager_name != null){
               
                $('#emp_manager').show();
                
                if(values.emp_manager_date !="" && values.emp_manager_date != 0 && values.emp_manager_date != null){
                    emp_manager_Sign = values.emp_manager_Signature;
                   $('#spanManagerEmp').hide();
                }else{
                    emp_manager_Sign = "";
                }

                var subSignManager = emp_manager_Sign.split("http://10.2.1.233/");
                if(pathName == "http://10.2.1.233"){
                    $('#emp_manager_Sign').attr('src',emp_manager_Sign);
                }else{
                    if(emp_manager_Sign == ""){
                        $('#emp_manager_Sign').attr('src',emp_manager_Sign);
                    } else {
                        $('#emp_manager_Sign').attr('src','http://www.nontrcms.com/'+subSignManager[1]);
                    }
                   
                }

                //$('#emp_manager_Sign').attr('src',emp_manager_Sign);
                $('#emp_manager_Name').text("( "+values.emp_manager_name+" )");
                $('#emp_manager_Date').text(fullDate(values.emp_manager_date));
                
                $('#emp_manager_name').val(values.emp_manager_id);
            }
            if(values.emp_vice_name != "" && values.emp_vice_name != 0 && values.emp_vice_name != null){
              
                $('#empVice').show();
            
                if(values.emp_vice_date !="" && values.emp_vice_date != 0 && values.emp_vice_date != null){
                    emp_vice_Sign = values.emp_vice_Signature;
                    $('#spanViceEmp').hide();
                }else{
                    emp_vice_Sign = "";
                }


                var subSignVice = emp_vice_Sign.split("http://10.2.1.233/");
                //console.log(subSignVice);
                if(pathName == "http://10.2.1.233"){
                    $('#emp_vice_Sign').attr('src',emp_vice_Sign);
                }else{
                        if(emp_vice_Sign == ""){
                            $('#emp_vice_Sign').attr('src',emp_vice_Sign);
                        }else{
                            $('#emp_vice_Sign').attr('src','http://www.nontrcms.com/'+subSignVice[1]);
                        }
                   
                }
                
                //$('#emp_vice_Sign').attr('src',emp_vice_Sign);
                $('#emp_vice_Name').text("( "+values.emp_vice_name+" )");
                $('#emp_vice_Date').text(fullDate(values.emp_vice_date));
               
                $('#emp_vice_name').val(values.emp_vice_id);
                //console.log(values.emp_vice_Signature);
            }

            if(values.emp_president_name != "" && values.emp_president_name != 0 && values.emp_president_name != null){
               
                $('#emp_president').show();
                if(values.emp_president_date !="" && values.emp_president_date != 0 && values.emp_president_date != null){
                    emp_president_Sign = values.emp_president_Signature;
                    $('#spanPersidentEmp').hide();
                }else{
                    emp_president_Sign = "";
                }



                var subSignPresident = emp_president_Sign.split("http://10.2.1.233/");
                if(pathName == "http://10.2.1.233"){
                    $('#emp_president_Sign').attr('src',emp_president_Sign);
                }else{
                    if(emp_president_Sign == ""){
                        $('#emp_president_Sign').attr('src',emp_president_Sign);
                    }else{
                        $('#emp_president_Sign').attr('src','http://www.nontrcms.com/'+subSignPresident[1]);
                    }
                    
                }

                //$('#emp_president_Sign').attr('src',emp_president_Sign);
                $('#emp_president_Name').text("( "+values.emp_president_name+" )");
                $('#emp_president_Date').text(fullDate(values.emp_president_date));
                //approvTable += "<li>ประธานบริหาร</li>";
                //approvTable += "<li><ul>><li><img  width='100px'src="+ emp_president_Sign +"></li><li>"+ values.emp_president_name +"</li><li>วันที่อนุมัติ " +  formatDate(values.emp_president_date) +"</li></ul></li>"; 
                $('#emp_president_name').val(values.emp_president_id);
            }
            // END LIST APPROVE
         
        })


        $('#listApprov').html(approvTable);


    })




    //READ ORDER TABLE
    $.getJSON("../../api/controller/pr.php?status=ReadOrderTable&pr_id="+pr_id,function(rep){
        //console.log(rep);
        var i=0;
       
        var orderTable = "";
        var sumOrder = 0;
        var totalOrder = 0;
        var totalDiscount = 0;
       

        //WHILE TOPIC
        $.each(rep.listOrderTopic,function(topicKeys,topicValues){
            orderTable += "<tr>";
                orderTable += "<td>&nbsp;</td>";
                orderTable += "<td>"+ topicValues['detail_top'] +"</td>";
                orderTable += "<td>&nbsp;</td>";
                orderTable += "<td>&nbsp;</td>";
                orderTable += "<td>&nbsp;</td>";
                orderTable += "<td>&nbsp;</td>";
                orderTable += "<td>&nbsp;</td>";
                orderTable += "<td>&nbsp;</td>";
            orderTable += "</tr>";
        })




        //WHILE TABLE
       $.each(rep.listOrder,function(middleKeys,middleValues){
            //console.log(middleValues);

                sumOrder = parseFloat(middleValues['order_amount_pr']) * parseFloat(middleValues['order_price_per_amount_pr']);
                totalOrder = parseFloat(totalOrder) + parseFloat(sumOrder);               
                orderTable += "<tr>";
                    orderTable += "<td class='text-center'>"+ ++i +"</td>";
                    orderTable += "<td class='text-left'>"+ middleValues['order_name']+"</td>";
                    orderTable += "<td class='text-center'>"+ parseFloat(middleValues['order_amount_pr']) +"</td>";
                    orderTable += "<td class='text-center'>"+ middleValues['order_unit'] +"</td>";
                    orderTable += "<td class='text-right'>"+ parseFloat(middleValues['order_price_per_amount_pr']).toLocaleString(undefined,{minimumFractionDigits: 2, maximumFractionDigits: 2}) +"</td>";
                    orderTable += "<td class='text-right'>"+ parseFloat(sumOrder).toLocaleString(undefined,{minimumFractionDigits: 2, maximumFractionDigits: 2}) +"</td>";
                    orderTable += "<td class='text-left'>"+ middleValues['order_remark'] +"</td>";
                    orderTable += "<td class='text-left'>"+ "[" +middleValues['account_de_code'] + "]"+ middleValues['market_de_name'] +"</td>";
                orderTable += "</tr>";





            //WHILE BOTTOM TABLE
            $.each(rep.listOrderID,function(keys,bottomValues){
                if(middleValues['order_id'] == bottomValues['order_id']){
                    //console.log(values);
                    orderTable += "<tr>";
                        orderTable += "<td class='text-center'>&nbsp;</td>";
                        orderTable += "<td class='text-left'>"+ bottomValues['detail']+"</td>";
                        orderTable += "<td class='text-center'>&nbsp;</td>";
                        orderTable += "<td class='text-center'>&nbsp;</td>";
                        orderTable += "<td class='text-center'>&nbsp;</td>";
                        orderTable += "<td class='text-center'>&nbsp;</td>";
                        orderTable += "<td class='text-center'>&nbsp;</td>";
                        orderTable += "<td class='text-center'>&nbsp;</td>";
                    orderTable += "</tr>";
                }
            })

        })



		
		//WHILE DISCOUNT
		 $.each(rep.listOrderDiscount,function(topicKeys,detailValues){
			if(detailValues['discount_price_per_amount']!='' || detailValues['discount_price_per_amount']!='0'){
            orderTable += "<tr>";
                orderTable += "<td>&nbsp;</td>";
                orderTable += "<td><u>รายละเอียด</u></td>";
                orderTable += "<td>&nbsp;</td>";
                orderTable += "<td>&nbsp;</td>";
                orderTable += "<td>&nbsp;</td>";
                orderTable += "<td>&nbsp;</td>";
                orderTable += "<td>&nbsp;</td>";
                orderTable += "<td>&nbsp;</td>";
            orderTable += "</tr>";
			orderTable += "<tr>";
                orderTable += "<td>&nbsp;</td>";
                orderTable += "<td>"+ detailValues['discount_name'].toLocaleString(undefined,{minimumFractionDigits: 2, maximumFractionDigits: 2}) +"</td>";
                orderTable += "<td>&nbsp;</td>";
                orderTable += "<td>&nbsp;</td>";
                orderTable += "<td>&nbsp;</td>";
                orderTable += "<td class='text-right'>"+ detailValues['discount_price_per_amount'].toLocaleString(undefined,{minimumFractionDigits: 2, maximumFractionDigits: 2}) +"</td>";
                orderTable += "<td>&nbsp;</td>";
                orderTable += "<td>&nbsp;</td>";
            orderTable += "</tr>";
			}
        })
		
        
        //console.log(rep.listOrderDiscount.length);
        if(rep.listOrderDiscount.length !=""){
            totalDiscount = rep.listOrderDiscount[0].discount_price_per_amount;
        }


        //SUMTOTAL
        orderTable += "<tr>";
            orderTable += "<td colspan='2'>&nbsp;</td>";
            orderTable += "<td class='text-center' colspan='3'>รวม</td>";
            orderTable += "<td class='text-right'>"+ parseFloat(totalOrder).toLocaleString(undefined,{minimumFractionDigits: 2, maximumFractionDigits: 2}) +"</td>";
        orderTable += "</tr>";
        //DISCOUNT TABLE
        orderTable += "<tr>";
            orderTable += "<td colspan='2'>&nbsp;</td>";
            orderTable += "<td class='text-center' colspan='3'>ส่วนลด</td>";
            orderTable += "<td class='text-right'>"+ totalDiscount.toLocaleString(undefined,{minimumFractionDigits: 2, maximumFractionDigits: 2}) +"</td>";
        orderTable += "</tr>";
        //TOTALTABLE
        orderTable += "<tr>";
            orderTable += "<td colspan='2'>&nbsp;</td>";
            orderTable += "<td class='text-center' colspan='3'>รวมทั้งสิ้น</td>";
            orderTable += "<td class='text-right'>"+ (parseFloat(totalOrder) - parseFloat(totalDiscount)).toLocaleString(undefined,{minimumFractionDigits: 2, maximumFractionDigits: 2}) +"</td>";
        orderTable += "</tr>";

        //ID TABLE
        $('#orderTable tbody').append(orderTable);
    })





    
    $.getJSON("../../api/controller/pr.php?status=ReadOrderTable&pr_id="+pr_id,function(rep){
        //console.log(rep);
        var j = 0;
        var tick3 = "";
        var tick7 = "";
        var price = "";
        $.each(rep.listVender,function(venderKeys,venderValues){
            //console.log(venderValues);

            if(venderValues['vat_paid3'] == 3){
                tick3 = "&#10004;";
            }else{
                tick3 = "";
            }

            if(venderValues['vat_paid7'] == 7){
                tick7 = "&#10004;";
            }else{
                tick7 = "";
            }

            if(venderValues['price'] == 0){
                price = "";
            }else{
                price = parseFloat(venderValues['price']).toLocaleString(undefined,{minimumFractionDigits: 2, maximumFractionDigits: 2});
            }

            venderTable += "<tr>";
                venderTable += "<td class='text-center'>"+ ++j +"</td>";
                venderTable += "<td>"+ venderValues['vender_bid_name'] + "</td>";
                venderTable += "<td class='text-center'>"+ venderValues['vender_bid_vat'] + "</td>";
                venderTable += "<td class='text-center'>"+  tick3  + "</td>";
                venderTable += "<td class='text-center'>"+  tick7 + "</td>";
              
                venderTable += "<td>"+ venderValues['notes_vende'] + "</td>";
            venderTable += "</tr>";
        })

        $("#venderTable tbody").append(venderTable);
    })


    var pathName = window.location.origin;
    $.getJSON('../../api/controller/pr.php?status=readFile&pr_id='+pr_id+'&pathName='+pathName,function(rep){
        //console.log(rep);
        var listFile = "";
        $.each(rep,function(keys,values){
            listFile += "<li class='list-group-item'><a href='"+values['listFile']+"' target='_blank' download>"+values['listName']+"</a></li>";
        })

        $('#fileAttached').append(listFile);
    })


    $.getJSON("../../api/controller/pr.php?status=ReadCancel&pr_id="+pr_id,function(rep){
       //console.log(rep);
       var listCancel = "";
       var i = 1;

       
       $.each(rep,function(keys,values){
            listCancel += "<tr>";
                listCancel += "<td>"+ i++ + "</td>";
                listCancel += "<td>"+ values['remark'] +"</td>";
                listCancel += "<td>"+ values['emp_name'] +"</td>";
               
                listCancel += "<td>"+ changeDate(values['date_insert']) +"</td>";
            listCancel += "</tr>";
       })

       $('#Reason tbody').append(listCancel);
    });


})



function changeDate(data){
    var tmp = data.split(" ");
    var fullDate = formatDate(tmp[0]);
    var fullTime = tmp[1];
    var formatFullDate = fullDate+" "+fullTime;
    return formatFullDate;

}


function formatDate(data){
    var tmp = data.split("-");
    var changeDate = tmp[2]+"/"+tmp[1]+"/"+tmp[0];

    return changeDate;
}