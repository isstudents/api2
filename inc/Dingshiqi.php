<?php
include_once 'config.inc.php';
include_once 'mysql.inc.php';
$Download21=0;
//$Todaysum1='';
//$Todaysum2='';
$link = connect();
$query="select * from sum1;";
$result=execute($link,$query);
$data2=mysqli_fetch_assoc($result);

$query1='update sum1 set Total=(?),Today=(?),TodayTime=(?),TodayDownloadsum=(?),TodayUploadsum=(?) where id=1;';
$stmt1=mysqli_prepare($link,$query1);
mysqli_stmt_bind_param($stmt1,'iisii',$val11,$val12,$val13,$val14,$val15);
if(!($data2['TodayTime'] === date('Y-m-d',time()))){
    $val12 = 1;
    $val14 = 0;
    $val15 = 0;
    $Today = $val12;
    $val13 = date('Y-m-d',time());
    $Total = $data2['Total'] + 1;
    $val11 = $Total;
}else{
    $Today = $data2['Today'] + 1;
    $Total = $data2['Total'] + 1;
    $val11 = $Total;
    $val12 = $Today;
    $val13 = date('Y-m-d',time());
    $val14 = $data2['TodayDownloadsum'];
    $val15 = $data2['TodayUploadsum'];
}
mysqli_stmt_execute($stmt1);
mysqli_stmt_free_result($stmt1);
mysqli_stmt_close($stmt1);
mysqli_close($link);