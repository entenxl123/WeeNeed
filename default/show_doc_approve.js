(function() {
    let searchParams = new URLSearchParams(window.location.search)
    let DID = searchParams.get('DID');
    axios.post("core/api_accept/controller/controller_website.php?status=get_all_data_Master_doc",{DID})
        .then(res => {  
            console.log(res.data);
            res.data.map(items => {
                document.getElementById("comp_name").append(`${check_val(items.comp_name)}`);
                document.getElementById("brn_name").append(`${check_val(items.brn_name)}`);
                document.getElementById("sup_type").append(`(${items.Doc_code})  ${items.Doc_Name}`);
                document.getElementById("Doc_edition").append(`${items.doc_edition}`);
                document.getElementById("Doc_date").append(`${convert_date(items.Doc_date)}`);
                document.getElementById("Due_date").append(`${convert_date(items.Due_date)}`);
                document.getElementById("file_pdf").src =`${items.file_pdf}`;
            })
    }).catch(error => {
        console.error(error);
    })

    axios.post("core/api_accept/controller/controller_website.php?status=get_all_approver",{DID})
        .then(res => {  
            var num_approver = 1;
            var size_div;
            res.data.map(items => {
                size_div = 12/items.Max_level_approve;
                items.date_sign = items.date_sign || '-';
                items.detail_cancel = items.detail_cancel || '-';
                console.log(items.detail_cancel);
                if(items.date_sign == '-' &&  items.detail_cancel == '-' ){
                document.getElementById("Approver_emp").innerHTML += (`<div class="col-sm-${size_div} text-center"  >
                                                                                <div class="row">
                                                                                    <div class="col-md-12 "><span id="emp_aitmg_sign"></span></div>     
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col-md-12 "></div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col-md-12 "><span id="duty_id${num_approver}"></span></div>
                                                                                </div>
                                                                                <div class="row">
                                                                                <div class="form-group" id="signName${num_approver}" ><center> &nbsp; </center></div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    
                                                                                    <div class="col-md-12 ">
                                                                                    <div class="form-group" id="signName${num_approver}" style="padding-top:60px" ></div>
                                                                                    (<span id="">คุณ ${items.emp_name}</span>)</div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col-md-12 "><span id="position_id${num_approver}"></span></div>
                                                                                </div>
                                                                        </div>`);
                }else if(items.detail_cancel != '-' ){
                document.getElementById("Approver_emp").innerHTML += (`<div class="col-sm-${size_div} text-center"  >
                                                                                <div class="row">
                                                                                    <div class="col-md-12 "><span id="emp_aitmg_sign"></span></div>     
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col-md-12 "></div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col-md-12 "><span id="duty_id${num_approver}"></span></div>
                                                                                </div>
                                                                                <div class="row">
                                                                                <div class="form-group" id="signName${num_approver}"  ><center>&nbsp; </center></div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col-md-12 ">
                                                                                        <h5 class="" style="color:#FF0000;">เหตุผลไม่อนุมัติ : ${items.detail_cancel}</h5>
                                                                                        <br>
                                                                                        <p> ${chk_sign(items.date_sign)}</p>
                                                                                    </div>
                                                                                    <div class="col-md-12 ">
                                                                                    (<span id="">คุณ ${items.emp_name}</span>)
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col-md-12 "><span id="position_id${num_approver}"></span></div>
                                                                                </div>
                                                                        </div>`);
                }else{
                    document.getElementById("Approver_emp").innerHTML += (`<div class="col-sm-${size_div} text-center"  >
                                                                                <div class="row">
                                                                                    <div class="col-md-12 "><span id="emp_aitmg_sign"></span></div>     
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col-md-12 "></div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col-md-12 "><span id="duty_id${num_approver}"></span></div>
                                                                                </div>
                                                                                <div class="row">
                                                                                <div class="form-group" id="signName${num_approver}" ><center>&nbsp; </center></div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col-md-12 "><center><img src="${items.signature}"  width="80%" height=""></center>
                                                                                    <p> ${chk_sign(items.date_sign)}</p>
                                                                                    (<span id="">คุณ ${items.emp_name}</span>)
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col-md-12 "><span id="position_id${num_approver}"></span></div>
                                                                                </div>
                                                                            </div>`);
                }

                get_duty_position(items.duty_id,num_approver)
                get_duty_position(items.position_id,num_approver)
                num_approver+=1;
            })
    }).catch(error => {
        console.error(error);
    })

  
 
    const convert_date = (date) => {
        date = date || '-'
        if(date != '-'){
            split_date = date.split("-");
            var true_date = split_date[2]+'/'+split_date[1]+'/'+split_date[0]
            return true_date;
        }else{
            return date;
        }
    }

    const chk_sign = (sign) => {
        const Tsign = sign  || '';
        return convert_date(Tsign);;
    }

    const get_duty_position = (duty_id, num) => {
        var wordduty = null;
        $.getJSON("core/api_accept/controller/controller_website.php?status=get_duty_position&duty_id="+duty_id,function(res){
            // console.log(res);
            $.each(res,function(index,items){
                if(items.typeShow=="duty"){
                    wordduty = items.wordShow;
                    $('#duty_id'+num).text(wordduty);
                }else{
                    wordduty = items.wordShow;
                    $('#position_id'+num).text(wordduty);
                }
            })
        })
    }

    const check_val = (val) => {
        val = val || '-';
        return val;
    }
    
 })();
   


 