<?
	session_start();
	$var=array_merge($_GET,$_POST);
	extract($var);
	include ("con_fig/db.php");
	if($status=="del_news"){
		$sql_news="SELECT
								tb_news.news_check
								FROM
								tb_news
								WHERE
								tb_news.news_id='".$news_id."'";
		$query_news=mysql_query($sql_news);
		$row_news=mysql_fetch_array($query_news);
		if($row_news[news_check]==1){
		$sql="UPDATE  tb_news SET
					news_check=0
					WHERE tb_news.news_id='".$news_id."'";
		}else {
			$sql="UPDATE  tb_news SET
					news_check=1
					WHERE tb_news.news_id='".$news_id."'";
			}
		$query=mysql_query($sql);
	exit();	
		}
		
		
	function check_date($y){
	$day=explode('-',$y);
	return $day[2]."/".$day[1]."/".$day[0];
    }
    
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="#">
    <meta name="keywords" content="Admin , Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">
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
<style>
th {
    align : center;
}
</style>
<!-- <script type="text/javascript" src="ckeditor/ckeditor.js"></script> -->
<script>
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
            // alert("add_sub");
          
            // alert("sadddd");
        }
    }
    function edit_article(){
        // alert('article');
        box();
    }
    function edit_upload(){
        alert('upload');
    }
    function save_Hmenu(){
        var form = $('#formmenu_insert')[0];
        var data = new FormData(form);
        $('file_topic').show();
        // alert(menu_id);
        if($('#status_cmd').val()=='add_newmenu'){
            $.ajax({
					
                    url:"core/api/controller/controller.php?status=Add_newmenu",
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
                }else{
                    alert("Add sub");
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
        
    }
</script>
<script type="text/javascript" src="js/jquery-3.5.1.js"></script>
<head>
    <title>Adminty - Premium Admin Template by Colorlib </title>
    <!-- HTML5 Shim and Respond.js IE10 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 10]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
    <!-- Meta -->
    
</head>

<body>
<div id="pcoded" class="pcoded">
    <div class="pcoded-overlay-box"></div>
    <div class="pcoded-container navbar-wrapper">

        <!-- Sidebar chat start -->
     
        <!-- Sidebar inner chat start-->
        
        <!-- Sidebar inner chat end-->
        <div class="pcoded-main-container">
		
            <div class="pcoded-wrapper">
           
                        <!-- Main-body start -->
                        <div class="main-body">
						
                            <div class="page-wrapper">
                                <!-- Page-header start -->
                                <div class="page-header">
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
                                                    <button type="button" class="btn btn-primary waves-effect waves-light f-right d-inline-block md-trigger" data-modal="modal-13" onclick="status_add('add_newmenu')"> <i class="icofont icofont-plus m-r-5"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="page-header-breadcrumb">
                                                
                                            </div>
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
                                                                                            WHERE tb_menu.menu_main = 0";
                                                                            if($cate_id!=""){
                                                                            $sql.=" AND tb_menu.cate_id='".$cate_id."' ";
                                                                            }else{
                                                                            $sql.=" AND tb_menu.cate_id='' ";
                                                                            }
                                                                            $query=mysql_query($sql);
                                                                            $i=0;
                                                                                while($row=mysql_fetch_array($query)){
                                                                                    $i++;
                                                                        ?>
                                                <div class="card">
                                                    <div class="card-header">
                                                   
                                                        <h5><?php echo $row[menu_name]?></h5>
                                                        <button type="button" class="btn btn-primary waves-effect waves-light f-right d-inline-block md-trigger" data-modal="modal-13" onclick="status_add('add_sub_newmenu',<?=$row[menu_order]?>,<?=$row[menu_id]?>)"> <i class="icofont icofont-plus m-r-5"></i> เพิ่ม
                                            </button>
                                                    </div>
                                                    <div class="card-block">
                                                        <div class="table-responsive">
                                                            <div class="table-content">
                                                                <div class="project-table">
                                                                
                                                                    <table id="e-product-list" class="table table-striped dt-responsive nowrap">
                                                                        <thead>
                                                                            <tr>
   
                                                                                <th width=25%>ลำดับ</th>
                                                                               
                                                                                <th width=25%>ดูหน้า</th>
                                                                                <th width=25%>แก้ไข</th>
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
                                                                                                            tb_menu.menu_id
                                                                                                            FROM
                                                                                                            tb_menu
                                                                                                            WHERE tb_menu.menu_main ='".$row[menu_order]."' 
                                                                                                            AND  cate_id='".$cate_id."' ";
                                                                                $query_menu=mysql_query($sql_menu);
                                                                                        $k=0;
                                                                                        while($row_menu=mysql_fetch_array($query_menu)){ 
                                                                                        $k++;
                                                                            ?>
                                                                            <tr>
                                                                            <td>
                                                                            <h6><?php echo $k.'.'.$row_menu[menu_name]?></h6>
                                                                                </td>
                                                                              
                                                                                <td>
                                                                               
                                                                                <a href="#!" class="m-r-15 text-muted" data-toggle="tooltip" data-placement="top" title="" data-original-title="Webpage"><i class="icofont icofont-square-right"></i></a>
                                                                                    
                                                                                </td>
                                                                                <td class="action-icon">
                                                                                    <a href="#!" class="m-r-15 text-muted" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit" onclick="box('<?=$row_menu[menu_id]?>','<?=$row_menu[page_id]?>','<?=$row_menu[menu_main]?>')"><i class="icofont icofont-ui-edit"></i></a>
                                                                                    <a href="#!" class="text-muted" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete" onclick="del_submenu(<?=$row_menu[menu_id]?>)" ><i class="icofont icofont-delete-alt"></i></a>
                                                                                    
                                                                                </td>
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
                                        <!-- Add Contact Start Model start-->
                                        <form id="formmenu_insert" name="formmenu_insert" method="post" enctype="multipart/form-data">
                                        <div class="md-modal md-effect-13 addcontact" id="modal-13">
                                            <div class="md-content">
                                                <h3 class="f-26">รายการประชาสัมพันธ์<?php echo $row_cate[cate_name]?></h3>
                                                <div>
                                                    <div class="input-group">
                                                        <input type="text" id="name_manu" name="name_manu" class="form-control pname" placeholder="ขื่อเมนู">
                                                        <!-- <span class="input-group-addon btn btn-primary">Chooese File</span> -->
                                                    </div>
                                                   
                                                    
                                                    <div class="input-group">
                                                    <input type="hidden" id="status_cmd" name="status_cmd">
                                                    <input type="hidden" id="menu_order" name="menu_order">
                                                    <input type="hidden" id="menu_id1" name="menu_id1">
                                                    <input type="hidden" id="menu_id" name="menu_id">
                                                    
                                                    <input type="hidden" name="cate_id" id="cate_id"  value="<?=$cate_id?>" >
                                                
                                                        <input name="news_id" id="news_id" type="hidden" value="<?=$news_id?>" >
                                                        <input name="cmd"  id="cmd" type="hidden" value="<?=$cmd?>" >
                                                    </div>
                                                    <div class="text-center" name="btn_save_H" id="btn_save_H" >
                                                        <button type="button" id="save_but" name="save_but" class="btn btn-primary waves-effect m-r-20 f-w-600 d-inline-block" onclick="save_Hmenu()">Save</button>
                                                        <button type="button" class="btn btn-primary waves-effect m-r-20 f-w-600 md-close d-inline-block close_btn">Close</button>
                                                    </div>
                                                    
                                                </div>
                                                
                                            </div>
                                        </div>
                                        <form>
                                        <div class="md-overlay"></div>
                                        <!-- Add Contact Ends Model end-->
                                    </div>
                                    <!-- Page-body start -->
                                 
                                    <!-- Page-body end -->
                                </div>
                            </div>
                            <!-- Main-body end -->

                            <div id="styleSelector">

                            </div>
                        </div>
                    
                
            </div>
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
</script>
</body>
</html>