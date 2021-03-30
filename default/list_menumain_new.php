<?php
session_start();
include ("con_fig/db.php");
$var=array_merge($_GET,$_POST);
extract($var);
?>

<script>

function del_submenu(menu_id){
    var confirm_b = confirm("ต้องการลบเมนูนี้?");
        // alert(confirm_b);
        if(confirm_b==true){
            var params = "menu_id="+menu_id;
                    $.ajax({  
                            type: "POST",
                            url: "core/api/controller/controller.php?status=delete_submenu",        
                            data:encodeURI(params),
                            /*dataType: 'json', */   
                            success: function(response){  
                                        console.log(response);
                                        location.reload();
                            }
                        });	
        }
}

function view_menu(page_id,cate_id,menu_id){ 
	if(cate_id==1){
		window.open("../../ISO_type.php?cate_id="+cate_id+"&page_id="+page_id+"&menu_id="+menu_id, "_blank");
	}else if(cate_id==2){
		window.open("../../5S_type.php?cate_id="+cate_id+"&page_id="+page_id+"&menu_id="+menu_id, "_blank");
	}else if(cate_id==3){
		window.open("../../safety_type.php?cate_id="+cate_id+"&page_id="+page_id+"&menu_id="+menu_id, "_blank");
	}
}

	
</script>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>MANAGER WEB SITE </title>
    <!-- HTML5 Shim and Respond.js IE10 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 10]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="#">
    <meta name="keywords" content="flat ui, admin Admin , Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">
    <meta name="author" content="#">
    <!-- Favicon icon -->
    <link rel="icon" href="..\files\assets\images\favicon.ico" type="image/x-icon">
    <!-- Google font--><link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,800" rel="stylesheet">
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="..\files\bower_components\bootstrap\css\bootstrap.min.css">
    <!-- Data Table Css -->
    <link rel="stylesheet" type="text/css" href="..\files\bower_components\datatables.net-bs4\css\dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="..\files\bower_components\datatables.net-responsive-bs4\css\responsive.bootstrap4.min.css">
    <!-- jquery file upload Frame work -->
    <link href="..\files\assets\pages\jquery.filer\css\jquery.filer.css" type="text/css" rel="stylesheet">
    <link href="..\files\assets\pages\jquery.filer\css\themes\jquery.filer-dragdropbox-theme.css" type="text/css" rel="stylesheet">
    <!-- animation nifty modal window effects css -->
    <link rel="stylesheet" type="text/css" href="..\files\assets\css\component.css">
    <!-- themify-icons line icon -->
    <link rel="stylesheet" type="text/css" href="..\files\assets\icon\themify-icons\themify-icons.css">
    <!-- ico font -->
    <link rel="stylesheet" type="text/css" href="..\files\assets\icon\icofont\css\icofont.css">
    <!-- feather Awesome -->
    <link rel="stylesheet" type="text/css" href="..\files\assets\icon\feather\css\feather.css">
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="..\files\assets\css\style.css">
    <link rel="stylesheet" type="text/css" href="..\files\assets\css\jquery.mCustomScrollbar.css">
    <link rel="stylesheet" href="fontcss/main.css">
    <script type="text/javascript" src="js/jquery-3.5.1.js"></script>


    
</head>
<style>
    .cut-text{
        text-decoration: none;
        text-overflow: ellipsis; /* เพิ่ม ... จุดจุดจุดท้ายสุด */ 
        display: block; overflow: hidden; 
        white-space: nowrap; 
        width: 400px; /* กำหนดความกว้าง */ 
    }
    button{
        margin-right:5px;
    }
</style>
<body>
<!-- Pre-loader start -->


<!-- Pre-loader end -->
<div class="theme-loader">
        <div class="ball-scale">
            <div class='contain'>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
               
            </div>
        </div>
    </div>
