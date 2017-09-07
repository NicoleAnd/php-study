<?php 
header("Content-type:text/html;charset:utf-8");
include('input.class.php');
$input = new input();

$username = $input->post('username');
$password = $input->post('password');
var_dump($username,$password);

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>管理员登录</title>
</head>
<body>
	<form action="login.php" method="post">
		<input type="text" name="username">
		<input type="password" name="password">
		<input type="submit" value="点击登录">
	</form>
</body>
</html>