window.onload=function(){
    register();
    uploading();
    updateuser();
}
function register() {
    let register1=document.querySelector('.register1');
    if (!register1) return;
    let returns=document.querySelector('.returns');
    if (!returns) return;
    returns.onclick=function () {
        window.location.href='./login.html';
    }
    register1.onclick=function () {

        let username=document.querySelector('input[name="username"]');
        let regsn=/^[\u4e00-\u9fa5]{2,4}$/;
        if(!regsn.test(username.value)){
            username.parentNode.nextElementSibling.classList.add('warn');
            username.focus();
            return false;
        }else {
            username.parentNode.nextElementSibling.classList.remove('warn');
        }

        let passwd=document.querySelector('input[name="passwd"]');
        let regsu=/^\d{6}$/;
        if(!regsu.test(passwd.value)){
            passwd.parentNode.nextElementSibling.classList.add('warn');
            passwd.focus();
            return false;
        }else {
            passwd.parentNode.nextElementSibling.classList.remove('warn');
        }

        let xhr=new XMLHttpRequest();
        xhr.open('POST','./reginto.php');
        let formdata=new FormData();
        formdata.append('username',document.querySelector('input[name="username"]').value);
        formdata.append('passwd',document.querySelector('input[name="passwd"]').value);
        formdata.append('head',document.querySelector('input[name="head"]').value);
        xhr.send(formdata);
        xhr.onreadystatechange=function(){
            if(xhr.readyState==4 && xhr.status==200){
                let res=JSON.parse(xhr.responseText);
                if(res.r=='uname already exist'){
                    document.querySelector('.utip').innerHTML='账号已存在，请登录';
                    document.querySelector('.utip').classList.add('warn');
                    return;
                }
                if(res.r=='register success'){
                    alert("注册成功");
                    window.location.href='./login.html';
                }

            }
        }
    }
}
function uploading() {
    let preheader=document.querySelector('.preheader');
    if(!preheader) return;
    let headerimg=document.querySelector('.header img');
    preheader.onchange=function () {
        console.log(this.files[0]);

        let xhr=new XMLHttpRequest();
        xhr.open('POST','./uploads.php');

        let formdata=new FormData();
        formdata.append('myheader',this.files[0]);
        formdata.append('username','沈斌');
        xhr.send(formdata);

        xhr.onreadystatechange=function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                let data = JSON.parse(xhr.responseText);
                console.log(data);
                headerimg.src = data.path;
                document.querySelector('input[name="head"]').value=data.path;
            }
        }
    }
}
function updateuser() {
    let update=document.querySelector('.update');
    if (!update) return;
    update.onclick=function () {

        let username=document.querySelector('input[name="username"]');
        let regsn=/^[\u4e00-\u9fa5]{2,4}$/;
        if(!regsn.test(username.value)){
            username.parentNode.nextElementSibling.classList.add('warn');
            username.focus();
            return false;
        }else {
            username.parentNode.nextElementSibling.classList.remove('warn');
        }

        let passwd=document.querySelector('input[name="passwd"]');
        let regsu=/^\d{6}$/;
        if(!regsu.test(passwd.value)){
            passwd.parentNode.nextElementSibling.classList.add('warn');
            passwd.focus();
            return false;
        }else {
            passwd.parentNode.nextElementSibling.classList.remove('warn');
        }

        let xhr=new XMLHttpRequest();
        xhr.open('POST','./updateto.php');
        let formdata=new FormData();
        formdata.append('username',document.querySelector('input[name="username"]').value);
        formdata.append('passwd',document.querySelector('input[name="passwd"]').value);
        formdata.append('head',document.querySelector('input[name="head"]').value);
        xhr.send(formdata);
        xhr.onreadystatechange=function(){
            if(xhr.readyState==4 && xhr.status==200){
                let res=JSON.parse(xhr.responseText);
                console.log(data);
                if (res.r == 'ok') {
                    layer.confirm('修改成功', {
                        btn: [ '回到管理页面']
                    }, function (index) {
                        window.location.href = './login.html';
                    });
                } else {
                    alert('失败，请刷新后重新操作');
                }
            }
        }
    }
}
