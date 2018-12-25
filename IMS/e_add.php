<?php  
	header('Content-Type:application/json; charset=utf-8');
	/*1、从前台获取数据*/
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
        $sql = "select *from enm where name='$name'";
        $result_sql = mysql_query($sql);
        $num = mysql_num_rows($result_sql);
        if ($num) {
        	exit(json_encode(1)); 
        } else {  
        	//网址名不存在，插入
        	$sql_insert = "insert into enm(name,address) value('$name','$address')";
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
