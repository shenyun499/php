<?php  
    mysql_connect("localhost","root","root");  
    mysql_select_db("mydatabase");  
    mysql_query("set names 'gbk'");  
    $sql = "select username,password from users";  
    $result = mysql_query($sql);  
    $num = mysql_num_rows($result);
   
    echo "<table border=1>"; //使用表格格式化数据
	echo "<tr><td>姓名</td><td>密码</td></tr>";
	while($row=mysql_fetch_array($result)) //遍历SQL语句执行结果把值赋给数组
	{
	echo "<tr>";
	echo "<td>".$row['username']." </td>"; //显示姓名
	echo "<td>".$row['password']." </td>"; //显示密码
	echo "</tr>";
	}
	echo "</table>";
?>

