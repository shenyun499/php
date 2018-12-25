<?php  
	
	/*1、从前台获取数据*/
    $order_id = $_POST["order_id"]; //订单编号
    if($order_id == "")  
    {  
    	echo "<script>alert('订单编号不能为空！'); history.go(-1);</script>";
    } else {
    	/*2、与数据库获得连接*/
        mysql_connect("localhost","root","1104428690A"); 
        //数据库名称
        $test = mysql_select_db("hotelim"); 
        mysql_query("set names 'utf-8'");
        $sql = "select *from order_log,customer,book_room where order_log.cust_id = customer.cust_id and 
        order_log.order_id = book_room.order_id and order_log.order_id='$order_id'";
        //根据sql语句，返回结果集$result
        $result = mysql_query($sql);
        //获取数据库结果条数$num
        $num = mysql_num_rows($result);
		/*4、如果有数据，则进行下列操作*/
        if($num)  
        {
        	$row = mysql_fetch_array($result);
        	//订单预定房间的房号
        	$room_id = $row['room_id'];
        	$sql01 = "select *from room where rstate='预定' ";
        	$result1 = mysql_query($sql01);
        	$num2 = mysql_num_rows($result1);
        	if ($num2) {
        		//客人的身份号码  
        		$cust_id = $row['cust_id'];
        		//删除订单编号
        		mysql_query("delete from book_room where order_id=$order_id");
        		//删除客人信息
        		mysql_query("delete from customer where cust_id='$cust_id'");
        		//将房间改为空闲
        		mysql_query("update room set rstate='空闲' where room_id='$room_id'");
		        header("Location:bookou.php?room='$room_id'&order='$order_id'");
        	} else {
        		echo "<script>alert('该订单号房间没有预定，无须解除！');history.go(-1);</script>";
        	}
        }  else {  
            echo "<script>alert('订单编号不存在或者没有预定，请重新输入订单编号！');history.go(-1);</script>";  
        }  
    }
?>