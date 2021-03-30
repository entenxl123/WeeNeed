<?
	session_start();
	include 'con_fig/db.php';
	$var=array_merge($_GET,$_POST);
	extract($var);
	if($status=="add_page"){
		$detail=html_entity_decode($message);	
		stripslashes($detail);
		if(empty($detail)){
			echo"กรอกข้อมูลหน้าเว็บ";
			exit();
		}
	}
	
	if($del_file=="ok"){
					
		$sql="UPDATE tb_news SET
			 tb_news.news_file=NULL
			 WHERE
			 tb_news.news_id='".$news_id."' ";
		$query=mysql_query($sql);
					if($query){
						echo "1";
					}else{
						echo "0";
					}
				exit();
		}
    
    if($del_pdf=="ok"){
        echo "del_pdf";
        exit();
    }
?>
<?php
session_start();
include ("con_fig/db.php");
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
<style>
.file_input {
    margin-top : 10px;
}
.img-file {
    margin : 10px;
}
.icon-img{
    margin-top : 30px;
}
</style>
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

    
    <link rel="stylesheet" href="555/main.css">
    <!-- Favicon icon -->
    <link rel="icon" href="..\files\assets\images\favicon.ico" type="image/x-icon">
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600" rel="stylesheet">
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="..\files\bower_components\bootstrap\css\bootstrap.min.css">
    <!-- themify-icons line icon -->
    <link rel="stylesheet" type="text/css" href="..\files\assets\icon\themify-icons\themify-icons.css">
    <!-- ico font -->
    <link rel="stylesheet" type="text/css" href="..\files\assets\icon\icofont\css\icofont.css">
    <!-- feather Awesome -->
    <link rel="stylesheet" type="text/css" href="..\files\assets\icon\feather\css\feather.css">
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="..\files\assets\css\style.css">
    <link rel="stylesheet" type="text/css" href="..\files\assets\css\jquery.mCustomScrollbar.css">
    <link rel="stylesheet" href="..\files\assets\scss\partials\menu\_pcmenu.htm">
    <link rel="stylesheet" href="fontcss/main.css">
    <script type="text/javascript" src="js/jquery-3.5.1.js"></script>


    
