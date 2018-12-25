<?php  
    if(isset($_POST["submit"]) && $_POST["submit"] == "登陆")  
    {  
    	/*1、从前台获取数据*/
        $user = $_POST["username"];
        $psw = $_POST["password"];
        $type = $_POST["type"];
        //判断，如果没有输入用户名或密码
        if($user == "" || $psw == "")  
        {  
            echo "<script>alert('请输入用户名或密码！'); history.go(-1);</script>";  
        }  
        else 
        {  
        	/*2、与数据库获得连接*/
            mysql_connect("localhost","root","1104428690A"); 
            //数据库名称
            $test = mysql_select_db("ms"); 
            mysql_query("set names 'utf-8'");
            /*3、写sql语句：增删改查*/  
            $sql = "select *from user where username = '$_POST[username]' and password = '$_POST[password]'";
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
                //启动session的初始化
                $id = $row['id'];
				session_start();
				//注册session变量，赋值为一个用户的ID
				$_SESSION["id"] = $id;
                //如果是1，则为系统管理员，是0则为求职者
                if ($row["type"] == 1 && $type == 1) {
                	header("Location:choose.html"); 
					//确保重定向后，后续代码不会被执行 
                } else if ($row["type"] == 0 && $type == 0) {
                	header("Location:job.html"); 
                } else {
                	echo "<script>alert('选择的类型有误！');history.go(-1);</script>";
                }
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