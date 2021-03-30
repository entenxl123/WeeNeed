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
?>

<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
 <script type="text/javascript" src="js/jquery-1.5.1.js"></script> 
<script>

function save_news(){
	//alert(454566664545);
	var detail = (CKEDITOR.instances.message.getData());
	 $("#message").val(detail);
		// alert(detail);
      var form = $('#form_news')[0];
	 var data = new FormData(form);
		// var form = $("#form_save_code").serialize()
        // // $('file_topic').show();
		// // // alert(menu_id);
		// // console.log(form);
		// // alert($("#message").val());
		// var data = "status=save_code&"+form+"&detail="+detail;
		alert(data);
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
                                alert('แก้ไขเมนูเรียบร้อย');
                                // location.reload();
                           }
                    });
       
}

function del_file(news_id){
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
	  }///confirm
}///function
</script>
<style>
body{
	background-color:#F0EBE2; 
	font:"MS Sans Serif";
	font-size:13px;	
}
</style>
<div>
<div class="input-group">
<div class="row">
	<div class="col-12">
	<form name="form_news" id="form_news" enctype="multipart/form-data">
	<div class="row">
		<div class="col-sm-12">
	<?
  	$sql_cate="SELECT
								tb_category.cate_id,
								tb_category.cate_name
								FROM tb_category
								WHERE cate_id='".$cate_id."' ";
	$query_cate=mysql_query($sql_cate);
	$row_cate=mysql_fetch_array($query_cate);
	
	$sql_news="SELECT*
								 FROM tb_news
								 WHERE news_id='".$news_id."'"; 
		$query_news=mysql_query($sql_news);
		$row_news=mysql_fetch_array($query_news);
	?>
    	
 		ข่าวประชาสัมพันธ์<?=$row_cate[cate_name]?>&nbsp; ลำดับ<input type="text" name="order_new" id="order_new"  value="<?=$row_news[order_new]?>"style="width:20px;" />
 	
    <?
		
		if($cmd==2){	
	?>
    <img src=<?=$row_news[news_localtion]?> height="80" width="80">
        <a onclick="show_edit();" style="cursor:pointer;"><br />&gt;&gt;แก้ไขรูปหัวข้อข่าว&lt;&lt;</a>
    
      <?
        }
	?>
      
        หัวข้อข่าว:<textarea name="titlenews" id="titlenews" cols="50" rows="5"><?=$row_news[news_title]?></textarea>
     
      <?
		
	if($cmd==2){
	?>
      
        <? if($row_news[news_file]!=''){?>
        <B><u>ไฟล</u></B>์<br />
        <img src="icon/comment.png" style="width:25px; height:25px; cursor:pointer;" onclick="show_file('<?=$row_news[news_file]?>');" title="ดูไฟล์"/>
        <img src="icon/cut.png" style="width:25px; height:25px; cursor:pointer;" onclick="show_edit_file();" title="แก้ไขไฟล์"/>
        <img src="icon/delete.png" style="width:25px; height:25px; cursor:pointer;" onclick="del_file('<?=$row_news[news_id]?>')" title="ลบไฟล์"/><? }else{?>
        <script>
	 $(document).ready(function(e) {
		show_edit_file();
	 });
	 </script>
        <?	}?>
      
      <? }?>
    
      อัพรูปหัวข้อข่าว :  <input type="file" name="filUpload" />
      อัพไฟล์ PDF  <input type="file" name="filUpload_file" />
    
    รายละเอียดข่าว
   
    
  <table width="100%" border="0" cellpadding="0" cellspacing="0">
    <tr>
      <td>
      <textarea cols="80" id="message" name="message" rows="10" ><?=stripslashes($row_news[news_detail])?></textarea>
      <input name="cate_id" id="cate_id" type="hidden" value="<?=$cate_id?>" />
      <input name="news_id" id="news_id" type="hidden" value="<?=$news_id?>" />
      <input name="cmd"  id="cmd" type="hidden" value="<?=$cmd?>" />
      </td>
    </tr>
  </table>
</form>
</div>
</div>
	<button onclick="save_news()">save</button>

<script type="text/javascript">
	//<![CDATA[
   CKEDITOR.replace( 'message',{
	language : 'en',
	height : 350,
	filebrowserBrowseUrl : './ckeditor/ckfinder/ckfinder.html',
	filebrowserImageBrowseUrl : './ckeditor/ckfinder/ckfinder.html?Type=Images',
	filebrowserFlashBrowseUrl : './ckeditor/ckfinder/ckfinder.html?Type=Flash',
	filebrowserUploadUrl : './ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
	filebrowserImageUploadUrl : './ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
	filebrowserFlashUploadUrl : './ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
	} );
	//]]>
</script>