<div id="pcoded" class="pcoded">
    <div class="pcoded-overlay-box"></div>
    <div class="pcoded-container navbar-wrapper">

    <?php include("inc/headsitebar.php")?>
        <!-- Sidebar chat start -->
       
        <!-- Sidebar inner chat end-->
        <div class="pcoded-main-container">
            <div class="pcoded-wrapper">
                <?php include("inc/sitebar.php")?>
                <div class="pcoded-content">
                    <div class="pcoded-inner-content">
                        <div class="main-body">
                                <div class="page-header">
                                    <div class = "row">
                                        <div class="col-lg-12">
                                            <div id="pcoded" class="pcoded">
                                                <div class="pcoded-overlay-box"></div>
                                                    
                                                                    
                                                                        <div class="page-wrapper">
                                                                            <!-- Page-header start -->
                                                                            <?
                                                                            $sql_cate="SELECT
                                                                                        tb_category.cate_id,
                                                                                        tb_category.cate_name
                                                                                        FROM tb_category
                                                                                        WHERE cate_id='".$cate_id."' ";
                                                                            $query_cate=mysql_query($sql_cate);
                                                                            $row_cate=mysql_fetch_array($query_cate);
                                                                            ?>
                                                                            <div class="row">
                                                                                <div class="col-lg-8">
                                                                                    <div class="page-header-title">
                                                                                        <div class="d-inline">
                                                                                            <h4>รายการประชาสัมพันธ์<?php echo $row_cate[cate_name]?></h4>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-lg-4">
                                                                                        <button type="button" class="btn btn-primary  waves-light f-right d-inline-block md-trigger" data-modal="modal-13" onclick="status_add('add_newmenu')"> <i class="icofont icofont-plus-square m-r-5"></i>เพิ่มเมนู</button>
                                                                                </div>
                                                                            </div>
                                                                    </div>
                                                                    <!-- Page-header end -->
                                                                    <div class="page-body">
                                                                            <div class="row">
                                                                                <div class="col-sm-12">
                                                <!-- Product list card start -->
                                                                            <?
                                                                            $sql="SELECT
                                                                                            tb_menu.menu_id,
                                                                                            tb_menu.menu_name,
                                                                                            tb_menu.menu_main,
                                                                                            tb_menu.menu_order,
                                                                                            tb_menu.menu_url,
                                                                                            tb_menu.cate_id,
                                                                                            tb_menu.page_id,
                                                                                            tb_menu.status
                                                                                            FROM tb_menu
                                                                                            WHERE tb_menu.menu_main = 0 
                                                                                            AND menu_name != 'เมนูหลัก'";
                                                                            if($cate_id!=""){
                                                                            $sql.=" AND tb_menu.cate_id='".$cate_id."' ";
                                                                            }else{
                                                                            $sql.=" AND tb_menu.cate_id='' ";
                                                                            }
                                                                            $sql .="ORDER BY menu_id";
                                                                            $query=mysql_query($sql);
                                                                            $i=0;
                                                                                while($row=mysql_fetch_array($query)){
                                                                                    $i++;
                                                                        ?>
                                                                <div class="card">
                                                                    <div class="card-header">
                                                            
                                                                    <h5><?php echo $row[menu_name]?></h5>
                                                                        <?php if ($row[menu_id]!=1){?>
                                                                            <button type="button" class="btn btn-primary waves-effect waves-light f-right d-inline-block md-trigger" onclick="delete_menu(<?=$row[menu_id]?>,<?=$cate_id?>,<?=$row[menu_order]?>)"> <i class="icofont icofont-minus m-r-5"></i> ลบ</button>
                                                                            <button type="button" class="btn btn-primary waves-effect waves-light f-right d-inline-block md-trigger" data-toggle="modal" data-target="#add_menu" onclick="status_add('add_sub_newmenu',<?=$row[menu_order]?>,<?=$row[menu_id]?>)"><i class="icofont icofont-plus m-r-5"></i> เพิ่ม</button>
                                                            
                                                                        <?php }?>
                                                                    </div>
                                                                <div class="card-block">
                                                                    <div class="table-responsive">
                                                                        <div class="table-content">
                                                                            <div class="project-table">
                                                                                <table id="e-product-list" class="table table-striped dt-responsive nowrap">
                                                                                    <thead>
                                                                                        <tr>
                                                                                            <th ><center>ลำดับ</center></th>
                                                                                            <th width=40%><center>ชื่อเมนู</center></th>
                                                                                            <th width=25%><center>ดูหน้า</center></th>
                                                                                            <th width=25%><center>แก้ไข</center></th>
                                                                                        </tr>
                                                                                    </thead>
                                                                                    <tbody>
                                                                            <?
                                                                                $sql_menu="SELECT
                                                                                                tb_menu.type,
                                                                                                tb_menu.`status`,
                                                                                                tb_menu.link_status,
                                                                                                tb_menu.page_id,
                                                                                                tb_menu.cate_id,
                                                                                                tb_menu.menu_url,
                                                                                                tb_menu.menu_order,
                                                                                                tb_menu.menu_main,
                                                                                                tb_menu.menu_name,
                                                                                                tb_menu.menu_id,
                                                                                                tb_menu.type
                                                                                            FROM
                                                                                                tb_menu
                                                                                                WHERE tb_menu.menu_main =' ".$row[menu_order]."' AND tb_menu.menu_main !='1' 
                                                                                                AND  cate_id='".$cate_id."' 
                                                                                                ORDER BY menu_order";
                                                                                $query_menu=mysql_query($sql_menu);
                                                                                        $k=0;
                                                                                        while($row_menu=mysql_fetch_array($query_menu)){ 
                                                                                        $k++;
                                                                        ?>
                                                                            <tr>
                                                                            <td><center><h6 ><?php echo $k?></h6></center></td>
                                                                              <td><h6 class="cut-text"><?php echo $row_menu[menu_name]?></h6></td>
                                                                                <td><center>
                                                                               <?php if($row_menu[type]!=2 ){?>
                                                                                <a href="#!" class="m-r-15 text-muted" data-toggle="tooltip" data-placement="top" title="" onclick="view_menu('<?=$row_menu[page_id]?>','<?=$row_menu[cate_id]?>','<?=$row_menu[menu_id]?>');")" data-original-title="Webpage"><i class="icofont icofont-square-right"></i></a>
                                                                                <?php } ?>
                                                                                </center></td>
                                                                                <td class="action-icon"><center>
                                                                                <?php if ($row[menu_id]!=1){?>
                                                                                    <?php if($row_menu[type]!=2){?>
                                                                                    
                                                                                        <button type="button" data-toggle="tooltip" title="edit" class="btn btn-danger  btn-mini waves-effect waves-light  d-inline-block md-trigger"  onclick="box('<?=$row_menu[menu_id]?>','<?=$row_menu[page_id]?>','<?=$row_menu[menu_main]?>')"> 
                                                                                                                                            <span class="icofont icofont-ui-edit"></span>
                                                                                        </button>  
                                                                                        <button type="button" data-toggle="tooltip" title="delete" class="btn btn-inverse  btn-mini waves-effect waves-light" onclick="del_submenu(<?=$row_menu[menu_id]?>)" >
                                                                                                                                            <span class="icofont icofont-delete-alt"></span>
                                                                                                                                        </button>  
                                                                                <?php }else{ ?>
                                                                                    <button type="button"title="edit" class="btn btn-warning  btn-mini waves-effect waves-light  d-inline-block md-trigger" data-toggle="modal" data-target="#addsub_menu" title="" data-original-title="File download" onclick="file_download('<?=$row_menu[menu_id]?>')">
                                                                                                                                            <span class="icofont icofont-file-text"></span>
                                                                                        </button>  
                                                                                    <button type="button" data-toggle="tooltip" title="delete" class="btn btn-inverse  btn-mini waves-effect waves-light" onclick="del_submenu(<?=$row_menu[menu_id]?>)" >
                                                                                                                                            <span class="icofont icofont-delete-alt"></span>
                                                                                                                                        </button>  
                                                                                <?php }} ?>
                                                                                </center></td>
                                                                                        </tr>
                                                                                    <?php } ?>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php } ?>
                                                <!-- Product list card end -->
                                            </div>
                                            
                                        </div>

                                        <!-- modal add headmenu-->
                                        <form id="formmenu_insert" name="formmenu_insert" method="post" enctype="multipart/form-data">
                                        <div class="md-modal md-effect-13 addcontact" id="modal-13">
                                            <div class="md-content">
                                                <h3 class="f-26">รายการประชาสัมพันธ์<?php echo $row_cate[cate_name]?></h3>
                                                <div>
                                                    <div class="input-group">
                                                        <input type="text" id="name_menu" name="name_menu" class="form-control pname" placeholder="ขื่อเมนู">
                                                        <!-- <span class="input-group-addon btn btn-primary">Chooese File</span> -->
                                                    </div>
                                                    
                                                    <div class="input-group">
                                                    <input name="cmd"  id="cmd" type="hidden" value="<?=$cmd?>" >
                                                    </div>
                                                    <div class="text-center" name="btn_save_H" id="btn_save_H" >
                                                    <input type="hidden" name="cate_id" id="cate_id"  value="<?=$cate_id?>" >
                                                        <button type="button" id="save_but" name="save_but" class="btn btn-primary waves-effect m-r-20 f-w-600 d-inline-block" onclick="save_Hmenu()">บันทึก</button>
                                                        <button type="button" class="btn btn-primary waves-effect m-r-20 f-w-600 md-close d-inline-block close_btn">ยกเลิก</button>
                                                    </div>
                                                    
                                                </div>
                                                
                                            </div>
                                        </div>
                                        </form>
                                        <form id="form_add" name="form_add" method="post" enctype="multipart/form-data">
                                              <div class="modal fade" id="add_menu" tabindex="-1" role="dialog" aria-labelledby="add_menuModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">เพิ่มข้อมูล</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col-2">
                                                                    ชื่อเมนู
                                                                </div>
                                                                <div  class="col-10"> 
                                                                    <input type="text" id="name_sub" name="name_sub">
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-2">
                                                                    <label for="">ประเภท</label>
                                                                </div>
                                                                <div  class="col-10"> 
                                                                    <select class="form-select form-select-lg mb-3" id="type_menu" name="type_menu" aria-label=".form-select-lg example">
                                                                        <option value="">--เลือกประเภท--</option>
                                                                        <option value="1">บทความ</option>
                                                                        <option value="2">ดาวโหลด</option>
                                                                    </select>
                                                                            
                                                                    <input type="hidden" id="status_cmd" name="status_cmd">
                                                                    <input type="hidden" id="menu_order" name="menu_order">
                                                                    <input type="hidden" id="menu_id" name="menu_id">
                                                                    <input type="hidden" name="cate_id" id="cate_id"  value="<?=$cate_id?>" >
                                                                    <input name="news_id" id="news_id" type="hidden" value="<?=$news_id?>" >
                                                                </div>
                                                            </div>
                                                        </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
                                                                <button type="button" class="btn btn-primary" onclick="save_sub()">บันทึก</button>
                                                            </div>
                                                    </div>
                                                </div>
                                               </div>
                                        </form>
                                        <div class="md-overlay"></div>
                                        <!-- Add Contact Ends Model end-->
                                    </div>
                                </div>
                            </div> 
                            <form id="form_upload_file" name="form_upload_file" method="post" enctype="multipart/form-data">
                                            <div class="modal fade" id="addsub_menu" tabindex="-1" role="dialog" aria-labelledby="add_menuModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">เพิ่มข้อมูล</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-3">เลือกไฟล์ :</div>
                                                                <div class="col-4"> 
                                                                    <input type="file" name="fileUpload" id="fileUpload">
                                                            <input type="hidden" id="menu_id_file" name="menu_id_file">
                                                            <input type="hidden" name="cate_id_file" id="cate_id_file"  value="<?=$cate_id?>" >
                                                                </div>
                                                        </div>
                                                    </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
                                                            <button type="button" class="btn btn-primary" onclick="save_file()">บันทึก</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                </form>
                            <!-- Main-body end -->
               
    </div>
