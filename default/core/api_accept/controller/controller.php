<?php
    include('../../../inc/confin-1.php');	
    include('../model/model.php');
    $master = new Master();
    if($_GET['status']=="get_employee_name"){
        echo json_encode($master->get_employee_name($_REQUEST));   
	}else if($_GET['status']=="get_company"){
        echo json_encode($master->get_company($_REQUEST));;
        // echo json_encode($master->save_approve($_REQUEST));
    }else if($_GET['status']=="get_branch"){
        echo json_encode($master->get_branch($_REQUEST));;
        // echo json_encode($master->save_approve($_REQUEST));
    }
?>