<?php
session_start();
//var_dump($_SESSION['uid']);
$u_id=[0,1,2,3,4,5];
$id=file_get_contents("php://input");
$user_id=substr($id,8,9);
$in_array=in_array($user_id,$u_id);

if(empty($user_id) &&  !in_array($user_id,$u_id)){
    echo "2";exit;//&&  $a && $b  如果 $a 和 $b 都为 TRUE。 || $b  如果 $a 或 $b 任一为 TRUE。

}

$redis = new Redis();
$redis->connect('127.0.0.1',6379);
$redis->select(1); //使用 1 号数据库
$key = "buy_{$user_id}_queue";
//print_r($_SESSION['uid']);
if($redis->lPush($key,$_SESSION['uid'])){
   echo "1";
}else{
    echo "入队失败";
}


?>