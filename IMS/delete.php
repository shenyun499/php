<?php
	$id = $_POST['id'];
	$e_id = $_POST['e_id'];
	/*1、与数据库获得连接*/
    mysql_connect("localhost","root","1104428690A"); 
    //数据库名称
    $test = mysql_select_db("ms"); 
    mysql_query("set names 'utf-8'");
	if ($id) {
		/*2、写sql语句：增删改查*/  
   		 $sql = "delete from student where id='$id'";
	} else {
		/*2、写sql语句：增删改查*/  
   		 $sql = "delete from enm where id='$e_id'";
	}
    //根据sql语句，返回结果集$result
    $result = mysql_query($sql);
    exit(json_encode($result)); 
?>