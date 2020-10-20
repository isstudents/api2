<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>download</title>
</head>
<body>
<?php
include_once 'config.inc.php';
include_once 'mysql.inc.php';
include_once 'Dingshiqi.php';
$link = connect();
$query='insert into index1(FileClass1,FileName,name1,Time1,Content,Thetheme,FileSize) values(?,?,?,?,?,?,?);';
$stmt=mysqli_prepare($link,$query);
mysqli_stmt_bind_param($stmt,'sssssss',$val1,$val2,$val3,$val4,$val5,$val6,$val7);
date_default_timezone_set('PRC');
$value = $_FILES["myfile"]["name"];
if(!empty($_FILES["myfile"]["name"]) || !empty($_POST['mytext2'])){//判断上传内容是否为空
    if($_FILES["myfile"]["error"] > 0){//判断文件是否可以上传到服务器
        $val1 = "";
        $val2 = "";
        $val3 = $_POST['mytext'];
        $val4 = date('Y-m-d h:i:s',time());
        $val5 = escape($link,$_POST['mytext2']);
        $val6 = "";
        $val7 = "0b";
        mysqli_stmt_execute($stmt);
        mysqli_stmt_free_result($stmt);
        mysqli_stmt_close($stmt);
        header("refresh:3;url=../index.php");
        ?>
        <div style="margin-left: 40%;">
            <span>上传文件 <?php echo $_FILES['myfile']['name']; ?></span>
            <span style="color: #00ff00; font-size: 40px; font-weight: bold;">成功</span>
            <p>正在加载，请稍等...<br>3秒后自动跳转到脚本之家~~~</p>
        </div>
        <?php
        $querysum='update sum1 set Uploadsum=(?),TodayUploadsum=(?) where id=1';
        $stmt=mysqli_prepare($link,$querysum);
        mysqli_stmt_bind_param($stmt,'ii',$val111,$val112);
        $val111 =  $data2['Uploadsum'] + 1;
        $val112 = $data2['TodayUploadsum'] + 1;
        mysqli_stmt_execute($stmt);
        mysqli_stmt_free_result($stmt);
        mysqli_stmt_close($stmt);


//        echo "上传错误！";
//        switch($_FILES["up_picture"]["error"]){//如果上传错误 判断出错原因
//            case 1:
//                echo "上传文件大小超出配置文件规定值";
//                break;
//            case 2:
//                echo "上传文件大小超出表单中约定值";
//                break;
//            case 3:
//                echo "上传文件不全";
//                break;
//            case 4:
//                echo "没有上传文件";
//                break;
//        }
    }else{
        if(!is_dir("../up/")){//判断指定目录是否存在
            mkdir("../up/");//创建一个目录
        }

        $path = '../up/'.date('Y-m-d.h.i.s.',time()).$_FILES["myfile"]["name"];//定义文件名称和存储位置

        if(is_uploaded_file($_FILES['myfile']['tmp_name'])){//是否是HTTP POST上传
            if(move_uploaded_file($_FILES['myfile']['tmp_name'],$path)){//执行上传

                //计算文件大小
                $da=0;
                $da2=$_FILES['myfile']['size'];
                $da3=0;
                while ($da2 >= 1){
                    $da = $da2;
                    $da2 = $da2/1024;
                    $da3=$da3+1;
                }
                if($da3 === 1){
                    $da=sprintf("%.1f",$da)."b";
                }else if($da3 === 2){
                    $da=sprintf("%.1f",$da)."k";
                }else if($da3 === 3){
                    $da=sprintf("%.1f",$da)."M";
                }else if($da3 === 4){
                    $da=sprintf("%.1f",$da)."G";
                }



                $val1 = substr(strrchr($value, '.'), 1);
                $val2 = $value;
                $val3 = $_POST['mytext'];
                $val4 = date('Y-m-d h:i:s',time());
                $val5 = escape($link,$_POST['mytext2']);
                $val6 = date('Y-m-d.h.i.s.',time()).$_FILES["myfile"]["name"];;
                $val7 = $da;
                mysqli_stmt_execute($stmt);
                mysqli_stmt_free_result($stmt);
                mysqli_stmt_close($stmt);

                $da=0;
                $da2=0;
                $da3=0;
//                echo "上传文件".$_FILES['myfile']['name']."成功.文件大小为：".($_FILES['myfile']['size']/1024)."k";
                header("refresh:3;url=../index.php");
                ?>
                <div style="margin-left: 40%;">
                    <span>上传文件 <?php echo $_FILES['myfile']['name']; ?></span>
                    <span style="color: #00ff00; font-size: 40px; font-weight: bold;">成功</span>
                    <p>正在加载，请稍等...<br>3秒后自动跳转到脚本之家~~~</p>
                </div>
                <?php
                $querysum='update sum1 set Uploadsum=(?),TodayUploadsum=(?) where id=1';
                $stmt=mysqli_prepare($link,$querysum);
                mysqli_stmt_bind_param($stmt,'ii',$val111,$val112);
                $val111 =  $data2['Uploadsum'] + 1;
                $val112 = $data2['TodayUploadsum'] + 1;
                mysqli_stmt_execute($stmt);
                mysqli_stmt_free_result($stmt);
                mysqli_stmt_close($stmt);
            }else{
//                echo "上传失败";
                ?>
                <div style="margin:0 auto;">
                    <span>上传文件 <?php echo $_FILES['myfile']['name']; ?></span>
                    <span style="color: #ff0000; font-size: 40px; font-weight: bold;">失败</span>
                    <p>正在加载，请稍等...<br>3秒后自动跳转到脚本之家~~~</p>
                    <a href="../index.php">返回首页</a>
                </div>
                <?php
            }
        }else{
//            echo "上传文件".$_FILES['myfile']['name']."不合法";
            ?>
            <div style="margin:0 auto;">
                <span>上传文件 <?php echo $_FILES['myfile']['name']; ?></span>
                <span style="color: #ff0000; font-size: 40px; font-weight: bold;">不合法</span>
                <p>正在加载，请稍等...<br>3秒后自动跳转到脚本之家~~~</p>
                <a href="../index.php">返回首页</a>
            </div>
            <?php
        }
    }
}else{
    echo '需要上传的内容为空!';
}
close($link);
?>
</body>
</html>
