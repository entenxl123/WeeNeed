
$(document).ready(function(){
    $('.select_comp').select2();
    $('.select_brn').select2();
    
    let searchParams = new URLSearchParams(window.location.search)
    let master_id = searchParams.get('master_id');
    master_id = master_id || '';
    if(master_id != ''){
        get_editMaster(master_id);
        
    }
    // หาบริษัท
    $.getJSON("core/api_accept/controller/controller.php?status=get_company",function(res){
        $.each(res,function(index,items){
            $("#comp_id").append("<option value='"+items.comp_id+"'>"+""+items.comp_code+""+" - "+items.comp_name+"</option>");
        });
    });   
    // หาสาขาเมื่อเลือก บริษัทแล้ว
    $('#comp_id').change(function(){
        $.getJSON("core/api_accept/controller/controller.php?status=get_branch&comp_id="+$('#comp_id').val(),function(res){
            $.each(res,function(index,items){
                $("#brn_id").append("<option value='"+items.brn_id+"'>"+""+items.brn_code+""+" - "+items.brn_name+"</option>");
            });
        });
    });
})

async function save_doc_master() {
    let searchParams = new URLSearchParams(window.location.search)
    let master_id = searchParams.get('master_id');
    let id_Document = $('#id_Document').val();
    if($('#Doc_type').val()==''){
        alert('กรุณาเลือกประเภทเอกสาร');
        return false;
    }else if($('#Doc_order').val()==''){
        alert('กรุณาใส่ลำดับเอกสาร');
        return false;
    }else if($('#id_Document').val()==''){
        alert('กรุณาใส่หมายเลขเอกสาร');
        return false;
    }else if($('#name_Document').val()==''){
        alert('กรุณาใส่ชื่อเอกสาร');
        return false;
    }  
    var form = $('#form_save_approve')[0];
    var data = new FormData(form);
   
    if(master_id==null){
    
    $.ajax({          
        url:"core/api_accept/controller/controller_website.php?status=save_master_doc",
        type:"post",
        enctype:"multipart/form-data",
        data:data,
        processData:false,
        contentType:false,
        cache:false,
        timeout:600000,
        success: function(result) {
            
                    console.log(result);
                    if(result==1){
                        alert('บันทึกเรียบร้อย');
                        location.href = "show_approve.php?section=2";
                    }else if(result==10){
                        alert('หมายเลขเอกสาร กำลังใช่งานอยู่');
                    }else {
                        alert('บันทึกไม่สำเร็จ');
                    }
                    
                    
            }
        });
    }else{
        $.ajax({          
            url:"core/api_accept/controller/controller_website.php?status=edit_master_doc&master_id="+master_id,
            type:"post",
            enctype:"multipart/form-data",
            data:data,
            processData:false,
            contentType:false,
            cache:false,
            timeout:600000,
            success: function(result) {
                // alert(555);
                        console.log(result);
                        if(result==1){
                            alert('แก้ไขเรียบร้อย');
                            location.href = "show_approve.php?section=2";
                        }else{
                            alert('บันทึกไม่สำเร็จ');
                        }
                        
                        
                }
            });
    }
}

const get_brn_of_edit = (comp_id,brn_id) => {
    $.getJSON("core/api_accept/controller/controller.php?status=get_branch&comp_id="+comp_id,function(res){
        $.each(res,function(index,items){
            $("#brn_id").append("<option value='"+items.brn_id+"'>"+""+items.brn_code+""+" - "+items.brn_name+"</option>");
        });
        $('#brn_id').val(brn_id).select2() ;
    });
}

const get_editMaster = (master_id) => {
    axios.post("core/api_accept/controller/controller_website.php?status=get_Edit_master",{master_id})
    .then(res => {
        console.log(res.data)
        res.data.map(items => {
            
            console.log(items.Doc_order)
            document.getElementById('name_Document').value = items.Doc_Name;
            document.getElementById('id_Document').value = items.Doc_code;
            document.getElementById('Doc_type').value = items.Doc_type;
            document.getElementById('Doc_order').value = items.Doc_order;
            $('#comp_id').val(items.comp_id).select2() ;
            get_brn_of_edit($('#comp_id').val(),items.brn_id);
            // 
        })
    }).catch(error => {
        console.error(error);
    })
}

const go_back = () => {
    location.href = "show_approve.php?section=2";
}