<?php  
	
	/*1、从前台获取数据*/
	$room_id = $_POST["room_id"];//房间号
    $order_id = $_POST["order_id"]; //订单编号
    if($room_id == "" || $order_id == "")  
    {  
    	echo "<script>alert('请确认信息的完整性！'); history.go(-1);</script>";
    } else {
    	/*2、与数据库获得连接*/
        mysql_connect("localhost","root","1104428690A"); 
        //数据库名称
        $test = mysql_select_db("hotelim"); 
        mysql_query("set names 'utf-8'");
        $sql = "select *from room,room_type where room.rtype_id=room_type.rtype_id and room.room_id = '$room_id' and rstate='入住'";
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
        		$row1 = mysql_fetch_array($result1);
        		//获得当前房间要交的租金
        		$rdeposit = $row1['rdeposit'];
        		//获得当前房间的房价
        		$rprice = $row1['rprice'];
        		$row2 = mysql_fetch_array($result2);
				$enter_date = $row2['enter_date'];
				date_default_timezone_set('PRC');
				$now = date('Y-m-d H:i:s', time());
				$date = floor((strtotime($now)-strtotime($enter_date))/86400) + 1;
				$numMoney = $date * $rprice;
				$nmoney = $date * $rprice - $rdeposit;
	        	//sql01 将房间状态修改为入住 room
		        $sql01 = "update room set rstate='空闲' where room_id='$room_id'";
		        //sql02 输入订单信息（退房日期，应付金额）order_log
		        $sql02 = "update order_log set leave_date=now(),order_money=$numMoney where order_id='$order_id'";
				//分别执行2条sql语句
		        mysql_query($sql01);
		        mysql_query($sql02);
		        header("Location:room_fis_show.php?room='$room_id'&numMoney='$nmoney'&date='$date'");
        	} else {
        		echo "<script>alert('未找到该订单号，请重新输入新的订单号！');history.go(-1);</script>";
        	}
        }  else {  
            echo "<script>alert('房间号不存在或者无人入住，请重新选择房间！');history.go(-1);</script>";  
        }  
    }
?>