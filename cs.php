<?php
$temp='abcd1221"""efg'; //要遍历的bai字符串
//$temp2='abcd122""121efg';
$re=array(); //定义接受字符串的数du组
$data=' ';
for($i=0;$i<strlen($temp);$i++)
{
    $re[]=substr($temp,$i,1); //将单个字符存到zhi数组当中
    if($re[$i] === "\""){
        $re[$i] = "&quot;";
    }
    if($re[$i] === '\''){
        $re[$i] = "&#39;";
    }
    $data = $data.$re[$i];

}
echo $data;
