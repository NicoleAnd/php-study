<?php 
session_start();
// if(isset($_SESSION['username']==false)) {
// 	echo "需要管理员登录密码";
// 	exit;
// }
include('input.class.php');
$input = new input();

include('db.php');

$id = $input->get('id');
$sql = "DELETE FROM content WHERE id='{$id}'";
$is = $mysqli->query($sql);
if ($is == true) {
	header("Location:comment.php");
}else{
	echo "删除失败";
}
 ?>