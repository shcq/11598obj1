<?php
require 'atop.php';
//$mysql = new mysqli('localhost', 'root', 'root', 'weblog', 3306);
//$mysql->query('SET NAMES UTF8');
//$sql = 'SELECT aid, aname FROM admin WHERE status = 1';
//$r = $mysql->query($sql);
//$weblog = $r->fetch_all(MYSQLI_ASSOC);
//
//$aid = (int)$_GET['aid'];
//$sql = 'SELECT * FROM admin WHERE status = 1 AND aid = ' . $aid;
//$r = $mysql->query($sql);
//$atu = $r->fetch_array(MYSQLI_ASSOC);
//foreach ($atu as $key => $value) {
//    $$key = $value;
//}
?>

    <div class="layui-body">
        <!-- 内容主体区域 -->
        <div style="padding: 15px;">
            <form class="layui-form" action="">

<!--                <input type="hidden" name="aid" value="--><?//=$aid?><!--">-->

                <div class="layui-form-item">
                    <label class="layui-form-label">用户名</label>
                    <div class="layui-input-inline">
                        <input type="text" name="username" required lay-verify="required" value="<?=$_SESSION['username']?>" readonly
                               autocomplete="off" class="layui-input">
                    </div>
                    <div class="layui-form-mid layui-word-aux">用户名不可改</div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">密码框</label>
                    <div class="layui-input-inline">
                        <input type="password" name="password" required lay-verify="required" placeholder="请输入密码"
                               autocomplete="off" class="layui-input">
                    </div>
                    <div class="layui-form-mid layui-word-aux">输入新密码</div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">确认密码</label>
                    <div class="layui-input-inline">
                        <input type="password" name="password" required lay-verify="required" placeholder="确认密码"
                               autocomplete="off" class="layui-input">
                    </div>
                    <div class="layui-form-mid layui-word-aux">再次输入新密码</div>
                </div>



                <div class="layui-form-item">
                    <div class="layui-input-block">
                        <button class="layui-btn pwsubmit" lay-submit lay-filter="formDemo">立即提交</button>
                        <button type="reset" class="layui-btn layui-btn-primary">重置</button>
                    </div>
                </div>
            </form>
            <script src="./layui/layui.js"></script>
            <script>
                //Demo
                layui.use('form', function () {
                    var form = layui.form;

                    //监听提交
                    form.on('submit(formDemo)', function (data) {
                        layer.msg(JSON.stringify(data.field));
                        return false;
                    });
                });
            </script>
        </div>
    </div>

<?php require 'abottom.php'?>