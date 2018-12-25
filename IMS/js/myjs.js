var i = 1;
var sum = 0;
$(function(){
	$('tr').eq(1).css('background','blue');
	$('tr').each(function(){
			sum++;
	});
	$('#first').click(function(){
		i = 1;
		$('tr').eq(i).css('background','blue').siblings('tr').css('background','white');
		location.reload();
	});
	$('#next').click(function(){
		if (i < sum - 1) {
			i++;
		}
		$('tr').eq(i).css('background','blue').siblings('tr').css('background','white');
	});
	$('#previous').click(function(){
		if (i > 1) {
			i--;
		}
		$('tr').eq(i).css('background','blue').siblings('tr').css('background','white');
	});
	$('#last').click(function(){
		$('tr').eq(sum-1).css('background','blue').siblings('tr').css('background','white');
		i = sum -1;
	});
	//双击选中的属性之后移动
	$('#first').dblclick(function(){
		//将选中的商品放到另一边
		$(this).parent('#tr').css('background','blue');
	});
	
	$("#delete").on("click",function(){
		var e_id=$('tr').eq(i).children('#e_id').val();
		var id=$('tr').eq(i).children('#id').val();
		$.ajax({
		url:'delete.php',
		data:{id:id,e_id:e_id},
		type:'post',
		success: function(msg){
		  alert("删除成功！");
		  location.reload();
		 }
		})
	});

	$("#add").on("click",function(){
		var htmlt="";
		htmlt += '<tr id="tr">';
		htmlt += '<td style="width: 6%;"><input type="text" placeholder="求职者id" name="s_id" id="s_id" style="width: 95%;"/></td>';
		htmlt += '<td><input type="text" placeholder="" id="name" style="width: 98%;"/></td>';
		htmlt += '<td><input type="text" placeholder="" id="sex" style="width: 98%;" /></td>';
		htmlt += '<td><input type="text" placeholder="" id="age" style="width: 98%;" /></td>';
		htmlt += '<td><input type="text" placeholder="" id="profe" style="width: 98%;" /></td>';
		htmlt += '<td><input type="text" placeholder="" id="score" style="width: 98%;" /></td>';
		htmlt += '<td><input type="text" placeholder="" id="f_c" style="width: 98%;" /></td>';
		htmlt += '<td><input type="text" placeholder="" id="phone" style="width: 98%;" /></td>';
		htmlt += '</tr>';
		$("#tab").append(htmlt);
	});
	
	$("#confirmadd").on("click",function(){
		var id = $('#s_id').val();
		var name = $('#name').val();
		var sex = $('#sex').val();
		var age = $('#age').val();
		var profe = $('#profe').val();
		var score = $('#score').val();
		var f_c = $('#f_c').val();
		var phone = $('#phone').val();
		console.log(id+name+sex+age+profe+score+f_c+phone);
		$.ajax({
		url:'add.php',
		data:{id:id,name:name,sex:sex,age:age,profe:profe,score:score,f_c:f_c,phone:phone},
		type:'post',
		success: function(msg){
		  if (msg == 0) {
		  	alert("请确认信息的完整性！");
		  } else if (msg == 1) {
		  	alert("增加成功！");
		  	location.reload();
		  } else {
		  	alert("增加失败");
		  }
		 }
		})
	})
	
	$("#query").on("click",function(){
		var address=$('tr').eq(i).children('#address').val();
		console.log(address);
		$.ajax({
			type:"get",
			url:"",
			success: function(msg){
			location.href="https://www."+address;
			}
		});
	})
	
	$("#e_add").on("click",function(){
		var name = $('#e_name').val();
		var address = $('#e_address').val();
		$.ajax({
		url:'e_add.php',
		data:{name:name,address:address},
		type:'post',
		success: function(msg){
		  if (msg == 0) {
		  	alert("请确认信息的完整性！");
		  } else if (msg == 1) {
		  	alert("网站名称已经存在！");
		  } else if (msg == 2) {
		  	alert("增加成功！");
		  	location.reload();
		  } else {
		  	alert("增加失败");
		  }
		 }
		})
	})
	
	$("#update").on("click",function(){
		var name=$('tr').eq(i).children('#name').val();
		var address=$('tr').eq(i).children('#address').val();
		$("#e_name").val(name);
		$("#e_address").val(address);
	})
	
	$("#cupdate").on("click",function(){
		var id=$('tr').eq(i).children('#e_id').val();
		var name=$('#e_name').val();
		var address=$('#e_address').val();
		console.log(id+name+address);
		$.ajax({
			type:"post",
			url:"e_update.php",
			data:{id:id,name:name,address:address},
			success: function(msg){
				 if (msg == 0) {
				  	alert("请确认信息的完整性！");
				 } else if (msg == 1) {
				 	alert("信息不存在！");
				 	location.reload();
				 } else if (msg == 2) {
				 	alert("更新成功！");
				 	location.reload();
				 } else {
				 	alert("更新失败！");
				 	location.reload();
				 }
			}
		});
	})
	
	$("#e_name").bind("input propertychange",function(event){
       console.log($("#e_name").val())
});
})
