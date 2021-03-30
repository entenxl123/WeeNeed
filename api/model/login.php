<?
    session_start();
    include('../../default/inc/config.php');

    class LoginPermission extends Connection{
        public $conn;
       
        public $username;
        public $password;

        public function __construct(){
            try{
               
                $this->conn = $this->connect();
            }catch(PDOException $e){
                echo $e->getMessage();
            }
        }

        public function setLogin($data){
            $this->username = $data['username'];
            $this->password = $data['password'];
        }


        public function getUsername(){
            return $this->username;
        } 

        public function getPassword(){
            return $this->password;
        }



        public function Login1(){
            $login = 0;
            $s="    SELECT
                        tbl_employee.emp_id,
                        tbl_employee.emp_username,
                        tbl_employee.emp_password,
                        tbl_employee.emp_code_full,
                        tbl_employee.emp_name,
                        tbl_employee.name_pfx,
                        tbl_employee.out_date,
                        tbl_employee.comp_id
                    FROM pis_db.tbl_employee
                    WHERE
                        (tbl_employee.out_date='' OR tbl_employee.out_date IS NULL OR NOW() < tbl_employee.out_date)
                            AND emp_username= :userN
                            AND emp_password= :passW
                              ";
            $stmt = $this->conn->prepare($s);
            $stmt->bindParam(':userN',$this->getUsername());
            $stmt->bindParam(':passW',$this->getPassword());
            $stmt->execute();
           
            $countNumber = $stmt->rowCount();

           if($countNumber >=1){
                $fetch = $stmt->fetch(PDO::FETCH_ASSOC);
                $_SESSION['u_emp_id']=$fetch['emp_id'];
                $_SESSION['u_emp_code_full']=$fetch['emp_code_full'];
                $_SESSION['u_name_pfx']=$fetch['name_pfx'];
                $_SESSION['u_emp_name']=$fetch['emp_name'];
                $_SESSION['comp_id']=$fetch['comp_id'];
    
                    $query = "SELECT tbl_employee.emp_id FROM pis_db.tbl_employee";
                    $query.=" WHERE emp_name LIKE  '%".$fetch['emp_name']."%' ";
    
                    $stmt = $this->conn->prepare($query);
                    $result = $stmt->execute();
                    $h=0;
                    $in=" in (";
                        while($record = $stmt->fetch(PDO::FETCH_ASSOC)){
                            $h++;
            
                                if($h>1){
                                    $in.=",";
                                }
                            $in.=$record['emp_id'];
                            
                        }
                    $in.="  )";
                

            }

            $_SESSION['where_in'] = $in;

           
            $stmt = null;
           return $countNumber;
        }

        public function login($data){
            $login = 0;
            $s="    SELECT
                        tb_user.user_id,
                        tb_user.username,
                        tb_user.password,
                        tb_user.user_type,
                        tb_user.companycode,
                        tb_user.employeecode
                    FROM website_db.tb_user
                    WHERE 1
                            AND username ='".$data[Username]."' 
                            AND password ='".$data[Password]."'
                              ";
            $stmt = $this->conn->prepare($s); 
            $stmt->execute();
           
            $countNumber = $stmt->rowCount();

           if($countNumber ==1){
                $fetch = $stmt->fetch(PDO::FETCH_ASSOC);
                $_SESSION['user_id']=$fetch['user_id'];
                $_SESSION['username']=$fetch['username'];
                $_SESSION['user_type']=$fetch['user_type'];
                $_SESSION['companycode']=$fetch['companycode'];
                $_SESSION['employeecode']=$fetch['employeecode'];
                
                return 1;
            }else{
                 return 0;
            }

            // print_r($data);
        }
        
        public function logout($data){
            session_start();
            session_destroy();
            return 1;
            // print_r($data);
        }  

        public function ch_session($data){
            return $_SESSION['user_id'];
            // print_r($data);
        }  
    }


    /*$conn = new LoginPermission();

    echo $conn->Login();*/

?>