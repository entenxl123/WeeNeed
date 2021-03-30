
$(document).ready(function(){
//    alert('show')
    var num_brn =0;
    let searchParams = new URLSearchParams(window.location.search)
    // searchParams.has('sent') // true
    let Doc_type = searchParams.get('Doc_type');
   $('#add_document').click(function(){
      window.location.href = 'add_document.php?section=2';

   })
  });
  function checkAdult(age) {
    return age == 18;
  }

  function chk_brn(brn_id){
    if(brn_id == null){
      return '-';
    }
    return brn_id;

  }
  function thai_date(date){
    // alert(date==null)
    if(date!=null){
      var date_split = date.split("-");
      var thDate = date_split[2]+'/'+date_split[1]+'/'+date_split[0];
    return thDate;
    }
    return '-';
    
  }


  function delete_master_doc(){
    const master_id = document.getElementById('master_id').value;
    $.get("core/api_accept/controller/controller_website.php?status=delete_master_doc&Master_id="+master_id,function(res){    
      console.log(res);
      if(res==1){
        alert("ไม่สามารถลบได้เนื่องจาก เอกสารนี้มี การใช้งานอยู่");
      }else{
        alert("ลบเอกสารสำเร็จ");
        $('#delete_master').modal('hide');
        change_type();
      }
  })
}

const change_type = () => {
  const Doc_type = document.getElementById('Doc_type').value;
  const status_Doc = document.getElementById('status_doc').value;
  if(Doc_type==''){
    return false ;
  }
  document.getElementById('for_all_brn').innerHTML = 'สำหรับทุกสาขา'
  axios.post("core/api_accept/controller/controller_website.php?status=view_master_doc",{Doc_type, status_Doc})
  .then(res => { 
    console.log(res.data);
    var num_Document = 1;
    var doc_Array = {};
    document.getElementById("name_brn").innerHTML = ``;
    document.getElementById("another_brn").innerHTML =``;
    document.getElementById("show_approve").innerHTML = (` 
                                                            <th>#</th>
                                                            <th >รหัสเอกสาร</th>
                                                            <th class="col-6">ชื่อเอกสาร</th>
                                                            <th >สถานะ</th>
                                                            <th >แก้ไข</th>
                                                            <th >ลบ</th>
                                                        `);
    res.data.map(items => {
      if(items.brn_id == null){
        document.getElementById("show_approve").innerHTML += (`<tr>
                                        <th scope="row">${num_Document}</th>
                                        <td><center>${items.Doc_code}</center></td>
                                        <td>${items.Doc_Name}</td>
                                        <td >
                                          <label class="switch" id="ic_show_web">
                                          <input type="checkbox" id="Doc_use${items.id}" name="Doc_use${items.id}"  onchange="change_status('${items.id}', '${items.Doc_code}')">
                                          <span class="slider round" ></span>
                                          </label>
                                        </td>
                                        <td><center><button class="btn btn-warning"  onclick="edit_master_doc(${items.id})"><i class="icofont icofont-ui-edit"></i>แก้ไข</button></center></td>
                                        <td><center><button class="btn btn-primary btn-danger" data-toggle="modal" onClick="get_Master_doc(${items.id})" data-target="#delete_master"><i class="icofont icofont-trash"></i>ลบ</button></center></td>
                                    </tr>`);
        if(items.Doc_use=='Y'){  
          $("#Doc_use"+items.id).attr( "checked", true );
        }
        else{
          $("#Doc_use"+items.id).attr( "checked", false );
        }
                                  
        num_Document +=1;
      }else{
        if(doc_Array[items.brn_id]==undefined){
          doc_Array[items.brn_id] = 1;
          document.getElementById("name_brn").innerHTML += (`<a href="#${items.brn_id}" class="badge badge-info">${items.comp_code}-${items.brn_code}</a> `);
          document.getElementById("another_brn").innerHTML +=(` <br>
                                      <div id="${items.brn_id}" ><div>
                                      <div class="card-header" id="${items.brn_id}" >
                                      <h3 >${items.comp_code}-${items.brn_code}</h3>
                
                                      </div>
                                      <div class="card-block table-border-style">
                                      <div class="table-responsive">
                                      <table class="table table-bordered" >
                                      <thead><tr>
                                      <th>#</th>
                                      <th>ประเภทเอกสาร</th>
                                      <th class="col-6">ชื่อเอกสาร</th>
                                      <th >สถานะ</th>
                                      <th class="col-1">แก้ไข</th>
                                      <th class="col-1">ลบ</th>
                                    </tr></thead>
                                      <tbody id=show_approve${chk_brn(items.brn_id)}>
                                      </tbody>
                                  </table>
                                  <br>
                                  <hr>
                                  </div>
                                            </div>`);
        }
        // console.log(doc_Array[items.brn_id]);
        document.getElementById("show_approve"+items.brn_id).innerHTML+=(`<tr>
                                  <th scope="row">${doc_Array[items.brn_id]}</th>
                                  <td><center>${items.Doc_code}</center></td>
                                  <td class="cut-text">${items.Doc_Name}</td>
                                  <td >
                                      <label class="switch" id="ic_show_web">
                                      <input type="checkbox" id="Doc_use${items.id}" name="Doc_use${items.id}"  onchange="change_status('${items.id}', '${items.Doc_code}')">
                                      <span class="slider round" ></span>
                                  </label>
                                  </td>
                                  <td><center><button class="btn btn-warning"  onclick="edit_master_doc(${items.id})"><i class="icofont icofont-ui-edit"></i>แก้ไข</button></center></td>
                                  <td><center><button class="btn btn-primary btn-danger" data-toggle="modal" onClick="get_Master_doc(${items.id})" data-target="#delete_master"><i class="icofont icofont-trash"></i>ลบ</button></center></td>
                              </tr>`);
        if(items.Doc_use=='Y'){  
          $("#Doc_use"+items.id).attr( "checked", true );
        }
        else{
          $("#Doc_use"+items.id).attr( "checked", false );
        }
          doc_Array[items.brn_id] +=1;
      }
    })
    
     
  }).catch(error => {
      console.error(error);
  })
}

const add_master_doc = () => {
  location.href = "add_document.php?section=2";
}

const edit_master_doc = (id) => {
  location.href = "add_document.php?section=2&master_id="+id;
}

const get_Master_doc = (id) => {
  document.getElementById('master_id').value = id;
}

const change_status = (id, Doc_code) => {
  var master_id = id;
  var Doc_use_ck = document.getElementById('#Doc_use'+id);
  var isChecked = $('#Doc_use'+id).is(":checked");
  var Doc_use = isChecked ? 'Y' : 'N';
  // alert('55555');
  axios.post("core/api_accept/controller/controller_website.php?status=chang_Doc_use",{master_id, Doc_use, Doc_code})
        .then(res => { 
            console.log(res.data)
            if(res.data==0){  
              alert('เอกสารนี้เปิดใช่งานอยู่')
              $("#Doc_use"+id).prop( "checked", false );
              
            }
            
         }).catch(error => {
             console.error(error);
         })
  console.log(Doc_use)
}