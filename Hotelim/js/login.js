$(function(){
	$('#username').on('blur',function() {
			if ($('#username').val() == "") {
				$('#d_tip').text("请输入用户名");
				$('#d_tip').css('color','red');
			} else {
				$('#d_tip').text("");
			}
		});
	$('#password').on('blur',function() {
		if ($('#password').val() == "") {
			$('#d_tip').text("请输入密码");
			$('#d_tip').css('color','red');
		} else {
			$('#d_tip').text("");
		}
	});
})