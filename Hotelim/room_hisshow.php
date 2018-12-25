<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="textml; charset=UTF-8">
		<title></title>
		<link rel="stylesheet" type="text/css" href="css/him.css"/>
		<?php
			require 'room_his.php';
			header("Content-Type:text/html;charset=utf-8");
		?>
	</head>
	<body>
		<h2 style="text-align: center;">历史客人列表</h2>
		<div class="main">
			<div class="all">
				<table class="tab" id="tab">
					<tr spellcheck="true">
						<th>姓名</th>
						<th>性别</th>
						<th>订单编号</th>
						<th>住过的房间号</th>
						<th>入住的时间</th>
						<th>离开的时间</th>
						<th>消费的金额</th>
					</tr>
					<?php for ($i = 0; $i < $num; $i++) { ?>
					<tr id="tr">
						<td><?php echo $row['cust_name'] ?></td>
						<td><?php echo $row['sex'] ?></td>
						<td><?php echo $row['order_id'] ?></td>
						<td><?php echo $row['room_id'] ?></td>
						<td><?php echo $row['enter_date'] ?></td>
						<td><?php echo $row['leave_date'] ?></td>
						<td><?php echo $row['order_money'] ?></td>
					</tr>
					<?php $row = mysql_fetch_array($result); ?>
					<?php } ?>
				</table>
			</div>
		</div>
	</body>
</html>