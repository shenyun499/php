<?php  
    if(isset($_POST["submit"]) && $_POST["submit"] == "提交求职信息")  
    {  
    	session_start();
    	$id = $_SESSION["id"];
    	/*1、从前台获取数据*/
        $user = $_POST["name"]; 
        $sex = $_POST["sex"];
        $age = $_POST["age"];
        $profe = $_POST["profe"];
        $score = $_POST["score"];
        $f_c = $_POST["f_c"];
        $phone = $_POST["phone"];
        session_start();
        $id = $_SESSION["id"];
        if($user == "" || $sex == "" || $age == "" || $profe == "" || $score == "" || $f_c == "" || $phone == "")  
        {  
            echo "<script>alert('请确认信息完整性！'); history.go(-1);</script>";  
        } else {
        	mysql_connect("localhost","root","1104428690A"); 
	        //数据库名称
	        $test = mysql_select_db("ms"); 
	        mysql_query("set names 'utf-8'");
	        $sql = "select *from student where s_id='$id'";
	        $result_sql = mysql_query($sql);
	        $num = mysql_num_rows($result_sql);
	        if ($num) {
	        	 /*3、写sql语句：id存在，更新信息*/  
		        $sql_insert = "update student set name='$user',age='$age',sex='$sex',phone='$phone',profe='$profe',score='$score',f_c='$f_c' where s_id='$id'";
	        } else {  
	        	//id不存在，插入
	        	$sql_insert = "insert into student(s_id,name,age,sex,phone,profe,score,f_c) value('$id','$user','$age','$sex','$phone','$profe','$score','$f_c')";
            }  
            $result_insert = mysql_query($sql_insert);
	        if($result_insert)  
	            {  
	                echo "<script>alert('提交成功！'); history.go(-1);</script>";  
	            }  
	            else 
	            {  
	                echo "<script>alert('系统繁忙，请稍候！'); history.go(-1);</script>";  
	            }  
	     }
    }  
    else 
    {  
        echo "<script>alert('提交未成功！'); history.go(-1);</script>";  
    }  
?>