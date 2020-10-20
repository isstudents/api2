<?php
include_once 'inc/config.inc.php';
include_once 'inc/mysql.inc.php';
include_once 'inc/Dingshiqi.php';
$link = connect();
$str='';
$str2=';'
?>
<?php //include_once 'admin/header.inc.php'?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>文件管理--首页</title>
        <link href="style/mycss.css" rel="stylesheet">
    </head>
    <script>
        function setdakai(obj,obj2) {
            var a1 = document.getElementById('a1');
            var a2 = document.getElementById('a2');
            a1.innerText = "";
            a2.value = "";
            a1.innerText=obj;
            a2.value=obj2;
        }
    </script>
	
	<script src="https://cdn.jsdelivr.net/npm/jquery/dist/jquery.min.js"></script>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome/css/font-awesome.min.css"/>
	<script src="https://cdn.jsdelivr.net/gh/stevenjoezhang/live2d-widget/autoload.js"></script>
	
	
	<script type="text/javascript" charset="utf-8"  src="https://files.cnblogs.com/files/liuzhou1/L2Dwidget.0.min.js"></script>
	<script type="text/javascript" charset="utf-8"  src="https://files.cnblogs.com/files/liuzhou1/L2Dwidget.min.js"></script>
	<script type="text/javascript">
    L2Dwidget.init({"display": {
        "superSample": 2,
        "width": 200,
        "height": 400,
        "position": "right",
        "hOffset": 0,
        "vOffset": 0
          }
     });
