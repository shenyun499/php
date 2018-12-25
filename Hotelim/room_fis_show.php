<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title></title>
		<link rel="stylesheet" type="text/css" href="css/him.css"/>
	</head>
	<?php
		$room = $_GET['room'];
		$numMoney = $_GET['numMoney'];
		$date = $_GET['date'];
	?>
	<body>
		<div class="top">
			<span>结果显示区</span>
		</div>
		<div class="main">
			<span style="color: blue;">房间号<?php echo $room ?>退房成功!入住了<font style="color:red"><?php echo $date?></font>天，需要交付金额<font style="color:red"><?php echo $numMoney?></font>(押金已经抵扣部分金额)。</span>
		</div>
	</body>
</html>
