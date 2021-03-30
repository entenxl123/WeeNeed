<?php
session_start();
include ("con_fig/db.php");
$var=array_merge($_GET,$_POST);
extract($var);
function convert_date($date){
    $date_split = explode("-",$date);
    return $date_split[2]."/".$date_split[1]."/".$date_split[0];
}

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
?>

<script>

function del_submenu(menu_id){
    var confirm_b = confirm("ต้องการลบข่าวนี้?");
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
                                        
                            }
                        });	
        }
    alert(menu_id);
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
        width: 500px; /* กำหนดความกว้าง */ 
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
       
        <!-- Sidebar inner chat start-->
      
        <!-- Sidebar inner chat end-->
        <div class="pcoded-main-container">
            <div class="pcoded-wrapper">
                <?php include("inc/sitebar.php")?>
                <div class="pcoded-content">
                    <div class="pcoded-inner-content">
                        <!-- Main-body start -->
                        <div class="main-body">
                            <div class="page-wrapper">
                                <!-- Page-header start -->
                                <div class="page-header">
                                 

                                                    <div class = "row">
                                                        <div class="col-lg-12">
                                                            <div name="Display" id="Display">
                                                            <div id="pcoded" class="pcoded">
    
                                                            
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
                                                                                                    <div class="card">
                                                                                                        <div class="card-header">
                                                                                                            <h5>รายการประชาสัมพันธ์<?php echo $row_cate[cate_name]?></h5>
                                                                                                            
                                                                                                            <button type="button" class="btn btn-primary waves-effect waves-light f-right d-inline-block md-trigger"   onclick="box_news('',<?=$cate_id?>)"> <i class="icofont icofont-plus m-r-5"></i> เพิ่ม</button>
                                                                                                            
                                                                                                        </div>
                                                                                                        <div class="card-block">
                                                                                                            <div class="table-responsive">
                                                                                                                <div class="table-content">
                                                                                                                    <div class="project-table">
                                                                                                                        <table id="table table-framed" class="table table-striped dt-responsive nowrap">
                                                                                                                            <thead>
                                                                                                                                <tr>
                                                                                                                                    
                                                                                                                                    <th>ลำดับ</th>
                                                                                                                                    <th ><center>หัวข้อข่าว</center></th>
                                                                                                                                    <th><center>ดูหน้า</center></th>
                                                                                                                                    <th><center>วันที่</center></th>
                                                                                                                                    <th><center>เวลา</center></th>
                                                                                                                                    <th><center>new update</center></th>
                                                                                                                                    <th><center>แก้ไข</center></th>
                                                                                                                                    <th><center>ลบ</center></th>

                                                                                                                                </tr>
                                                                                                                            </thead>
                                                                                                                            <tbody>
                                                                                                                            
                                                                                                                            <?
                                                                                                                                $sql="SELECT
                                                                                                                                            tb_news.news_id,
                                                                                                                                            tb_news.news_title,
                                                                                                                                            tb_news.order_new,
                                                                                                                                            tb_news.news_detail,
                                                                                                                                            tb_news.news_localtion,
                                                                                                                                            tb_news.cate_id,
                                                                                                                                            tb_news.news_date,
                                                                                                                                            tb_news.news_check,
                                                                                                                                            tb_news.news_time
                                                                                                                                            FROM
                                                                                                                                            tb_news";
                                                                                                                                if($cate_id!=""){
                                                                                                                                $sql.=" WHERE tb_news.cate_id='".$cate_id."' ";
                                                                                                                                }else{
                                                                                                                                $sql.=" WHERE tb_news.cate_id='' ";
                                                                                                                                }
                                                                                                                                $sql.=" ORDER BY  tb_news.news_date DESC,tb_news.order_new ASC";
                                                                                                                                $query=mysql_query($sql);
                                                                                                                                $i=0;
                                                                                                                                    while($row=mysql_fetch_array($query)){
                                                                                                                                        $i++;
                                                                                                                            ?>
                                                                                                                                <tr>
                                                                                                                            
                                                                                                                                
                                                                                                                                <th>
                                                                                                                                <center><h6></button><p class=""><?php echo $i.'.'?></p></h6></center>
                                                                                                                                </th>
                                                                                                                                    
                                                                                                                                    <td class="pro-name" style='word-break:break-all'>
                                                                                                                                        <h6 ><p class=" text_all_title cut-text"  ><?php echo $row[news_title]?></p></h6>
                                                                                                                                    </td>
                                                                                                                                    <td><a href="#!" class="m-r-15 text-muted" data-toggle="tooltip" data-placement="top" title="" onclick="show_webpage('<?=$cate_id?>')")" data-original-title="Webpage"><i class="icofont icofont-square-right"></i></a>
                                                                                                                                    </td>
                                                                                                                                    <td class="pro-name"><?=convert_date($row[news_date])?></td>
                                                                                                                                    <td><?php echo $row[news_time]?></td>
                                                                                                                                    <td>
                                                                                                                                    <center><input name="checknew" type="checkbox" value="1" <? if($row[news_check]==1){ echo "checked='checked'"; }?> onclick="del_news(<?=$row[news_id]?>);"/></center>
                                                                                                                                        
                                                                                                                                    </td> 
                                                                                                                                    <td>
                                                                                                                                    <button type="button" data-toggle="tooltip" title="edit" class="btn btn-danger  btn-mini waves-effect waves-light  d-inline-block md-trigger"  onclick="box_news(<?=$row[news_id]?>,<?=$cate_id?>)">
                                                                                                                                            <span class="icofont icofont-ui-edit"></span>
                                                                                                                                        </button>    
                                                                                                                                    </td>
                                                                                                                                    <td>
                                                                                                                                    <button type="button" data-toggle="tooltip" title="delete" class="btn btn-inverse  btn-mini waves-effect waves-light" onclick="delete_news(<?=$row[news_id]?>)" >
                                                                                                                                            <span class="icofont icofont-delete-alt"></span>
                                                                                                                                        </button>  
                                                                                                                                    </td>
                                                                                                                                    <input name="cate_id" id="cate_id" type="hidden" value="<?=$cate_id?>" />
                                                                                                                                    <input name="news_id" id="news_id" type="hidden" value="<?=$news_id?>" />
                                                                                                            
                                                                                                                                    </tr>
                                                                                                                            <?php } ?>
                                                                                                                            </tbody>
                                                                                                                        </table>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <!-- Product list card end -->
                                                                                                </div>
                                                                                            </div>
                                                                                            <!-- Add Contact Start Model start-->
                                                                                        
                                                                                      
                                                                                        <!-- Page-body end -->
                                                                                    </div>
                                                                                </div>
                                                                                <!-- Main-body end -->

                                                                        

                                                                                </div>
                                                                            </div>
                                                                        
                                                                    
                                                                </div>
                                                        
                                                    </div>

