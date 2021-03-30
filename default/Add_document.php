<?php
session_start();
include ("con_fig/db.php");
$var=array_merge($_GET,$_POST);
extract($var);
?>

<script>



	
</script>
<!DOCTYPE html>
<html lang="en">
<style>
    .invis_btn{
        cursor: pointer;
        margin-right:5px;
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
     <!-- jquery file upload Frame work -->
    <link href="..\files\assets\pages\jquery.filer\css\jquery.filer.css" type="text/css" rel="stylesheet">
    <link href="..\files\assets\pages\jquery.filer\css\themes\jquery.filer-dragdropbox-theme.css" type="text/css" rel="stylesheet">
    <!-- Favicon icon -->
    <link rel="icon" href="..\files\assets\images\favicon.ico" type="image/x-icon">
    <!-- Google font--><link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,800" rel="stylesheet">
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="..\files\bower_components\bootstrap\css\bootstrap.min.css">
    <!-- themify-icons line icon -->
    <link rel="stylesheet" type="text/css" href="..\files\assets\icon\themify-icons\themify-icons.css">
    <!-- ico font -->
    <link rel="stylesheet" type="text/css" href="..\files\assets\icon\icofont\css\icofont.css">
    <!-- feather Awesome -->
    <link rel="stylesheet" type="text/css" href="..\files\assets\icon\feather\css\feather.css">
    <!-- Select 2 css -->
    <link rel="stylesheet" href="..\files\bower_components\select2\css\select2.min.css">
    <!-- Multi Select css -->
    <link rel="stylesheet" type="text/css" href="..\files\bower_components\bootstrap-multiselect\css\bootstrap-multiselect.css">
    <link rel="stylesheet" type="text/css" href="..\files\bower_components\multiselect\css\multi-select.css">
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="..\files\assets\css\style.css">
    <link rel="stylesheet" type="text/css" href="..\files\assets\css\jquery.mCustomScrollbar.css">
    <link rel="stylesheet" href="fontcss/main.css">
</head>
<style>
    label{
        text-align: right;
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
        <div class="pcoded-main-container">
            <div class="pcoded-wrapper">
                <?php include("inc/sitebar.php")?>
                <div class="pcoded-content">
                    <div class="pcoded-inner-content">
                        <!-- Main-body start -->
                        <div class="main-body">
                            <div class="page-wrapper">
                                <!-- Page-header start -->
                                
                                <div class="page-body">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <!-- Basic Form Inputs card start -->
                                            <div class="card">
                                                <div class="card-header">
                                                    <h3>เพิ่มเอกสารบันทึก</h3>
                                                   

                                                    <div class="card-header-right">
                                                        <i class="icofont icofont-spinner-alt-5"></i>
                                                    </div>

                                                </div>
                                                <div class="card-block">
                                                    <form id="form_save_approve" method="POST" name="form_save_approve" enctype="multipart/form-data">
                                    <div class="form-group row">
                                        <label for="staticEmail" class="col-sm-2 col-form-label"><span class="text-danger">*</span>ประเภทเอกสาร</label>
                                        <div class="col-sm-3">
                                        <select class="form-control form-select-lg mb-2" id="Doc_type" name="Doc_type" aria-label="Default select example" require>
                                            <option value=''>เลือก</option>
                                                            <option value="EM">EM</option>
                                                            <option value="EP">EP</option>
                                                            <option value="EI">EI</option>
                                                            <option value="ED">ED</option>
                                                            <option value="EF">EF</option>
                                        </select>
                                        </div>
                                        <label for="Doc_order" class="col-sm-2 col-form-label"><span class="text-danger">*</span>ลำดับเอกสาร</label>
                                        <div class="col-sm-1">
                                            <input type="number" class="form-control" id="Doc_order" name="Doc_order">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                        <label for="inputPassword" class="col-sm-2 col-form-label"><span class="text-danger">*</span>หมายเลข<br>เอกสาร</label>
                                        <div class="col-sm-4">
                                        <input type="text" class="form-control" id="id_Document" name="id_Document" placeholder="" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputPassword" class="col-sm-2 col-form-label"><span class="text-danger">*</span> ชื่อเอกสาร</label>
                                        <div class="col-sm-8">
                                        <input type="text" class="form-control" id="name_Document" name="name_Document" placeholder="">
                                        </div>
                                    </div>
                                 
                                    <div class="form-group row">
                                        
                                        <label for="inputPassword" class="col-sm-2 col-form-label">บริษัท</label>
                                        <div class="col-sm-4">
                                        <select class="Select_comp col-sm-12"  name="comp_id" id="comp_id" style="width: 90%;">
                                        <option value=''>เลือกบริษัท</option>
                                            
                                        </select>
                                        </div>
                                        <label for="inputPassword" class="col-sm-1 col-form-label">สาขา</label>
                                        <div class="col-sm-4">
                                        <select class="Select_brn col-sm-12"  name="brn_id" id="brn_id" style="width: 90%;">
                                        <option value=''>เลือกสาขา</option>
                                            
                                        </select>
                                        </div>
                                        
                                       
                                        
                                    </div>
                                    
                                
                                    <hr>
                                    <br>
                                
                                </form>
                                <div class="row">
                                    <div class="col-sm-10">
                                        <button class="btn btn-light btn-round" onclick="go_back()">กลับ</button>
                                    </div>
                                    <div class="col-sm-2">
                                         <button class="btn btn-success btn-round" onclick="save_doc_master()">บันทึก</button>
                                    </div>
                                </div>
                                       
                                
                                </div>        
                                                   
                            </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<!-- Required Jquery -->

<script type="text/javascript" src="..\files\bower_components\jquery\js\jquery.min.js"></script>
<script type="text/javascript" src="..\files\bower_components\jquery-ui\js\jquery-ui.min.js"></script>
<script type="text/javascript" src="..\files\bower_components\popper.js\js\popper.min.js"></script>
<script type="text/javascript" src="..\files\bower_components\bootstrap\js\bootstrap.min.js"></script>
<!-- jquery slimscroll js -->
<script type="text/javascript" src="..\files\bower_components\jquery-slimscroll\js\jquery.slimscroll.js"></script>
<!-- modernizr js -->
<script type="text/javascript" src="..\files\bower_components\modernizr\js\modernizr.js"></script>
<script type="text/javascript" src="..\files\bower_components\modernizr\js\css-scrollbars.js"></script>
<!-- jquery file upload js -->
<script src="..\files\assets\pages\jquery.filer\js\jquery.filer.min.js"></script>
    <script src="..\files\assets\pages\filer\custom-filer.js" type="text/javascript"></script>
    <script src="..\files\assets\pages\filer\jquery.fileuploads.init.js" type="text/javascript"></script>

<!-- i18next.min.js -->
<script type="text/javascript" src="..\files\bower_components\i18next\js\i18next.min.js"></script>
<script type="text/javascript" src="..\files\bower_components\i18next-xhr-backend\js\i18nextXHRBackend.min.js"></script>
<script type="text/javascript" src="..\files\bower_components\i18next-browser-languagedetector\js\i18nextBrowserLanguageDetector.min.js"></script>
<script type="text/javascript" src="..\files\bower_components\jquery-i18next\js\jquery-i18next.min.js"></script>
<!-- Select 2 js -->
<script type="text/javascript" src="..\files\bower_components\select2\js\select2.full.min.js"></script>
<!-- Multiselect js -->
<script type="text/javascript" src="..\files\bower_components\bootstrap-multiselect\js\bootstrap-multiselect.js">


</script>
<!-- axios httprequies me -->
<script src="js/axios.min.js"></script>
<script src="js/axios.min.map"></script>

<script type="text/javascript" src="..\files\bower_components\multiselect\js\jquery.multi-select.js"></script>
<script type="text/javascript" src="..\files\assets\js\jquery.quicksearch.js"></script>
<!-- Custom js -->
<script type="text/javascript" src="add_document.js"></script>
<script type="text/javascript" src="..\files\assets\pages\advance-elements\select2-custom.js"></script>
<script src="..\files\assets\js\pcoded.min.js"></script>
<script src="..\files\assets\js\vartical-layout.min.js"></script>
<script src="..\files\assets\js\jquery.mCustomScrollbar.concat.min.js"></script>
<script type="text/javascript" src="..\files\assets\js\script.js"></script>
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
