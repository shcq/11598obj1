window.onload=function(){
	let message = document.getElementById("message");
	if(!message) return ;
	
	message.onclick=function(){
		// console.log(document.querySelector('input[name="hidden"]').value);
		let data='';

		data = 'x=' + document.querySelector('textarea').value;
		let regsn=/.{1,199}/;
        if(!regsn.test(document.querySelector('textarea').value)){
        	alert('请输入1-200字符');
        	return;
		}
		data +=  '&hidden=' + document.querySelector('input[name="hidden"]').value;

		let xhr = new XMLHttpRequest();
		//第二步，建立对服务器的请求
		xhr.open('POST','./leavemessage.php');
		xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
		//第三步：发送请求
		xhr.send(data);
		
		//监听改变状态
		xhr.onreadystatechange = function(){
			if(xhr.readyState==4 && xhr.status == 200){
				let data = JSON.parse(xhr.responseText);
				// console.log(data);
				if(data.r == 'ok'){
                    alert("留言成功");
                    window.location.reload();
				}else{
					alert("留言失败，请刷新后重新操作");
				}
			}
		}
	}
}
