<?php  
    if(isset($_POST["submit"]) && $_POST["submit"] == "登陆")  
    {  
    	/*1、从前台获取数据*/
    	
    	/*2、与数据库获得连接*/
    	/*3、写sql语句：增删改查*/  
    	/*4、如果有数据，则打印数据，并登录成功*/
        $user = $_POST["username"];  
        $psw = $_POST["password"];
        //判断，如果没有输入用户名或密码
        if($user == "" || $psw == "")  
        {  
            echo "<script>alert('请输入用户名或密码！'); history.go(-1);</script>";  
        }  
        else 
        {  
        	/*2、与数据库获得连接*/
            mysql_connect("localhost","root","2"); 
            //数据库名称
            $test = mysql_select_db("ms"); 
            echo $test; 
            mysql_query("set names 'gbk'");
            /*3、写sql语句：增删改查*/  
            $sql = "select *from user where username = '$_POST[username]' and password = '$_POST[password]'";
            //根据sql语句，返回结果集$result
            $result = mysql_query($sql);
            //获取数据库结果条数$num
            $num = mysql_num_rows($result);
            //测试打印得到的记录数
            echo $num;
            /*$type = mysql_fetch_assoc('type');*/
            /*echo "<script>alert('$type');history.go(-1);</script>"; 
            echo '<pre>';
			print_r($type);   // 打印最终结果
			echo '</pre>';*/
			/*4、如果有数据，则打印数据，并登录成功*/
            if($num)  
            {  
            	//通过结果集$result，用数组$row获取数据
                $row = mysql_fetch_array($result);  //将数据以索引方式储存在数组中  
                //打印想要的数据
                echo $row['username'];  
            }  
            else //如果没数据，则说明 用户名或密码不正确
            {  
                echo "<script>alert('用户名或密码不正确！');history.go(-1);</script>";  
            }  
        }  
    }  
    else 
    {  
        echo "<script>alert('提交未成功！'); history.go(-1);</script>";  
    }  
?>