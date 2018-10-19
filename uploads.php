<?php
$file=explode('.',$_FILES['myheader']['name']);
$suf=array_pop($file);
$filepath='./upload/'.date('Y/m').'/'.uniqid('img_').'.'.$suf;
move_uploaded_file($_FILES['myheader']['tmp_name'],$filepath);

echo json_encode(['path'=>$filepath]);