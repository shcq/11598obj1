<?php
require('./utop.php');
?>

    <div class="layui-body">
        <!-- 内容主体区域 -->
        <div style="padding: 15px;">
            <form class="layui-form">
                <input type="hidden" name="uid" value="<?=$uid?>">
                <div class="layui-form-item">
                    <label class="layui-form-label">昵称</label>
                    <div class="layui-input-inline">
                        <input type="text" name="uname" placeholder="请输入昵称" value="<?=$uname?>" autocomplete="off" class="layui-input">
                    </div><div class="layui-form-mid layui-word-aux">*必填</div>
                </div>

                <div class="layui-form-item">
                    <label class="layui-form-label">头像</label>
                    <div class="layui-input-inline">
                        <label class="header" for="header">
                            <img src="<?=$head ? $head : './img/罗小黑1.jpg' ?>" alt="">
                        </label>
                        <input type="file" name="header" id="header" class="preheader">
                        <input type="hidden" name="head" value="<?=$head?>">
                    </div>
                </div>

                </div>

                <div class="layui-form-item">
                    <div class="layui-input-block">
                        <button class="layui-btn update1" type="button">修改</button>
                    </div>
                </div>
            </form>

        </div>
    </div>

    <!--<script src="http://unpkg.com/wangeditor/release/wangEditor.min.js"></script>-->

<?php require 'abottom.php'?>