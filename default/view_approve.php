<?php
session_start();
include ("con_fig/db.php");
$var=array_merge($_GET,$_POST);
extract($var);
?>
	
</script>
<!DOCTYPE html>
<html lang="en">
<style>
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
}.switch {
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
  height: 26px;
  width: 26px;
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
  border-radius: 34px;
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
     <!-- Data Table Css -->
     <link rel="stylesheet" type="text/css" href="..\files\bower_components\datatables.net-bs4\css\dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="..\files\assets\pages\data-table\css\buttons.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="..\files\bower_components\datatables.net-responsive-bs4\css\responsive.bootstrap4.min.css">
   

    
   
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
</div> -->                    <div class="page-body">
                                <div class="row">
                                        <div class="col-sm-12">
                                            <!-- Zero config.table start -->
                                            
                                            <!-- Zero config.table end -->
                                           
                                           </div>
                                    </div>
                                </div>
                            <div class="page-body"> 
                             
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <!-- Basic Form Inputs card start -->
                                            <div class="card">
                                                <div class="card-header">
                                                   
                                                                <div class="row">
                                                                    <div class="col-md-8"><h2><i class="icofont icofont-listing-box"></i> รายการเอกสารขออนุมัติ</h2></div>
                                                                    <div class="col-md-4  text-right"><button class="btn btn-success form-control" onclick="add_approve()"><i class="icofont icofont-plus-circle"></i>สร้างเอกสารขออนุมัติ</button></div>
                                                                </div>

                                                           <hr>
                                                            <div class="form-group row">
                                                                    <label for="" class="col-sm-2 col-form-label">ประเภทเอกสาร</label>
                                                                    <div class="col-sm-2">  
                                                                        <select class="form-select form-control " aria-label="Default select example" id="type_doc">
                                                                                                                    <option selected value=''>ประเภทเอกสาร</option>
                                                                                                                    <option value="ED">ED</option>
                                                                                                                    <option value="EP">EP</option>
                                                                                                                    <option value="EF">EF</option>
                                                                                                                    <option value="EI">EI</option>
                                                                                                                    <option value="EM">EM</option>
                                                                                                                </select>
                                                                    </div>

                                                                    <label for="" class="col-sm-2 col-form-label">สถานะ</label>
                                                                    <div class="col-sm-2">  
                                                                        <select class="form-select form-control " aria-label="Default select example" id="status_doc">
                                                                                                                    <option selected value=''>ทั้งหมด</option>
                                                                                                                    <option value="wait_approve">รอการอนุมัติ</option>
                                                                                                                    <option value="Not_approve">ไม่อนุมัติ</option>
                                                                                                                    <option value="approve_fin">อนุมัติครบแล้ว</option>
                                                                                                                    <option value="recive">ยืนยันการอนุมัติ</option>
                                                                                                                </select>
                                                                    </div>
                                                                   
                                                                        
                                                            </div>
                                                            <div class="row">
                                                                    <label for="" class="col-sm-2 col-form-label">วันที่สร้าง</label>
                                                                    <div class="col-sm-2">  
                                                                       <input type="date" id="insert_date" class="form-control">
                                                                    </div>
                                                            
                                                                    <label for="" class="col-sm-2 col-form-label">วันที่ออกเอกสาร</label>
                                                                    <div class="col-sm-2">  
                                                                       <input type="date" id="Doc_date"  class="form-control">
                                                                    </div>
        
                                                                    <label for="" class="col-sm-2 col-form-label">วันที่มีผลบังคับใช้</label>
                                                                    <div class="col-sm-2">  
                                                                       <input type="date" id="Due_date"  class="form-control">
                                                                    </div>
                                                            </div>
                                                            
                                                            <br>
                                                            <div class="row">
                                                                    <div class="col-sm-9">
                                                                        <input type="hidden">
                                                                    </div>
                                                                    <div class="col-sm-3 text-right">  
                                                                        <button class=" btn btn-primary form-control" onclick="search_some_doc()"><i class="icofont icofont-search"></i> ค้นหา</button>
                                                                    </div>
                                                            </div>
                                                        
                                                            <div class="card-block table-border-style">
                                                                <div class="table-responsive "> <hr></div>
                                                            </div>

                                                            <div class="dt-responsive table-responsive"  id="TableData">
                                                            </div>
                                                        </div>
                                                                    
                                                        
                                                       
                                                                

                                                        <!-- Modal -->
                                                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLabel">ยืนยันการส่งเอกสาร</h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body" >
                                                                        <p  id="send_detail" name="send_detail"></p>
                                                                    </div>
                                                                        <input type="hidden" id="id_to_send">
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
                                                                        <button type="button" class="btn btn-primary" onclick="send_to_approver()" >ส่ง</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                            </div>
                                        
                                        <div class="container">
                                            
                                            <!-- Modal -->
                                            <div class="modal fade" id="show_all_data" role="dialog">
                                                <div class="modal-dialog modal-lg">
                                                
                                                <!-- Modal content-->
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">เอกสารขออนุมัติ</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                        <iframe src="" height="400" width="100%" id="show_approve_model"></iframe>
                                          
                                                     </div>
                                                     
                                                        <div class="modal-footer">

                                                        <label class="switch" id="ic_show_web">
                                                            <input type="checkbox" id="show_web"  onchange="show_web()">
                                                            <span class="slider round" ></span>
                                                        </label>
                                                        <span id="word_show_web">แสดงหน้าเว็บ</span>


                                                        <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
                                                        <input type="hidden" name="id_Doc" id="id_Doc">
                                                        <button type="button" id=btn_recive class="btn btn-primary" onclick="btn_recive()">ยืนยันอนุมัติเอกสาร</button>
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
<!-- data-table js -->
<script src="..\files\bower_components\datatables.net\js\jquery.dataTables.min.js"></script>
<script src="..\files\bower_components\datatables.net-buttons\js\dataTables.buttons.min.js"></script>
<script src="..\files\assets\pages\data-table\js\jszip.min.js"></script>
<script src="..\files\assets\pages\data-table\js\pdfmake.min.js"></script>
<script src="..\files\assets\pages\data-table\js\vfs_fonts.js"></script>
<script src="..\files\bower_components\datatables.net-buttons\js\buttons.print.min.js"></script>
<script src="..\files\bower_components\datatables.net-buttons\js\buttons.html5.min.js"></script>
<script src="..\files\bower_components\datatables.net-bs4\js\dataTables.bootstrap4.min.js"></script>
<script src="..\files\bower_components\datatables.net-responsive\js\dataTables.responsive.min.js"></script>
<script src="..\files\bower_components\datatables.net-responsive-bs4\js\responsive.bootstrap4.min.js"></script>

<script type="text/javascript" src="..\files\bower_components\multiselect\js\jquery.multi-select.js"></script>
<script type="text/javascript" src="..\files\assets\js\jquery.quicksearch.js"></script>
<!-- Custom js -->
<script src="..\files\assets\pages\data-table\js\data-table-custom.js"></script>
<script src="logout.js"></script>

<script type="text/javascript" src="view_approve.js"></script>
<script type="text/javascript" src="..\files\assets\pages\advance-elements\select2-custom.js"></script>
<script src="..\files\assets\js\pcoded.min.js"></script>
<script src="..\files\assets\js\vartical-layout.min.js"></script>
<script src="..\files\assets\js\jquery.mCustomScrollbar.concat.min.js"></script>
<script type="text/javascript" src="..\files\assets\js\script.js"></script>

<!-- axios httprequies me -->
<script src="js/axios.min.js"></script>
<script src="js/axios.min.map"></script>

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
