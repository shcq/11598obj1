<?php
require 'atop.php'
?>




<div class="layui-body">
    <form class="layui-form" action="">
        <div class="layui-form-item">
            <label class="layui-form-label">文章标题</label>
            <div class="layui-input-block">
                <input type="text" name="title" required  lay-verify="required" placeholder="请输入标题" autocomplete="off" class="layui-input" style="width: 60%">
            </div>
        </div>

        <div class="layui-form-item layui-form-text">
            <label class="layui-form-label">文章内容</label>
            <div class="layui-input-block">
                <textarea name="desc" placeholder="请输入内容" class="layui-textarea" style="width: 60%"></textarea>
            </div>
        </div>

        <div class="layui-form-item">
            <div class="layui-input-block">
                <button class="layui-btn addstu" type="button">发布</button>
            </div>
        </div>
    </form>

</div>

<!--<script src="http://unpkg.com/wangeditor/release/wangEditor.min.js"></script>-->



<?php require 'abottom.php'?>
