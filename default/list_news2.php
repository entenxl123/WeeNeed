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
<script>
    
    function aaaaa(){
        alert(123443);
        $('#asasdasd').click();

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
                                        alert(response);
                                        location.reload();
                            }
                        });	
        }
    }
    function box_news(news_id, cate_id){
    // $("#Display").empty(''); 
    var params ='cate_id='+cate_id+'&news_id='+news_id+'&xid='+Math.random();
        
    // alert(params);
    $.ajax({    
				type: "POST",
				url: "box_news.php",        
				data:params,     
				dataType: "html",   
				success: function(response){
					
						$("#Display").html(response); 
                        
					
				}
            });	
       
	// $('#Display').attr('src', 'list_menuindex.php?cate_id='+cate_id+'&xid='+Math.random());		
}
    function No_add_news(){
        var form = $('#formTP_insert')[0];
        var data = new FormData(form);
        $('file_topic').show();
        //alert(data);
        if($('#status_v').val()=='edit'){
            // alert(55555555566);
            $.ajax({
					
                    url:"core/api/controller/controller.php?status=edit_news",
                    type:"post",
                    enctype:"multipart/form-data",
                    data:data,
                    processData:false,
                    contentType:false,
                    cache:false,
                    timeout:600000,
                    success: function(result) {
                                console.log(result);
                                location.reload();
                               // alert(result);
                               
                           }
                    });
        }
        else{
        $.ajax({
					
                    url:"core/api/controller/controller.php?status=add_new",
                    type:"post",
                    enctype:"multipart/form-data",
                    data:data,
                    processData:false,
                    contentType:false,
                    cache:false,
                    timeout:600000,
                    success: function(result) {
                                console.log(result);
                               // alert(result);
                               
                           }
                    });
        }            
        
    }
</script>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Adminty - Premium Admin Template by Colorlib </title>
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
    <script type="text/javascript" src="js/jquery-3.5.1.js"></script>
</head>
<style>
.text_title{
    white-space: nowrap;
    text-overflow: ellipsis;
    -o-text-overflow: ellipsis;
    -ms-text-overflow: ellipsis;
    overflow: hidden;
    width: 80%;
}

