window.onload=function(){
    let adminlog=document.querySelector('.adminlog');
    if (!adminlog) return;
    let returns=document.querySelector('.returns');
    if (!returns) return;

    returns.onclick=function () {
        window.location.href='./login.html';
    }
    adminlog.onclick=function () {
        let xhr=new XMLHttpRequest();
        xhr.open('POST','./admloginto.php');
        let formdata=new FormData();
        formdata.append('username',document.querySelector('input[name="username"]').value);
        formdata.append('passwd',document.querySelector('input[name="passwd"]').value);
        // console.log(formdata);
        // return;
        xhr.send(formdata);
        xhr.onreadystatechange=function(){
            if(xhr.readyState==4 && xhr.status==200){
                let res=JSON.parse(xhr.responseText);
                if(res.r=='uname not exist'){
                    document.querySelector('.utip').innerHTML='账号不存在';
                    document.querySelector('.utip').classList.add('warn');
                    return;
                }
                if(res.r=='psd error'){
                    document.querySelector('.ptip').innerHTML='密码错误';
                    document.querySelector('.ptip').classList.add('warn');
                    return;
                }

                if(res.r=='ok'){
                    window.location.href='./admin.php';
                }
            }
        }
    }
}
