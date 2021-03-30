$(function(){
    /*$.get('../../api/controller/po.php?status=testOrder&po_id='+$('#po_id').val(),function(rep){
        console.log(rep);
    });*/

    var pathName = window.location.origin;

    var viewReportApp = $('#statusViewApp').val();
    if(viewReportApp == "approvecenter"){
        $('#view_approve').hide();
        $('#navAT').hide();
    }
//
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


    $.getJSON('../../api/controller/AT.php?status=ReadOrderAT&Sup_id='+$('#Sup_id').val(),function(rep){
		//alert($('#Sup_id').val());
          //console.log(rep);
		//console.log(rep.listAT);
        $('#preload').hide();
        $('#endload').show();
		
      $.each(rep,function(keys,values){
		  		//console.log(values['sup_credit']);
		        $('#sup_type').html(values['sup_type']);
				$('#num_run_full').html(values['brn_code']+values['num_run_full']);
				$('#sup_date').html(formatDate(values['sup_date']));
				$('#sup_cus_name').html(values['sup_cus_name']);
				$('#sup_job').html(values['sup_job']);
				$('#rgn_no').html(values['rgn_no']);
				$('#car_model').html(values['car_model']);
		  
			  if(values['sup_credit']=="1"){
					$('#credit').prop('checked',true);
				}

			  if(values['sup_credit']=="2"){
					$('#cash').prop('checked',true);
				}

			  if(values['sup_credit']=="3"){
					$('#Transfer_money').prop('checked',true);
				}

        	})
		
	   var orderTable = "";
       var i = 0;
	   var sum_price = 0;
       var sum_vat = 0;
	   var sumvat_except = 0;
	   var sum_dis = 0;	
	   var sum_total = 0; 

	  $.each(rep,function(keys,values){
		  //console.log(values['sup_list_part']+555555);
           
            orderTable += "<tr>";
              orderTable += "<td class='text-center'>"+ ++i + "</td>";
              orderTable += "<td>"+ values['sup_list_part']+ "</td>";
			  orderTable += "<td class='text-center'>"+ values['part_qty']+ "</td>";
			  orderTable += "<td>"+ values['part_order_name']+ "</td>";
			  orderTable += "<td>"+ values['parts_number']+ "</td>";
			  orderTable += "<td class='text-right'>"+parseFloat(values['price']).toLocaleString(undefined,{minimumFractionDigits: 2, maximumFractionDigits: 2})+"</td>";
			  orderTable += "<td class='text-center'>"+ values['dis']+" %</td>";
			  orderTable += "<td class='text-right'>"+parseFloat(values['vat']).toLocaleString(undefined,{minimumFractionDigits: 2, maximumFractionDigits: 2})+ "</td>";
		      orderTable += "<td class='text-center'>"+ values['cost']+" %</td>";
			  orderTable += "<td class='text-right'>"+parseFloat(values['vat_except']).toLocaleString(undefined,{minimumFractionDigits: 2, maximumFractionDigits: 2}) +"</td>";
			  orderTable += "<td class='text-center'>"+parseFloat(values['total']).toLocaleString(undefined,{minimumFractionDigits: 2, maximumFractionDigits: 2})+" %</td>";
            orderTable += "</tr>";
		  
		    sum_price = sum_price + (parseFloat(values['price']));
            $('#sum_price').text(sum_price.toLocaleString(undefined,{minimumFractionDigits: 2, maximumFractionDigits: 2}));
		  	sum_vat = sum_vat + (parseFloat(values['vat']));
            $('#sum_vat').text(sum_vat.toLocaleString(undefined,{minimumFractionDigits: 2, maximumFractionDigits: 2}));
		  	sumvat_except = sumvat_except + (parseFloat(values['vat_except']));
            $('#sumvat_except').text(sumvat_except.toLocaleString(undefined,{minimumFractionDigits: 2, maximumFractionDigits: 2}));
		  	sum_dis = sum_dis + (parseFloat(values['dis']));
            $('#sum_dis').text(sum_dis.toLocaleString(undefined,{minimumFractionDigits: 2, maximumFractionDigits: 2})+" %");
		    sum_total = sum_total + (parseFloat(values['total']));
            $('#sum_total').text(sum_total.toLocaleString(undefined,{minimumFractionDigits: 2, maximumFractionDigits: 2})+" %");
		  
		  
		    $('#emp_order_name').text(values['order_name']);
            $('#emp_check_name').text(values['check_name']);
		    $('#emp_say_name').text(values['say_name']);
		    $('#emp_chkp_name').text(values['chkp_name']);
		    $('#emp_ait_name').text(values['ait_name']);
		    $('#emp_aitmg_name').text(values['aitmg_name']);
		    $('#emp_mng_name').text(values['mng_name']);
		  //	console.log(values['emp_order_signature']+999);
		  // var sss ="http://10.2.1.233/signature/10155256.JPG";
		  
		  //---------------ผู้สั่งอะไหล่(แผนกบริการ)----------------//

		    if(values['emp_order_date'] != null && values['emp_order_date'] !=0 && values['emp_order_date'] !=""){
              if(pathName == "http://10.2.1.233"){
                    $('#emp_order_sign').html("<img width='100px' src='"+values['emp_order_signature']+"'>");
              }else{
                    var subGass = values['emp_order_signature'].split("http://10.2.1.233/");
                    if(values['emp_order_signature'] == ""){
                        $('#emp_order_sign').html("<img width='100px' src='"+values['emp_order_signature']+"'>");
                    }else{
                        $('#emp_order_sign').html("<img width='100px' src='http://www.nontrcms.com/"+subGass[1]+"'>");
                    }
              }	
              $('#emp_order_date').text(fullDate(values['emp_order_date']));
            }
		  
		  //---------------ผู้ตรวจสอบ(หน.ผู้บริหารงานบริการ)----------------//
		  
		   if(values['emp_check_date'] != null && values['emp_check_date'] !=0 && values['emp_check_date'] !=""){
              if(pathName == "http://10.2.1.233"){
                    $('#emp_check_sign').html("<img width='100px' src='"+values['emp_check_signature']+"'>");
              }else{
                    var subGass = values['emp_check_signature'].split("http://10.2.1.233/");
                    if(values['emp_check_signature'] == ""){
                        $('#emp_check_sign').html("<img width='100px' src='"+values['emp_check_signature']+"'>");
                    }else{
                        $('#emp_check_sign').html("<img width='100px' src='http://www.nontrcms.com/"+subGass[1]+"'>");
                    }
              }
			  $('#emp_check_date').text(fullDate(values['emp_check_date']));
            }
		  
		  //---------------ผู้รับสั่งอะไหล่(แผนกอะไหล่)----------------//
		  
		  	  //	console.log(values['emp_say_signature']+999);
		  
		   if(values['emp_say_date'] != null && values['emp_say_date'] !=0 && values['emp_say_date'] !=""){
              if(pathName == "http://10.2.1.233"){
                    $('#emp_say_sign').html("<img width='100px' src='"+values['emp_say_signature']+"'>"); 
              }else{
                    var subGass = values['emp_say_signature'].split("http://10.2.1.233/");
                    if(values['emp_say_signature'] == ""){
                        $('#emp_say_sign').html("<img width='100px' src='"+values['emp_say_signature']+"'>");
                    }else{
                        $('#emp_say_sign').html("<img width='100px' src='http://www.nontrcms.com/"+subGass[1]+"'>");
                    }
              }
			   $('#emp_say_date').text(fullDate(values['emp_say_date']));
            }
		  
		  
		  //---------------ผู้ตรวจสอบ(หน.แผนกอะไหล่)----------------//
		  
		  //console.log(values['emp_chkp_signature']+888999);
		  
		   if(values['emp_chkp_date'] != null && values['emp_chkp_date'] !=0 && values['emp_chkp_date'] !=""){
              if(pathName == "http://10.2.1.233"){
                    $('#emp_chkp_sign').html("<img width='100px' src='"+values['emp_chkp_signature']+"'>"); 
              }else{
                    var subGass = values['emp_chkp_signature'].split("http://10.2.1.233/");
                    if(values['emp_chkp_signature'] == ""){
                        $('#emp_chkp_sign').html("<img width='100px' src='"+values['emp_chkp_signature']+"'>");
                    }else{
                        $('#emp_chkp_sign').html("<img width='100px' src='http://www.nontrcms.com/"+subGass[1]+"'>");
                    }
              }
			   $('#emp_chkp_date').text(fullDate(values['emp_chkp_date']));
            }
		  
		  
		   //---------------ผู้อนุมัติ(ผช.ฝ่าย/แผนกบริการ)----------------//
		
		   if(values['emp_ait_date'] != null && values['emp_ait_date'] !=0 && values['emp_ait_date'] !=""){
              if(pathName == "http://10.2.1.233"){
                    $('#emp_ait_sign').html("<img width='100px' src='"+values['emp_ait_signature']+"'>"); 
              }else{
                    var subGass = values['emp_ait_signature'].split("http://10.2.1.233/");
                    if(values['emp_ait_signature'] == ""){
                        $('#emp_ait_sign').html("<img width='100px' src='"+values['emp_ait_signature']+"'>");
                    }else{
                        $('#emp_ait_sign').html("<img width='100px' src='http://www.nontrcms.com/"+subGass[1]+"'>");
                    }
              }
			   $('#emp_ait_date').text(fullDate(values['emp_ait_date']));
            }
		  
		  
		   //---------------ผู้อนุมัติ(ผช.ผจก/แผนกบริการ)----------------//
		
		   if(values['emp_aitmg_date'] != null && values['emp_aitmg_date'] !=0 && values['emp_aitmg_date'] !=""){
              if(pathName == "http://10.2.1.233"){
                    $('#emp_aitmg_sign').html("<img width='100px' src='"+values['emp_aitmg_signature']+"'>"); 
              }else{
                    var subGass = values['emp_aitmg_signature'].split("http://10.2.1.233/");
                    if(values['emp_aitmg_signature'] == ""){
                        $('#emp_aitmg_sign').html("<img width='100px' src='"+values['emp_aitmg_signature']+"'>");
                    }else{
                        $('#emp_aitmg_sign').html("<img width='100px' src='http://www.nontrcms.com/"+subGass[1]+"'>");
                    }
              }
			   $('#emp_aitmg_date').text(fullDate(values['emp_aitmg_date']));
            }
		  
		  
		   //---------------ผู้อนุมัติรองกรรมการผู้จัดการ----------------//
		  
		  if(values['emp_mng_date'] != null && values['emp_mng_date'] !=0 && values['emp_mng_date'] !=""){
              if(pathName == "http://10.2.1.233"){
                    $('#emp_mng_sign').html("<img width='100px' src='"+values['emp_mng_signature']+"'>"); 
              }else{
                    var subGass = values['emp_mng_signature'].split("http://10.2.1.233/");
                    if(values['emp_mng_signature'] == ""){
                        $('#emp_mng_sign').html("<img width='100px' src='"+values['emp_mng_signature']+"'>");
                    }else{
                        $('#emp_mng_sign').html("<img width='100px' src='http://www.nontrcms.com/"+subGass[1]+"'>");
                    }
              }
			   $('#emp_mng_date').text(fullDate(values['emp_mng_date']));
            }
	  	})

		 $("#orderAT tbody").append(orderTable);    
   })
	
		
    $.getJSON("../../api/controller/AT.php?status=ReadCancel&Sup_id="+$('#Sup_id').val(),function(rep){
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



