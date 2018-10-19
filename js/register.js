window.onload=function(){
    let register=document.querySelector('.register');
    if (!register) return;
   register.onclick=function () {

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
        // console.log(formdata);
        // return;
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
                    window.location.href='./login.php';
                }

            }
        }
    }
}
