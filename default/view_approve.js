

$(document).ready(function(){
    //$('#view_approve').DataTable();
    search_some_doc();
});    


const test_modal = (id) => {
    $.getJSON("core/api_accept/controller/controller_website.php?status=get_DataMakeDoc&id_doc="+id,function(res){    
        // alert(id);
        console.log(res);
        $.each(res,function(index,items){
            $("#id_to_send").val(items.id);
            $("#send_detail").text("คุณต้องการส่งการอนุมัติเอกสาร ["+items.Doc_code+"]-"+items.Doc_Name+" หรือไม่");
        })
       
    })
    
}
  
const edit_approve = (id) => {
    location.href = "update_approve.php?section=2&DID="+id;
    // alert(id);
}

const view_pdf = (file_pdf) => {
    alert(file_pdf);
}

const chk_value = (status) => {
    let check_status = status  || '-';
    return check_status;
}
   
const send_to_approver = () => {
    
    $.get("core/api_accept/controller/controller_website.php?status=send_to_approver&id_doc="+$("#id_to_send").val(),function(res){    
        console.log(res);
        location.reload();
    })
}

const get_Master_doc = (id) => {
    
    document.getElementById("btn_recive").style.visibility = "hidden";
    document.getElementById("word_show_web").style.visibility = "hidden";
    document.getElementById("ic_show_web").style.visibility = "hidden";
    document.getElementById("id_Doc").value = id;
    document.getElementById("show_approve_model").src = "show_doc_approve.html?DID="+id;
    axios.post("core/api_accept/controller/controller_website.php?status=check_approve_fin",{id})
        .then(res => {  
            console.log(res.data);
            res.data.map(items => {
                const status_show_web = items.status_show_web || 'N';
                console.log(status_show_web);
                if(items.status_approve == 'recive'){
                    document.getElementById("ic_show_web").style.visibility = "visible";
                    document.getElementById("word_show_web").style.visibility = "visible";
                   
                    if(status_show_web == 'Y'){
                        // 55555 ใช้ javascript ไม่แข็ง เลยสลับกับ JQuery
                         $("#show_web").prop( "checked", true );
                    }else{
                        $("#show_web").prop( "checked", false );;
                    }
                    
                }else if(items.status_approve == 'approve_fin'){
                    document.getElementById("btn_recive").style.visibility = "visible";
                    document.getElementById("ic_show_web").style.visibility = "hidden";
                }else{
                    document.getElementById("btn_recive").style.visibility = "hidden";
                    document.getElementById("ic_show_web").style.visibility = "hidden";
                }
            })
    }).catch(error => {
        console.error(error);
    })
}

const btn_recive = () => {
    const id_doc = document.getElementById("id_Doc").value;
    axios.post("core/api_accept/controller/controller_website.php?status=recive_doc",{id_doc})
        .then(res => {  
            console.log(res.data);
            location.reload();
    }).catch(error => {
        console.error(error);
    })
}
  
const modi_status = (status, num) => {
    status = status || '-';
    // console.log(num);
    if(status == '-'){
        return status;
    }else if(status == 'wait_approve'){
        return 'รอการอนุมัติ';
    }else if(status == 'approve_fin'){
        return 'อนุมัติครบแล้ว';
    }else if(status == 'Not_approve'){
        return 'ไม่อนุมัติ';
    }else if(status == 'recive'){
        return 'ยืนยันการอนุมัติ';
    }
}

