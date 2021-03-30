<?php 


require '../../../PHPMailer-master/PHPMailerAutoload.php';
ini_set('max_execution_time',6000); 
set_time_limit (6000);
ini_set('memory_limit', '-1');

    session_start();
    class Master extends Connection{
        protected $conn;

        public function __construct(){
            $this->conn = $this->connect();
        }

       
        public function get_Approval_duty($data){
            $sql="SELECT * FROM website_db.doc_box WHERE doc_box.docName = '".$data[Doc_type]."' AND typeShow = 'duty'";
				
				
				
			 $arr = array();
             $resultData = $this->conn->prepare($sql);
             $resultData->execute();
             while($fetch = $resultData->fetch(PDO::FETCH_ASSOC)){
                        $arr[] = $fetch;
             }
            //  print_r($data);
			return ($arr);
            // return $sql;
        }

        public function get_Approval_position($data){
            $sql="SELECT * FROM website_db.doc_box WHERE doc_box.docName = '".$data[Doc_type]."' AND typeShow = 'position'";
				
				
				
			 $arr = array();
             $resultData = $this->conn->prepare($sql);
             $resultData->execute();
             while($fetch = $resultData->fetch(PDO::FETCH_ASSOC)){
                        $arr[] = $fetch;
             }
            //  print_r($data);
			return ($arr);
            // return $sql;
        }

        public function save_approve($data){
            // print_r($data);
            $sql_ck ="SELECT Master_doc_id, id, status_approve, Doc_use  from website_db.make_doc WHERE Master_doc_id = '$data[doc_id]'  AND status_approve = 'wait_approve'  AND Doc_use = 'Y'";
            $resultCK = $this->conn->prepare($sql_ck);
            $resultCK->execute();
            $count = $resultCK->rowCount();
            //  return $sql_ck;
            // return $count;
            if($count == 0){
            // ทำให้ของเก้่ามี Doc_use = N
                $sql_N ="UPDATE website_db.make_doc set";
                $sql_N .=" Doc_use =".$this->chk_value('N');
                $sql_N .=" WHERE Master_doc_id =".$this->chk_value($data[doc_id]);
                $resultUpdate = $this->conn->prepare($sql_N);
                $resultUpdate->execute();


                $random = substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ23456789'),0,10);
                $filUpload_name=trim($_FILES["files_pdf2"]["name"]);
                // $filUpload_name=trim($_FILES["files_pdf"]["name"]);
                $ex=explode(".",$filUpload_name);
                
                copy($_FILES["files_pdf2"]["tmp_name"],"../../../Master_doc/".$random.".".$ex[1]);
                // copy($_FILES["files_pdf2"]["tmp_name"],$_FILES["files_pdf2"]["name"]);

                $sql ="INSERT INTO website_db.make_doc set";
                $sql .=" Master_doc_id =".$this->chk_value($data[doc_id]);
                $sql .=", Max_level_approve =  ".$this->chk_value($data[num_approve]);
                $sql .=", step_level =  ".$this->chk_value(0);
                $sql .=", Doc_date =".$this->chk_value($data[start_date]);
                $sql .=", Due_date =".$this->chk_value($data[end_date]);
                $sql .=", Doc_edition =".$this->chk_value($data[num_Document]);
                $sql .=", ip_address =".$this->chk_value($_SERVER["REMOTE_ADDR"]);
                $sql .=", user_id_create =".$this->chk_value($_SESSION['user_id']);
                $sql .=", insert_date ='".date("Y-m-d")."'";
                $sql .=", time ='".date("H:i:s")."'";
                $sql .=", Doc_use = 'Y'";
                $sql .=", file_pdf = ".$this->chk_value("http://10.2.1.184/website/backoffice/default/Master_doc/".$random.'.'.$ex[1]);
                $resultData = $this->conn->prepare($sql);
                $resultData->execute();

                $sql_need_id ="SELECT id, Master_doc_id FROM website_db.make_doc ORDER BY id DESC  LIMIT 0,1";
                $resultNeedId = $this->conn->prepare($sql_need_id);
                $resultNeedId->execute();
                $row_need = $resultNeedId->fetch(PDO::FETCH_ASSOC);
                

                for($num_appro=1;$num_appro<=$data[num_approve]; $num_appro++){
                    $sql_approve ="INSERT INTO website_db.tb_approver set";
                    $sql_approve .=" id_document =".$this->chk_value($row_need[id]);
                    $sql_approve .=", emp_id =".$this->chk_value($data[emp_id.''.$num_appro]);
                    $sql_approve .=", level_approve =".$this->chk_value($num_appro);
                    $sql_approve .=", date_send =".$this->chk_value($data[start_date]);
                    $sql_approve .=", duty_id =".$this->chk_value($data[select_duty.''.$num_appro]);
                    $sql_approve .=", position_id =".$this->chk_value($data[select_position.''.$num_appro]);
                    $resultapprove = $this->conn->prepare($sql_approve);
                    $resultapprove->execute();
                    
                }
                return (int)$row_need[id];
            }else{
                return 0;
            }
            // print_r($data);
            //  return $sql;
            //  return (int)$row_need[id];
           

            
           
        }
        public function get_all_Approval($data){
            $sql="SELECT * FROM pis_db.tbl_employee";
            $arr = array();
             $resultData = $this->conn->prepare($sql);
             $resultData->execute();
             while($fetch = $resultData->fetch(PDO::FETCH_ASSOC)){
                        $arr[] = $fetch;
             }
            //  print_r($data);
			return ($arr);

        }
        
        public function set_type(){
            $sqlN="SELECT Doc_code FROM website_db.master_doc WHERE 1";
            // $sqlN.= " AND website_db.tb_news.news_id ='".$data[news1_id]."'";
            $q_INM = $this->conn->prepare($sqlN);
            $q_INM->execute();
            while($fetch = $q_INM->fetch(PDO::FETCH_ASSOC)){
                $test= explode("-",$fetch["Doc_code"]);
				// $test=$fetch["Doc_code"];
				$sql_contcect ="UPDATE website_db.master_doc set";
                $sql_contcect .=" Doc_type =".$this->chk_value($test[0]);
            
                $sql_contcect.=" WHERE 1 AND Doc_code=".$this->chk_value($fetch["Doc_code"]);
                $q_sql_contcect = $this->conn->prepare($sql_contcect);
                $q_sql_contcect->execute();
				
           	}
            return $test[0];

        }

        public function view_master_doc($data){
            $sqlN="SELECT
                website_db.master_doc.id,
                website_db.master_doc.Doc_type,
                website_db.master_doc.Doc_code,
                website_db.master_doc.Doc_Name,
                website_db.master_doc.Doc_use,
                website_db.master_doc.comp_id,
                website_db.master_doc.brn_id,
                pis_db.tbl_branch.brn_code,
                pis_db.tbl_branch.brn_name,
                pis_db.tbl_company.comp_name,
                pis_db.tbl_company.comp_code
                FROM
                website_db.master_doc 
                LEFT JOIN pis_db.tbl_branch ON tbl_branch.brn_id = master_doc.brn_id
                LEFT JOIN pis_db.tbl_company ON tbl_company.comp_id = master_doc.comp_id 
                WHERE Doc_type = '".$data[Doc_type]."'";
            if($data[status_Doc] !=''){
                 $sqlN .= " AND Doc_use = '".$data[status_Doc]."'";
            }
                $sqlN .= " ORDER BY master_doc.Doc_order";
            $arr = array();
            // $sqlN.= " AND website_db.tb_news.news_id ='".$data[news1_id]."'";
            $q_INM = $this->conn->prepare($sqlN);
            $q_INM->execute();
            while($fetch = $q_INM->fetch(PDO::FETCH_ASSOC)){
                $arr[] = $fetch;
				
           	}
            // return $sqlN;
            return $arr;
        }

        public function view_doc_approve($data){
            $sqlN="SELECT
                        make_doc.id,
                        make_doc.Master_doc_id,
                        make_doc.Doc_date,
                        make_doc.Due_date,
                        make_doc.insert_date,
                        make_doc.Doc_edition,
                        make_doc.Doc_use,
                        make_doc.step_level,
                        make_doc.status_approve,
                        make_doc.send_to_approve,
                        make_doc.file_pdf,
                        tb_approver.emp_id,
                        tb_approver.level_approve,        
                        tbl_employee.emp_name,
                        Master_doc.Doc_Name,
                        Master_doc.Doc_code
                        FROM
                        website_db.make_doc
                        LEFT JOIN website_db.Master_doc ON Master_doc.id = make_doc.Master_doc_id
                        LEFT JOIN website_db.tb_approver ON tb_approver.id_document = make_doc.id AND step_level = level_approve
                        LEFT JOIN pis_db.tbl_employee ON tbl_employee.emp_id = tb_approver.emp_id
                        WHERE 1";
            if($data[type_doc]!=''){
                $sqlN .=" AND Master_doc.Doc_type =  '".$data[type_doc]."'";
            }
            if($data[status_doc]!=''){
                $sqlN .=" AND make_doc.status_approve =   '".$data[status_doc]."'";
            }
            if($data[insert_date]!=''){
                $sqlN .=" AND make_doc.insert_date =   '".$data[insert_date]."'";
            }
            if($data[Doc_date]!=''){
                $sqlN .=" AND make_doc.Doc_date =   '".$data[Doc_date]."'";
            }
            if($data[Due_date]!=''){
                $sqlN .=" AND make_doc.Due_date =   '".$data[Due_date]."'";
            }
            $sqlN .=" ORDER BY make_doc.id DESC";
            
            $arr = array();
            // $sqlN.= " AND website_db.tb_news.news_id ='".$data[news1_id]."'";
            $q_INM = $this->conn->prepare($sqlN);
            $q_INM->execute();
            while($fetch = $q_INM->fetch(PDO::FETCH_ASSOC)){
                $arr[] = $fetch;
				
           	}  
            // print_r($data);
            return $arr;

        }

        public function get_edit_make_doc($data){
            $sqlN="SELECT make_doc.id,
            make_doc.Master_doc_id,
            make_doc.Doc_date,
            make_doc.Max_level_approve,
            make_doc.file_pdf,
            make_doc.Doc_edition,
            make_doc.Due_date,
            master_doc.Doc_type
            FROM website_db.make_doc 
            LEFT JOIN website_db.master_doc ON master_doc.id = make_doc.Master_doc_id
            WHERE make_doc.id ='".$data[DID]."'
            AND make_doc.Doc_use = 'Y' 
            ORDER BY make_doc.step_level ";
            $arr = array();
            // $sqlN.= " AND website_db.tb_news.news_id ='".$data[news1_id]."'";
            $q_INM = $this->conn->prepare($sqlN);
            $q_INM->execute();
            while($fetch = $q_INM->fetch(PDO::FETCH_ASSOC)){
                $arr[] = $fetch;
				
           	}
            return $arr;

        }

        public function get_all_approver_Edit($data){
            $sql ="SELECT
            make_doc.id,
            make_doc.Master_doc_id,
            tb_approver.id,
            tb_approver.id_document,
            tb_approver.emp_id,
            tb_approver.level_approve,
            tb_approver.duty_id,
            tb_approver.position_id,
            tbl_employee.emp_code_full,
            tbl_employee.emp_name
            FROM
                website_db.make_doc
            LEFT JOIN website_db.tb_approver ON make_doc.id = tb_approver.id_document
            LEFT JOIN pis_db.tbl_employee ON tbl_employee.emp_id = tb_approver.emp_id
            WHERE
                make_doc.Doc_use = 'Y' 
                AND make_doc.id = '".$data[DID]."'
            ORDER BY level_approve ASC";
            $resultsql = $this->conn->prepare($sql);
            $resultsql->execute();
            $listMaster = array();
            while($fetchRead = $resultsql->fetch(PDO::FETCH_ASSOC)){
                $listMaster[] = $fetchRead;
            }
            return $listMaster;
        }

        public function save_master_doc($data){
            // print_r($data);
            $sql ="SELECT *  FROM website_db.master_doc WHERE Doc_code ='".$data[id_Document]."' AND Doc_use = 'Y'";
            $result = $this->conn->prepare($sql);
            $result ->execute();
            $count = $result->rowCount();
            if($count == 0){
                $sql ="INSERT INTO website_db.master_doc set";
                $sql .=" Doc_type =".$this->chk_value($data[Doc_type]);
                $sql .=", Doc_code =".$this->chk_value($data[id_Document]);
                $sql .=", Doc_Name =".$this->chk_value($data[name_Document]);
                $sql .=", Doc_date ='".date("Y-m-d")."'";
                $sql .=", Doc_use = 'Y'";
                $sql .=", comp_id =  ".$this->chk_value($data[comp_id]);
                $sql .=", Brn_id =  ".$this->chk_value($data[brn_id]);
                $sql .=", Doc_order =  ".$this->chk_value($data[Doc_order]);
            
                $resultData = $this->conn->prepare($sql);
                // $resultData->execute();
                if($resultData->execute()){
                    return 1;
                }else{
                    return 0;
                }
            }else{
                return 10;
            }
        }

        public function edit_master_doc($data){ 
            

            $sql ="UPDATE website_db.master_doc set";
            $sql .=" Doc_type =".$this->chk_value($data[Doc_type]);
            $sql .=", Doc_code =".$this->chk_value($data[id_Document]);
            $sql .=", Doc_Name =".$this->chk_value($data[name_Document]);
            $sql .=", Doc_date ='".date("Y-m-d")."'";
            $sql .=", Doc_use = 'Y'";
            $sql .=", comp_id =  ".$this->chk_value($data[comp_id]);
            $sql .=", Brn_id =  ".$this->chk_value($data[brn_id]);
            $sql .=", Doc_order =  ".$this->chk_value($data[Doc_order]);
            $sql .=" WHERE id = '".$data[master_id]."'";
			$resultData = $this->conn->prepare($sql);
            if($resultData->execute()){
                return 1;
            }else{
                return 0;
             }
        }
        public function get_data_master_doc($data){
            $sql ="SELECT id,
                          Doc_code,
                          Doc_Name,
                          Doc_type
                          FROM website_db.master_doc
                          WHERE Doc_use = 'Y' 
            ";
             $resultsql = $this->conn->prepare($sql);
             $resultsql->execute();
             $listMaster = array();
             while($fetchRead = $resultsql->fetch(PDO::FETCH_ASSOC)){
                 $listMaster[] = $fetchRead;
             }
            return $listMaster;

        }
       

        public function get_doc_type($data){
            $sql ="SELECT Doc_type
                        FROM website_db.master_doc 
                        WHERE id =".$data[Doc_id]."
            ";
             $resultsql = $this->conn->prepare($sql);
             $resultsql->execute();
             $listMaster = array();
             while($fetchRead = $resultsql->fetch(PDO::FETCH_ASSOC)){
                 $listMaster[] = $fetchRead;
             }
              return $listMaster;
        }


        public function save_edit_approve($data){
            $sql ="UPDATE website_db.make_doc set";
            $sql .=" Master_doc_id =".$this->chk_value($data[doc_id]);
            $sql .=", Max_level_approve =  ".$this->chk_value($data[num_approve]);
            $sql .=", Doc_date =".$this->chk_value($data[start_date]);
            $sql .=", Due_date =".$this->chk_value($data[end_date]);
            $sql .=", ip_address =".$this->chk_value($_SERVER["REMOTE_ADDR"]);
            $sql .=", user_id_create =".$this->chk_value($_SESSION['user_id']);
            $sql .=", Doc_edition =".$this->chk_value($data[num_Document]);
            $sql .=", Doc_use = 'Y'";
            if($_FILES["files_pdf2"]["name"]!=""){
                $random = substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ23456789'),0,10);
                $filUpload_name=trim($_FILES["files_pdf2"]["name"]);
                $ex=explode(".",$filUpload_name);
                copy($_FILES["files_pdf2"]["tmp_name"],"../../../Master_doc/".$random.".".$ex[1]);
                $sql .=", file_pdf = ".$this->chk_value("http://10.2.1.184/website/backoffice/default/Master_doc/".$random.'.'.$ex[1]);
            }
            $sql .=" WHERE id =".$this->chk_value($data[doc_make_id]);
            $resultUpdate = $this->conn->prepare($sql);
            $resultUpdate->execute();

            $sql_Delete_approver ="DELETE  FROM website_db.tb_approver WHERE id_document ='".$data[doc_make_id]."'";
            $resultDeleteApprrover = $this->conn->prepare($sql_Delete_approver);
            $resultDeleteApprrover->execute();

            for($num_appro=1;$num_appro<=$data[num_approve]; $num_appro++){
                $sql_approve ="INSERT INTO website_db.tb_approver set";
                $sql_approve .=" id_document =".$this->chk_value($data[doc_make_id]);
                $sql_approve .=", emp_id =".$this->chk_value($data[emp_id.''.$num_appro]);
                $sql_approve .=", level_approve =".$this->chk_value($num_appro);
                $sql_approve .=", date_send =".$this->chk_value($data[start_date]);
                $sql_approve .=", duty_id =".$this->chk_value($data[select_duty.''.$num_appro]);
                $sql_approve .=", position_id =".$this->chk_value($data[select_position.''.$num_appro]);
                $resultapprove = $this->conn->prepare($sql_approve);
                $resultapprove->execute();
                
            }    
            return 1;
            
            
        }


        public function send_to_approver($data){
            $sql ="UPDATE website_db.make_doc set";
            $sql .=" step_level =".$this->chk_value(1);
            $sql .=", status_approve = 'wait_approve'";
            $sql .=", send_to_approve = 'Y'";
            $sql .=" WHERE id =".$this->chk_value($data[id_doc]);
            $result = $this->conn->prepare($sql);
            $result ->execute();

            $sql ="SELECT make_doc.id,
                            make_doc.Master_doc_id,
                            make_doc.step_level,
                            make_doc.Doc_date,
                            make_doc.Due_date,
                            master_doc.Doc_code,
                            master_doc.Doc_Name,
                            tb_approver.emp_id,
                            tb_approver.id_document,
                            tbl_employee.emp_name,
                            tbl_employee.email_company,
                            tbl_section.sec_nameThai,
                            tbl_branch.brn_name,
                            tbl_company.comp_name 
                            FROM website_db.make_doc
                            LEFT JOIN website_db.master_doc ON master_doc.id = make_doc.Master_doc_id 
                            INNER JOIN  website_db.tb_approver ON tb_approver.level_approve = make_doc.step_level AND  tb_approver.id_document = make_doc.id
                            LEFT JOIN pis_db.tbl_employee ON tbl_employee.emp_id = tb_approver.emp_id
                            LEFT JOIN pis_db.tbl_section ON tbl_section.sec_id = tbl_employee.sec_id
                            LEFT JOIN pis_db.tbl_branch ON tbl_branch.brn_id = tbl_employee.brn_id
                            LEFT JOIN pis_db.tbl_company ON tbl_company.comp_id = tbl_employee.comp_id
                            WHERE make_doc.id = '".$data[id_doc]."'";
            $result = $this->conn->prepare($sql);
            $result ->execute();
            $row = $result->fetch(PDO::FETCH_ASSOC);

                $mail = new PHPMailer();
                $mail->CharSet = "utf-8";
                $mail->ContentType="text/html";
                $mail->isSMTP();// Set mailer to use SMTP
                $mail->SMTPDebug = 2;
                $mail->Host = "10.2.1.5";  // Specify main and backup server ('mail.toyotanon.com')
                $mail->From = "isdp@toyotanont.com";
                $mail->FromName ="QMS อนุมัติเอกสารแผนกบริหารคุณภาพ";
                
                
        
                // $mail->AddAddress($row_email[email_company],3);dco@toyotanont.com
                $mail->AddAddress('isdp@toyotanont.com',1);
                $mail->AddAddress('isdp@dco@toyotanont.com',2);
        
                $mail->WordWrap = 50;	// Set word wrap to 50 characters
        
                $mail->isHTML(true);// Set email format to HTML
                $mail->Subject ="เรียน คุณ ".$row[emp_name]." ".$row[sec_nameThai]." ".$row[brn_name]; 
                
                    $today=date("d/m/Y");
                    $time=date("H:i:s");
                    $mail->Body = "
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; เรียน คุณ  ".$row[emp_name]." ".$row[sec_nameThai]." ".$row[brn_name]."<br />
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; อนุมัติงาน เอกสาร ".$row[Doc_code]." ".$row[Doc_Name]."<br />
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; วันที่ออกเอกสาร : ".$this->DateThai2($row[Doc_date])."<br />
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; วันที่บังคับใช้ : ".$this->DateThai2($row[Due_date])."<br />
                <br />
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;สามารถดูรายละเอียดเพิ่มเติมได้ที่ สำหรับภายใน http://10.2.1.233/approvecenter หรือ สำหรับภายนอก www.nontrcms.com/approvecenter<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br /><br />
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br /><br />
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <br /><br />
                
                ..................................................................................................................................................................................<br />
                <br />
                
                แผนกบริหารคุณภาพ (QMS)
                จากสาขา(ผ่านสายภายใน) โทร. 8011415 จากโทรศัพท์/มือถือ โทร. 1144 หรือ 020979555 ต่อ 1415<br />";
                if(!$mail->Send()) {
                    echo 'Message was not sent.';
                    return 'ยังไม่สามารถส่งเมลล์ได้ในขณะนี้ ' . $mail->ErrorInfo;
                    // exit;
                } else {
                    
                    return 'ส่งเมลแล้ว';
                } 
            
            // print_r($data);
            
        }

        public function get_DataMakeDoc($data){
            $sql ="SELECT
            make_doc.id,
            make_doc.Master_doc_id,
						master_doc.Doc_code,
						master_doc.Doc_Name
            FROM
                website_db.make_doc
						LEFT JOIN website_db.master_doc ON master_doc.id = make_doc.Master_doc_id
            WHERE
                make_doc.Doc_use = 'Y' 
                AND make_doc.id = '".$data[id_doc]."'";
            $result = $this->conn->prepare($sql);
            $result ->execute();
           
            $listMaster = array();
            while($fetchRead = $result->fetch(PDO::FETCH_ASSOC)){
                $listMaster[] = $fetchRead;
            }
             return $listMaster;
            
        }

        public function delete_master_doc($data){
             $sql ="SELECT Master_doc_id  FROM website_db.make_doc WHERE Master_doc_id ='".$data[Master_id]."'";
             $result = $this->conn->prepare($sql);
             $result ->execute();
             $count = $result->rowCount();
             if($count >0){
                
                return  1;
             }else{
                $sql_delete ="DELETE  FROM website_db.Master_doc WHERE id ='".$data[Master_id]."'";
                $result_delete = $this->conn->prepare($sql_delete);
                $result_delete ->execute();
                return 2;
             }
          
            
        }

        public function get_all_data_Master_doc($data){
            $sql ="SELECT master_doc.id,
                        master_doc.Doc_code,
                        master_doc.Doc_Name,
                        make_doc.file_pdf,
                        make_doc.doc_edition,
                        make_doc.id,
                        make_doc.Doc_date,
                        make_doc.Due_date,
                        master_doc.brn_id,
                        master_doc.comp_id,
                        make_doc.Max_level_approve,
                                                tbl_branch.brn_name,
                                                tbl_company.comp_name
                        FROM website_db.make_doc 
                        LEFT JOIN website_db.master_doc ON make_doc.Master_doc_id = master_doc.id
                        LEFT JOIN pis_db.tbl_branch ON master_doc.brn_id = tbl_branch.brn_id
                        LEFT JOIN pis_db.tbl_company ON master_doc.comp_id = tbl_company.comp_id
                        WHERE  make_doc.id = '".$data[DID]."'";
            $resultsql = $this->conn->prepare($sql);
            $resultsql->execute();
            $listMaster = array();
            while($fetchRead = $resultsql->fetch(PDO::FETCH_ASSOC)){
                $listMaster[] = $fetchRead;
            }
            return $listMaster;
        }

        public function get_all_approver($data){
            $sql ="SELECT tb_approver.id,
                        tb_approver.id_document,
                        tb_approver.emp_id,
                        tb_approver.level_approve,
                        tb_approver.duty_id,
                        tb_approver.position_id,
                        tb_approver.date_send,
                        tb_approver.date_sign,
                        tb_approver.detail_cancel,
                        tbl_employee.emp_name,
                        tbl_employee.signature,
                        make_doc.Max_level_approve
                        FROM website_db.tb_approver 
                        LEFT JOIN pis_db.tbl_employee ON tbl_employee.emp_id = tb_approver.emp_id
                        LEFT JOIN website_db.make_doc ON make_doc.id = tb_approver.id_document
                        WHERE tb_approver.id_document =".$data[DID]." 
                        ORDER BY  level_approve ASC";
                        $resultsql = $this->conn->prepare($sql);
                        $resultsql->execute();
                        $listMaster = array();
                        while($fetchRead = $resultsql->fetch(PDO::FETCH_ASSOC)){
                            $listMaster[] = $fetchRead;
                        }
            return $listMaster;
        }

        
        public function get_duty_position($data){
             $sql = "SELECT wordShow, typeShow from website_db.doc_box WHERE id = $data[duty_id] ";
            $result = $this->conn->prepare($sql);
            $result->execute();
            $list = array();
            while($fetchRead = $result->fetch(PDO::FETCH_ASSOC)){
                $list[] = $fetchRead;
            }
            return $list;
        }

        public function check_approve_fin($data){
          $sql = "SELECT status_approve, status_show_web from website_db.make_doc 
                  WHERE id = '".$data[id]."'";
             $result = $this->conn->prepare($sql);
             $result->execute();
             $list = array();
             while($fetchRead = $result->fetch(PDO::FETCH_ASSOC)){
                 $list[] = $fetchRead;
             }
             return $list;
       }

        public function recive_doc($data){
            $sql_contcect ="UPDATE website_db.make_doc set";
            $sql_contcect .=" status_approve = 'recive'";
            $sql_contcect .=", recive_date = '".date("Y-m-d")."'";
            $sql_contcect.=" WHERE 1 AND id=".$this->chk_value($data["id_doc"]);
            $q_sql_contcect = $this->conn->prepare($sql_contcect);
            $q_sql_contcect->execute();
            return $sql_contcect;
        }

        public function get_Edit_master($data){
            $sql = "SELECT * from website_db.master_doc WHERE id=".$data[master_id] ;
            $result = $this->conn->prepare($sql);
            $result->execute();
            $list = array();
            while($fetchRead = $result->fetch(PDO::FETCH_ASSOC)){
                $list[] = $fetchRead;
       }
            return $list;
        }

        public function show_website($data){
            
            $sql ="UPDATE website_db.make_doc set";
            $sql .=" status_show_web =".$this->chk_value($data[status_show]);
            $sql .=" WHERE id =".$this->chk_value($data[id_Doc]);
            $q_sql= $this->conn->prepare($sql);
            $q_sql->execute();
            return $sql;
            // print_r($data);
        }

        public function chang_Doc_use($data){
            $sql ="SELECT *  FROM website_db.master_doc WHERE Doc_code ='".$data[Doc_code]."' AND Doc_use = 'Y'";
            $result = $this->conn->prepare($sql);
            $result ->execute();
            $count = $result->rowCount();
            if($count == 0 && $data[Doc_use] =='Y'){
            // return $sql;
                $sql ="UPDATE website_db.master_doc set";
                $sql .=" Doc_use =".$this->chk_value($data[Doc_use]);
                $sql .=" WHERE id =".$this->chk_value($data[master_id]);
                $q_sql= $this->conn->prepare($sql);
                $q_sql->execute();
                return 1;
            }else if($data[Doc_use] =='N'){
                // return $sql;
                    $sql ="UPDATE website_db.master_doc set";
                    $sql .=" Doc_use =".$this->chk_value($data[Doc_use]);
                    $sql .=" WHERE id =".$this->chk_value($data[master_id]);
                    $q_sql= $this->conn->prepare($sql);
                    $q_sql->execute();
                    return 1;
            }else{
                return 0;
            }
            // return $sql;
        }
    

        
    }
    
      

    
?>