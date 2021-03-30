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
                                                            <html xmlns="http://www.w3.org/1999/xhtml">

                                                            <script type="text/javascript" src="js/jquery-3.5.1.js"></script>
                                                            <script type="text/javascript" src="ckeditor/ckeditor.js"></script>
                                                            <script>

                                                            </script>
                                                            <head>
                                                            <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
                                                            <title>Untitled Document</title>

                                                            <!-- <script type="text/javascript" src="js/jquery-1.5.1.js"></script> -->

                                                            </head>

                                                            <body>
                                                            <?
                                                                    $sql="SELECT *
                                                                                FROM tb_contact";
                                                                    $query=mysql_query($sql);
                                                                    $row=mysql_fetch_array($query);
                                                                    $num=mysql_num_rows($query);
                                                                    if($num==0){
                                                                        $status="add";
                                                                    }else{
                                                                        $status="update";
                                                                    }
                                                                    //#008000
                                                                    
                                                            ?>
                                                            <form name="form_contact" id="form_contact" enctype="multipart/form-data">
                                                                <h2><strong>ข้อมูลการติดต่อแผนกบริหารคุณภาพ </strong></h2>
                                                                <br>
                                                                <hr>
                                                                <textarea cols="80%" id="message" name="message" rows="10" ><?=stripslashes($row[contact_detail])?></textarea>
                                                                <input name="contact_id"  id="contact_id" type="hidden" value="<?=$row[contact_id]?>" />
                                                                

                                                            </form>
                                                            <div class="row">
                                                                <div class="col-10"></div>
                                                                <button onclick="save_contact() " class="btn btn-success">save</button>
                                                            </div>

                                                            <script type="text/javascript">
                                                            $(document).ready(function(e) {	
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
                                                                //]]>
                                                            })
                                                            function save_contact(){
                                                                var detail = CKEDITOR.instances.message.getData();
                                                                $('#message').val(detail);
                                                                var form = $('#form_contact')[0];
                                                                var data = new FormData(form);
                                                                $.ajax({
                                                                                
                                                                                url:"core/api/controller/controller.php?status=save_contact",
                                                                                type:"post",
                                                                                enctype:"multipart/form-data",
                                                                                data:data,
                                                                                processData:false,
                                                                                contentType:false,
                                                                                cache:false,
                                                                                timeout:600000,
                                                                                success: function(result) {
                                                                                            console.log(result);
                                                                                            alert('แก้ไขเรียบร้อย')
                                                                                            location.reload();
                                                                                            
                                                                                        
                                                                                    }
                                                                                });
                                                                
                                                            }
                                                            </script>
                                                            </body>
                                                            </html>


<script type="text/javascript" src="..\files\bower_components\jquery\js\jquery.min.js"></script>
<script type="text/javascript" src="..\files\bower_components\jquery-ui\js\jquery-ui.min.js"></script>
<script type="text/javascript" src="..\files\bower_components\popper.js\js\popper.min.js"></script>
<script type="text/javascript" src="..\files\bower_components\bootstrap\js\bootstrap.min.js"></script>

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
