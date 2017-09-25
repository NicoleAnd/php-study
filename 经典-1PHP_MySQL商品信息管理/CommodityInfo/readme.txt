=========================================
    PHP基础示例 -- PHP_MYSQL商品信息管理
=========================================

实现目标：商品信息的在线增、删、改、查（图片信息的操作）

技术：
    文件的上传
    图片的缩放
    数据库的基本操作

实现步骤：

    1. 设计并创建数据库和表格
    CREATE TABLE goods(
    	`id` int unsigned not null AUTO_INCREMENT PRIMARY KEY,
        `name` varchar(64) not null,
        `typeid` int unsigned not null,
        `price` double(6,2) unsigned not null,
        `total` int unsigned not null,
        `pic` varchar(32) not null,
        `note` text,
        `addtime` int unsigned not null
    );

    2. 创建项目的目录具体文件
        ----------------------
            |-- add.php 商品添加页面
            |
            |-- edit.php 商品信息编辑表单页面
            |
            |-- index.php商品信息浏览页面
            |
            |-- action.php 执行商品信息添加和修改及删除等操作处理
            |
            |-- dbconfig.php 公共配置文件
            |
            |-- menu.php 导航栏
            |
            |-- uploads 上传图片的存放目录
            |
            |-- functions.php 公共函数库文件：图片信息的上传、等比缩放等处
            |

            1. dbconfig.php
                // 公共信息配置文件

                // 数据库信息配置

                // 商品类型列表信息

            2. /uploads

            3. menu.php

            4. add.php
                <table>-><form action="action.php?acton=add" method="post">
                表单上传文件 form添加 enctype="multipart/form-data"
                <form action="action.php?acton=add" enctype="multipart/form-data" method="post">


            5. action.php
                // 执行商品信息的增、删、改操作

                // 1. 导入配置文件和函数库文件

                // 2. 连接MYSQL，选择数据库

                // 3. 获取action参数的值，并做对应的操作

                // 4. 关闭数据库

                ==============================================================================
                // 执行商品信息的增、删、改操作

                // 1. 导入配置文件和函数库文件
                    require("dbconfig.php");
                    require("functions.php");
                // 2. 连接MYSQL，选择数据库
                    $link = mysqli_connect(HOST,USER,PASS,DBNAME) or die("数据库失败！");
                // 3. 获取action参数的值，并做对应的操作
                    switch ($_GET["action"]){
                        case "add":     //添加
                            break;
                        case "del":     //删除
                            break;
                        case "update":  //修改
                            break;

                    }
                // 4. 关闭数据库
                mysqli_close($link);
                ==============================================================================
                ==================================添加=========================================
                        case "add":     //添加
                            // 1. 获取添加信息

                            // 2. 验证（）省略

                            // 3. 执行图片上传

                            // 4. 执行图片缩放

                            // 5. 拼装sql语句，并执行添加

                            // 6. 判断并输出结果



                            break;
                ==============================================================================
                ==================================删除=========================================

                case 'del':	//删除
                        //获取要删除的id号，并拼装删除sql,执行

                	    //执行图片删除

                	    //跳转到浏览界面

                		break;
                ==============================================================================
                ==================================修改=========================================
                case 'update':	//修改
                        //1.获取要修改的信息

                        //2.数据验证

                        //3.判断有无图片上传

                        //5.执行修改

                        //6.判断是否修改成功

                		break;
                	default:
                		# code...
                		break;
                }
                // 四、关闭数据库
                mysqli_close($link);
                ==============================================================================
                ==============================================================================


                6.index.php
                //从数据库中读取信息并输出到浏览器表格中
                //1.导入配置文件
                require("dbconfig.php");

                //2.连接数据库，并选择数据库
                $link = mysqli_connect(HOST,USER,PASS,DBNAME) or die("数据库连接失败");

                //3.执行商品信息查询
                $sql = "SELECT * FROM goods";
                $result = mysqli_query($link,$sql);

                //4.解析商品信息（解析结果集）
                while($row = mysqli_fetch_assoc($result)){
                    echo "<tr>";
                    echo "<td>{$row['id']}</td>";
                    echo "<td>{$row['name']}</td>";
                    echo "<td><img class='imgstyle' src='./uploads/{$row['pic']}'></td>";
                    echo "<td>{$row['price']}</td>";
                    echo "<td>{$row['total']}</td>";
                    date_default_timezone_set('PRC');
                    echo "<td>".date("Y-m-d H:i:s",$row['addtime'])."</td>";
                    echo "<td>
                                <a href='action.php?action=del&id={$row[id]}&picname={$row['pic']}'>删除</a>
                                <a href='edit.php?id={$row['id']}'>修改</a></td>";
                    echo "</tr>";
                }

                //5.释放结果集，关闭数据库







    3. 添加数据
