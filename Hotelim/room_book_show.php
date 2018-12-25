<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title></title>
		<link rel="stylesheet" type="text/css" href="css/him.css"/>
	</head>
	<?php
		$room = $_GET['room'];
		$name = $_GET['name'];
		$date = $_GET['date'];
		date_default_timezone_set('PRC');
		$now = date('Y-m-d H:i:s', time());
		$date2 = floor((strtotime($date)-strtotime($now))/86400) + 1;
	?>
	<body>
		<div class="top">
			<span>结果显示区</span>
		</div>
		<div class="main">
			<span style="color: blue;"><?php echo $name?>&nbsp;预定房间号&nbsp;<?php echo $room ?>&nbsp;成功!请于<?php echo $date2 ?>天之前过来预定入住。</span>
		</div>
	</body>
</html>
