<?php
//上一页  不能小于 1
$prev = $page - 1 < 1 ? 1 : ($page - 1);

//下一页  不能大于 总页数
$next = $page + 1 > $totalpage ? $totalpage : ($page + 1);

//中间页面处理  初始化：开始页数  判断条件：页数小于等于总页数
$showpage = 5;
$start = $page - ($showpage - 1) / 2;
$end = $page + ($showpage - 1) / 2;
//开始页数检查
if ($start < 1) {
    $start = 1;
    $end = $start + $showpage - 1;
}
/*
    $end - $start = $showpage – 1
    $start = $page – ($showpage-1)/2
    $end = $page + ($showpage-1)/2
 */
// 结束页数不能大于总页数  $end =  $start  + $showpage - 1
if ($end > $totalpage) {
    $end = $totalpage;
    $start = $end - $showpage + 1;
    //如果总页数小于$showpage， 开始页数会出现负数的情况
    if ($start < 1) {
        $start = 1;
    }
}
