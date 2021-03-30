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
    .text-danger{
        color:red;
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
                                                    <h5>บันทึกและส่งให้ผู้อนุมัติ
                                                   </h5>
                                                    

                                                    <div class="card-header-right">
                                                        <i class="icofont icofont-spinner-alt-5"></i>
                                                    </div>

                                                </div>
                                                <div class="card-block">
                                                    <form id="form_save_approve" method="POST" name="form_save_approve"  enctype="multipart/form-data">
                                    <div class="form-group row">
                                        <label for="inputPassword" class="col-sm-2 col-form-label"><span class="text-danger">*</span>ชื่อเอกสาร</label>
                                        <div class="col-sm-10">
                                        <select class="Select_doc col-sm-12"   name="doc_id" id="doc_id" style="width: 90%;" required>
                                        <option value=''>เลือกเอกสาร</option>
                                        <!-- disabled -->
                                        </select>
                                        <input type="hidden" name="doc_make_id" id="doc_make_id">
                                        <input type="hidden" name="doc_type" id="doc_type">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                     
                                        <label for="inputPassword" class="col-sm-2 col-form-label"><span class="text-danger">*</span>ฉบับที่</label>
                                        <div class="col-sm-2">
                                        <input type="number" class="form-control" id="num_Document" name="num_Document" placeholder="" required>
                                        </div>
                                        
                                        
                                    </div>
                                 
                                    <div class="form-group row">
                                        <label for="inputPassword" class="col-sm-2 col-form-label"><span class="text-danger">*</span>วันที่ออกเอกสาร </label>
                                        <div class="col-sm-4">
                                        <input type="date" class="form-control" id="start_date" name="start_date" placeholder="">
                                        </div>
                                        <label for="inputPassword" class="col-sm-2 col-form-label"><span class="text-danger">*</span>วันที่บังคับใช้</label>
                                        <div class="col-sm-4">
                                        <input type="date" class="form-control" id="end_date" name="end_date" placeholder="">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                                            <label class="col-sm-2 col-form-label"><span class="text-danger">*</span>Upload File</label>
                                                            <div class="col-sm-10">
                                                                <input type="file" id="files_pdf2" name="files_pdf2" accept="application/pdf" class="form-control" required>
                                                                <p><span class="text-danger">###เฉพาะไฟล์ .pdf  </span></p>
                                                            </div>
                                                            
                                                            <input type="hidden" id="num_approve"  name="num_approve">
                                    </div>
                                    <div class="form-group row">
                                    <div class="col-sm-2"></div>
                                    <div class="col-sm-8">
                                    <br>
                                        <iframe  id="show_file_pdf" name="show_file_pdf" frameborder="0" height="500px" width="100%"></iframe>
                                    </div>
                                    </div>

                                    <!-- <div class="form-group row">
                                    <label for="inputPassword" class="col-sm-1 col-form-label">ไฟล์</label>
                                        <div class="col-sm-4">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="customFile">
                                            <label class="custom-file-label" for="customFile">Choose file</label>
                                        </div>
                                        <input type="file" name="files_pdf2" multiple="multiple">
                                                <input type="file" name="files_pdf" id="filer_input" multiple="multiple">
                                        </div>
                                    </div> -->
                                    <hr>
                                    <br>
                                    <div class="row" id="frist_approve" name="frist_approve">
                                        
                                        <label for="inputPassword" class="col-sm-1 col-form-label">ผู้อนุมัติ<br>คนที่ 1</label>
                                        <div class="col-sm-4">
                                        <select class="Select_emp col-sm-12"  name="emp_id1" id="emp_id1" style="width: 90%;" required>
                                        <option value=''>เลือกผู้อนุมัติ</option>
                                            
                                        </select>
                                        </div>
                                        <label for="inputPassword" class="col-sm-1 col-form-label">หน้าที่</label>
                                        <div class="col-sm-2">
                                        <select class="select_duty form-control form-select-lg mb-2"  name="select_duty1" id="select_duty1"  aria-label="Default select example" required>
                                            <option value=''>เลือกหน้าที่</option>
                                         
                                        </select>
                                        </div>
                                        <label for="inputPassword"  class="col-sm-1 col-form-label">ตำแหน่ง</label>
                                        <div class="col-sm-2">
                                        <select class="select_position form-control form-select-lg mb-3"  name="select_position1" id="select_position1" aria-label="Default select example" required>
                                            <option value=''>เลือกตำแหน่ง</option>
                                        </select>
                                        <p id="testJson" name="testJson"></p>
                                        </div>
                                    </div>
                                    <div class="col-sm-1">
                                        </div>
                                            <div name="add_emp" id="add_emp"></div>
                                           
                                                
                                                    
                                                    
                                                
                                           
                                    
                                </form>
                                
                                <div class="row">
                                 <div class="col-sm-4"></div>
                                    <div class="col-sm-4">
                                    <button class="btn btn-primary btn-outline-primary"  id="add_approve" name="add_approve"><i class="icofont icofont-ui-add"></i></button>
                                    <button class="btn btn-success btn-outline-success" id="delete_approve" name="delete_approve"><i class="icofont icofont-minus"></i></button>
                                    <br>
                                    <br>
                                    <p  aling="center" style="color:#FF0000" id="text_alert_approve" name="text_alert_approve"></p>
                                    
                                </div>
                                    <div class="col-sm-4"></div>
                                </div>        
                                
                                <div class="row">
                                    <div class="col-sm-9">
                                    <button class="btn btn-light btn-round" onclick="go_back()">กลับ</button></div>
                                    <div class="col-sm-3">
                                    <button class="btn btn-success btn-round" id="save_approve" name="save_approve">บันทึก</button>
                                    <button class="btn btn-primary btn-round" id="send_to_approve"  data-toggle="modal" data-target="#model_approve" >ส่ง</button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="model_approve" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">ยืนยันการส่งให้ผู้อนุมัติ</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            คุณต้องการส่งเอกสารนี้ให้ผู้อนุมัติหรือไม่
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
                                            <button type="button" class="btn btn-primary" onclick="send_to_approver()">ส่ง</button>
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

<script type="text/javascript" src="..\files\bower_components\multiselect\js\jquery.multi-select.js"></script>
<script type="text/javascript" src="..\files\assets\js\jquery.quicksearch.js"></script>
<!-- Custom js -->
<script type="text/javascript" src="update_approve.js"></script>
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
