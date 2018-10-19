window.onload = function () {
    
    delart();
    updateart();
};



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
    
}