<?php
require 'atop.php';
$mysql = new mysqli('localhost', 'root', 'root', 'weblog', 3306);
$mysql->query('SET NAMES UTF8');
$sql = 'select arid,title,content,addtime,updatetime,arnums from arlist where status = 1';
$r = $mysql->query($sql);
$arlist = $r->fetch_all(MYSQLI_ASSOC);
?>

<div class="layui-body">
    <div style="padding: 15px;">
        <span class="layui-breadcrumb">
          <a href="">���˺�̨</a>
          <a href="">���¹���</a>
          <a><cite>�����б�</cite></a>
        </span>
        <hr>
        <table class="layui-table  classlist">
            <colgroup>
                <col width="100">
                <col width="150">
                <col>
            </colgroup>
            <thead>
            <tr>
                <th>ID</th>
                <th>���±���</th>
                <th>����ʱ��</th>
                <th>�޸�ʱ��</th>
                <th>�������</th>
                <th>����</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($arlist as $key => $atu) {
                echo '<tr>
              <th>'.$atu['arid'].'</th>
              <th>'.$atu['title'].'</th>
              <th>'.$atu['addtime'].'</th>
              <th>'.$atu['updatetime'].'</th>
              <th>'.$atu['arnums'].'</th>
              <th><A href="#" class="delart" data-arid="'.$atu['arid'].'">ɾ��</A> |
              <a href="./updateart.php?arid=' . $atu['arid'] . '">�޸�</a>
              </th>
              </tr>';
            }
            ?>

            </tbody>
        </table>

    </div>
</div>




<?php require 'abottom.php'?>