const search_some_doc = () => {
    const type_doc = document.getElementById('type_doc').value;
    const status_doc = document.getElementById('status_doc').value;
    const insert_date = document.getElementById('insert_date').value;
    const Doc_date = document.getElementById('Doc_date').value;
    const Due_date = document.getElementById('Due_date').value;
    console.log('start');
    axios.post("core/api_accept/controller/controller_website.php?status=view_doc_approve",{type_doc,status_doc, insert_date, Doc_date, Due_date})
    .then(res => {  
    var num_Document =1;
    var table
    console.log(res.data);
        table = `<table class="table table-striped table-bordered nowrap" id="basic-btn" >
                    <thead id=head_show_approve name=head_show_approve >
                    <tr>
                                                                    <th>#</th>
                                                                    <th>รหัสเอกสาร</th>
                                                                    <th width="50%">ชื่อเอกสาร</th>
                                                                    <th>ฉบับที่</th>
                                                                    <th>ผู้อนุมัติ</th>
                                                                    <th>สถานะ</th>
                                                                    <th>วันที่สร้างเอกสาร</th>
                                                                    <th>วันที่ออกเอกสาร</th>
                                                                    <th>วันที่มีผลบังคับใช้</th>
                                                                    <th>เอกสาร</th>
                                                                    <th>แก้ไข</th>
                                                                    <th>ส่ง</th>
                                                                    </tr>
                </thead>
                <tbody >`;
        
                                                                
            res.data.map(items => {
                if(items.send_to_approve!='Y' ){
                        if(items.Doc_use == 'Y'){
                            table += `<tr>
                                            <td scope="row">${num_Document}</td>
                                            <td><center>${items.Doc_code}</center></td>
                                            <td class="test_cut">${items.Doc_Name}</td>
                                            <td><center>${items.Doc_edition}</center></td>
                                            <td><center>${chk_value(items.emp_name)}</center></td>
                                            <td class = "text-info text-center">${modi_status(items.status_approve, num_Document)}</td>
                                            <td><center>${convert_date(items.insert_date)}</center></td>
                                            <td><center>${convert_date(items.Doc_date)}</center></td>
                                            <td><center>${convert_date(items.Due_date)}</center></td>
                                            <td><center><button class="btn btn-primary btn-outline-primary" data-toggle="modal" onClick="get_Master_doc(${items.id})" data-target="#show_all_data"><i class="icofont icofont-list"></i>รายละเอียดเอกสาร</button></center></td>
                                            <td><center><button class="btn btn-warning btn-outline-warning" onclick="edit_approve(${items.id})"><i class="icofont icofont-ui-edit"></i>แก้ไข</button></center></td>
                                            <td><center>
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" onclick="test_modal(${items.id})"><i class="icofont icofont-location-arrow"></i>ส่ง</button></center></td>
                                        </tr>`;
                        }else{
                            table += `<tr>
                                        <td scope="row">${num_Document}</td>
                                        <td><center>${items.Doc_code}</center></td>
                                        <td class="test_cut">${items.Doc_Name}</td>
                                        <td><center>${items.Doc_edition}</center></td>
                                        <td><center>${chk_value(items.emp_name)}</center></td>
                                        <td class = "text-info text-center">${modi_status(items.status_approve, num_Document)}</td>
                                        <td><center>${convert_date(items.insert_date)}</center></td>
                                        <td><center>${convert_date(items.Doc_date)}</center></td>
                                        <td><center>${convert_date(items.Due_date)}</center></td>
                                        <td><center><button class="btn btn-primary btn-outline-primary" data-toggle="modal" onClick="get_Master_doc(${items.id})" data-target="#show_all_data"><i class="icofont icofont-list"></i>รายละเอียดเอกสาร</button></center></td>
                                        <td></td>
                                        <td></td>
                                      </tr>`
                               
                        }
                }else {
                    if(items.status_approve =='wait_approve'){
                        table += `<tr>
                                        <td scope="row">${num_Document}</td>
                                        <td><center>${items.Doc_code}</center></td>
                                        <td class="test_cut">${items.Doc_Name}</td>
                                        <td><center>${items.Doc_edition}</center></td>
                                        <td><center>คุณ ${chk_value(items.emp_name)}</center></td>
                                        <td class = "text-info text-center">${modi_status(items.status_approve, num_Document)}</td>
                                        <td><center>${convert_date(items.insert_date)}</center></td>
                                        <td><center>${convert_date(items.Doc_date)}</center></td>
                                        <td><center>${convert_date(items.Due_date)}</center></td>
                                        <td><center><button class="btn btn-primary btn-outline-primary" data-toggle="modal" onClick="get_Master_doc(${items.id})" data-target="#show_all_data"><i class="icofont icofont-list"></i>รายละเอียดเอกสาร</button></center></td>
                                        <td></td>
                                        <td></td>
                                    </tr>`;
                           
                    }else if(items.status_approve =='Not_approve'){
                        table += `<tr>
                                        <td scope="row">${num_Document}</td>
                                        <td><center>${items.Doc_code}</center></td>
                                        <td class="test_cut">${items.Doc_Name}</td>
                                        <td><center>${items.Doc_edition}</center></td>
                                        <td><center>คุณ ${chk_value(items.emp_name)}</center></td>
                                        <td class = "text-danger text-center">${modi_status(items.status_approve, num_Document)}</td>
                                        <td><center>${convert_date(items.insert_date)}</center></td>
                                        <td><center>${convert_date(items.Doc_date)}</center></td>
                                        <td><center>${convert_date(items.Due_date)}</center></td>
                                        <td><center><button class="btn btn-primary btn-outline-primary" data-toggle="modal" onClick="get_Master_doc(${items.id})" data-target="#show_all_data"><i class="icofont icofont-list"></i>รายละเอียดเอกสาร</button></center></td>
                                        <td></td>
                                        <td></td>
                                    </tr>`;
                            
                    }else if(items.status_approve =='approve_fin'){
                        table += `<tr>
                                    <td scope="row">${num_Document}</td>
                                    <td><center>${items.Doc_code}</center></td>
                                    <td class="test_cut">${items.Doc_Name}</td>
                                    <td><center>${items.Doc_edition}</center></td>
                                    <td><center>คุณ ${chk_value(items.emp_name)}</center></td>
                                    <td class = "text-primary text-center">${modi_status(items.status_approve, num_Document)}</td>
                                    <td><center>${convert_date(items.insert_date)}</center></td>
                                    <td><center>${convert_date(items.Doc_date)}</center></td>
                                    <td><center>${convert_date(items.Due_date)}</center></td>
                                    <td><center><button class="btn btn-primary btn-outline-primary" data-toggle="modal" onClick="get_Master_doc(${items.id})" data-target="#show_all_data"><i class="icofont icofont-list"></i>รายละเอียดเอกสาร</button></center></td>
                                    <td></td>
                                    <td></td>
                                  </tr>`;
                           
                    } else if(items.status_approve =='recive'){
                        table += `<tr>
                                        <td scope="row">${num_Document}</td>
                                        <td><center>${items.Doc_code}</center></td>
                                        <td class="test_cut">${items.Doc_Name}</td>
                                        <td><center>${items.Doc_edition}</center></td>
                                        <td><center>คุณ ${chk_value(items.emp_name)}</center></td>
                                        <td class = "text-success text-center">${modi_status(items.status_approve, num_Document)}</td>
                                        <td><center>${convert_date(items.insert_date)}</center></td>
                                        <td><center>${convert_date(items.Doc_date)}</center></td>
                                        <td><center>${convert_date(items.Due_date)}</center></td>
                                        <td><center><button class="btn btn-primary btn-outline-primary" data-toggle="modal" onClick="get_Master_doc(${items.id})" data-target="#show_all_data"><i class="icofont icofont-list"></i>รายละเอียดเอกสาร</button></center></td>
                                        <td></td>
                                        <td></td>
                                    </tr>`;
                          
                    }
                        }
                        
                        
            num_Document +=1;       
            })
           table += `</tbody></table>`;  
           document.getElementById('TableData').innerHTML =table ;
            // $("#TableData").append(table);
			$('#basic-btn').DataTable({
                "scrollX": true,
		        "scrollY": "500px",
  				"scrollCollapse": true,
                "processing": true,
                 "ordering": true,
                 "searching": true
            });
    }).catch(error => {
        console.error(error);
    })
    
    
}

const add_approve = () => {
    location.href = "update_approve.php?section=2";
}

const show_web = () => {
    var isChecked = $('#show_web').is(":checked");
    const status_show = isChecked ? 'Y' : 'N';
    const id_Doc = $('#id_Doc').val();
    // console.log(id_Doc)
        axios.post("core/api_accept/controller/controller_website.php?status=show_website",{id_Doc, status_show})
        .then(res => { 
            console.log(res.data)
         }).catch(error => {
             console.error(error);
         })
        
    
}

const convert_date = (date) => {
    var date_split = date.split('-') ;
    return date_split[2]+'/'+date_split[1]+'/'+date_split[0];
}