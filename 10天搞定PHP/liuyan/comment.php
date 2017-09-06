<?php 
session_start();
//var_dump($_SESSION);
include('db.php');

$sql = "SELECT * FROM content";
$mysqli_result = $mysqli->query($sql);

$rows = array();
while ($row = $mysqli_result->fetch_array(MYSQLI_ASSOC)) {
	$rows[] =  $row;
}
 ?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>留言板</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="add">
	<form action="save.php" method="post">
		<textarea name="msg">留言内容</textarea>
		<input class="user" type="text" name="user" >
		<input class="btn" type="submit" value="发表">
		<a class="btn" href="login_get.php">登录</a>
	</form>	
	</div>
	<div class="msg">
	<?php 
	foreach ($rows as $row) {
		
	 ?>
		<div class="item">
			<span class="user"><?php echo $row['username'];?></span>
			<span class="time">		
				<?php echo $row['intime'];?>
				<?php if (isset($_SESSION['username'])) {?>
					<a onclick='return confirm("你确定删除吗？");' href="delete.php?id=<?php echo $row['id'];?>">删除</a>
				<?php } ?>	
			</span>

			<div style="clear: both"></div>
			<p><?php echo $row['msg'];?></p>
		</div>
	<?php
	}
	?>
	</div>
</body>
</html>