<?php

    class Connection{
        protected $conn;
        protected $user = 'root';
     //  protected $pass = '';
     //  protected $db = 'mysql:host=127.0.0.1';
		
        
       protected $pass = '1234';
       protected $db = 'mysql:host=127.0.0.1';
      
       public function connect(){
            try {
                date_default_timezone_set("Asia/Bangkok"); 
                $this->conn = new PDO($this->db,$this->user,$this->pass,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
                return $this->conn;
                
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
       }

       public function disconnect(){
           $this->conn  = null;
       }
		
		 public function chk_value($data){
		
		if($data=='' || $data=='0' || $data=='NULL'){
			return 'NULL';
		}else{
			return "'".$data."'";
		}
	   }
		
	 public function CutoutputComma($data){
		
		if($data=='' || $data=='0' || $data=='NULL' || $data=='0.00'){
			return '0';
		}else{
			return "'".ereg_replace(",","",$data)."'";
		}
	   }
	    public function date_to_datebase($date){
				if($date!=''){
				$ex=explode("/",trim($date));
				return "'".$ex[2]."-".$ex[1]."-".$ex[0]."'";
				}else{
					return 'NULL';
				}
		}
		
		
		function getSelectField($table,$field,$condition){
			
						$sql = "SELECT *"
								   ." FROM ".$table
								   ." WHERE ".$condition;
						 $stmt = $this->connect()->prepare($sql);
						 $stmt->execute(); 
						$fetch = $stmt->fetch(PDO::FETCH_ASSOC);
						$value = $fetch[$field];
							
						//return $sql;
						return $value;
		}//end 
		
		public function check_empId($emp_name2){
			$HSEmp="SELECT
					pis_db.tbl_employee.emp_id,
					pis_db.tbl_employee.comp_id,
					pis_db.tbl_employee.emp_code,
					pis_db.tbl_employee.emp_name
					FROM pis_db.tbl_employee
					WHERE
					pis_db.tbl_employee.emp_name LIKE '%".trim($emp_name2)."%'"; 

			$stmtEmp=$this->connect()->prepare($HSEmp);
            $stmtEmp->execute(); 
					$h=0;
					$Cin=" in (";
					while($HRemp_id = $stmtEmp->fetch(PDO::FETCH_ASSOC)){
					//echo $Remp_id[emp_id]."<br>";
					$h++;

							if($h>1){
									$Cin.=",";
							}
					$Cin.=$HRemp_id[emp_id];

					}
					$Cin.=")";
			 return $Cin;
		}
		
		public function Date_range_pickeDB($date){
				if($date!=''){
					$date_sub=explode("-",$date);

					$ex=explode("/",$date_sub[0]);
					//return "'".$ex[2]."-".$ex[1]."-".$ex[0]."'";

					$ex1=explode("/",$date_sub[1]);
					//return "'".$ex1[2]."-".$ex1[1]."-".$ex1[0]."'";
					return "'".trim($ex[2])."-".trim($ex[1])."-".trim($ex[0])."' AND '".trim($ex1[2])."-".trim($ex1[1])."-".trim($ex1[0])."'";
				}else{
					return 'NULL';
				}
		}
		public function DateThai($strDate){
				$strYear = date("Y",strtotime($strDate))+543;
				$strMonth= date("n",strtotime($strDate));
				$strDay= date("j",strtotime($strDate));
				//$strHour= date("H",strtotime($strDate));
				//$strMinute= date("i",strtotime($strDate));
				//$strSeconds= date("s",strtotime($strDate));
				$strMonthCut = Array("","มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");
				$strMonthThai=$strMonthCut[$strMonth];
				return "$strDay $strMonthThai $strYear";
				//return "$strDay $strMonthThai $strYear, $strHour:$strMinute";
		}
	
		public function DateThai2($strDate){
				if($strDate!='' && $strDate!='0000-00-00' && $strDate!='00/00/0000'){
				$strYear = date("Y",strtotime($strDate))+543;
				$strMonth= date("n",strtotime($strDate));
				$strDay= date("j",strtotime($strDate));
				//$strHour= date("H",strtotime($strDate));
				//$strMinute= date("i",strtotime($strDate));
				//$strSeconds= date("s",strtotime($strDate));
				$strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
				$strMonthThai=$strMonthCut[$strMonth];
				return "$strDay $strMonthThai $strYear";
				//return "$strDay $strMonthThai $strYear, $strHour:$strMinute";
		}
}

    }

?>