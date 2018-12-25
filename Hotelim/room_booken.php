<?php  
	
	/*1、从前台获取数据*/
	$room_id = $_POST["room_id"];//房间号
    $order_id = $_POST["order_id"]; //订单编号
    $plan_leave_date = $_POST['plan_leave_date'];
    if($room_id == "" || $order_id == "" && $plan_leave_date == "")  
    {  
    	echo "<script>alert('请确认信息的完整性！'); history.go(-1);</script>";
    } else {
    	/*2、与数据库获得连接*/
        mysql_connect("localhost","root","1104428690A"); 
        //数据库名称
        $test = mysql_select_db("hotelim"); 
        mysql_query("set names 'utf-8'");
        $sql = "select *from room,room_type where room.rtype_id=room_type.rtype_id and room.room_id = '$room_id' and rstate='预定'";
        $sql2 = "select *from order_log where order_id='$order_id'";
        //根据sql语句，返回结果集$result
        $result1 = mysql_query($sql);
        $result2 = mysql_query($sql2);
        //获取数据库结果条数$num
        $num1 = mysql_num_rows($result1);
        $num2 = mysql_num_rows($result2);
		/*4、如果有数据，则进行下列操作*/
        if($num1)  
        {  
        	if ($num2) {
        		//获得房间的数据
        		$row = mysql_fetch_array($result2);
        		$cust_id = $row['cust_id'];
        		$sql3 = "select *from customer where cust_id='$cust_id'";
        		$result3 = mysql_query($sql3);
        		$num3 = mysql_num_rows($result3);
        		if ($num3) {
        			$row2 = mysql_fetch_array($result3);
        			$cust_name = $row2['cust_name'];
        			echo $cust_name;
        		}
	        	//sql01 将房间状态修改为入住 room
		        $sql01 = "update room set rstate='入住' where room_id='$room_id'";
		        //sql02 输入订单信息（退房日期，应付金额）order_log
		        $sql02 = "update order_log set plan_leave_date='$plan_leave_date',enter_date=now() where order_id='$order_id'";
				//分别执行2条sql语句
		        mysql_query($sql01);
		        mysql_query($sql02);
		        header("Location:regsu.php?room='$room_id'&name='$cust_name'");
        	} else {
        		echo "<script>alert('未找到该订单号，请重新输入新的订单号！');history.go(-1);</script>";
        	}
        }  else {  
            echo "<script>alert('房间号不存在或者没有预定，请重新输入房间！');history.go(-1);</script>";  
        }  
    }
?>