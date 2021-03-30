$(document).ready(function(){
    var i=1;
    var num_approve = 0;
    var check_approver = 0;
    $('#num_approve').val(i);
    $('.Select_comp').select2();
    $('#doc_id').select2();
    console.log('1');
    $('.Select_brn').select2();
    $('.Select_emp').select2();
    $('#show_file_pdf').hide();
    $('#send_to_approve').hide();
    let searchParams = new URLSearchParams(window.location.search)
    // searchParams.has('sent') // true
    let DID = searchParams.get('DID'); // id ของ make_doc
    // alert(DID);
    
    // นำ master_doc มาให้เลือก
    $.getJSON("core/api_accept/controller/controller_website.php?status=get_data_master_doc",function(res){
         console.log('2');
         $.each(res,function(index,items){
            $("#doc_id").append("<option value='"+items.id+"'>"+"["+items.Doc_code+"]"+" - "+items.Doc_Name+"</option>");
        })
        if(DID!=''){
            setTimeout(get_data_Edit,500);
        }  
    });

    
    // เมื่อเลือก เอกสารจะนำ Doc_type ไปเก็บไว้ใน #doc_type
    $('#doc_id').change(function(){
        
        $.getJSON("core/api_accept/controller/controller_website.php?status=get_doc_type&Doc_id="+$('#doc_id').val(),function(res){
            // console.log(res);
            $.each(res,function(index,items){
                $('#doc_type').val(items.Doc_type);
                select_postion_duty(items.Doc_type);
         })    
       });
    })

    $.getJSON("core/api_accept/controller/controller.php?status=get_employee_name",function(res){
        $("#emp_id"+i).empty()
        $("#emp_id"+i).append("<option value=''>เลือกผู้อนุมัติ</option>");
        $.each(res,function(index,items){
            $("#emp_id"+i).append("<option value='"+items.emp_id+"'>"+"["+items.emp_code_full+"]"+" - "+items.emp_name+"</option>");
            })
        
        });
        $.getJSON("core/api_accept/controller/controller_website.php?status=get_Approval&Doc_type="+$("#Doc_type").val(),function(res){
            // alert('getJSON')
            // $("#emp_id").append("<option></option>");
            $("#select_duty"+i).empty()
           
            $("#select_duty"+i).append("<option value=''>เลือกหน้าที่</option>");
             $.each(res,function(index,items){
                // console.log(res);
                // $("#testJson").append(items.wordShow);
                $("#select_duty"+i).append("<option value='"+items.id+"'>"+" - "+items.wordShow+"</option>");
                })
            
            });
        $.getJSON("core/api_accept/controller/controller_website.php?status=get_Approval_position&Doc_type="+$("#Doc_type").val(),function(res){
                // alert('getJSON')
                // $("#emp_id").append("<option></option>");
                $("#select_position"+i).empty()
                $("#select_position"+i).append("<option value=''>เลือกตำแหน่ง</option>");
                 $.each(res,function(index,items){
                    // console.log(res);
                    $("#select_position"+i).append("<option value='"+items.id+"'>"+" - "+items.wordShow+"</option>");
                    })
                
                });

      $("#add_approve").click(function(){
        // if($("#emp_id"+i))
        
        if($("#emp_id"+i).val()!=''){
                check_approver=0;
                $("#text_alert_approve").empty()
                // alert($("#emp_id"+i).val());
                
                i+=1;
                $('#num_approve').val(i);
                    
                    
                $("#add_emp").append(`<div class="row row_apporve${i}">
                                        <label for="inputPassword" class="col-sm-1 col-form-label">ผู้อนุมัติ <br>คนที่ ${i}</label>
                                        <div class="col-sm-4">
                                        <select class="Select_emp col-sm-12"  name="emp_id${i}" id="emp_id${i}" style="width: 90%;" required>
                                        <option value=''>เลือกผู้อนุมัติ${i}</option>
                                            
                                        </select>
                                        </div>
                                        <label for="inputPassword" class="col-sm-1 col-form-label">หน้าที่</label>
                                        <div class="col-sm-2">
                                        <select class="select_duty form-control form-select-lg mb-2"  name="select_duty${i}" id="select_duty${i}"  aria-label="Default select example" required>
                                        <option value=''>เลือกหน้าที่</option>
                                            
                                        </select>
                                        </div>
                                        <label for="inputPassword"  class="col-sm-1 col-form-label">ตำแหน่ง</label>
                                        <div class="col-sm-2">
                                        <select class="select_position  form-control form-select-lg mb-3"  name="select_position${i}" id="select_position${i}" aria-label="Default select example" required>
                                            <option value=''>เลือกตำแหน่ง</option>
                                            
                                        </select>
                                        
                                        
                                        
                                        </div>
                                            </div>`);
                $('#emp_id'+i).select2();
                
                $.getJSON("core/api_accept/controller/controller.php?status=get_employee_name",function(res){
                    
                    // $("#emp_id").append("<option></option>");
                    $("#emp_id"+i).empty()
                    $("#emp_id"+i).append("<option value=''>เลือกผู้อนุมัติ</option>");
                    $.each(res,function(index,items){
                        // alert(items.emp_code_full)
                        //  console.log(res);
                        $("#emp_id"+i).append("<option value='"+items.emp_id+"'>"+"["+items.emp_code_full+"]"+" - "+items.emp_name+"</option>");
                        })
                    
                    });
                    $.getJSON("core/api_accept/controller/controller_website.php?status=get_Approval_duty&Doc_type="+$("#doc_type").val(),function(res){
                        // alert('getJSON')
                        // console.log(res)
                        $("#select_duty"+i).empty()
                        $("#select_duty"+i).append("<option value=''>เลือกหน้าที่</option>");
                        $.each(res,function(index,items){
                            // console.log(res);
                            // $("#testJson").append(items.wordShow);
                            $("#select_duty"+i).append("<option value='"+items.id+"'>"+" - "+items.wordShow+"</option>");
                            })
                        
                        });
                    $.getJSON("core/api_accept/controller/controller_website.php?status=get_Approval_position&Doc_type="+$("#doc_type").val(),function(res){
                            // alert('getJSON')
                            // $("#emp_id").append("<option></option>");
                            $("#select_position"+i).empty()
                            $("#select_position"+i).append("<option value=''>เลือกตำแหน่ง</option>");
                            $.each(res,function(index,items){
                                // console.log(res);
                                $("#select_position"+i).append("<option value='"+items.id+"'>"+" - "+items.wordShow+"</option>");
                                })
                            
                            });
                    

            }else{
                 if(check_approver==0){
                    $('#text_alert_approve').append(`***กรุณาใส่ชื่อ ผู้อนุมัติ`)
                    check_approver+=1;
                 }
                    
                   
                
                
            }

    });

    // ลบผู้อนุมัต
    $("#delete_approve").click(function(){
        if(i>1){
            $(".row_apporve"+i).remove()
            i-=1;
            $('#num_approve').val(i);
           
        }
      })

    $("#Doc_type").change(function(){
        //   alert('54545');
          var Doc_type=$("#Doc_type").val();
          select_postion_duty(Doc_type);
    });
     
    
    if(DID == null){ // insert
        
        $('#save_approve').click(function(){
            const num_approve = document.getElementById('num_approve').value;

            if($('#doc_id').val()==''){
                alert('กรุณาเลือกเอกสาร');
                return false;
            }else if($('#num_Document').val()==''){
                alert('กรุณาใส่ฉบับที่');
                return false;
            }else if($('#start_date').val()==''){
                alert('กรุณาวันทีออกเอกสาร');
                return false;
            }else if($('#end_date').val()==''){
                alert('กรุณาวันทีบังคับใช้');
                return false;
            }else if( document.getElementById("files_pdf2").files.length == 0 ){
                alert('กรุณาใส่ไฟล์');
                return false;
           }
           for(var i = 1 ; i<= num_approve ; i++){
            if($('#emp_id'+i).val()==''){
                alert('กรุณาใส่ชื่อผู้อนุมัติให้ครบ');
                return false;
            }else if($('#select_duty'+i).val()==''){
                alert('กรุณาใส่หน้าที่ให้ครบ');
                return false;
            }else if($('#select_position'+i).val()==''){
                alert('กรุณาใส่ตำแหน่งให้ครบ');
                return false;
            }
        }
           

            let doc_id2 = $('#doc_id').val() || 'test' ;
            //  alert(doc_id2);
            var form = $('#form_save_approve')[0];
            var data = new FormData(form);
            $.ajax({          
                url:"core/api_accept/controller/controller_website.php?status=save_approve",
                type:"post",
                enctype:"multipart/form-data",
                data:data,
                processData:false,
                contentType:false,
                cache:false,
                timeout:600000,
                success: function(result) {
                            if(result != 0){
                                console.log((result));
                                location.href = "update_approve.php?section=2&DID="+result;

                            }else{
                                alert('ไม่สามารถเพิ่มเอกสารได้ เนื่่องจากเอกสารรหัสนี้อยู่ในขั้นตอนอนุมัติ');
                            }
                            
                            
                    }
                });
        })
    }else{
        const num_approve = document.getElementById('num_approve').value;
        let searchParams = new URLSearchParams(window.location.search)
        let DID = searchParams.get('DID'); // id ของ make_doc
        $('#send_to_approve').show();
        $('#save_approve').click(function(){
            if($('#doc_id').val()==''){
                alert('กรุณาเลือกเอกสาร');
                return false;
            }else if($('#num_Document').val()==''){
                alert('กรุณาใส่ฉบับที่');
                return false;
            }else if($('#start_date').val()==''){
                alert('กรุณาวันทีออกเอกสาร');
                return false;
            }else if($('#end_date').val()==''){
                alert('กรุณาวันทีบังคับใช้');
                return false;
            }
           for(var i = 1 ; i<= num_approve ; i++){
            if($('#emp_id'+i).val()==''){
                alert('กรุณาใส่ชื่อผู้อนุมัติให้ครบ');
                return false;
            }else if($('#select_duty'+i).val()==''){
                alert('กรุณาใส่หน้าที่ให้ครบ');
                return false;
            }else if($('#select_position'+i).val()==''){
                alert('กรุณาใส่ตำแหน่งให้ครบ');
                return false;
            }
        }
            var form = $('#form_save_approve')[0];
            var data = new FormData(form);
            $.ajax({          
                url:"core/api_accept/controller/controller_website.php?status=save_edit_approve",
                type:"post",
                enctype:"multipart/form-data",
                data:data,
                processData:false,
                contentType:false,
                cache:false,
                timeout:600000,
                success: function(result) {
                            console.log(result);
                            location.href = "update_approve.php?section=2&DID="+DID;
                            
                            
                    }
                });
        })


        $.getJSON("core/api_accept/controller/controller_website.php?status=get_all_approver_Edit&DID="+DID,function(res){    
              
             $('#frist_approve').empty();
             i=0;
            //  console.log(res);
            $.each(res,function(index,items){ 
                // console.log(items)
                i+=1;
                $('#num_approve').val(i);
                $("#add_emp").append(`<div class="row row_apporve${i}">
                                        <label for="inputPassword" class="col-sm-1 col-form-label">ผู้อนุมัติ <br>คนที่ ${i}</label>
                                        <div class="col-sm-4">
                                        <select class="Select_emp col-sm-12"  name="emp_id${i}" id="emp_id${i}" style="width: 90%;" required>
                                        <option value=''>เลือกผู้อนุมัติ${i}</option>
                                            
                                        </select>
                                        </div>
                                        <label for="inputPassword" class="col-sm-1 col-form-label">หน้าที่</label>
                                        <div class="col-sm-2">
                                        <select class="select_duty form-control form-select-lg mb-2"  name="select_duty${i}" id="select_duty${i}"  aria-label="Default select example" required>
                                            <option value=''>เลือกหน้าที่</option>
                                            
                                        </select>
                                        </div>
                                        <label for="inputPassword"  class="col-sm-1 col-form-label">ตำแหน่ง</label>
                                        <div class="col-sm-2">
                                        <select class="select_position  form-control form-select-lg mb-3"  name="select_position${i}" id="select_position${i}" aria-label="Default select example" required>
                                            <option value=''>เลือกตำแหน่ง</option>
                                            
                                        </select>
                                        
                                        
                                        
                                        </div>
                                            </div>`);
                $('#emp_id'+i).select2();
                    // alert($("#emp_id"+i).val());
                    
                    
                
                   
                })
            });

    
    }
    
});



    function select_postion_duty(Doc_type){
        let searchParams = new URLSearchParams(window.location.search);
        let DID = searchParams.get('DID'); // id ของ master_doc
        $.getJSON("core/api_accept/controller/controller.php?status=get_employee_name",function(res){
            $(".Select_emp").empty()
            $(".Select_emp").append("<option value=''>เลือกผู้อนุมัติ</option>");
            $.each(res,function(index,items){
                $(".Select_emp").append("<option name='select_emp_id"+items.emp_id+"' id='select_emp_id"+items.emp_id+"' value='"+items.emp_id+"'>"+"["+items.emp_code_full+"]"+" - "+items.emp_name+"</option>");
                })
                if( DID!=null){
                    setTimeout(get_approveEdit,500);
                    console.log('end');
                }
            });

        $.getJSON("core/api_accept/controller/controller_website.php?status=get_Approval_duty&Doc_type="+Doc_type,function(res){
     
            $(".select_duty").empty()
            $(".select_duty").append("<option value=''>เลือกหน้าที่</option>");
            $.each(res,function(index,items){
                $(".select_duty").append("<option value='"+items.id+"'>"+" - "+items.wordShow+"</option>");
            })
        
        });
         $.getJSON("core/api_accept/controller/controller_website.php?status=get_Approval_position&Doc_type="+Doc_type,function(res){
            
            $(".select_position").empty();
            $(".select_position").append("<option value=''>เลือกตำแหน่ง</option>");
            $.each(res,function(index,items){
                $(".select_position").append("<option value='"+items.id+"'>"+" - "+items.wordShow+"</option>");
            })
            
        });

        
    }

    const  get_data_Edit = () => {
        let searchParams = new URLSearchParams(window.location.search);
        let DID = searchParams.get('DID'); // id ของ master_doc
        $.getJSON("core/api_accept/controller/controller_website.php?status=get_edit_make_doc&DID="+DID,function(res){    
            console.log('3'); 
            $.each(res,function(index,items){ 
                    $('#doc_make_id').val(items.id);
                    $('#doc_type').val(items.Doc_type);
                    // console.log(items.Master_doc_id);
                    $('#doc_id').val(items.Master_doc_id).select2();
                    $('#num_Document').val(items.Doc_edition);
                    $('#start_date').val(items.Doc_date);
                    $('#end_date').val(items.Due_date);
                    if(items.file_pdf!=''){
                        $('#show_file_pdf').show();
                        $('#show_file_pdf').attr('src',items.file_pdf);
                    }
                })
            
                select_postion_duty($('#doc_type').val());
            });
    }
    

    const get_approveEdit = () => {
        let searchParams = new URLSearchParams(window.location.search);
        let DID = searchParams.get('DID'); // id ของ master_doc
        $.getJSON("core/api_accept/controller/controller_website.php?status=get_all_approver_Edit&DID="+DID,function(res){    

        i=0;
       $.each(res,function(index,items){ 
           
            console.log('value')
            i+=1;  
            $('#emp_id'+i).val(items.emp_id).select2();
            // // console.log($("#emp_id"+i+"option[value='"+items.emp_id+"]'").attr("selected","selected"));
            $('#select_duty'+i).val(items.duty_id);
            $('#select_position'+i).val(items.position_id);
           })
          
       });
    }

    const send_to_approver = () => {
    
        let searchParams = new URLSearchParams(window.location.search)
        let DID = searchParams.get('DID'); // id ของ make_doc
        $.get("core/api_accept/controller/controller_website.php?status=send_to_approver&id_doc="+DID,function(res){    
            console.log(res);
            // location.href = "view_approve.php?section=2";
        })
    }

    const go_back = () => {
        location.href = "view_approve.php?section=2";
    }