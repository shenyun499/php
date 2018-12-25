<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="textml; charset=UTF-8">
		<title></title>
		<link rel="stylesheet" type="text/css" href="css/him.css"/>
		<?php
			require 'room_query.php';
			header("Content-Type:text/html;charset=utf-8");
		?>
	</head>
	<body>
		<h2 style="text-align: center;">房间的状态</h2>
		<div class="main">
			<div class="all">
				<table class="tab" id="tab">
					<tr spellcheck="true">
						<td class="te"></td>
						<th>房间号</th>
						<th>房间类型</th>
						<th>房间大小（平方米）</th>
						<th>入住价格</th>
						<th>入住租金</th>
						<th>当前状态</th>
					</tr>
					<?php for ($i = 0; $i < $num; $i++) { ?>
					<tr id="tr">
						<td class="te" id="first"></td>
						<td><?php echo $row['room_id'] ?></td>
						<td><?php echo $row['rtype_name'] ?></td>
						<td><?php echo $row['rarea'] ?></td>
						<td><?php echo $row['rprice'] ?></td>
						<td><?php echo $row['rdeposit'] ?></td>
						<td style="color: red;"><?php echo $row['rstate'] ?></td>
					</tr>
					<?php $row = mysql_fetch_array($result); ?>
					<?php } ?>
				</table>
			</div>
		</div>
	</body>
</html>