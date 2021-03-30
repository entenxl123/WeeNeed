<?php
session_start();
include ("con_fig/db.php");
$var=array_merge($_GET,$_POST);
extract($var);
?>

<!DOCTYPE html>
<html lang="en">
<style>
    .cut-text{
        text-decoration: none;
        text-overflow: ellipsis; /* เพิ่ม ... จุดจุดจุดท้ายสุด */ 
         overflow: hidden; 
        width: 80%; /* กำหนดความกว้าง */ 
        height :100%
    }
   #name_brn{

       text-align:right;
   }
    html {
        scroll-behavior: smooth;
    }

    .invis_btn{
        cursor: pointer;
        margin-right:5px;
    }
    .iframe-container {    
    padding-bottom: 60%;
    padding-top: 30px; height: 0; overflow: hidden;
}
 
.iframe-container iframe,
.iframe-container object,
.iframe-container embed {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
}
.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

.switch input { 
  opacity: 0;
  width: 0;
  height: 0;
}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 22px;
  width: 22px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 30px;
}

.slider.round:before {
  border-radius: 50%;
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
     <!-- Data Table Css -->
     <link rel="stylesheet" type="text/css" href="..\files\bower_components\datatables.net-bs4\css\dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="..\files\assets\pages\data-table\css\buttons.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="..\files\bower_components\datatables.net-responsive-bs4\css\responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="fontcss/main.css">
</head>
<style>
    label{
        text-align: right;
    }
    i{
        cursor:pointer;
    }
    th{
        text-align:center;
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
                                <!-- <div class="page-header">
                                <div class="card-block">    
                                
                                      
                                 
                                </div> 
                                
                                 Page-header end 
</div> -->
                            <div class="page-body">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <!-- Basic Form Inputs card start -->
                                            <div class="card">
                                                <div class="card-header">
                                                    <div class="form-group row">
                                                        <label for="staticEmail" class="col-sm-3 col-form-label align-baseline"><h4>เอกสารประเภท</h4></label>
                                                        <div class="col-sm-2">
                                                        <select class="form-control form-select-lg mb-3 align-middle" id="Doc_type" name="Doc_type" aria-label="Default select example" onchange="change_type()">
                                                            <option value=''>เลือกประเภทเอกสาร</option>
                                                            <option value="EM">EM</option>
                                                            <option value="EP">EP</option>
                                                            <option value="EI">EI</option>
                                                            <option value="ED">ED</option>
                                                            <option value="EF">EF</option>
                                                        </select>
                                                        </div>
                                                        <label for="staticEmail" class="col-sm-3 col-form-label align-baseline"><h4>สถานะเอกสาร</h4></label>
                                                        <div class="col-sm-2">
                                                        <select class="form-control form-select-lg mb-3 align-middle" id="status_doc" name="status_doc" aria-label="Default select example" onchange="change_type()">
                                                            <option value=''>เลือกสถานะเอกสาร</option>
                                                            <option value="Y">ใช้</option>
                                                            <option value="N">ไม่ใช้</option>
                                                        </select>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                    <div class="col-sm-9"></div>
                                                    <div class="col-sm-3"><button class="btn btn-success form-control" onclick="add_master_doc()"><i class="icofont icofont-plus-circle"></i>เพิ่มเอกสาร</button></div>
                                                    </div>
                                                    <br>
                                                    <div class="row">
                                                            <div class="col-sm-8"></div>
                                                            <div class="col-sm-4">
                                                                <div id="name_brn" name="name_brn">
                                                            </div>
                                                    </div>
                                                       
                                                    </div>
                                                    <br>
                                                    <div class="card">
                                            <div class="card-header" >
                                                <h2 id="for_all_brn"></h2>
                                                

                                            </div>
                                            <div class="card-block table-border-style">
                                                <div class="table-responsive">
                                                <!-- <button id="test" name="test">click</button> -->
                                                    <table class="table table-bordered" >
                                                        <thead id=head_show_approve name=head_show_approve ></thead>
                                                        <tbody id=show_approve name=show_approve>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="another_brn" name="another_brn"></div>
                                                    
                                        
                                        <div class="card-header-right">
                                                        <i class="icofont icofont-spinner-alt-5"></i>
                                                    </div>
                                                </div>
                                                                
                                            </div>
                                        </div>
                                            <div class="modal fade" id="delete_master" role="dialog">
                                                <div class="modal-dialog">
                                                
                                                <!-- Modal content-->
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">ลบเอกสาร</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            คุณต้องการลบเอกสารนี้หรือไม่?
                                                            <input type="hidden" id="master_id">
                                                        </div>
                                                     
                                                        <div class="modal-footer">


                                                        <button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>
                                                        <input type="hidden" name="id_Doc" id="id_Doc">
                                                        <button type="button" id=btn_recive class="btn btn-primary" onclick="delete_master_doc()">ยืนยัน</button>
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
<script type="text/javascript" src="show_approve.js"></script>
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
