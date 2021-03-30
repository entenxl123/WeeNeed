$(function(){
    /*$.get('../../api/controller/po.php?status=testOrder&po_id='+$('#po_id').val(),function(rep){
        console.log(rep);
    });*/

    var pathName = window.location.origin;

    var viewReportApp = $('#statusViewApp').val();
    if(viewReportApp == "approvecenter"){
        $('#view_approve').hide();
        $('#navPR').hide();
    }

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


    $.getJSON('../../api/controller/po.php?status=ReadOrderPo&po_id='+$('#po_id').val(),function(rep){
        //console.log(rep);
        $('#preload').hide();
        $('#endload').show();
        
        var orderTable = "";
        var i = 0;
        var sumOrder = 0;
        var discount = 0;
        var vat = 0;
        var totalSum = 0
        var totalVat = 0;
        var total = 0;
        var endTotal = 0;
        var discount_aftervat = 0;
        var prefix_code_count = [];
        $.each(rep.listPO,function(keys,values){

            //console.log(values);
           
            
            $('#FContact_name').text(values['FContact_name']);
            $('#po_create_date').text(formatDate(values['po_create_date']));
            $('#FVen_name').text(values['FVen_name']);
            $('#FVen_tel').text(values['FVen_tel']);
            $('#FVen_fax').text(values['FVen_fax']);
            $('#code_full').text(values['code_full']);
            $('#deliver_date_manual').text(formatDate(values['deliver_date_manual']));
            $('#po_discount').text(parseFloat(values['po_discount']).toLocaleString(undefined,{minimumFractionDigits: 2, maximumFractionDigits: 2}));
            $('#vat').text(values['vat'])
            $('#discount_aftervat').text("("+parseFloat(values['discount_aftervat']).toLocaleString(undefined,{minimumFractionDigits: 2, maximumFractionDigits: 2})+")");
            $('#pay_type_name').text(values['pay_type_name']);
            $('#brn_name').text(values['brn_name']);
            $('#emp_name_po').text(values['emp_name_po']);
            $('#emp_gas_name').text(values['emp_gas_name']);
            $('#emp_chief_name').text(values['emp_chief_name']);
            $('#emp_vice_name').text(values['emp_vice_name']);


            if(viewReportApp != "approvecenter"){
                if(values.Perfix_code == "CMS"){
                        prefix_code_count.push("<a href='../cm/report_cm.php?statusView=view&FRequestID="+values.FRequestID_Perfix_codetype+"'>อ้างอิงถึง "+values.Perfix_code+" "+values.Perfix_notype+"</a><br/>");
                }else if(values.Perfix_code == "MTS" ){
                        prefix_code_count.push("<a href='../mt/report_mt.php?statusView=view&FRequestID="+values.FRequestID_Perfix_codetype+"'>อ้างอิงถึง "+values.Perfix_code+" "+values.Perfix_notype+"</a><br/>");    
                }else if(values.Perfix_code == "PRS"){
                        prefix_code_count.push("<a href='../pr/report_pr.php?statusView=view&FRequestID="+values.FRequestID_Perfix_codetype+"'>อ้างอิงถึง "+values.Perfix_code+" "+values.Perfix_notype+"</a><br/>");
                }else if(values.Perfix_code == "QMS" ){
        
                }else if(values.Perfix_code == "ISD" ){
                        prefix_code_count.push("<a href='../isd/report_isd.php?statusView=view&FRequestID="+values.FRequestID_Perfix_codetype+"'>อ้างอิงถึง "+ values.Perfix_code+" "+values.Perfix_notype +"</a><br/>")
                }
            }else{
                if(values.Perfix_code == "CMS"){
                    prefix_code_count.push("<a href='#'>อ้างอิงถึง "+values.Perfix_code+" "+values.Perfix_notype+"</a><br/>");
                }else if(values.Perfix_code == "MTS" ){
                        prefix_code_count.push("<a href='#'>อ้างอิงถึง "+values.Perfix_code+" "+values.Perfix_notype+"</a><br/>");    
                }else if(values.Perfix_code == "PRS"){
                        prefix_code_count.push("<a href='#'>อ้างอิงถึง "+values.Perfix_code+" "+values.Perfix_notype+"</a><br/>");
                }else if(values.Perfix_code == "QMS" ){
        
                }else if(values.Perfix_code == "ISD" ){
                        prefix_code_count.push("<a href='#'>อ้างอิงถึง "+ values.Perfix_code+" "+values.Perfix_notype +"</a><br/>")
                }
            }    

        

           
            if(values['emp_gas_date'] != null && values['emp_gas_date'] !=0 && values['emp_gas_date'] !=""){
                if(pathName == "http://10.2.1.233"){
                    $('#emp_gas_sign').html("<img width='100px' src='"+values['emp_gas_signature']+"'>");
                }else{
                    var subGass = values['emp_gas_signature'].split("http://10.2.1.233/");
                    if(values['emp_gas_signature'] == ""){
                        $('#emp_gas_sign').html("<img width='100px' src='"+values['emp_gas_signature']+"'>");
                    }else{
                        $('#emp_gas_sign').html("<img width='100px' src='http://www.nontrcms.com/"+subGass[1]+"'>");
                    }
                }

                //console.log("http://www.nontrcms.com/"+subGass[1]);
                
                $('#emp_gas_date').text(fullDate(values['emp_gas_date']));
            }
            if(values['emp_chief_date'] != null && values['emp_chief_date'] !=0 && values['emp_chief_date'] !=""){


                if(pathName == "http://10.2.1.233"){
                    $('#emp_chief_sign').html("<img width='100px' src='"+values['emp_chief_signature']+"'>");
                }else{
                    var subChief = values['emp_chief_signature'].split("http://10.2.1.233/");
                    if(values['emp_chief_signature'] == ""){
                        $('#emp_chief_sign').html("<img width='100px' src='"+values['emp_chief_signature']+"'>");
                    }else{
                        $('#emp_chief_sign').html("<img width='100px' src='http://www.nontrcms.com/"+subChief[1]+"'>");
                    }
                }
                
                //$('#emp_chief_sign').html("<img width='100px' src='"+values['emp_chief_signature']+"'>");
                $('#emp_chief_date').text(fullDate(values['emp_chief_date']));
            }
            if(values['emp_vice_date'] != null && values['emp_vice_date'] !=0 && values['emp_vice_date'] !=""){

                if(pathName == "http://10.2.1.233"){
                    $('#emp_vice_sign').html("<img width='100px' src='"+values['emp_vice_signature']+"'>");
                }else{
                    var subVice = values['emp_vice_signature'].split("http://10.2.1.233/");
                    if(values['emp_vice_signature'] == ""){
                        $('#emp_vice_sign').html("<img width='100px' src='"+values['emp_vice_signature']+"'>");
                    }else{
                        $('#emp_vice_sign').html("<img width='100px' src='http://www.nontrcms.com/"+subVice[1]+"'>");
                    }
                }


                //$('#emp_vice_sign').html("<img width='100px' src='"+values['emp_vice_signature']+"'>");
                $('#emp_vice_date').text(fullDate(values['emp_vice_date']));
            }

            if(values['checkbox1'] != 0 && values['checkbox1'] !=""){
                $('#reciveMySelf').prop('checked',true);
            }else{
                $('#reciveOther').prop('checked',true);
            }

            discount = values['po_discount'];
            vat = values['vat'];
            discount_aftervat = values['discount_aftervat'];
        })

        $('#prefix').append(prefix_code_count);



        $.each(rep.listEmployee,function(keys,values){
            $('#emp_name').text(values['emp_name']);
            $('#Perfix_tel_to').text(values['Perfix_tel_to']);
            $('#Perfix_fax_To').text(values['Perfix_fax_To']);
        })

        $.each(rep.listOrderTop,function(topicKeys,topicValues){
            orderTable += "<tr>";
                orderTable += "<td>&nbsp;</td>";
                orderTable += "<td>"+ topicValues['detail_top'] +"</td>";
                orderTable += "<td>&nbsp;</td>";
                orderTable += "<td>&nbsp;</td>";
                orderTable += "<td>&nbsp;</td>";
            orderTable += "</tr>";
        })


        $.each(rep.listOrderDetail,function(keys,values){
            //console.log(values);
            orderTable += "<tr>";
                orderTable += "<td>"+ ++i + "</td>";
                orderTable += "<td>"+ values['order_name'] + "</td>";
                orderTable += "<td class='text-left'>"+ parseFloat(values['order_amount']).toLocaleString(undefined,{minimumFractionDigits: 2, maximumFractionDigits: 2}) + " " + values['order_unit'] + "</td>";
                orderTable += "<td class='text-right'>"+ parseFloat(values['order_price_per_amount']).toLocaleString(undefined,{minimumFractionDigits: 2, maximumFractionDigits: 2}) + "</td>";
                orderTable += "<td class='text-right'>"+ (parseFloat(values['order_amount']) * parseFloat(values['order_price_per_amount'])).toLocaleString(undefined,{minimumFractionDigits: 2, maximumFractionDigits: 2}) + "</td>";
                if (values['order_note'] != null && values['order_note'] !="") {
                    orderTable += "<td clas='text-left'>"+values['order_note']+"</td>";
                }else{
                    orderTable += "<td clas='text-left'>&nbsp;</td>";
                }
                if(viewReportApp != "approvecenter"){
                orderTable += "<td class='text-right'><a href='../pr/report_pr.php?statusView=view&pr_id="+values['pr_id']+"'>"+values['code_full']+"</a></td>";
                }else{
                    orderTable += "<td class='text-right'><a href='#'>"+values['code_full']+"</a></td>";   
                }
            orderTable += "</tr>";
            $.each(rep.listOrderBottom,function(bottomKeys,bottomValues){
                //console.log(bottomValues['detail'])
                if(values['order_id'] == bottomValues['order_id']){
                    orderTable += "<tr>";
                        orderTable += "<td>&nbsp;</td>";
                        orderTable += "<td>"+bottomValues['detail'] +"</td>";
                        orderTable += "<td></td>";
                        orderTable += "<td></td>";
                        orderTable += "<td></td>";
                        orderTable += "<td></td>";
                        orderTable += "<td></td>";
                    orderTable += "</tr>";
                }
            })
            sumOrder = sumOrder + (parseFloat(values['order_amount']) * parseFloat(values['order_price_per_amount']));
            $('#sumOrder').text(sumOrder.toLocaleString(undefined,{minimumFractionDigits: 2, maximumFractionDigits: 2}));
            
        })

     

        $.each(rep.listBranchTax,function(keys,values){
            $('#addressCompany').text(values['brn_add1']);
        })

        $.each(rep.listBranchTax,function(keys,values){
            $('#taxCompany').text(values['tax_no']);
            $('#comp_name').text(values['comp_name']);
            $('#brn_add1').text(values['brn_add1']);
            $('#brn_tel').text(values['brn_tel']);
            $('#tax_no').text(values['tax_no']);
        })


        totalSum = (parseFloat(sumOrder) - parseFloat(discount));
		//console.log(parseInt(vat),vat);
		if(vat!=null){
        	totalVat = (parseFloat(totalSum) * parseInt(vat)) / 100;  
			total = parseFloat(totalSum) + parseFloat(totalVat); 
			
		}else{
			totalVat = 0;
			total = parseFloat(totalSum);
			
		}
		
		if(discount_aftervat!='0' || discount_aftervat!=null){
			endTotal = parseFloat(total); - parseFloat(discount_aftervat);
		}else{
			endTotal = parseFloat(total);
		}
       
       

        $('#totalSum').text(totalSum.toLocaleString(undefined,{minimumFractionDigits: 2, maximumFractionDigits: 2}));
		//$('#totalVat').val(totalVat.toFixed(2));	
        $('#totalVat').text(totalVat.toLocaleString(undefined,{minimumFractionDigits: 2, maximumFractionDigits: 2}));
			
        $('#total').text(total.toLocaleString(undefined,{minimumFractionDigits: 2, maximumFractionDigits: 2}));
        $('#endTotal').text(endTotal.toLocaleString(undefined,{minimumFractionDigits: 2, maximumFractionDigits: 2}));
        $("#orderPo tbody").append(orderTable);
    })


    var pathName = window.location.origin;

    $.getJSON('../../api/controller/po.php?status=readFile&po_id='+$('#po_id').val()+'&pathName='+pathName,function(rep){
        var listFile = "";
        $.each(rep,function(keys,values){
            listFile += "<li class='list-group-item'><a href='"+values['listFile']+"' target='_blank' download>"+values['listName']+"</a></li>";
        })

        $('#fileAttached').append(listFile);
    })


    $.getJSON("../../api/controller/po.php?status=ReadCancel&po_id="+$('#po_id').val(),function(rep){
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



