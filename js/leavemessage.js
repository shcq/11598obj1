window.onload=function(){
	let message = document.getElementById("message");
	if(!message) return ;
	
	message.onclick=function(){
		let data = 'data' + document.querySelector('textarea').value;
//		console.log(data);return;
		let data = data + '&hidden=' + document.querySelector('input[name="hidden"]').value;
		
		
		let xhr = new XMLHttpRequest();
		//第二步，建立对服务器的请求
		xhr.open('POST','leavemessage.php');
		xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
		//第三步：发送请求
		xhr.send(data);
		
		//监听改变状态
		xhr.onreadystatechange = function(){
			if(xhr.readyState==4 && xhr.status == 200){
				let data = JSON.parse(xhr.responseText);
//				console.log(data);
				if(data.r == 'ok'){
					layer.confirm('留言成功', {
						btn: ['确定']
					}, function(index) {
						window.location.reload();
					});
				}else{
					alert("留言失败，请刷新后重新操作");
				}
			}
		}
	}
}
