<?php  
	
	/*1、从前台获取数据*/
	$room_id = $_POST["room_id"];//房间号
    $order_id = $_POST["order_id"]; //订单编号
    $cust_id = $_POST["cust_id"];//证件号码
    $ptype_id = $_POST["ptype_id"];//证件类型号
    $cust_name = $_POST["cust_name"];//姓名
    $nex = $_POST["nex"];//年龄
    $phone = $_POST["phone"];//电话
    $plan_enter_date = $_POST["plan_enter_date"];//预计入住时间
    if($room_id == "" || $order_id == "" || $cust_id == "" || $ptype_id == "" || $cust_name == "" || $nex == "" || $phone == "" || $plan_enter_date == "")  
    {  
    	echo "<script>alert('请确认信息的完整性！'); history.go(-1);</script>";
    } else {
    	/*2、与数据库获得连接*/
        mysql_connect("localhost","root","1104428690A"); 
        //数据库名称
        $test = mysql_select_db("hotelim"); 
        mysql_query("set names 'utf-8'");
        $sql = "select *from room,room_type where room.rtype_id=room_type.rtype_id and room.room_id = '$room_id' and rstate='空闲'";
        //根据sql语句，返回结果集$result
        $result = mysql_query($sql);
        //获取数据库结果条数$num
        $num = mysql_num_rows($result);
		/*4、如果有数据，则进行下列操作*/
        if($num)  
        {  
        	//sql01 将房间状态修改为入住 room
	        $sql01 = "update room set rstate='预定' where room_id='$room_id'";
	        //sql02 证件类型号和证件名称写入 paper_type
	        $sql02 = "insert into paper_type values('$ptype_id','身份证')";
	        //sql03 输入顾客信息（证件号码，证件类型号，姓名，性别，联系电话）customer
	        $sql03 = "insert into customer values('$cust_id','$ptype_id','$cust_name','$nex','$phone')";
	        //sql04 输入订单信息（订单编号，客人证件号，入住日期，预计离开日期）order_log
	        $sql04 = "insert into order_log(order_id,cust_id,plan_enter_date) values('$order_id','$cust_id','$plan_enter_date')";
			//sql05 将开房信息(订单号,房号) book_room
	        $sql05 = "insert into book_room values('$order_id',$room_id)";
			//分别执行5条sql语句
	        mysql_query($sql01);
	        mysql_query($sql02);
	        mysql_query($sql03);
	        mysql_query($sql04);
	        mysql_query($sql05);
	        header("Location:room_book_show.php?room='$room_id'&name='$cust_name'&date=$plan_enter_date");
        }  
        else //如果没数据，则说明 用户名或密码不正确
        {  
            echo "<script>alert('房间号不存在或者已有人入住，请重新输入房间！');history.go(-1);</script>";  
        }  
    }
?>