</div>

    <!-- jquery slimscroll js -->
  

    <!-- datatable js -->

 
    <!-- Model animation js -->
    <script src="..\files\assets\js\classie.js"></script>
    <script src="..\files\assets\js\modalEffects.js"></script>
    <!-- product list js -->
    <script type="text/javascript" src="..\files\assets\pages\product-list\product-list.js"></script>
    <!-- i18next.min.js -->
    


<!-- Global site tag (gtag.js) - Google Analytics -->
<script async="" src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-23581568-13');
  function save_Hmenu(){
        if($('#name_menu').val()==''){
            alert('กรุณาใส่ชื่อเมนู');
            return false;
        }
        var form = $('#formmenu_insert')[0];
        var data = new FormData(form);
       
        if($('#status_cmd').val()=='add_newmenu'){
            $.ajax({
					
                    url:"core/api/controller/controller.php?status=Add_newmenu&cate_id="+$('#cate_id').val(),
                    type:"post",
                    enctype:"multipart/form-data",
                    data:data,
                    processData:false,
                    contentType:false,
                    cache:false,
                    timeout:600000,
                    success: function(result) {
                                console.log(result);
                                if(result==1){
                                    alert("สร้างเมนูใหม่สำเร็จ");
                                    location.reload();
                                }
                               
                           }
                    });
                }           
        
    }

    function status_add(sta,menu_order,menu_id){
        $('#status_cmd').val(sta);
        // alert(menu_id);
        if(sta == 'add_newmenu'){
            $('#menu_order').val(0);
            $('#menu_id').val(0);
            // alert(54545454);
        }else if(sta == 'add_sub_newmenu'){
            $('#menu_id').val(menu_id);
            $('#menu_order').val(menu_order);
        }
    }
    
    function save_sub(){
        if($('#name_sub').val()==''){
            alert('กรุณาใส่ชื่อเมนู');
            return false;
        }else if($('#type_menu').val()==''){
            alert('กรุณาเลือกประเภท');
            return false;
        }
        var form = $('#form_add')[0];
        var data = new FormData(form);
                    $.ajax({
					
                    url:"core/api/controller/controller.php?status=Add_sup_newmenu",
                    type:"post",
                    enctype:"multipart/form-data",
                    data:data,
                    processData:false,
                    contentType:false,
                    cache:false,
                    timeout:600000,
                    success: function(result) {
                                console.log(result);
                                alert('เพิ่มเมนูเรียบร้อย');
                                location.reload();
                           }
                    });
         
    }

    function file_download(menu_id){
        $('#menu_id_file').val(menu_id);
    }

    function save_file(){
       /* var params = "&menu_id="+$('#menu_id_file').val();
            params += "&cate_id="+$('#cate_id_file').val();*/
          
        var form = $('#form_upload_file')[0];
        var data = new FormData(form);
        $.ajax({
					
                    url:"core/api/controller/controller.php?status=file_download",
                    type:"post",
                    enctype:"multipart/form-data",
                    data:data,
                    processData:false,
                    contentType:false,
                    cache:false,
                    timeout:600000,
                    success: function(result) {
                                console.log(result);
                                alert('เพิ่มไฟล์เรียบร้อย');
                                location.reload();
                           }
                    });
    }

    function delete_menu(menu_id, cate_id, menu_order){
        var confirm_b = confirm("ต้องการลบหัวข้อเมนูนี้?");
        // alert(menu_id);
        var params = "menu_id="+menu_id;
            params += "&cate_id="+cate_id;
            params += "&menu_order="+menu_order;
        if(confirm_b==true){
                    $.ajax({  
                            type: "POST",
                            url: "core/api/controller/controller.php?status=delete_menu",        
                            data:encodeURI(params),
                            /*dataType: 'json', */   
                            success: function(response){  
                                            console.log(response);
                                            alert('ลบเมนูเรียบร้อย');
                                            location.reload();
                                        
                            }
                        });	
        }
       
        
    }

    function gotopage(URL){
        window.location= URL;
    }


    function box(menu_id, menu_main, page_id){
        var params ='&cate_id='+$('#cate_id').val()+'&menu_id='+menu_id+'&menu_main='+menu_main+'&page_id='+page_id+'&xid='+Math.random();
        window.location='box_page.php?section=1'+params;
   
    }
