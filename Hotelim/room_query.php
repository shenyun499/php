<?php  
	
	/*1、从前台获取数据(房间号)*/
	$room_id = $_POST["room_id"];
	$is_all = $_POST["is_all"];
      //判断，如果没有输入数据
    if($room_id == "" && $is_all == 0)  
    {  
        echo "<script>alert('请输入房间号！'); history.go(-1);</script>";  
    }  
    else
    {  
    	/*2、与数据库获得连接*/
        mysql_connect("localhost","root","1104428690A"); 
        //数据库名称
        $test = mysql_select_db("hotelim"); 
        mysql_query("set names 'utf-8'");
        //判断是否根据房间号查询
       if ($is_all == 0) {
	       	 /*3、写sql语句：增删改查*/  
	        $sql = "select room_id,rtype_name,rarea,rprice,rdeposit,rstate
					from room,room_type where room.rtype_id=room_type.rtype_id and room.room_id = '$room_id'";
	        //根据sql语句，返回结果集$result
	        $result = mysql_query($sql);
	        //获取数据库结果条数$num
	        $num = mysql_num_rows($result);
	        /*$type = mysql_fetch_assoc('type');*/
			/*print_r($type);   // 打印最终结果
			echo '</pre>';*/
			/*4、如果有数据，则打印数据，并登录成功*/
	        if($num)  
	        {  
	        	//通过结果集$result，用数组$row获取数据
	            $row = mysql_fetch_array($result);  //将数据以索引方式储存在数组中
	        }  
	        else //如果没数据，则说明 用户名或密码不正确
	        {  
	            echo "<script>alert('查询的房间号不存在，请重新输入！');history.go(-1);</script>";  
	        }  
       } else {
       	 /*3、写sql语句：增删改查*/  
	        $sql = "select room_id,rtype_name,rarea,rprice,rdeposit,rstate
					from room,room_type where room.rtype_id=room_type.rtype_id and room.room_id order by room.room_id";
	        //根据sql语句，返回结果集$result
	        $result = mysql_query($sql);
	        //获取数据库结果条数$num
	        $num = mysql_num_rows($result);
	        if($num)  
	        {  
	        	//通过结果集$result，用数组$row获取数据
	            $row = mysql_fetch_array($result);  //将数据以索引方式储存在数组中 
	        }  
	        else //如果没数据，则说明 用户名或密码不正确
	        {  
	            echo "<script>alert('没有数据！');history.go(-1);</script>";  
	        }
       }
    }
?>