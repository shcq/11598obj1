<?php
require 'atop.php';

$sql = 'SELECT arid, title ,content FROM arlist WHERE status = 1';
$r = $mysql->query($sql);
$classlist = $r->fetch_all(MYSQLI_ASSOC);

//获取原始信息
$arid = (int)$_GET['arid'];
$sql = 'SELECT * FROM arlist WHERE status = 1 AND arid = ' . $arid;
$r = $mysql->query($sql);
$atu = $r->fetch_array(MYSQLI_ASSOC);
foreach ($atu as $key => $value) {
    $$key = $value;
}
?>

<div class="layui-body">
    <div style="padding: 15px;">
        <span class="layui-breadcrumb">
          <a href="">个人后台</a>
          <a href="">文章管理</a>
          <a href="">文章列表</a>
          <a><cite>修改</cite></a>
        </span>
        <hr>
    </div>

    <form class="layui-form" action="">
        <input type="hidden" name="arid" value="<?=$arid?>">
        <div class="layui-form-item">
            <label class="layui-form-label">修改标题</label>
            <div class="layui-input-block">
                <input type="text" name="title" required  lay-verify="required" placeholder="请输入标题" value="<?=$title?>" autocomplete="off" class="layui-input" style="width: 60%">
            </div>
        </div>

        <div class="layui-form-item layui-form-text">
            <label class="layui-form-label">修改内容</label>
            <div class="layui-input-block">
                <textarea name="desc" placeholder="请输入内容"  class="layui-textarea" style="width: 60%"></textarea>
            </div>
        </div>

        <div class="layui-form-item">
            <div class="layui-input-block">
                <button class="layui-btn addart" type="button">修改</button>
            </div>
        </div>
    </form>
</div>




<?php require 'abottom.php'?>