</style>
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
                                                        
                                                        <button type="button" class="btn btn-primary waves-effect waves-light f-right d-inline-block md-trigger"  onclick="box_news('',<?=$cate_id?>)"> <i class="icofont icofont-plus m-r-5"></i> เพิ่ม</button>
                                                    </div>
                                                    <div class="card-block">
                                                        <div class="table-responsive">
                                                            <div class="table-content">
                                                                <div class="project-table">
                                                                    <table id="e-product-list" class="table table-striped dt-responsive nowrap">
                                                                        <thead>
                                                                            <tr>
                                                                                
                                                                                <th >ลำดับ</th>
                                                                                <th>หัวข้อข่าว</th>
                                                                                <th>วันที่</th>
                                                                                <th>เวลา</th>
                                                                                <th>ดูหน้า</th>
                                                                                <th>new update</th>
                                                                              

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
                                                                         
                                                                            
                                                                            <td>
                                                                            <h6></button><p class="text_title"><?php echo $i.'.'.$row[news_title]?></p></h6>
                                                                            <input type="hidden" value=<?=$row[news_id]?>>
                                                                                    <button type="button" data-toggle="tooltip" title="edit" class="btn btn-danger  btn-mini waves-effect waves-light  d-inline-block md-trigger" data-modal="modal-13" onclick="box_news(<?=$row[news_id]?>,<?=$cate_id?>)">
                                                                                        <span class="icofont icofont-ui-edit"></span>
                                                                                    </button>  
                                                                                    <button type="button" data-toggle="tooltip" title="delete" class="btn btn-inverse  btn-mini waves-effect waves-light" onclick="delete_news(<?=$row[news_id]?>)" >
                                                                                        <span class="icofont icofont-delete-alt"></span>
                                                                                    </button>
                                                                                </td>
                                                                                
                                                                                <td class="pro-name" style='word-break:break-all'>
                                                        
                                                                                <h6 ><p class=" text_all_title" ><?php echo $row[news_title]?></p></h6>
                                                                                </td>
                                                                                
                                                                                <td class="pro-name">
                                                                                <?php echo $row[news_time]?>
                                                                                    
                                                                                </td>
                                                                                <td><?php echo $row[news_date]?></td>
                                                                                <td>
                                                                                <a href="#!" class="m-r-15 text-muted" data-toggle="tooltip" data-placement="top" title="" data-original-title="goto" onclick="show_file('<?=$row_news[news_file]?>')" ><i class="icofont icofont-square-right"></i></i></a>  
                                                                                </td>
                                                                                <td>
                                                                                <input name="checknew" type="checkbox" value="1" <? if($row[news_check]==1){ echo "checked='checked'"; }?> onclick="del_news(<?=$row[news_id]?>);"/>
                                                                                    
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
                                        <form id="formTP_insert" name="formTP_insert" method="post" enctype="multipart/form-data">
                                        <div class="md-modal md-effect-13 addcontact" id="modal-13">
                                            <div class="md-content">
                                                <h3 class="f-26">รายการประชาสัมพันธ์<?php echo $row_cate[cate_name]?></h3>
                                                <div>
                                                    <div class="input-group">
                                                    
                                                        <input type="hidden" name="status_v" id="status_v" value="add">
                                                        <input type="text" name="Topic" id="Topic" class="form-control pname" placeholder="หัวข้อข่าว">
                                                        <!-- <span class="input-group-addon btn btn-primary">Chooese File</span> -->
                                                    </div>
                                                    <div class="input-group">  
                                                        <label  for="exampleFormControlTextarea1"><h5>อัพโหลดรูปหัวข้อ</h5></label>
                                                        
                                                    </div>
                                                    <div class="input-group ">  
                                                    <input class="PDF_s" type="file" name='file_topic' id='file_topic' value="" class="form-control pname" placeholder="อัพโหลดรูปหัวข้อ">  
                                                    <img class="PDF_h" name="img_pdf_h" id="img_pdf_h" src="test.png" height=50px witdh="40px" alt="">
                                                    <input type="text" name="text_pdf_h" id="text_pdf_h" class="form-control pname PDF_h" >
                                                    </div>
                                                   
                                                    <div >
                                                    <label for="exampleFormControlTextarea1"><h5>อัพโหลดไฟล์ PDF</h5></label>
                                                    
                                                        
                                                    </div>
                                                    <div class="input-group">
                                                    
                                                    <input type="file" name='file_pdf' id='file_pdf'  class="form-control pname" placeholder="อัพโหลดไฟล์ PDF">
                                                        
                                                    </div>
                                                    <!-- <div class="input-group">
                                                        <select id="hello-single" class="form-control stock">
                                                            <option value="">---- Select Stock ----</option>
                                                            <option value="married">In Stock</option>
                                                            <option value="unmarried">Out of Stock</option>
                                                            <option value="unmarried">Law Stock</option>
                                                        </select>
                                                    </div>  -->
                                                   
                                                    <div class="form-group">
                                                        <label for="exampleFormControlTextarea1"><h5>รายละเอียด</h5></label>
                                                       
                                                    </div>
                                                    <div class="input-group">
                                                    
                                              
                                                    </div>
                                                    <div class="text-center">
                                                        <button type="button" class="btn btn-primary waves-effect m-r-20 f-w-600 d-inline-block save_btn" onclick="add_news()">Save</button>
                                                        <button type="button" class="btn btn-primary waves-effect m-r-20 f-w-600 md-close d-inline-block close_btn">Close</button>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                        </from>
                                        <div class="md-overlay"></div>
                                        <!-- Add Contact Ends Model end-->
                                    </div>
                                    <!-- Page-body start -->
                                 
                                    <!-- Page-body end -->
                                </div>
                            </div>
                            <!-- Main-body end -->

                       

                            </div>
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




</body>
</html>