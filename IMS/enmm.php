<?php
	/*1、与数据库获得连接*/
    mysql_connect("localhost","root","1104428690A"); 
    //数据库名称
    $test = mysql_select_db("ms"); 
    mysql_query("set names 'utf-8'");
    /*2、写sql语句：增删改查*/  
    $sql = "select *from enm";
    //根据sql语句，返回结果集$result
    $result = mysql_query($sql);
    //获取数据库结果条数$num
    $num = mysql_num_rows($result);
	/*3、如果有数据，则打印数据，并登录成功*/
	$row = mysql_fetch_array($result);  //将数据以索引方式储存在数组中 
?>