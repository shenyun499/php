<?php  
	header('Content-Type:application/json; charset=utf-8');
	/*1、从前台获取数据*/
	$id = $_POST["id"];
    $name = $_POST["name"]; 
    $address = $_POST["address"];
    if($name == "" || $address == "")  
    {  
        exit(json_encode(0));  
    } else {
    	mysql_connect("localhost","root","1104428690A"); 
        //数据库名称
        $test = mysql_select_db("ms"); 
        mysql_query("set names 'utf-8'");
        $sql = "select *from enm where id='$id'";
        $result_sql = mysql_query($sql);
        $num = mysql_num_rows($result_sql);
        if ($num) {
        	//存在id，更新信息
        	$sql_insert = "update enm set name='$name',address='$address' where id='$id'" ;
        } else {  
        	exit(json_encode(1));
        }  
        $result_insert = mysql_query($sql_insert);
        if($result_insert)  
            {  
                exit(json_encode(2)); 
            }  
            else 
            {  
                exit(json_encode(3));  
            }  
     }
?>