</head>
<style>
body{
	background-color:#F0EBE2; 
	font:"MS Sans Serif";
	font-size:13px;	
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
                                            <div>

                                            
                                            <div class="card">
                                            <form name="form_news" id="form_news" enctype="multipart/form-data">
                                                
                                                <?
                                                $sql_cate="SELECT
                                                                            tb_category.cate_id,
                                                                            tb_category.cate_name
                                                                            FROM tb_category
                                                                            WHERE cate_id='".$cate_id."' ";
                                                $query_cate=mysql_query($sql_cate);
                                                $row_cate=mysql_fetch_array($query_cate);
                                                
                                                $sql_news="SELECT *
                                                                            FROM tb_news
                                                                            WHERE news_id='".$news_id."'"; 
                                                    $query_news=mysql_query($sql_news);
                                                    $row_news=mysql_fetch_array($query_news);
                                                
                                                ?>
                                                <div class="card-header">
                                                    <div class="row">
                                                        <h4>ข่าวประชาสัมพันธ์<?=$row_cate[cate_name]?>&nbsp; ลำดับ</h4><input class="form control" align-text="center" type="text" name="order_new" id="order_new"  value="<?=$row_news[order_new]?>"style="width:30px;" /><center>
                                                    </div>
                                                </div>
                                                <?
                                                    
                                                if($news_id!=''){	
                                            ?>
                                            <div class="card-block">
                                            <div class="row">
                                                <div class="col-xl-4 col-md-12">
                                                <div class="card" >
                                                    <div class="card-block">
                                                        
                                                        <h4 class="head_detail card-title">อัพรูปหัวข้อข่าว</h4>
                                                        <?php
                                                            if($row_news[news_localtion]!=""){
                                                        ?>
                                                        <img class="img-file card-text" src=../../<?=$row_news[news_localtion]?> height="80" width="80">
                                                        <?}?>
                                                        <input class="file_input card-text" type="file" name="filUpload" />
                                                        <? if($row_news[news_localtion]!=''){?>
                                                    <p style="color:#FF0000">**หากอัปโหลดรูปใหม่ รูปเก่าจะถูกลบออกทันที</p>
                                                <? }?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-md-12">
                                            <div class="card">
                                                <div class="card-block" >
                                            
                                                    <h4 class="card-title">หัวข้อข่าว:</h4>
                                                    <textarea  class="form-control" name="titlenews" id="titlenews" cols="33%" rows="5"><?=$row_news[news_title]?></textarea>
                                                    <br>
                                                    <br>
                                                    <br>
                                                    <br>
                                                </div>
                                            </div>
                                                
                                                                                    
                                            </div>
                                            <div class="col-xl-4 col-md-12">
                                                <div class="row align-items-end text-right" >
                                                <div class="col-8">
                                            
                                            </div>
                                            </div>
                                            <div class="card">
                                                <div class="card-block" >
                                                    <h4 class="head_detail card-title">อัพไฟล์ PDF</h4>
                                                    <br>
                                                    <? if($row_news[news_file]!=''){?>

                                                    <input class="img-file" type="hidden"  value="../../<?=$row_news[news_file]?>">
                                                    <label for="">ดูเอกสาร </label> &nbsp;<i class="icofont icofont-square-right" onclick="show_file('../../<?=$row_news[news_file]?>' )" style="cursor: pointer;"></i>
                                                    <input type="button" onclick="delete_file_pdf(<?=$row_news[news_id]?>)" value="ลบ">
                                            
                                                    <? }?>
                                                    <input class="file_input card-text" type="file" name="filUpload_file" /> 
                                                    <? if($row_news[news_file]!=''){?>
                                                    <p style="color:#FF0000">**หากอัปโหลดไฟล์ใหม่ ไฟล์เก่าจะถูกลบออกทันที</p>
                                                     <? }?>
                                                     <br>
                                                    <br>
                                                    <br>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                        <?
                                            }else{
                                        ?>
                                        <div class="card-block">
                                            <div class="row">
                                                <div class="col-xl-4 col-xs-12">
                                                    <div class="card">
                                                            <div class="card-block">
                                                                <h4 class="card-title">อัพรูปหัวข้อข่าว</h4>
                                                                <input class="card-text" type="file" name="filUpload" />
                                                            </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-4 col-xs-12">
                                                    <div class="card">
                                                        <div class="card-block">
                                                            <h4 class="card-title">หัวข้อข่าว:</h4>
                                                            <textarea name="titlenews" id="titlenews" cols="33%" rows="5"><?=$row_news[news_title]?></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                    <div class="col-xl-4 col-xs-12">
                                                        <div class="row align-items-end text-right" >
                                                            <div class="col-8"></div>
                                                        </div>
                                                        <div class="card">
                                                            <div class="card-block">
                                                                <h4 class="card-title">อัพไฟล์ PDF</h4>
                                                                <input type="file" name="filUpload_file" /> 
                                                            </div>
                                                        </div>
                                                    </div>
                                            </div>
                                        <?
                                            }
                                        ?>
                                        <br>
                                <table width="100%" border="0" cellpadding="0" cellspacing="0">
                                    <tr>
                                    <td>
                                    <textarea cols="80%" id="message" name="message" rows="10" ><?=stripslashes($row_news[news_detail])?></textarea>
                                    <input name="detail" id="detail" type="hidden" >
                                    <input name="cate_id" id="cate_id" type="hidden" value="<?=$cate_id?>">
                                    <input name="news_id" id="news_id" type="hidden" value="<?=$news_id?>">
                                    </td>
                                    </tr>
                                </table>
                                
                                </form>
    <br>
    
    </div>
    <div class="row">
        <div class="col-10"></div>
        <button onclick="save_news()" class="btn btn-success">บันทึก</button>
    </div>
    <br>
</div>
	

<script type="text/javascript" src="js/jquery-3.5.1.js"></script>
<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
<script type="text/javascript">
	if (CKEDITOR.instances['message']) {
		CKEDITOR.instances['message'].destroy();
		}
	//<![CDATA[
   CKEDITOR.replace( 'message',{
    toolbar:[ ['Source','Preview','Bold', 'Italic', 'Underline', '-', 'Subscript','Strike', 'Superscript', '-', 'NumberedList', 'BulletedList', '-', 'Link', 'Unlink'],['Outdent', 'Indent', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock', 'Language'],
  ['Image','Video', 'Flash', 'Smiley','Iframe', '-', 'Table', 'HorizontalRule', 'SpecialChar' ,'Font','FontSize','Styles', 'Format' ,'TextColor', 'BGColor' ] ,['Maximize', 'ShowBlocks' ]],
	language : 'en',
	height : 350,
	filebrowserBrowseUrl : '../../ckeditor/ckfinder/ckfinder.html',
	filebrowserImageBrowseUrl : '../../ckeditor/ckfinder/ckfinder.html?Type=Images',
	filebrowserFlashBrowseUrl : '../../ckeditor/ckfinder/ckfinder.html?Type=Flash',
	filebrowserUploadUrl : '../../ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
	filebrowserImageUploadUrl : '../../ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
	filebrowserFlashUploadUrl : '../../ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
	} );


   
</script>
<script>
 function save_news(){   
	var detail = (CKEDITOR.instances.message.getData());
	$("#message").val(detail);
    var form = $('#form_news')[0];
	var data = new FormData(form);
		$.ajax({
                    url:"core/api/controller/controller.php?status=save_news2",
                    type:"post",
                    enctype:"multipart/form-data",
                    data:data,
                    processData:false,
                    contentType:false,
                    cache:false,
                    timeout:600000,
                    success: function(result) {
                                console.log(result);
                                if($('#news_id').val()==''){
                                    alert('เพิ่มเมนูเรียบร้อย');
                                }else{
                                    alert('แก้ไขเมนูเรียบร้อย');
                                }
                                location.href = 'list_news2_new.php?section=1&cate_id='+$('#cate_id').val();
								
                           }
                    });
       
    }

function show_file(url_file){
    window.open(url_file);	
}

function goto_news(){
	alert("goto_news");
}

function delete_file_pdf(news_id){
    var ok=confirm("ยืนยันการลบข้อมูล");
		if(ok){	
			param  ="news_id="+news_id;
			param +="&del_file=ok";
			param +="&xid="+Math.random(); 
			getData = $.ajax({
					url :'?',
					data:encodeURI(param),
					async:false,
					success:function(getData){
						if(getData==1){
							location.reload();
						}else{
							alert('ไม่สามารถบันทึกได้');
						}
					}	
			}).responseText;
	  }
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

</body>

</html>

