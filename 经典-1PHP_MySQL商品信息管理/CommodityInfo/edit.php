<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>商品信息管理</title>
    <style>
        .imgstyle2{
            height: 100px;
        }
    </style>
</head>
<body>
	<center>
		<?php
        include("menu.php"); //导入导航栏

        //从数据库中读取信息并输出到浏览器表格中
        //1.导入配置文件
        require("dbconfig.php");

        //2.连接数据库，并选择数据库
        $link = mysqli_connect(HOST,USER,PASS,DBNAME);

        //3.获取要修改的商品信息
        $sql = "SELECT * FROM goods WHERE id={$_GET['id']}";
        $result = mysqli_query($link,$sql);

        //判断是否获取到要编辑的商品信息
        if ($result && mysqli_num_rows($result)>0){
            $shop = mysqli_fetch_assoc($result); //解析出要修改的商品信息
        }else{
            die("没有找到要修改的商品信息");
        }

        ?>
		<h3>编辑商品信息</h3>
		<form action="action.php?action=update" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $shop['id']; ?>">
            <input type="hidden" name="oldpic" value="<?php echo $shop['pic']; ?>">



			<table border="1" width="400">
				<tr>
					<td align="right">名称：</td>
					<td><input type="text" name="name" value="<?php echo $shop['name']; ?>"></td>
				</tr>
				<tr>
					<td align="right">类型：</td>
					<td>
						<select name="typeid">
						<?php 
							include("dbconfig.php");
							foreach ($typelist as $k => $v) {
							    $sd = ($shop['typeid'] == $k) ? "selected" : "";  //是否是当前的类型
								echo "<option value='{$k}' {$sd}>{$v}</option>";
							}
						 ?>
						 </select>
					</td>
				</tr>
				<tr>
					<td align="right">单价：</td>
					<td><input type="text" name="price" value="<?php echo $shop['price']; ?>"></td>
				</tr>
				<tr>
					<td align="right">库存：</td>
					<td><input type="text" name="total" value="<?php echo $shop['total']; ?>"></td>
				</tr>
				<tr>
					<td align="right">图片：</td>
					<td><input type="file" name="pic"></td>
				</tr>
				<tr>
					<td align="right" valign="top">描述：</td>
					<td><textarea rows="5" cols="20" name="note"><?php echo $shop['note']; ?></textarea></td>
				</tr>
				<tr>
					<td colspan="2" align="center">
						<input type="submit" value="修改">&nbsp;&nbsp;&nbsp;
						<input type="reset" value="重置">
					</td>
				</tr>
                <tr>
                    <td align="right" valign="top">&nbsp;</td>
                    <td><img class="imgstyle2" src="./uploads/<?php echo $shop['pic']; ?>"/></td>
                </tr>
			</table>
		</form>
	</center>
	

</body>
</html>