<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="textml; charset=UTF-8">
		<title>管理页面</title>
		<link rel="stylesheet" href="css/style.css" />
		<script src="js/jquery-3.3.1.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="js/myjs.js" type="text/javascript" charset="utf-8"></script>
		<meta name="viewport" content="width=device-width, initial-scale=1">
	</head>
<?php
require 'manager.php';
header("Content-Type:text/html;charset=utf-8");
?>
	<body>
		<div class="title"><font>欢迎使用管理系统</font></div>
		<div class="menu">
			<div class="bu"><input type="button" id="first" value="第一条"/></div>
			<div class="bu"><input type="button" id="next" value="下一条"/></div>
			<div class="bu"><input type="button" id="previous" value="上一条"/></div>
			<div class="bu"><input type="button" id="last" value="最后一条"/></div>
			<div class="bu"><a href="login.html"><input type="button" id="exit" value="关闭"/></a></div>
		</div>
		<div class="all">
			<table class="tab" id="tab">
				<tr spellcheck="true">
					<td class="te" style="width: 6%;"></td>
					<th>姓名</th>
					<th>性别</th>
					<th>年龄</th>
					<th>专业</th>
					<th>总评成绩</th>
					<th>毕业院校</th>
					<th>联系电话</th>
				</tr>
				<?php for ($i = 0; $i < $num; $i++) { ?>
				<tr id="tr">
					<td class="te" id="first" style="width: 6%;"></td>
					<td><?php echo $row['name'] ?></td>
					<td><?php echo $row['sex'] ?></td>
					<td><?php echo $row['age'] ?></td>
					<td><?php echo $row['profe'] ?></td>
					<td><?php echo $row['score'] ?></td>
					<td><?php echo $row['f_c'] ?></td>
					<td><?php echo $row['phone'] ?></td>
					<input type="hidden" name="id" id="id" value="<?php echo $row['id'] ?>"/>
				</tr>
				<?php $row = mysql_fetch_array($result); ?>
				<?php } ?>
			</table>
		</div>
		<div class="menu2">
			<div class="bu2"><input type="button" id="delete" value="删除"/></div>
			<div class="bu2"><input type="button" value="更新"/></div>
			<div class="bu2"><input type="button" id="add" value="增加"/></div>
			<div class="bu2"><input type="button" id="confirmadd" value="确认增加"/></div>
		</div>
	</body>
</html>