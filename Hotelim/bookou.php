<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title></title>
		<link rel="stylesheet" type="text/css" href="css/him.css"/>
	</head>
	<?php
		$room = $_GET['room'];
		$order = $_GET['order'];
	?>
	<body>
		<div class="top">
			<span>结果显示区</span>
		</div>
		<div class="main">
			<span style="color: blue;">订单编号<?php echo $order ?>解除预定成功，房间号&nbsp;<?php echo $room ?>&nbsp;改为空闲!</span>
		</div>
	</body>
</html>
