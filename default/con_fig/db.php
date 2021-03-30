<?
	$host = "localhost";
	$user="root";
	$pass="";
	$db_name="website_db";
	
	$link=mysql_connect($host,$user,$pass);
	if($link){
		mysql_select_db($db_name,$link);
		mysql_query("SET character_set_results=utf8");
        mysql_query("SET character_set_client=utf8");
        mysql_query("SET character_set_connection=utf8");
		
	}else{
		echo "<b>Connect DB Error!</b>";
	}
?>