<?php
    include('../../../inc/config.php');	
    include('../model/model.php');
    $master = new Master();
    if($_REQUEST['status']=="add_new"){
        echo ($master->insert_news($_REQUEST));
    }elseif($_REQUEST['status']=="show_edit_news"){
        echo json_encode($master->show_edit_news($_REQUEST));
    }elseif($_REQUEST['status']=="edit_news"){
        echo json_encode($master->edit_news($_REQUEST));
    }elseif($_REQUEST['status']=="delete_news"){
        echo $master->delete_news($_REQUEST);
    }elseif($_REQUEST['status']=="Add_newmenu"){
        echo $master->Add_newmenu($_REQUEST);
    }elseif($_REQUEST['status']=="Add_sup_newmenu"){
        echo $master->Add_sup_newmenu($_REQUEST);
    }elseif($_REQUEST['status']=="delete_submenu"){
        echo $master->delete_submenu($_REQUEST);
    }elseif($_REQUEST['status']=="save_code"){
        echo $master->save_code($_REQUEST);
    }elseif($_REQUEST['status']=="save_news2"){
        echo $master->save_news2($_REQUEST);
    }elseif($_REQUEST['status']=="save_contact"){
        echo $master->save_contact($_REQUEST);
    }elseif($_REQUEST['status']=="Add_sup_newmenu1"){
        echo $master->save_news_test($_REQUEST);
    }elseif($_REQUEST['status']=="delete_menu"){
        echo $master->delete_menu($_REQUEST);
    }elseif($_REQUEST['status']=="file_download"){
       echo $master->file_download($_REQUEST);
    //    echo $_REQUEST[cate_id_file];
    }
?>