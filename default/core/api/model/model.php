<?php 
    session_start();
    class Master extends Connection{
        protected $conn;

        public function __construct(){
            $this->conn = $this->connect();
        }
        public function save_contact($data){
            $sql_contcect ="UPDATE website_db.tb_contact set";
            $sql_contcect .=" contact_detail =".$this->chk_value($data[message]);
            
            $sql_contcect.=" WHERE 1 AND contact_id=".$this->chk_value(1);
            $q_sql_contcect = $this->conn->prepare($sql_contcect);
            $q_sql_contcect->execute();
             print_r($data);
            //  return 1;
        }
        public function insert_news($data){
           // $sql_news="INSERT INTO tb_news()";
           $tmpfile = $_FILES['file_topic']['tmp_name'];
           $tmpName = $_FILES['file_topic']['name'];
           $tmpfilePDF = $_FILES['file_pdf']['tmp_name'];
           $tmpNamePDF = $_FILES['file_pdf']['name'];
           
           if($data[cate_id]==1){
                $locationTopic = "upfile_ISO/".$tmpName;
                $locationPDF = "upfile_ISO/".$tmpNamePDF;
                move_uploaded_file( $tmpfile , "../../../../../upfile_ISO/".$tmpName);
                move_uploaded_file( $tmpfilePDF ,"../../../../../upfile_ISO/".$tmpNamePDF );
           }elseif($data[cate_id]==2){
                $locationTopic = "upfile_5s/".$tmpName;
                $locationPDF = "upfile_5s/".$tmpNamePDF;
                move_uploaded_file( $tmpfile , "../../../../../upfile_5s/".$tmpName);
                move_uploaded_file( $tmpfilePDF ,"../../../../../upfile_5s/".$tmpNamePDF );
           }elseif($data[cate_id]==3){
                $locationTopic = "upfile_safety/.$tmpName";
                $locationPDF = "upfile_safety/".$tmpNamePDF;
                move_uploaded_file( $tmpfile , "../../../../../upfile_safety/".$tmpName);
                move_uploaded_file( $tmpfilePDF ,"../../../../../upfile_safety/".$tmpNamePDF );
           }
        //    $sql_news="INSERT INTO tb_news(news_title, news_localtion, cate_id, news_date, news_check, news_time, news_file) VALUES('".$data[Topic]."','".$tmpName."','".$data[cate_id]."','".date("Y/m/d")."','0','".date("h:i:sa")."','".$tmpNamePDF."')";
        //    $stmtC = $this->conn->prepare($sql_news);
            // $stmtC->execute();
            $sql_news ="INSERT INTO website_db.tb_news set";
            $sql_news .=" news_title =".$this->chk_value($data[titlenews]);
            $sql_news .=", news_localtion =".$this->chk_value($locationTopic);
            $sql_news .=", cate_id =".$this->chk_value($data[cate_id]);
            $sql_news .=", news_date =".$this->chk_value(date("Y/m/d"));
            $sql_news .=", news_check =".$this->chk_value('0');
            $sql_news .=", news_time =".$this->chk_value(date("h:i:sa"));
            $sql_news .=", news_file =".$this->chk_value($locationPDF);
            $sql_news.=", news_detail =".$this->chk_value($data[message]);

            $q_sql_news = $this->conn->prepare($sql_news);
            
            $q_sql_news->execute();
            return 1;
        }

        public function show_edit_news($data){
            $sqlN="SELECT * FROM website_db.tb_news WHERE 1";
            $sqlN.= " AND website_db.tb_news.news_id ='".$data[news1_id]."'";
            $q_INM = $this->conn->prepare($sqlN);
            $q_INM->execute();
            while($fetch = $q_INM->fetch(PDO::FETCH_ASSOC)){
				
				$list[]=$fetch;
				
           	}
            return $list;
        }


        public function edit_news($data){
            // $sql_news="INSERT INTO tb_news()";
            $tmpfile = $_FILES['file_topic']['tmp_name'];
            $tmpName = $_FILES['file_topic']['name'];
            $tmpfilePDF = $_FILES['file_pdf']['tmp_name'];
            $tmpNamePDF = $_FILES['file_pdf']['name'];
            if($data[cate_id]==1){
                 $locationTopic = "upfile_ISO/".$tmpName;
                 $locationPDF = "upfile_ISO/".$tmpNamePDF;
            }elseif($data[cate_id]==2){
                 $locationTopic = "upfile_5s/".$tmpName;
                 $locationPDF = "upfile_5s/".$tmpNamePDF;
            }elseif($data[cate_id]==3){
                 $locationTopic = "upfile_safety/.$tmpName";
                 $locationPDF = "upfile_safety/".$tmpNamePDF;
            }
         //    $sql_news="INSERT INTO tb_news(news_title, news_localtion, cate_id, news_date, news_check, news_time, news_file) VALUES('".$data[Topic]."','".$tmpName."','".$data[cate_id]."','".date("Y/m/d")."','0','".date("h:i:sa")."','".$tmpNamePDF."')";
         //    $stmtC = $this->conn->prepare($sql_news);
             // $stmtC->execute();
             $sql_news ="UPDATE website_db.tb_news set";
             $sql_news .=" news_title =".$this->chk_value($data[Topic]);
             $sql_news .=", news_localtion =".$this->chk_value($locationTopic);
             $sql_news .=", cate_id =".$this->chk_value($data[cate_id]);
             $sql_news .=", news_date =".$this->chk_value(date("Y/m/d"));
             $sql_news .=", news_check =".$this->chk_value('0');
             $sql_news .=", news_time =".$this->chk_value(date("h:i:sa"));
             $sql_news .=", news_file =".$this->chk_value($locationPDF);
             $sql_news.=" WHERE 1 AND news_id=".$this->chk_value($data[news_id]);
             $q_sql_news = $this->conn->prepare($sql_news);
             $q_sql_news->execute();
             return $sql_news;
         }

         public function delete_news($data){
            $sqlD = " DELETE FROM website_db.tb_news";
            $sqlD.= " WHERE news_id='".$data[news_id]."'";
            $q_sqlD = $this->conn->prepare($sqlD);
            $q_sqlD->execute();
            return 1;

         }
         public function Add_newmenu($data){
           $sql_max="SELECT MAX(menu_order) AS max_order FROM website_db.tb_menu WHERE cate_id='".$data[cate_id]."'";
           $q_max = $this->conn->prepare($sql_max);
           $q_max->execute();
           $row_max = $q_max->fetch(PDO::FETCH_ASSOC);
           $max_order=$row_max[max_order]+1;

          $sql_menu ="INSERT INTO website_db.tb_menu set";
          $sql_menu .=" menu_name =".$this->chk_value($data[name_menu]);
          $sql_menu .=", menu_main =0" ;
          $sql_menu .=", menu_order =".$this->chk_value($max_order);
          $sql_menu .=", cate_id =".$this->chk_value($data[cate_id]);
       
          $q_sql_menu = $this->conn->prepare($sql_menu);
           $q_sql_menu->execute();
        //   print_r($data);
        //   return $sql_menu;
        return 1;

       }
       public function Add_sup_newmenu($data){
          
          $sql_max="SELECT MAX(menu_order) AS max_order FROM website_db.tb_menu WHERE cate_id='".$data[cate_id]."' AND menu_main='".$data[menu_order]."'";
          $q_max = $this->conn->prepare($sql_max);
          $q_max->execute();
          $row_max = $q_max->fetch(PDO::FETCH_ASSOC);
          $max_order=$row_max[max_order]+1;
              
         $sql_menu ="INSERT INTO website_db.tb_menu set";
         $sql_menu .=" menu_name =".$this->chk_value($data[name_sub]);
         $sql_menu .=", menu_main =".$this->chk_value($data[menu_order]);
         $sql_menu .=", menu_url =''" ;
         $sql_menu .=", menu_order =".$this->chk_value($max_order);
         $sql_menu .=", type =".$this->chk_value($data[type_menu]);
         $sql_menu .=", cate_id =".$this->chk_value($data[cate_id]);
      

         $q_sql_menu = $this->conn->prepare($sql_menu);
         
         $q_sql_menu->execute();
     //     return 1;

            $random = substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ23456789'),0,5);
            $rand=$random .".php";

         $sql_page="INSERT website_db.tb_page SET 	page_url='".$rand."' ";
         $q_sql_page = $this->conn->prepare($sql_page);
         $q_sql_page->execute();
				
			
                $sql_maxpage="SELECT MAX(page_id) AS max_page FROM website_db.tb_page";
                $q_sql_maxpage = $this->conn->prepare($sql_maxpage);
				$q_sql_maxpage->execute();
                $row_max_page = $q_sql_maxpage->fetch(PDO::FETCH_ASSOC);

                $sql_maxmenu="SELECT MAX(menu_id) AS menu_id FROM website_db.tb_menu";
                $q_sql_maxmenu = $this->conn->prepare($sql_maxmenu);
				$q_sql_maxmenu->execute();
                $row_max_menu = $q_sql_maxmenu->fetch(PDO::FETCH_ASSOC);
                
				$sql_update="UPDATE website_db.tb_menu SET menu_name='".$data[name_sub]."', page_id='".$row_max_page[max_page]."' WHERE menu_id='".$row_max_menu[menu_id]."' ";
				$q_sql_update = $this->conn->prepare($sql_update);
                $q_sql_update->execute();

                
         print_r($data);
        //   return $sql_menu.'|'.$sql_page.'|'.$sql_update;

      }

      public function delete_submenu($data){
          $sql_del="DELETE  FROM website_db.tb_menu WHERE  tb_menu.menu_id='".$data[menu_id]."'";
          $q_del = $this->conn->prepare($sql_del);
          $q_del->execute();
          return $sql_del;
      }

      public function save_code($data){
        $sql_update="UPDATE website_db.tb_page SET 
										page_detail='".$data[message]."'
										WHERE page_id='".$data[page_id]."' ";
        $q_sql_uppage = $this->conn->prepare($sql_update);
        $q_sql_uppage->execute();
        return $sql_update;
      } 
      public function save_news3($data1){
        print_r($data1);
      }

      public function save_news2($data1){
        print_r($data1);
        $random = substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ23456789'),0,5);
        $rand=$random .".php";
        if($data1[cate_id]==1){
            $localtion="upfile_ISO/";
        }elseif($data1[cate_id]==2){
            $localtion="upfile_5s/";
        }elseif($data1[cate_id]==3){
            $localtion="upfile_safety/";
            
        }
            if($_FILES["filUpload"]["name"]!=""){
                // echo ($_FILES["filUpload"]["name"]);
                $filUpload_name=trim(iconv("UTF-8", "TIS-620",$_FILES["filUpload"]["name"]));
                $ex=explode(".",$filUpload_name);
                copy($_FILES["filUpload"]["tmp_name"],"../../../../../".$localtion."/".$random.".".$ex[1]);
            }
            if($_FILES["filUpload_file"]["name"]!=""){
                $filUpload_file_name=trim(iconv("UTF-8", "TIS-620",$_FILES["filUpload_file"]["name"]));
                $ex2=explode(".",$filUpload_file_name);
                copy($_FILES["filUpload_file"]["tmp_name"],"../../../../../".$localtion."/".$random."news_file".".".$ex2[1]);
            }

            $sql="SELECT 
                tb_news.news_localtion,
                tb_news.news_file
                FROM
                website_db.tb_news
                WHERE
                tb_news.news_id='".$data1[news_id]."'";
                $q_sql = $this->conn->prepare($sql);
                $q_sql->execute();
                $row = $q_sql->fetch(PDO::FETCH_ASSOC);

            if($_FILES["filUpload"]["name"]!="" && $row[news_localtion]!=''){
                $localtion_del=iconv("UTF-8", "TIS-620",$row[news_localtion]);
                $flgDelete = @unlink($localtion_del);
            }
            if($_FILES["filUpload_file"]["name"]!=""  && $row[news_file]!=''){
                
                $localtion_del2=iconv("UTF-8", "TIS-620",$row[news_file]);
                $flgDelete2 = @unlink($localtion_del2);
            } 
            if($data1[news_id]!=''){
               
                $sql_update="UPDATE website_db.tb_news SET";
                $where= " WHERE news_id='".$data1[news_id]."'";

            }else{
                $sql_update="INSERT website_db.tb_news SET";
                $where= " ";
            }
            $sql_update.=" news_title='".$data1[titlenews]."' ,
                            news_detail='".$data1[message]."' ,
                            order_new='".$data1[order_new]."',
                            cate_id='".$data1[cate_id]."',
                            news_date='".date("Y-m-d")."',
                            news_time='".date("H:i:s")."',
                            news_check=1";
            if($_FILES["filUpload"]["name"]!=""){
                $sql_update .=",news_localtion='".$localtion.$random.".".$ex[1]."'";
            }
            if($_FILES["filUpload_file"]["name"]!=""){
                
                $sql_update .=",news_file='".$localtion.$random."news_file".".".$ex2[1]."'";
            }
            $sql_update .=" $where";
            $q_sql_update = $this->conn->prepare($sql_update);
            $q_sql_update->execute();
            return $sql_update;
        }
        
        public function save_news_test($data){
            print_r($data);
        }
        
        public function delete_menu($data){
            $sqlSelect ="SELECT menu_url FROM website_db.tb_menu";
            $sqlSelect .= " WHERE menu_main='".$data[menu_order]."'  AND menu_url !=''";
            $QuerysqlSelect = $this->conn->prepare($sqlSelect);
            $QuerysqlSelect->execute();
            while($fetch = $QuerysqlSelect->fetch(PDO::FETCH_ASSOC)){
				unlink(str_replace("http://10.2.1.184/website/","../../../../../", $fetch[menu_url]));
           	}

            $sqlSupmenu = " DELETE FROM website_db.tb_menu";
            $sqlSupmenu.= " WHERE menu_main='".$data[menu_order]."'";
            $q_sqlsqlSupmenu = $this->conn->prepare($sqlSupmenu);
            $q_sqlsqlSupmenu->execute();

            $sqlD = " DELETE FROM website_db.tb_menu";
            $sqlD.= " WHERE menu_id='".$data[menu_id]."'";
            $q_sqlD = $this->conn->prepare($sqlD);
            $q_sqlD->execute();
            // print_r($data);
            return 1;
        }

        public function file_download($data){

            // print_r($data);
            $sql="SELECT *
					FROM website_db.tb_menu
					WHERE tb_menu.menu_id = '".$data[menu_id_file]."'";
            $q_sql = $this->conn->prepare($sql);
            $q_sql->execute();

            if($data[cate_id_file]==1){
                $localtion="../../../../../upfile_ISO/";
                $localtion_show="upfile_ISO/";
            }elseif($data[cate_id_file]==2){
                $localtion="../../../../../upfile_5s/";
                $localtion_show="upfile_5s/";
            }elseif($data[cate_id_file]==3){
                $localtion="../../../../../upfile_safety/";
                $localtion_show="upfile_safety/";
            }
            if($row[type]=="2"){
                if($row[menu_url]!="wait"){
                    $oldfile_name = explode("/",$row[menu_url]);
                    $oldfile_name = $oldfile_name[2];
                    unlink($localtion.$oldfile_name);
                    }
                }		
            if(unlink){	
            if($_FILES["fileUpload"]["name"] != ""){
                $fileUpload_name=iconv("UTF-8", "TIS-620",$_FILES["fileUpload"]["name"]);		
                if(copy($_FILES["fileUpload"]["tmp_name"],$localtion.$fileUpload_name)){
                    //*** Insert Record ***//
                    $strUp = "UPDATE website_db.tb_menu SET
                                        menu_url = 'http://10.2.1.184/website/".$localtion_show.$_FILES["fileUpload"]["name"]."'
                                        WHERE menu_id='".$data[menu_id_file]."' ";
                    $QstrUp = $this->conn->prepare($strUp);
                    $QstrUp->execute();
                }
            }
            }
            return $strUp;
           
        }
    }
    
      

    
?>