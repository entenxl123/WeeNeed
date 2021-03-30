<?php
    include('../../../inc/config.php');	
    include('../model/model_appove.php');
    $master = new Master();
    
    // ! รับต่าที่ถูกส่งทาง axios
    $requestBody = file_get_contents('php://input');
    $requestBody = json_decode($requestBody, true);

    if($_GET['status']=="save_master_doc"){
         echo json_encode($master->save_master_doc($_REQUEST));
	}else if($_GET['status']=="view_master_doc"){
        echo json_encode($master->view_master_doc($requestBody));
    }else if($_GET['status']=="get_data_master_doc"){
        echo json_encode($master->get_data_master_doc($_REQUEST));
    }else if($_GET['status']=="get_Edit_master"){
       echo json_encode($master->get_Edit_master($requestBody));
    }else if($_GET['status']=="get_doc_type"){
        echo json_encode($master->get_doc_type($_REQUEST));
    }else if($_GET['status']=="get_Approval_position"){
        echo json_encode($master->get_Approval_position($_REQUEST));
	}else if($_GET['status']=="save_approve"){
        echo json_encode($master->save_approve($_REQUEST));
    }else if($_GET['status']=="get_all_Approval"){
        echo json_encode($master->get_all_Approval($_REQUEST));
    }else if($_GET['status']=="set_type"){
        echo ($master->set_type($_REQUEST));
    }else if($_GET['status']=="view_doc_approve"){
        echo json_encode($master->view_doc_approve($requestBody));
    }else if($_GET['status']=="get_edit_make_doc"){
        echo json_encode($master->get_edit_make_doc($_REQUEST));
    }else if($_GET['status']=="get_all_approver_Edit"){
        echo json_encode($master->get_all_approver_Edit($_REQUEST));
    }else if($_GET['status']=="Update_approve"){
        echo json_encode($master->Update_approve($_REQUEST));
    }else if($_GET['status']=="get_company"){
        echo json_encode($master->get_company($_REQUEST));
    }else if($_GET['status']=="get_branch"){
        echo json_encode($master->get_branch($_REQUEST));
    }else if($_GET['status']=="get_Approval_duty"){
        echo json_encode($master->get_Approval_duty($_REQUEST));
    }else if($_GET['status']=="save_edit_approve"){
        echo json_encode($master->save_edit_approve($_REQUEST));
    }else if($_GET['status']=="send_to_approver"){
        echo $master->send_to_approver($_REQUEST);
    }else if($_GET['status']=="get_DataMakeDoc"){
        echo json_encode($master->get_DataMakeDoc($_REQUEST));
    }else if($_GET['status']=="delete_master_doc"){
        echo json_encode($master->delete_master_doc($_REQUEST));
    }else if($_GET['status']=="get_all_data_Master_doc"){
        echo json_encode($master->get_all_data_Master_doc($requestBody));
    }else if($_GET['status']=="get_all_approver"){
        echo json_encode($master->get_all_approver($requestBody));
    }else if($_GET['status']=="get_duty_position"){
        echo json_encode($master->get_duty_position($_REQUEST));
    }else if($_GET['status']=="check_approve_fin"){
        echo json_encode($master->check_approve_fin($requestBody));
    }else if($_GET['status']=="recive_doc"){
        echo json_encode($master->recive_doc($requestBody));
    }else if($_GET['status']=="edit_master_doc"){
        echo json_encode($master->edit_master_doc($_REQUEST));
    }else if($_GET['status']=="show_website"){
        // echo 'showweb';
         echo json_encode($master->show_website($requestBody));
    }else if($_GET['status']=="ck_master_doc"){
        // echo 'ck_master_doc';
        echo json_encode($master->ck_master_doc($requestBody));
    }else if($_GET['status']=="chang_Doc_use"){
        echo json_encode($master->chang_Doc_use($requestBody));
    }
?> 