<?php
require 'atop.php';
$mysql = new mysqli('localhost', 'root', 'root', 'weblog', 3306);
$mysql->query('SET NAMES UTF8');
$sql = 'select arid,title,content,addtime,updatetime,arnums from arlist where status = 1';
$r = $mysql->query($sql);
$arlist = $r->fetch_all(MYSQLI_ASSOC);

$pagenum = 3;
$where = ' WHERE status = 1';
$sql = 'SELECT COUNT(arid) AS totalnums FROM arlist' . $where;
$r = $mysql->query($sql);
$row = $r->fetch_array(MYSQLI_ASSOC);
$totalpage = ceil($row['totalnums'] / $pagenum);

$page = (isset($_GET['page']) && (int)$_GET['page'] > 0 && (int)$_GET['page'] <= $totalpage) ? $_GET['page'] : 1;

$sql = 'SELECT * FROM arlist' . $where . ' LIMIT ' . ($page - 1) * $pagenum . ', ' . $pagenum;

$r = $mysql->query($sql);
$arlist = $r->fetch_all(MYSQLI_ASSOC);

$prev = $page - 1 < 1 ? 1 : ($page - 1);

$next = $page + 1 > $totalpage ? $totalpage : ($page + 1);

$showpage = 5;

$start = $page - ($showpage - 1) / 2;
$end = $page + ($showpage - 1) / 2;

if ($start < 1) {
    $start = 1;
    $end = $start + $showpage - 1;
}

if ($end > $totalpage) {
    $end = $totalpage;
    $start = $end - $showpage + 1;
    if ($start < 1) {
        $start = 1;
    }
}
?>

<div class="layui-body">
    <div style="padding: 15px;">
        <span class="layui-breadcrumb">
          <a href="">个人后台</a>
          <a href="">文章管理</a>
          <a><cite>文章列表</cite></a>
        </span>
        <hr>

        <div class="layui-box layui-laypage layui-laypage-default">
            <a href="./articlelist.php?page=<?= $prev . $urlext ?>" class="layui-laypage-prev" data-page="0">上一页</a>
            <?php
            //显示中间页码
            for ($p = $start; $p <= $end; $p++) {
                if ($p == $page) {
                    echo '<span class="layui-laypage-curr">
                            <em class="layui-laypage-em"></em>
                            <em>' . $page . '</em>
                        </span>';
                } else {
                    echo '<a href="./articlelist.php?page=' . $p . $urlext . '">' . $p . '</a>';
                }
            }
            ?>
            <a href="./articlelist.php?page=<?= $next . $urlext ?>" class="layui-laypage-next">下一页</a>
        </div>

        <table class="layui-table  classlist">
            <colgroup>
                <col width="100">
                <col width="150">
                <col>
            </colgroup>
            <thead>
            <tr>
                <th>ID</th>
                <th>文章标题</th>
                <th>发布时间</th>
                <th>修改时间</th>
                <th>浏览次数</th>
                <th>操作</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $i=0;
            foreach ($arlist as $key => $atu) {
                $i++;
                echo '<tr>
              <th>'.$i.'</th>
              <th>'.$atu['title'].'</th>
              <th>'.$atu['addtime'].'</th>
              <th>'.$atu['updatetime'].'</th>
              <th>'.$atu['arnums'].'</th>
              <th><A href="#" class="delart" data-arid="'.$atu['arid'].'">删除</A> |
              <a href="./updateart.php?arid=' . $atu['arid'] . '">修改</a>
              </th>
              </tr>';
            }
            ?>

            </tbody>
        </table>

    </div>
</div>




<?php require 'abottom.php'?>