</script>
    <body>
    <div style="width: 1920px; height: auto; background-color: blue; margin:0px auto;">
        <div style="width: 100%; height: 100px;background-color: rgb(27,81,125); ">
            <p style="display: inline-block; font-size: 50px; margin-top: 20px; margin-left: 40%;color: white; ">文&nbsp;&nbsp;件&nbsp;&nbsp;管&nbsp;&nbsp;理</p>
            <div style="display: inline-block; width: 130px; height: 120px;margin-left: 20px;">
                <span style="color: white;">&nbsp;&nbsp;总浏览量：<b style="color: red;"><?php echo $Total ?></b>&nbsp;&nbsp;</span>
                <span style="color: white;">&nbsp;&nbsp;今日浏览量：<b style="color: red;"><?php echo $Today ?></b></span>
            </div>
            <div style="display: inline-block; width: 130px; height: 120px;margin-left: 20px;">
                <span style="color: white;">&nbsp;&nbsp;总下载量：<b style="color: red;"><?php echo $data2['Downloadsum'] ?></b>&nbsp;&nbsp;</span>
                <span style="color: white;">&nbsp;&nbsp;今日下载量：<b style="color: red;"><?php echo $data2['TodayDownloadsum'] ?></b></span>
            </div>
            <div style="display: inline-block; width: 130px; height: 120px;margin-left: 20px;">
                <span style="color: white;">&nbsp;&nbsp;总上传量：<b style="color: red;"><?php echo $data2['Uploadsum'] ?></b>&nbsp;&nbsp;</span>
                <span style="color: white;">&nbsp;&nbsp;今日上传量：<b style="color: red;"><?php echo $data2['TodayUploadsum'] ?></b></span>
            </div>


            <a href="upload.php"><button style="float:right; height: 30px; width: 100px; margin-top: 30px; margin-right: 40px;">上传文件</button></a>
        </div>
    </div>

    <div style="width: 1920px; height: auto; margin: 0px auto;">
        <div style="padding: 10px; width: 1000px;height: auto; margin-left: 60px; margin-top: 50px; float: left; border: solid rgb(27,81,125) 2px;">
            <div style="width: 100%; height: auto;">
                <table>
                    <tr style="width: 100%;height: 40px; background-color: rgb(91,146,208);color: white;">
                        <td style="width: 80px; height: 100%; line-height: 40px; text-align: center;">&nbsp;文件类型</td>
                        <td style="width: 350px; height: 100%; line-height: 40px;text-align: center;">文件名称</td>
                        <td style="width: 100px; height: 100%; line-height: 40px; text-align: center;">作者</td>
                        <td style="width: 70px; height: 100%; line-height: 40px; text-align: center;">下载次数</td>
                        <td style="width: 70px; height: 100%; line-height: 40px; text-align: center;">文件大小</td>
                        <td style="width: 120px; height: 100%; line-height: 40px; text-align: center;">上传时间</td>
                        <td style="padding-left:10px;">|</td>
                        <td style="width: 200px; height: 100%; line-height: 40px; text-align: center;">功能选项</td>
                    </tr>
                    <?php
                        $query="select * from index1 ORDER BY id DESC;";
                        $result=execute($link,$query);
                        while($data=mysqli_fetch_assoc($result)){
                           $ThisTime = strtok("{$data['Time1']}",' ');
                           $TisTime2 = strstr("{$data['Time1']}"," ");
                           $data3=12;
                            for($x=0;$x<count($cars1);$x++)
                            {
                                if($cars1[$x] === $data['FileClass1']){
                                    $data3 = $x;
                                    break;
                                }
                            }
                            $data3327=' ';
                            $re=array(); //定义接受字符串的数du组
                            for($i=0;$i<strlen($data['Content']);$i++)
                            {
                                $re[]=substr($data['Content'],$i,1); //将单个字符存到zhi数组当中
                                if($re[$i] === "\""){
                                    $re[$i] = "&quot;";
                                }
                                if($re[$i] === '\''){
                                    $re[$i] = "&#39;";
                                }
                                $data3327 = $data3327.$re[$i];
                            }

$html=<<<A
                            <tr class="trstyle" style="width: 100%;height: 40px;">
                                <td style="text-align: center;"><img src="{$cars2[$data3]}" width="35" height="30"></td>
                                <td style="width: 100px; height: 100%; line-height: 40px;">{$data['FileName']}</td>
                                <td style="width: 100px; height: 100%; line-height: 40px; text-align: center;">{$data['name1']}</td>
                                <td style="width: 80px; height: 100%; line-height: 40px; text-align: center;">{$data['Download']}</td>
                                <td style="width: 80px; height: 100%; line-height: 40px; text-align: center;">{$data['FileSize']}</td>
                                <td style="width: 80px; height: 100%; line-height: 40px;text-align: center;">$TisTime2</td>
                                <td style="padding-left:10px;">|</td>
                                <td style="width: 200px; height: 100%; line-height: 40px; text-align: center;">
                                    <input type="button" value="打开文本" onclick="setdakai('$data3327','{$data['FileName']}')" />&nbsp;&nbsp;&nbsp;
                                    <a href="inc/downp.php?filename={$data['Thetheme']}&myDownload={$data['Download']}&myid={$data['id']}"><input type="button" value="下载附件"/></a>
                                </td>
                            </tr>
A;
                            if($ThisTime === $str){
                                echo $html;
                            }else if($ThisTime === date('Y-m-d',time())){
                                ?>
                                <tr style="width: 100%;height: 40px; background-color: rgb(137,181,233);"><td colspan="8"><b>&nbsp;&nbsp;今天的</b></td></tr>
                                <?php
                                $str=$ThisTime;
                                echo $html;
                            }else if($ThisTime === $str2){
                                echo $html;
                            }else if(!($ThisTime === date('Y-m-d',time()))){
                                ?>
                                <tr style="width: 100%;height: 40px; background-color: rgb(137,181,233);"><td colspan="8"><b>&nbsp;&nbsp;<?php echo $ThisTime; ?></b></td></tr>
                                <?php
                                $str2=$ThisTime;
                                echo $html;
                            }

                        }
                    ?>

                </table>
            </div>
        </div>
        <div style="float: left; margin-top: 60px; margin-left: 90px;">
            <span style="float: left;">文件名称：</span><input type="text" id="a2" name="mytext3" style="background: none; outline: none; border: none; float: left; width: 400px; font-size: 20px;"/><br><br>
            <span style="float: left;">文本内容：</span><br><textarea id="a1" rows="23" cols="65" name="mytext"  style="font-size:20px;"></textarea><br>
        </div>
    </div>

    <div style="float: right; width: 100%; height: 100px;"></div>

<?php
    include_once 'admin/footer.inc.php';
    mysqli_close($link);
?>