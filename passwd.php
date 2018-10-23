<?php
require 'atop.php';
$sql = 'SELECT aid,passwd ,aname FROM admin WHERE status = 1';
$r = $mydb->query($sql);
$admin = $r->fetch_array(MYSQLI_ASSOC);


?>

    <div class="layui-body">
        <!-- 内容主体区域 -->
        <div style="padding: 15px;">


                <input type="hidden" name="aid" value="<?=$aid?>">

                <div class="layui-form-item">
                    <label class="layui-form-label">用户名</label>
                    <div class="layui-input-inline">
                        <input type="text" name="username" required lay-verify="required" value="<?=$admin['aname']?>" readonly
                               autocomplete="off" class="layui-input">
                    </div>
                    <div class="layui-form-mid layui-word-aux">用户名不可改</div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">密码框</label>
                    <div class="layui-input-inline">
                        <input type="password" name="passwordA" placeholder="请输入密码"
                               autocomplete="off" class="layui-input">
                    </div>
                    <div class="layui-form-mid layui-word-aux">输入新密码</div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">确认密码</label>
                    <div class="layui-input-inline">
                        <input type="password" name="passwordB" placeholder="确认密码"
                               autocomplete="off" class="layui-input">
                    </div>
                    <div class="layui-form-mid layui-word-aux inconsistency">再次输入新密码</div>
                </div>



                <div class="layui-form-item">
                    <div class="layui-input-block">
                        <button class="layui-btn pwsubmit">立即提交</button>
                        <button type="reset" class="layui-btn layui-btn-primary">重置</button>
                    </div>
                </div>

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