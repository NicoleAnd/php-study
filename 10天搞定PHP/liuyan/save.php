<?php 
header("Content-type:text/html;charset:utf-8");
include('input.class.php');
$input = new input();

include('db.php');

$msg = $input->post('msg');
$user = $input->post('user');

if ($msg=='') {
	echo "留言内容不能为空！";
	exit;
}
if ($user=='') {
	echo "用户名不能为空！";
	exit;
}
// 获取用户提交留言的时间戳
// $t = time();
date_default_timezone_set('PRC'); 
$t = date('y-m-d h:i:s',time());

//留言信息的插入数据库
$sql = "INSERT INTO content(`username`,`msg`,`intime`) VALUES ('{$user}','{$msg}','{$t}')";
// echo $sql;
$is = $mysqli->query($sql);
if ($is == true) {
	header("Location:comment.php");
}else{
	echo "插入失败";
}


 ?>