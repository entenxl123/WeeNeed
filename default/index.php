<?php
session_start();
include ("con_fig/db.php");
?>
<!DOCTYPE html>

<html lang="en">

<head>
    <title>Adminty - Premium Admin Template by Colorlib </title>
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
    <meta name="keywords" content="Admin , Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">
    <meta name="author" content="#">
    <!-- Favicon icon -->
    <link rel="icon" href="..\files\assets\images\favicon.ico" type="image/x-icon">
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600" rel="stylesheet">
     <!-- ico font -->
     <link rel="stylesheet" type="text/css" href="..\files\assets\icon\icofont\css\icofont.css">
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="..\files\bower_components\bootstrap\css\bootstrap.min.css">
    <!-- feather Awesome -->
    <link rel="stylesheet" type="text/css" href="..\files\assets\icon\feather\css\feather.css">
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="..\files\assets\css\style.css">
    <link rel="stylesheet" type="text/css" href="..\files\assets\css\jquery.mCustomScrollbar.css">
    <link rel="stylesheet" href="fontcss/main.css">
    <script type="text/javascript" src="js/jquery-3.5.1.js"></script>
<style>
</head>
    .card-pointer{
        cursor:Pointer;
    }
    .card_module{
        cursor:Pointer;
    }
</style>
<body>
    <!-- Pre-loader start -->
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
            </div>
        </div>
    </div>
    <!-- Pre-loader end -->
    <div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">

        <?php include("inc/headsitebar.php")?>
            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">
                <?php include("inc/sitebar.php")?>
                    <div class="pcoded-content">
                        <div class="pcoded-inner-content">
                            <div class="main-body">
                                <div class="page-wrapper">

                                    <div class="page-body">
                                        <div class="row">
                                            <!-- task, page, download counter  start -->
                                            <?php $sql="select * FROM website_db.main_module" ;
                                                  $query=mysql_query($sql);
                                                  while($row_news=mysql_fetch_array($query)){
                                            ?>
                                            <div class="col-xl-3 col-md-6">
                                                
                                                <div onclick="go_module('<?=$row_news[main_module_url]?>','<?=$row_news[main_module_section]?>')" class="card card-pointer <?=$row_news[main_module_bg]?> update-card">
                                                
                                                    <div class="card-block card_module" >
                                                        <div class="row align-items-end">
                                                            <div class="col-12">
                                                                <h4 class="text-white"><?=$row_news[main_module_nameThai]?></h4>
                                                                <h6 class="text-white m-b-0"><?=$row_news[main_module_nameEng]?></h6>
                                                               
                                                                <!-- <p class="text-white m-b-0"><i class="feather icon-clock text-white f-14 m-r-10"></i></p> -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card-footer">
                                                        <p>More info <i  class="<?=$row_news[main_module_icon]?>" width=100%></i></p>
                                                    </div>
                                                   
                                                </div>

                                            </div>
                                            <?php } ?>
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

    <script >
    function go_module(URL, section){
        window.location= (URL+'?section='+section);
    }
    </script>                                        
    <!-- Required Jquery -->
    <script data-cfasync="false" src="..\..\..\cdn-cgi\scripts\5c5dd728\cloudflare-static\email-decode.min.js"></script><script type="text/javascript" src="..\files\bower_components\jquery\js\jquery.min.js"></script>
    <script type="text/javascript" src="..\files\bower_components\jquery-ui\js\jquery-ui.min.js"></script>
    <script type="text/javascript" src="..\files\bower_components\popper.js\js\popper.min.js"></script>
    <script type="text/javascript" src="..\files\bower_components\bootstrap\js\bootstrap.min.js"></script>
    <!-- jquery slimscroll js -->
    <script type="text/javascript" src="..\files\bower_components\jquery-slimscroll\js\jquery.slimscroll.js"></script>
    <!-- modernizr js -->
    <script type="text/javascript" src="..\files\bower_components\modernizr\js\modernizr.js"></script>
    <!-- Chart js -->
    <script type="text/javascript" src="..\files\bower_components\chart.js\js\Chart.js"></script>
        
    <!-- axios httprequies me -->
    <script src="js/axios.min.js"></script>
    <script src="js/axios.min.map"></script>
    <script src="logout.js"></script>
<!-- amchart js -->
    <script src="..\files\assets\pages\widget\amchart\amcharts.js"></script>
    <script src="..\files\assets\pages\widget\amchart\serial.js"></script>
    <script src="..\files\assets\pages\widget\amchart\light.js"></script>
    <script src="..\files\assets\js\jquery.mCustomScrollbar.concat.min.js"></script>
    <script type="text/javascript" src="..\files\assets\js\SmoothScroll.js"></script>
    <script src="..\files\assets\js\pcoded.min.js"></script>
    <!-- custom js -->
    <script src="..\files\assets\js\vartical-layout.min.js"></script>
    <script type="text/javascript" src="..\files\assets\pages\dashboard\custom-dashboard.js"></script>
    <script type="text/javascript" src="..\files\assets\js\script.min.js"></script>
    
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
