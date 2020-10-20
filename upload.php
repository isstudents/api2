<?php //include_once 'admin/header.inc.php'?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>文件管理--上传</title>
</head>
<style>
    body{
        margin: 0px;
        padding: 0px;
    }
</style>
<body>
    <div style="width:1920px; height: auto; margin: 0 auto; background-color: rgb(242,244,246);">
        <div style="width: 600px;height: 800px; margin-left: 200px; margin-top: 50px; display: inline-block;">
            <form method="post" action="inc/Artacle.php" enctype="multipart/form-data" >
                <span style="font-size:20px;">上传者昵称：</span><input type="text" name="mytext" style="font-size:20px;" /><br><br>
                添加文本内容：
                <textarea rows="23" cols="65" name="mytext2"  style="font-size:20px;"></textarea>
                <br>选择要上传的文件 &nbsp;&nbsp;(小于36M)<br>
                <input type="file" name="myfile" style="font-size:25px; margin-top: 10px;"/><br><br>
                <input type="submit" style="font-size:25px;" value="上传文件"/>
                <input type="reset" name="button" id="button" value="重置" style="margin-left: 50px; font-size:25px;" />
            </form>
        </div>
        <a href="index.php">
            <button style="font-size: 100px; float: right; width: 525px;height: 525px; margin-top: 120px;margin-right: 400px;">返回首页</button>
        </a>
    </div>
</body>
</html>