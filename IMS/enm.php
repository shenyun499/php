<!DOCTYPE html>
<html>
	<?php
		require 'enmm.php';
	?>
	<head>
		<meta http-equiv="Content-Type" content="textml; charset=UTF-8">
		<title>管理页面</title>
		<link rel="stylesheet" href="css/style.css" />
		<script src="js/jquery-3.3.1.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="js/myjs.js" type="text/javascript" charset="utf-8"></script>
		<meta name="viewport" content="width=device-width, initial-scale=1">
	</head>
	<body>
		<div class="title"><font>欢迎使用</font></div>
		<div class="all2">
			<table class="tab2">
				<tr>
					<td class="te" style="width: 6%;"></td>
					<th>名称</th>
					<th>网址</th>
				</tr>
				<?php for ($i=0; $i < $num; $i++) { ?>
				<tr>
					<td class="te" style="width: 6%;"></td>
					<td><?php echo $row['name'] ?></td>
					<td><?php echo $row['address'] ?></td>
					<input type="hidden" name="id" id="e_id" value="<?php echo $row['id'] ?>"/>
					<input type="hidden" name="name" id="name" value="<?php echo $row['name'] ?>"/>
					<input type="hidden" name="address" id="address" value="<?php echo $row['address'] ?>"/>
				</tr>
				<?php $row = mysql_fetch_array($result); ?>
				<?php } ?>
			</table>
		</div>
		<div class="context">
			<div class="url"><label>名称：</label><input type="text" id="e_name" value=""/></div>
			<div class="url"><label>网址：</label><input type="text" id="e_address" class="input_2" value=""/></div>
		</div>
		<div class="menu3">
			<div class="bu3"><input type="button" id="query" value="查询"/></div>
			<div class="bu3"><input type="button" id="e_add" value="增加"/></div>
			<div class="bu3"><input type="button" id="delete" value="删除"/></div>
			<div class="bu3"><input type="button" id="update" value="更新"/></div>
			<div class="bu3"><input type="button" id="cupdate" value="确认更新"/></div>
		</div>
		<div class="menu4">
			<div class="bu"><input type="button" id="first" value="第一条"/></div>
			<div class="bu"><input type="button" id="next" value="下一条"/></div>
			<div class="bu"><input type="button" id="previous" value="上一条"/></div>
			<div class="bu"><input type="button" id="last" value="最后一条"/></div>
			<div class="bu"><a href="login.html"><input type="button" id="exit" value="关闭"/></a></div>
		</div>
	</body>
</html>