<script type="text/javascript" src="..\files\bower_components\jquery\js\jquery.min.js"></script>
    <script type="text/javascript" src="..\files\bower_components\jquery-ui\js\jquery-ui.min.js"></script>
    <script type="text/javascript" src="..\files\bower_components\popper.js\js\popper.min.js"></script>
    <script type="text/javascript" src="..\files\bower_components\bootstrap\js\bootstrap.min.js"></script>
    <!-- jquery slimscroll js -->
    <script type="text/javascript" src="..\files\bower_components\jquery-slimscroll\js\jquery.slimscroll.js"></script>
    <!-- modernizr js -->
    <script type="text/javascript" src="..\files\bower_components\modernizr\js\modernizr.js"></script>
    <script type="text/javascript" src="..\files\bower_components\modernizr\js\css-scrollbars.js"></script>

    <!-- datatable js -->
    <script src="..\files\bower_components\datatables.net\js\jquery.dataTables.min.js"></script>
    <script src="..\files\bower_components\datatables.net-bs4\js\dataTables.bootstrap4.min.js"></script>
    <script src="..\files\bower_components\datatables.net-responsive\js\dataTables.responsive.min.js"></script>
    <script src="..\files\bower_components\datatables.net-responsive-bs4\js\responsive.bootstrap4.min.js"></script>
    <!-- jquery file upload js -->
    <script src="..\files\assets\pages\jquery.filer\js\jquery.filer.min.js"></script>
    <script src="..\files\assets\pages\filer\custom-filer.js" type="text/javascript"></script>
    <script src="..\files\assets\pages\filer\jquery.fileuploads.init.js" type="text/javascript"></script>
    <!-- Model animation js -->
    <script src="..\files\assets\js\classie.js"></script>
    <script src="..\files\assets\js\modalEffects.js"></script>
    <!-- product list js -->
    <script type="text/javascript" src="..\files\assets\pages\product-list\product-list.js"></script>
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
<script>
    function show_webpage(webpage){
        if(webpage == '1'){
            window.open("../../ISO.php?cate_id=1");
        }else if(webpage == '2'){
            window.open("../../5S.php?cate_id=2");

        }else  if(webpage == '3'){
            window.open("../../safety.php?cate_id=3");

        } 
    }
</script>
<script async="" src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-23581568-13');


  function del_news(news_id){
	var param   = "news_id="+news_id;
			param += "&status=del_news";
			param += "&xid="+Math.random();
			getData = $.ajax({
				url : '?',
				data :encodeURI(param),
				async:false,
				success: function(getData){
                    console.log(getData)
				}
			}).responseText;
    }                                                                        
  function box_news(news_id,cate_id){
    //   alert(news_id);
      var params = '&cate_id='+cate_id;
          params += '&news_id='+news_id
      window.location='box_news.php?section=1&cate_id='+cate_id+'&news_id='+news_id;
  }

  function show_file(file){
      alert(file);
  }

  function delete_news(id){
        var confirm_b = confirm("ต้องการลบข่าวนี้?");
        // alert(confirm_b);
        if(confirm_b==true){
            var params = "news_id="+id;
                    $.ajax({  
                            type: "POST",
                            url: "core/api/controller/controller.php?status=delete_news",        
                            data:encodeURI(params),
                            /*dataType: 'json', */   
                            success: function(response){ 
                                        location.reload();
                            }
                        });	
        }
    }
</script>

</body>
</html>