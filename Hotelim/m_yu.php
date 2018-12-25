<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title></title>
		<link rel="stylesheet" type="text/css" href="css/him.css"/>
	</head>
	<?php
		mysql_connect("localhost","root","1104428690A"); 
        //数据库名称
        $test = mysql_select_db("hotelim"); 
        mysql_query("set names 'utf-8'");
        $sql = "select *from order_log where plan_enter_date is not null and enter_date is null";
        //根据sql语句，返回结果集$result
        $result = mysql_query($sql);
        $num = mysql_num_rows($result);
	?>
	<body>
		<div class="top">
			<span>结果显示区</span>
		</div>
		<div class="main">
			<span style="color: blue;">已经预定房间的人数：<font style="color: red;"><?php echo $num ?></font></span>
		</div>
	</body>
</html>
