window.onload = function () {
    pwsubmit();
    delart();
    updateart();
    addart();
    register();
    uploading();
    updateame();
    updateume();
};

function pwsubmit() {
    var pwsubmit = document.querySelector('.pwsubmit');
    var inconsistency = document.querySelector('.inconsistency');
    if(!pwsubmit) return;

    pwsubmit.onclick = function () {
        var passwordA = document.querySelector('input[name="passwordA"]').value;

        // var reg_pwA = /{6-9}/;
        // if (!reg_pwA.test(passwordA.value)) {
        //     passwordA.parentNode.nextElementSibling.classList.add('H');
        //     passwordA.focus();
        //     return false;
        // }
        var passwordB = document.querySelector('input[name="passwordB"]').value;




            var xhr = new XMLHttpRequest();
            xhr.open('POST', './pwsubmit.php');
            var formdata = new FormData();
            formdata.append('passwdA',passwordA);
            formdata.append('passwdB',passwordB);
            // xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.send(formdata);
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    var data = JSON.parse(xhr.responseText);
                    console.log(data);
                    if(data.r == 'password_inconsistency'){
                        inconsistency.innerHTML = "密码不一致";
                        inconsistency.classList.add('H');
                        document.querySelector('input[name="passwordB"]').focus();
                        return;
                    }
                    if (data.r == 'ok') {
                        layer.confirm('修改成功', {
                            btn: [ '回到管理页面']
                        }, function (index) {
                            window.location.href = './passwd.php';
                        });
                    } else {
                        alert('失败，请刷新后重新操作');
                    }
                }

            }

    }
}

function delart() {
    var delart = document.querySelector('.classlist tbody');
    if(!delart) return;
    delart.onclick = function (e) {
        if (e.target.classList.contains('delart')) {
            layer.confirm('是否确定删除？', {
                btn: ['确定', '取消']
            }, function (index, layero) {
                var arid = e.target.dataset.arid;
                var xhr = new XMLHttpRequest();
                xhr.open('GET', './delart.php?arid=' + arid);
                xhr.send();
                xhr.onreadystatechange = function () {
                    if (xhr.readyState == 4 && xhr.status == 200) {
                        var data = JSON.parse(xhr.responseText);
                        if (data.r1 == 'ok') {
                            window.location.reload();
                        }
                    }
                }
            }, function (index) {});
        }
    }

}

function updateart() {
    var updateart = document.querySelector('.updateart');
    if (!updateart) return;

    updateart.onclick = function () {
        var data = 'arid=' + document.querySelector('input[name="arid"]').value;
        // console.log(data);
        var title = document.querySelector('input[name="title"]');
        data += '&title=' + title.value;

        var content = document.querySelector('textarea[name="content"]');
        data += '&content=' + content.value;

        var xhr = new XMLHttpRequest();
        xhr.open('POST', './updateartsub.php');
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.send(data);
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                var data = JSON.parse(xhr.responseText);
                console.log(data);
                if (data.r == 'ok') {
                    layer.confirm('修改成功', {
                        btn: ['继续修改', '回到管理页面']
                    }, function (index, layero) {
                        window.location.reload();
                    }, function (index) {
                        window.location.href = './articlelist.php';
                    });
                } else {
                    alert('失败，请刷新后重新操作');
                }
            }

        }
    }
}

function addart() {
    var addart = document.querySelector('.addart');
    if (!addart) return;

    addart.onclick = function () {
        // console.log(1);
        var data = '';
        var title = document.querySelector('input[name="title"]');
        data = 'title=' + title.value;

        var content = document.querySelector('textarea[name="content"]');
        data += '&content=' + content.value;

        var xhr = new XMLHttpRequest();
        xhr.open('POST', './relarticlesub.php');
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

        if((!title.value && content.value) || (title.value && !content.value) || !(title.value && content.value)){
            alert("请输入内容");
            return;
        }
        else {
            xhr.send(data);
        }

        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                var data = JSON.parse(xhr.responseText);
                console.log(data);
                if (data.r == 'ok') {
                    layer.confirm('发布成功', {
                        btn: ['继续发布', '回到管理页面']
                    }, function (index, layero) {
                        window.location.reload();
                    }, function (index) {
                        window.location.href = './articlelist.php';
                    });
                } else {
                    alert('失败，请刷新后重新操作');
                }
            }

        }
    }
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
function updateame() {
    let update=document.querySelector('.update');
    if (!update) return;
    update.onclick=function () {

        let aname=document.querySelector('input[name="aname"]');
        let regsn=/^[\u4e00-\u9fa5]{2,4}$/;
        if(!regsn.test(aname.value)){
            aname.parentNode.nextElementSibling.classList.add('warn');
            aname.focus();
            return false;
        }else {
            aname.parentNode.nextElementSibling.classList.remove('warn');
        }
        let xhr=new XMLHttpRequest();
        xhr.open('POST','./updatamesto.php');
        let formdata=new FormData();
        formdata.append('aname',document.querySelector('input[name="aname"]').value);
        formdata.append('aid',document.querySelector('input[name="aid"]').value);
        formdata.append('info',document.querySelector('textarea[name="info"]').value);
        formdata.append('head',document.querySelector('input[name="head"]').value);
        xhr.send(formdata);
        xhr.onreadystatechange=function(){
            if(xhr.readyState==4 && xhr.status==200){
                let res=JSON.parse(xhr.responseText);
                if (res.r == 'ok') {
                    layer.confirm('修改成功', {
                        btn: [ '回到首页']
                    }, function (index) {
                        window.location.href = './admin.php';
                    });
                } else {
                    alert('失败，请刷新后重新操作');
                }
            }
        }
    }
}
function updateume() {
    let update1=document.querySelector('.update1');
    if (!update1) return;
    update1.onclick=function () {

        let uname=document.querySelector('input[name="uname"]');
        let regsn=/^[\u4e00-\u9fa5]{2,4}$/;
        if(!regsn.test(uname.value)){
            aname.parentNode.nextElementSibling.classList.add('warn');
            aname.focus();
            return false;
        }else {
            uname.parentNode.nextElementSibling.classList.remove('warn');
        }
        let xhr=new XMLHttpRequest();
        xhr.open('POST','./updatumesto.php');
        let formdata=new FormData();
        formdata.append('uname',document.querySelector('input[name="uname"]').value);
        formdata.append('uid',document.querySelector('input[name="uid"]').value);
        formdata.append('head',document.querySelector('input[name="head"]').value);
        console.log(document.querySelector('input[name="head"]').value);
        xhr.send(formdata);
        xhr.onreadystatechange=function(){
            if(xhr.readyState==4 && xhr.status==200){
                let res=JSON.parse(xhr.responseText);
                if (res.r == 'ok') {
                    layer.confirm('修改成功', {
                        btn: [ '回到首页']
                    }, function (index) {
                        window.location.href = './user.php';
                    });
                } else {
                    alert('失败，请刷新后重新操作');
                }
            }
        }
    }
}