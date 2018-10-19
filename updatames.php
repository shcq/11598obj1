<?php
require 'atop.php'
?>

<div class="layui-body">
    <!-- 内容主体区域 -->
    <div style="padding: 15px;">


        <form class="layui-form">
            <div class="layui-form-item">
                <label class="layui-form-label">昵称</label>
                <div class="layui-input-inline">
                    <input type="text" name="sname" placeholder="请输入昵称" autocomplete="off" class="layui-input">
                </div><div class="layui-form-mid layui-word-aux">*必填</div>
            </div>

            <div class="layui-form-item">
                <label class="layui-form-label">头像</label>
                <div class="layui-input-inline">
                    <input type="file" name="header" class="layui-input">
                </div>
            </div>

            <div class="layui-form-item">
                <label class="layui-form-label">手机号</label>
                <div class="layui-input-inline">
                    <input type="text" name="tel" placeholder="请输入手机号" autocomplete="off" class="layui-input">
                </div>
                <div class="layui-form-mid layui-word-aux">*必填</div>
            </div>

            <div class="layui-form-item">
                <label class="layui-form-label">简介</label>
                <div class="layui-input-block">
                    <div id="editor">

                    </div>

                    <textarea name="info" id="info" cols="30" rows="10" class="hide"></textarea>

                    <!-- <div id="editor1">
                    <p>上海</p>
                    </div> -->

                </div>
            </div>

            <div class="layui-form-item">
                <div class="layui-input-block">
                    <button class="layui-btn addstu" type="button">修改</button>
                </div>
            </div>
        </form>

    </div>
</div>

<!--<script src="http://unpkg.com/wangeditor/release/wangEditor.min.js"></script>-->

<?php require 'abottom.php'?>
