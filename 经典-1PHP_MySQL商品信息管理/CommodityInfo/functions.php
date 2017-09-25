<?php 
//公共函数库

/**
 * 文件上传处理函数
 * @param  string $filename 要上传的文件表单项名
 * @param  string $path 上传文件的保存路径
 * @param  array $typelist 允许的文件类型
 * @return array 二个单元：["error"] false:失败，true:成功
 *                        ["info"] 存放失败原因或成功的文件名
 */
function uploadFile($filename,$path,$typelist=null){

	// 1.获取上传文件的名字
	$upfile = $_FILES[$filename];
	// var_dump($upfile);
	if (empty($typelist)) {
		$typelist = array("image/gif","image/jpg","image/jpeg","image/png");//允许的文件类型
	}
	// $path = "uploads3";//指定上传文件的保存路径（相对的）
	$res = array("error"=>false);//存放返回的结果
	// 2.过滤上传文件的错误号
	if ($upfile["error"]>0) {
		switch ($upfile["error"]) {
			case 1:
				$res["info"]="上传的文件超过了 php.ini 中 upload_max_filesize 选项限制";
				break;
			case 2:
				$res["info"]="上传的文件的大小超过了 HTML 表单中 MAX_FILE_SIZE 选项";
				break;
			case 3:
				$res["info"]="文件只有部分被上传";
				break;
			case 4:
				$res["info"]="没有文件被上传";
				break;
			case 6:
				$res["info"]="找不到临时文件夹";
				break;
			case 7:
				$res["info"]="文件写入失败";
				break;
			default:
				$res["info"]="未知错误！";
				break;
		}
		return $res;
	}

	//3.本次文件大小的限制‘
	if ($upfile["size"]>100000) {
		$res["info"]="上传文件过大！";
		return $res;
	}
	//4.过滤类型
	if (!in_array($upfile["type"],$typelist)) {
		$res["info"]="上传类型不符！".$upfile["type"];
		return $res;
	}
	//5.初始化下信息（为图片产生一个随机名字）
	$fileinfo = pathinfo($upfile["name"]);
	do{
		$newfile = date("YmdHis").rand(1000,9999).".".$fileinfo["extension"];//随机产生一个名字
	}while (file_exists($newfile));
	//6.执行上传处理
	if (is_uploaded_file($upfile["tmp_name"])) {
		if (move_uploaded_file($upfile["tmp_name"],$path."/".$newfile)) {
			//将上传成功后的文件名赋给返回数组
			$res["info"]=$newfile;
			$res["error"]=true;
			return $res;
		}else{
			$res["info"]="上传文件失败！";
		}
	}else{
		$res["info"]="不是一个上传的文件！";
	}
	return $res;
}

/**
 * 等比缩放函数（以保存的方式实现）
 * @param string $picname 被锁放的处理图片源
 * @param int $maxx 缩放后图片的最大宽度
 * @param int $maxy 缩放后图片的最大高度
 * @param string $pre 缩放后图片名的前缀名，如：a.jpg=>s_a.jpg
 */
function imageUpdateSize($picname,$maxx=100,$maxy=100,$pre="s_"){
    $info = getimagesize($picname); //获取图片的基本信息

    $w = $info[0];  //获取宽度
    $h = $info[1];  //获取高度

    //获取图片的类型并为此创建对应图片资源
    switch ($info[2]){
        case 1: //gif
            $im = imagecreatefromgif($picname);
            break;
        case 2: //jpg
            $im = imagecreatefromjpeg($picname);
            break;
        case 3: //png
            $im = imagecreatefrompng($picname);
            break;
        default:
            die("图片类型错误！");
    }

    // 计算缩放比例
    if (($maxx/$w) > ($maxy/$h)){
        $b = $maxx/$h;
    }else{
        $b = $maxx/$w;
    }
}























 ?>