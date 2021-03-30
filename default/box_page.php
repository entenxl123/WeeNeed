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
															<script type="text/javascript" src="js/jquery-3.5.1.js"></script>
 
                                                            <div class="row">
                                                                <div class="col-md-5"></div>
                                                                <div><h3>แก้ไข เมนู</h3></div>
                                                            </div>
                                                            <br>
                                                            <div class="card">
                                                            <form id="form_save_code" method="POST" name="form_save_code" enctype="multipart/form-data">
                                                            <table width="100%" border="0" cellpadding="0" cellspacing="0">
                                                            <?
                                                                    $sql="SELECT *
                                                                                FROM tb_menu
                                                                                WHERE tb_menu.menu_id = '".$menu_id."'";
                                                                    $query=mysql_query($sql);
                                                                    $row=mysql_fetch_array($query);
                                                                    $sql_main="SELECT 
                                                                                            tb_menu.menu_name
                                                                                            FROM tb_menu
                                                                                            WHERE tb_menu.menu_order = '".$row[menu_main]."' 
                                                                                            AND tb_menu.menu_main = 0";
                                                                    // echo $sql_main;
                                                                    $query_main=mysql_query($sql_main);
                                                                    $row_main=mysql_fetch_array($query_main);
                                                                    
                                                                    $sql_page="SELECT * FROM tb_page
                                                                                                WHERE
                                                                                                tb_page.page_id='".$row[page_id]."'";
                                                                    // echo $sql_page;
                                                                    $query_page=mysql_query($sql_page);
                                                                    $row_page=mysql_fetch_array($query_page);
                                                            ?>
                                                                <tr>
                                                                    <br>
                                                                <td colspan="2">&nbsp;<label for=""><strong> <?=$row_main[menu_name]."&nbsp;:&nbsp;</strong></label>".$row[menu_name]?>&nbsp;</td>
                                                                </tr>
                                                                <tr>
                                                                <td align="left"><label for=""><strong>&nbsp;หัวข้อ :&nbsp;</strong>  </label><input readonly class="form-control-plaintext" type="text" name="menu_name" id="menu_name" size="40"  value="<?=$row[menu_name]?>"/></td>
                                                                </tr>
                                                                <tr>
                                                                <td colspan="2">
                                                                <br>
                                                                <textarea cols="80%" id="message" name="message" rows="10" ><?=stripslashes($row_page[page_detail])?></textarea>
                                                                <!-- <input type="text" id="message1" name="message1" value="" ></input> -->
                                                                <input name="page_id" id="page_id" type="hidden" value="<?=$row[page_id]?>" />
                                                                <input name="menu_id" id="menu_id" type="hidden" value="<?=$menu_id?>" />
                                                                <input name="cate_id" id="cate_id" type="hidden" value="<?=$row[cate_id]?>" />
                                                                <input name="cmd"  id="cmd" type="hidden" value="<?=$cmd?>" />
                                                                <input type="hidden" name="" id="text_area_2">
                                                                </td>
                                                                </tr>
                                                            </table>
                                                            <br>

                                                            </form> 

                                                            </div>
                                                            <div class="row">
                                                            <div class="col-10"></div>
                                                            <button onclick="save_code()" class="btn btn-success">บันทึก</button>
                                                            </div>
                                                        </div>
                                                        </div>
                                                    </div>
                                </div>
                                <!-- Page-header end -->
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
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
	//]]>
</script>
<script>
function select_menu(menu_id,menu_name){
	$('#menu_id').val(menu_id);
}

function save_code(){
		 
		var detail = (CKEDITOR.instances.message.getData());
		$("#message").val(detail);
		// alert(detail);
        var form = $('#form_save_code')[0];
	    var data = new FormData(form);
		
		$.ajax({
					
                    url:"core/api/controller/controller.php?status=save_code",
                    type:"post",
                    enctype:"multipart/form-data",
                    data:data,
                    processData:false,
                    contentType:false,
                    cache:false,
                    timeout:600000,
                    success: function(result) {
                                console.log(result);
                                alert('แก้ไขเมนูเรียบร้อย');
                                window.history.back();
                           }
                    });
       
        
	}
	
</script>
<!-- Warning Section Starts -->
<!-- Older IE warning message -->
<!--[if lt IE 10]>
<div class="ie-warning">
    <h1>Warning!!</h1>
    <p>You are using an outdated version of Internet Explorer, please upgrade <br/>to any of the following web browsers
        to access this website.</p>
    <div class="iew-container">
        <ul class="iew-download">
            <li>
                <a href="http://www.google.com/chrome/">
                    <img src="../files/assets/images/browser/chrome.png" alt="Chrome">
                    <div>Chrome</div>
                </a>
            </li>
            <li>
                <a href="https://www.mozilla.org/en-US/firefox/new/">
                    <img src="../files/assets/images/browser/firefox.png" alt="Firefox">
                    <div>Firefox</div>
                </a>
            </li>
            <li>
                <a href="http://www.opera.com">
                    <img src="../files/assets/images/browser/opera.png" alt="Opera">
                    <div>Opera</div>
                </a>
            </li>
            <li>
                <a href="https://www.apple.com/safari/">
                    <img src="../files/assets/images/browser/safari.png" alt="Safari">
                    <div>Safari</div>
                </a>
            </li>
            <li>
                <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
                    <img src="../files/assets/images/browser/ie.png" alt="">
                    <div>IE (9 & above)</div>
                </a>
            </li>
        </ul>
    </div>
    <p>Sorry for the inconvenience!</p>
</div>
<![endif]-->
<!-- Warning Section Ends -->
<!-- Required Jquery -->
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

<!-- <script type="text/javascript" src="/"></script> -->
<!-- <script
  src="https://code.jquery.com/jquery-1.12.4.min.js"
  integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ="
  crossorigin="anonymous"></script> -->
  