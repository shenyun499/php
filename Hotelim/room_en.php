<?php  
	/*1、与数据库获得连接*/
    mysql_connect("localhost","root","1104428690A"); 
    //数据库名称
    $test = mysql_select_db("hotelim"); 
    mysql_query("set names 'utf-8'");
   	 /*2、写sql语句：增删改查*/  
    $sql = "select room_id,cust_name,sex,enter_date,order_log.order_id from order_log,book_room,customer where 
    			enter_date is not null and leave_date is null and 
    				order_log.order_id=book_room.order_id and customer.cust_id=order_log.cust_id;";
    //根据sql语句，返回结果集$result
    $result = mysql_query($sql);
    //获取数据库结果条数$num
    $num = mysql_num_rows($result);
	/*3、如果有数据，进行下面操作*/
    if($num)  
    {  
    	//通过结果集$result，用数组$row获取数据
        $row = mysql_fetch_array($result);  //将数据以索引方式储存在数组中
    }  
?>