<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="textml; charset=UTF-8">
		<title></title>
		<link rel="stylesheet" type="text/css" href="css/him.css"/>
		<?php
			require 'room_en.php';
			header("Content-Type:text/html;charset=utf-8");
		?>
	</head>
	<body>
		<h2 style="text-align: center;">在住客人列表</h2>
		<div class="main">
			<div class="all">
				<table class="tab" id="tab">
					<tr spellcheck="true">
						<td class="te"></td>
						<th>房间号</th>
						<th>订单编号</th>
						<th>姓名</th>
						<th>性别</th>
						<th>入住时间</th>
					</tr>
					<?php for ($i = 0; $i < $num; $i++) { ?>
					<tr id="tr">
						<td class="te" id="first"></td>
						<td><?php echo $row['room_id'] ?></td>
						<td><?php echo $row['order_id'] ?></td>
						<td><?php echo $row['cust_name'] ?></td>
						<td><?php echo $row['sex'] ?></td>
						<td><?php echo $row['enter_date'] ?></td>
					</tr>
					<?php $row = mysql_fetch_array($result); ?>
					<?php } ?>
				</table>
			</div>
		</div>
	</body>
</html>