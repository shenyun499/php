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
	?>
	<body>
		<div class="top">
			<span>结果显示区</span>
		</div>
		<div class="main">
			<span style="color: blue;"><?php echo $name?>&nbsp;入住房间号&nbsp;<?php echo $room ?>&nbsp;成功!</span>
		</div>
	</body>
</html>
