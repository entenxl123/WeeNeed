<?php 


ini_set('max_execution_time',6000); 
set_time_limit (6000);
ini_set('memory_limit', '-1');

    session_start();
    class Master extends Connection1{
        protected $conn;

        public function __construct(){
            $this->conn = $this->connect();
        }

        public function get_employee_name($data){
            $sql="SELECT
							tbl_employee.emp_id,
							tbl_employee.emp_name,
							tbl_employee.emp_code_full
				FROM
							pis_db.tbl_employee
				WHERE
				(tbl_employee.out_date IS NULL OR
				tbl_employee.out_date >= '".date("Y-m-d")."')
				AND pis_db.tbl_employee.emp_code_full IS NOT NULL
				AND pis_db.tbl_employee.comp_id NOT IN ('11', '6') ";
				
				// if($comp_id!=''){
				//  $sql.=" AND  tbl_employee.comp_id='".$comp_id."'";
				// }
				// if($sec_id!=''){
				//  $sql.=" AND  tbl_employee.sec_id='".$sec_id."'";
				// }
				// if($brn_id!=''){
				//  $sql.=" AND  tbl_employee.brn_id='".$brn_id."'";
				// }
				 $sql.=" ORDER BY tbl_employee.emp_code_full ASC ";
			 $arr = array();
             $resultData = $this->conn->prepare($sql);
             $resultData->execute();
             while($fetch = $resultData->fetch(PDO::FETCH_ASSOC)){
                        $arr[] = $fetch;
             }
			 return ($arr);
            // return 45454;
        }
        public function get_company($data){
            $sql="SELECT
							tbl_company.comp_id,
							tbl_company.comp_code,
							tbl_company.comp_name
				FROM
							pis_db.tbl_company
				WHERE status_user = '1'";
				
				
				 
			 $arr = array();
             $resultData = $this->conn->prepare($sql);
             $resultData->execute();
             while($fetch = $resultData->fetch(PDO::FETCH_ASSOC)){
                        $arr[] = $fetch;
             }
			 return ($arr);
            // return 45454;
        }
		public function get_branch($data){
            $sql="SELECT
							tbl_branch.brn_id,
							tbl_branch.brn_code,
							tbl_branch.brn_name
				FROM
							pis_db.tbl_branch
				WHERE comp_id = ".$data[comp_id];
				
				
				 
			 $arr = array();
             $resultData = $this->conn->prepare($sql);
             $resultData->execute();
             while($fetch = $resultData->fetch(PDO::FETCH_ASSOC)){
                        $arr[] = $fetch;
             }
			 return ($arr);
            // return 45454;
        }
    }
    
      

    
?>