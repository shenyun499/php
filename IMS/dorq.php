<?php
	 if(isset($_POST["submit"]) && $_POST["submit"] == "删除") {
	 	$id = $_POST["id"];
	 	echo $id;
	 } else if(isset($_POST["submit"]) && $_POST["submit"] == "更新") {
	 	$id = $_POST["id"];
	 	echo $id;
	 } else {
			echo "<script>alert('出错了！'); history.go(-1);</script>";
		}
?>