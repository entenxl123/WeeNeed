$(function(){
        //alert(555);
        var loading = "<div class='text-center' "
        $('#preload').show();
        $('#endload').hide();
        var statusApprove = $('#statusListApprove').val();

        // ! ของดีมีนบอก
        let searchParams = new URLSearchParams(window.location.search)
        // searchParams.has('sent') // true
        let status = searchParams.get('status');
        // alert(status)
        //GET READ SAMPLE
        $.get('api/controller/pr.php?status=Read',function(rep){
            //console.log(rep);
        });
    
        if(statusApprove == "PR"){
            //GET DATA PR
            $.getJSON('api/controller/pr.php?status=Read',function(rep){
                $('#preload').hide();
                $('#endload').show();
                //console.log(rep);
                var listPR = "";
                var pad = "0000";
                $.each(rep,function(keys,values){
                    //console.log(values);
                    if(values['cancel_remark'] !="" && values['cancel_remark'] !=null){
                        var return_comment = " ( <strong>เหตุผลการตีกลับ</strong> " + values['cancel_remark']+" ) ";
                    }else{
                        var return_comment = " ";
                    }
                            listPR += "<a href='report/pr/report_pr.php?pr_id="+values['pr_id']+"' class='list-group-item list-group-item-action flex-column align-items-start pb-4 mb-2'>";
                                listPR += "<div class='d-flex w-100 justify-content-between'>";
                                    listPR += "<h5 class='mb-1'>PR: "+ values['Perfix_code']+values['pr_year']+"/"+ pad.substring(0,pad.length - values['pr_no'].length) + values['pr_no'] +"</h5>";
                                    listPR += "<small> วันที่ร้องขอ "+ formatDate(values['pr_date']) +"</small>";
                                listPR += "</div>";
                                listPR += "<p class='mb-1'>"+ values['pr_remark'] +"</p>";
                                listPR += "<small class='text-justify'>"+values['sec_nameThai']+"</small> <br/>";
                                listPR += "<small class='text-justify'>"+ return_comment +"</small> <br/>";
                                listPR += "<button  class='btn btn-outline-danger btn-sm float-right'>รายละเอียด</button>";
                                listPR += "<br/>";
                              listPR += "</a>";
                });

                $('#listDetail').html(listPR);
               
            });
        }
	
	  $.get('api/controller/AT.php?status=Read',function(rep){
            //console.log(rep);
        });
		
		if(statusApprove == "AT"){
            //GET DATA PR
            $.getJSON('api/controller/AT.php?status=Read',function(rep){
                $('#preload').hide();
                $('#endload').show();
                // console.log(rep);
                var listAT = "";
                var pad = "0000";
                $.each(rep,function(keys,values){
                    //console.log(values);
                    //if(values['cancel_remark'] !="" && values['cancel_remark'] !=null){
                        //var return_comment = " ( <strong>เหตุผลการตีกลับ</strong> " + values['cancel_remark']+" ) ";
                    //}else{
                        //var return_comment = " ";
                    //}
                            listAT += "<a href='report/AT/report_AT.php?Sup_id="+values['Sup_id']+"' class='list-group-item list-group-item-action flex-column align-items-start pb-4 mb-2'>";
                                listAT += "<div class='d-flex w-100 justify-content-between'>";                                
								listAT += "<h5 class='mb-1'>("+values['set_company']+") อะไหล่: "+ values['set_brn']+" "+ values['num_run_full']+"</h5>";
                                listAT += "<small> วันที่ร้องขอ "+ formatDate(values['sup_date']) +"</small>";
                                listAT += "</div>";
								listAT += "<small > บริษัท "+values['sup_cus_name'] +"</small> <br/>";
								listAT += "<small class='text-justify'>"+values['set_brn']+" "+values['sup_job']+" "+values['rgn_no']+"</small> <br/>";
                                listAT += "<button  class='btn btn-outline-danger btn-sm float-right'>รายละเอียด</button>";
                                listAT += "<br/>";
                             listAT += "</a>";
                });

                $('#listDetail').html(listAT);  
            });
        }

        if(statusApprove == "ISD"){
             //GET DATA ISD
             $.getJSON('api/controller/isd.php?status=Read',function(rep){
                //console.log(rep);
                $('#preload').hide();
                $('#endload').show();
                var listISD = "";
               
                $.each(rep,function(keys,values){
                    //console.log(values);
                    if(values['emp_return_comment'] !="" && values['emp_return_comment'] !=null){
                        var return_comment = " ( <strong>เหตุผลการตีกลับ</strong> " + values['emp_return_comment']+" ) ";
                    }else{
                        var return_comment = " ";
                    }
                    listISD += "<a href='report/isd/report_isd.php?FRequestID="+values['FRequestID']+"' class='list-group-item list-group-item-action flex-column align-items-start pb-4 mb-2'>";
                        listISD += "<div class='d-flex w-100 justify-content-between'>";
                        listISD += "<h5 class='mb-1'>ISD: "+ values['FReqNo']+"</h5>";
                        listISD += "<small> วันที่ร้องขอ "+ formatDate(values['FReqDate']) +"</small>";
                        listISD += "</div>";
                        listISD += "<p class='mb-1'>"+ values['FCondition'].substring(0,50) +".........</p>";
                        listISD += "<small class='text-justify'>"+values['sec_nameThai']+"</small> <br/>";
                        listISD += "<small class='text-justify'>"+ return_comment +"</small>";
                        listISD += "<button  class='btn btn-outline-danger btn-sm float-right'>รายละเอียด</button>";
                        listISD += "<br/>";
                    listISD += "</a>";
                });

                $('#listDetail').html(listISD);
            });
        }

        if(statusApprove == "PO"){
            //GET DATA ISD
            $.getJSON('api/controller/po.php?status=Read',function(rep){
               //console.log(rep);
               $('#preload').hide();
               $('#endload').show();
               var listPO = "";
               $.each(rep,function(keys,values){
                   //console.log(values);
                   if(values['cancel_remark'] !="" && values['cancel_remark'] !=null){
                    var return_comment = " ( <strong>เหตุผลการตีกลับ</strong> " + values['cancel_remark']+" ) ";
                    }else{
                        var return_comment = "&nbsp;";
                    }
                   listPO += "<a href='report/po/report_po.php?po_id="+values['po_id']+"' class='list-group-item list-group-item-action flex-column align-items-start p-4 mb-2'>";
                        listPO += "<div class='d-flex w-100 justify-content-between'>";
                        listPO += "<h5 class='mb-1'>("+values['comp_codeimport']+") PO: "+ values['code_full']+"</h5>";
                        listPO += "<small> วันที่ร้องขอ "+ formatDate(values['po_create_date']) +"</small>";
                        listPO += "</div>";
                        listPO += "<p class='mb-1'>"+ values['po_remark'] +"</p>";
                        listPO += "<small > บริษัท "+values['FVen_name'] +"</small> <br/>";
                        listPO += "<small>"+ return_comment +"</small>";
                        listPO += "<button  class='btn btn-outline-danger btn-sm float-right'>รายละเอียด</button>";
                        listPO+= "<br/>";
                   listPO += "</a>";
               });

               $('#listDetail').html(listPO);
           });
       }
	   
	   if(statusApprove == "CM"){
             //GET DATA ISD
             $.getJSON('api/controller/cm.php?status=Read',function(rep){
                //console.log(rep);
                $('#preload').hide();
                $('#endload').show();
                var listCM = "";
                $.each(rep,function(keys,values){
                    //console.log(values);
                    if(values['FDetail_cancel'] !="" && values['FDetail_cancel'] !=null){
                        var return_comment = " ( <strong>เหตุผลการตีกลับ</strong> " + values['FDetail_cancel']+" ) ";
                    }else{
                            var return_comment = "&nbsp;";
                    }
                    listCM += "<a href='report/cm/report_cm.php?FRequestID="+values['FRequestID']+"' class='list-group-item list-group-item-action flex-column align-items-start p-4 mb-2'>";
                        listCM += "<div class='d-flex w-100 justify-content-between'>";
						listCM += "<h5>เลข ENG : "+ values['FRequestNo']+"</h5>";
						listCM += "<br/>";
                        listCM += "<small> วันที่ร้องขอ "+ formatDate(values['FRequestDate']) +"</small>";
                        listCM += "</div>";
						listCM += "<small class='text-justify'>เรื่อง : "+ values['FRequestTitle_user']+"</small><br/>";
						listCM += "<small class='text-justify'>"+values['sec_nameThai']+"</small><br/>";
                        listCM += "<small class='text-justify'>"+values['brn_name']+"</small><br/>";
                        listCM += "<small>"+ return_comment +"</small>";
                        listCM += "<button  class='btn btn-outline-danger btn-sm float-right'>รายละเอียด</button>";
                        listCM += "<br/>";
                    listCM += "</a>";
                });

                $('#listDetail').html(listCM);
            });
        }
		

		if(statusApprove == "MT"){
             //GET DATA ISD
             $.getJSON('api/controller/mt.php?status=Read',function(rep){
                //console.log(rep);
                $('#preload').hide();
                $('#endload').show();
                var listMT = "";
                $.each(rep,function(keys,values){
                 //  console.log(values);
					//alert(values['FRequestID']);
					if(values['FRequestID']!='' && values['FRequestID']!=undefined){
                    listMT += "<a href='report/mt/report_mt.php?FRequestID="+values['FRequestID']+"' class='list-group-item list-group-item-action flex-column align-items-start p-4 mb-2'>";
                        listMT += "<div class='d-flex w-100 justify-content-between'>";
                        listMT += "<h5 class='mb-1'>MT: "+ values['FReqNo']+"</h5>";
                        listMT += "<small> วันที่ร้องขอ "+ formatDate(values['FReqDate']) +"</small>";
                        listMT += "</div>";
                        listMT += "<p class='mb-1'>"+ values['FDetail'] +"</p>";
                        listMT += "<small>"+values['sec_nameThai']+"</small>";
                        listMT += "<button  class='btn btn-outline-danger btn-sm float-right'>รายละเอียด</button>";
                        listMT += "<br/>";
                    listMT += "</a>";
					
					}else if(values['Fdoc_app_id']!='' && values['Fdoc_app_id']!=undefined){
						 listMT += "<a href='report/mt/report_mtDoc.php?Fdoc_app_id="+values['Fdoc_app_id']+"' class='list-group-item list-group-item-action flex-column align-items-start p-4 mb-2'>";
                        listMT += "<div class='d-flex w-100 justify-content-between'>";
                        listMT += "<h5 class='mb-1'>เอกสารขอความเห็นชอบและอนุมัติเลขที่: "+ values['Fdoc_app_no']+"</h5>";
                        listMT += "<small> วันที่ร้องขอ "+ formatDate(values['Fdoc_app_date']) +"</small>";
                        listMT += "</div>";
                        listMT += "<p class='mb-1'>"+ values['Fdoc_app_project'] +"</p>";
                        listMT += "<small>"+values['Fdoc_app_name']+"</small>";
                        listMT += "<button  class='btn btn-outline-danger btn-sm float-right'>รายละเอียด</button>";
                        listMT += "<br/>";
                    listMT += "</a>";
					   
					}
					
                });

                $('#listDetail').html(listMT);
            });
        }

        if(status='QMS'){
            $.getJSON('api/controller/QMS.php?status=Read',function(rep){
                $('#preload').hide();
                $('#endload').show();
                console.log(rep);
                $.each(rep,function(keys,values){
                    $('#listDetail').append(`<a href='report/approve_ISO/report_ISO.html?DID=${values.id_document}' class='list-group-item list-group-item-action flex-column align-items-start p-4 mb-2'>
                    <div class='d-flex w-100 justify-content-between'>
                    <h5 class='mb-1'>(${chk_comp(values.comp_code)}) : เอกสาร ${values.Doc_name}</h5>
                    <small> วันที่ร้องขอ ${convert_date(values.date_send)}</small>
                    </div>
                    <p class='mb-1'>รหัสเอกสาร : ${values.Doc_code}</p>
                    <small></small>
                    <button  class='btn btn-outline-danger btn-sm float-right'>รายละเอียด</button>
                    <br/>
                    </a>`);
                       //alert(values['FRequestID']);
                       
                       
                   });
                //    $('#listDetail').html(listMT);
            })
        }



        //BUTTON LOGOUT
        $("#signOut").on('click',function(){
            $.ajax({
                url:'logout.php?status=logOut',
                success:function(rep){
                    if(rep==1){
                        location.href='index.html'
                    }
                }
            })
        })

})

const convert_date = (date) => {
    split_date = date.split("-");
    var true_date = split_date[2]+'/'+split_date[1]+'/'+split_date[0]
    return true_date;
}

const chk_comp = (comp_code) => {
    comp_code = comp_code || 'All comp';
    return comp_code;
}