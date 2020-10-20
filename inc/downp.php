
<?php
include_once 'config.inc.php';
include_once 'mysql.inc.php';
include_once 'Dingshiqi.php';
$link = connect();
$query='update index1 set Download=(?) where id=(?)';
$stmt=mysqli_prepare($link,$query);
mysqli_stmt_bind_param($stmt,'ii',$val1,$val2);
$val1 =  $_GET['myDownload']+1;
$val2 = $_GET['myid'];
mysqli_stmt_execute($stmt);
mysqli_stmt_free_result($stmt);
mysqli_stmt_close($stmt);

//计算下载总量
$query543="select * from index1;";
$result543=execute($link,$query543);
while($data12=mysqli_fetch_assoc($result543)){
    $Download21 = $Download21 + $data12['Download'];
}
$querysum='update sum1 set Downloadsum=(?),TodayDownloadsum=(?) where id=1';
$stmt=mysqli_prepare($link,$querysum);
mysqli_stmt_bind_param($stmt,'ii',$val111,$val112);
$val111 =  $Download21;
$val112 = $data2['TodayDownloadsum'] + 1;
mysqli_stmt_execute($stmt);
mysqli_stmt_free_result($stmt);
mysqli_stmt_close($stmt);



$filename = $_GET['filename'];
$download_path = "../up/";

down_file($filename,$download_path);
function down_file($file_name,$download_path){
    $file_name = iconv("UTF-8","GB2312",$file_name);
    if(!file_exists($download_path.$file_name)){
        echo $file_name;
        echo "---文件名不存在";
        return ;
    }
    ob_clean();
    header("Content-type:application/octet-stream");
    header("Content-Disposition:attachment;filename = ".$file_name);
    header("Accept-Ranges:bytes");
    Header("Content-Length: ".filesize($download_path.$file_name));
    readfile($download_path.$file_name);
    exit();


}
close($link);