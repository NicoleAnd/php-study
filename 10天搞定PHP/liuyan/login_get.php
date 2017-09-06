<?php 
session_start();
include('input.class.php');
$input = new input();

include('db.php');

$act = $input->get('act');
if ($act!==false) {
	$username = $input->post('username');
	$password = $input->post('password');
	// var_dump($username,$password);
	$sql = "SELECT * FROM admin WHERE username='{$username}' AND password='{$password}'"; 
	// echo $sql;
	$mysqli_result = $mysqli->query($sql);

	if ($row = $mysqli_result->fetch_array()) {
		$_SESSION['username'] = $row['username'];
		header("Location:comment.php");
		//var_dump($row);
		// echo "登录成功";
	}else{
		echo "登录失败";
		exit;
	}
}


 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>管理员登录</title>
</head>
<body>
	<form action="login_get.php?act=chk" method="post">
		<input type="text" name="username">
		<input type="password" name="password">
		<input type="submit" value="点击登录">
	</form>
</body>
</html>