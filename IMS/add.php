<?php  
	header('Content-Type:application/json; charset=utf-8');
	/*1、从前台获取数据*/
	$id = $_POST["id"];
    $user = $_POST["name"]; 
    $sex = $_POST["sex"];
    $age = $_POST["age"];
    $profe = $_POST["profe"];
    $score = $_POST["score"];
    $f_c = $_POST["f_c"];
    $phone = $_POST["phone"];
    if($user == "" || $sex == "" || $age == "" || $profe == "" || $score == "" || $f_c == "" || $phone == "")  
    {  
        exit(json_encode(0));  
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
                exit(json_encode(1)); 
            }  
            else 
            {  
                exit(json_encode(2));  
            }  
     }
?>
