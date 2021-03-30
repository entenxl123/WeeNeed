<?
    include('../model/login.php');
   
    $record = new LoginPermission();

    $requestBody = file_get_contents('php://input');
    $requestBody = json_decode($requestBody, true);

    if($_GET['status']=="login"){
        // echo 5454545;
        echo json_encode($record->login($requestBody));
    }else if($_GET['status']=="logout"){
        echo json_encode($record->logout($requestBody));
    }else if($_GET['status']=="ch_session"){
        echo json_encode($record->ch_session($requestBody));
    }

  

?>