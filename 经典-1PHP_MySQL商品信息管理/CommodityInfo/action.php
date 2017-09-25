<?php

// 一、导入配置文件和函数库文件
require('dbconfig.php');
require('functions.php');
// 二、连接MySQL,选择数据库
$link = mysqli_connect(HOST,USER,PASS,DBNAME) or die("数据库失败！");
// mysqli_select_db($link,DBNAME);

// 三、获取action参数的值，并做对应的操作
switch ($_GET["action"]) {
	case 'add':	//添加
		
		//1.获取添加信息
		$name = $_POST["name"];
		$typeid = $_POST["typeid"];
		$price = $_POST["price"];
		$total = $_POST["total"];
		$note = $_POST["note"];
		$addtime = time();
		//2.验证()省略
		if (empty($name)) {
			die("商品名称不能为空！");
		}
		//3.执行图片上传
		$upinfo = uploadFile("pic","./uploads/",null);
//		var_dump($upinfo);
		if ($upinfo["error"]===false) {
			die("图片信息上传失败：".$upinfo["info"]);
		}else{
			//上传成功
			$pic = $upinfo["info"];//获取上传成功的图片名
		}
		//4.执行图片缩放
        //imageUpdateSize('./uploads/'.$pic,50,50);
		//5.拼装SQL语句，并执行添加
        $sql = "INSERT INTO goods VALUES (null,'{$name}','{$typeid}',{$price},{$total},'{$pic}','{$note}',{$addtime})";
        //echo $sql;
        
        mysqli_query($link,$sql);

		//6.判断并输出结果
		if (mysqli_insert_id($link) > 0) {
			echo "商品发布成功";
		}else{
			echo "商品发布失败".mysqli_error();
		}
		echo "<br/> <a href='index.php'>查看商品信息</a>";

		break;

	case 'del':	//删除
        //获取要删除的id号，并拼装删除sql,执行
        $sql = "DELETE FROM goods WHERE id={$_GET['id']}";
	    mysqli_query($link,$sql);
	    //执行图片删除
        if (mysqli_affected_rows($link)>0){
            @unlink("./uploads/".$_GET['picname']);
//            @unlink("./uploads/s_".$_GET['picname']);
        }
	    //跳转到浏览界面
        header("Location:index.php");
		break;
	case 'update':	//修改
        //1.获取要修改的信息
        $name = $_POST["name"];
        $typeid = $_POST["typeid"];
        $price = $_POST["price"];
        $total = $_POST["total"];
        $note = $_POST["note"];
        $id = $_POST['id'];
        $pic = $_POST['oldpic'];
        //2.数据验证
        if (empty($name)){
            die("商品名称必须有值");
        }
        //3.判断有无图片上传
        if ($_FILES['pic']['error']!=4){
            // 执行上传
            $upinfo = uploadFile("pic","./uploads/",null);
            if ($upinfo["error"]===false) {
                die("图片信息上传失败：".$upinfo["info"]);
            }else{
                //上传成功
                $pic = $upinfo["info"];//获取上传成功的图片名
                //4.有图片上传，执行缩放
                //imageUpdateSize('./uploads/'.$pic,50,50);
            }
        }

        //5.执行修改
        $sql = "UPDATE goods SET name='{$name}',typeid={$typeid},price={$price},total={$total},note='{$note}',pic='{$pic}' WHERE id={$id} ";
        mysqli_query($link,$sql);

        //6.判断是否修改成功
        if (mysqli_affected_rows($link)>0){
            // 若有图片上传，就删除老图片
            if ($_FILES['pic']['error']!=4){
                @unlink("./uploads/".$_POST['oldpic']);
                //@unlink("./uploads/s_".$_POST['oldpic']);
            }
            echo "修改成功";
        }else{
            echo "修改失败".mysqli_error();
        }
        echo "<br/> <a href='index.php'>查看商品信息</a>";
		break;
	default:
		# code...
		break;
}
// 四、关闭数据库
mysqli_close($link);


 ?>