</script>



<script type="text/javascript" src="..\files\bower_components\jquery\js\jquery.min.js"></script>
<script type="text/javascript" src="..\files\bower_components\jquery-ui\js\jquery-ui.min.js"></script>
<script type="text/javascript" src="..\files\bower_components\popper.js\js\popper.min.js"></script>
<script type="text/javascript" src="..\files\bower_components\bootstrap\js\bootstrap.min.js"></script>
<!-- jquery slimscroll js -->
<!-- <script type="text/javascript" src="..\files\bower_components\jquery-slimscroll\js\jquery.slimscroll.js"></script> -->
<!-- modernizr js -->
<!-- <script type="text/javascript" src="..\files\bower_components\modernizr\js\modernizr.js"></script>
<script type="text/javascript" src="..\files\bower_components\modernizr\js\css-scrollbars.js"></script> -->

<!-- i18next.min.js -->
<script type="text/javascript" src="..\files\bower_components\i18next\js\i18next.min.js"></script>
<script type="text/javascript" src="..\files\bower_components\i18next-xhr-backend\js\i18nextXHRBackend.min.js"></script>
<script type="text/javascript" src="..\files\bower_components\i18next-browser-languagedetector\js\i18nextBrowserLanguageDetector.min.js"></script>
<script type="text/javascript" src="..\files\bower_components\jquery-i18next\js\jquery-i18next.min.js"></script>

<script src="..\files\assets\js\pcoded.min.js"></script>
<script src="..\files\assets\js\vartical-layout.min.js"></script>
<script src="..\files\assets\js\jquery.mCustomScrollbar.concat.min.js"></script>
    <!-- Custom js -->
<script type="text/javascript" src="..\files\assets\js\script.js"></script>

<script src="js/axios.min.js"></script>
    <script src="js/axios.min.map"></script>
    <script src="logout.js"></script>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async="" src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-23581568-13');
</script>
</body>

</html>
