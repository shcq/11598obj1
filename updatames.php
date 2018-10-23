<?php
    require 'atop.php';
    $aid=(int)$_SESSION['aid'];
    $sql='SELECT * FROM admin WHERE status=1 AND aid='.$aid;
    $r=$mydb->query($sql);
    $adm=$r->fetch_array(MYSQLI_ASSOC);
    foreach ($adm as $key=>$value){
        $$key=$value;
    }
?>

<div class="layui-body">
    <!-- 内容主体区域 -->
    <div style="padding: 15px;">


        <form class="layui-form">
            <input type="hidden" name="aid" value="<?=$aid?>">
            <div class="layui-form-item">
                <label class="layui-form-label">昵称</label>
                <div class="layui-input-inline">
                    <input type="text" name="aname" placeholder="请输入昵称" value="<?=$aname?>" autocomplete="off" class="layui-input">
                </div>
                <div class="layui-form-mid layui-word-aux">*必填</div>
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

            <div class="layui-form-item">
                <label class="layui-form-label">简介</label>
                <div class="layui-input-block">
                    <textarea name="info" id="info" cols="30" rows="10" class="hide"><?=$info?></textarea>

                    <!-- <div id="editor1">
                    <p>上海</p>
                    </div> -->

                </div>
            </div>

            <div class="layui-form-item">
                <div class="layui-input-block">
                    <button class="layui-btn update" type="button">修改</button>
                </div>
            </div>
        </form>

    </div>
</div>

<!--<script src="http://unpkg.com/wangeditor/release/wangEditor.min.js"></script>-->

<?php require 'abottom.php'?>
