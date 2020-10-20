<?php
//连接数据库
function connect($host=DB_HOST,$user=DB_USER,$password=DB_PASSWORD,$database=DB_DATABASE,$port=DB_PORT){
    $link = @mysqli_connect($host,$user,$password,$database,$port);
    if(mysqli_connect_errno()){
        exit(mysqli_connect_error());
    }
    mysqli_set_charset($link,'utf8');
    return $link;
}

//执行一条sql语句，返回结果集对象或者返回布尔值
function execute($link,$query){
    $result=mysqli_query($link,$query);
    if(mysqli_errno($link)){
        exit(mysqli_error($link));
    }
    return $result;
}
//执行一条sql语句，只返回布尔值
function execute_bool($link,$query){
    $bool=mysqli_query($link,$query);
    if(mysqli_errno($link)){
        exit(mysqli_error($link));
    }
    return $bool;
}

//一次性执行多条语句
function execute_multi($link,$arr_sqls,&$error){

}
//获取记录数
function num($link,$sql_count){
    $result = execute($link,$sql_count);
    $count = mysqli_fetch_row($result);
    return $count[0];
}
//数据库入库之前进行转译，确保数据能够顺利入库,多维数组
function escape($link,$data){
    if(is_string($data)){
        return mysqli_real_escape_string($link,$data);
    }
    if(is_array($data)){
        foreach($data as $key=>$val){
            $data[$key] = escape($link,$val);
        }
    }
    return $data;
}
function escape2($data){
    if(is_string($data)){
        $re=array(); //定义接受字符串的数du组
        for($i=0;$i<strlen($data);$i++)
        {
            $re[]=substr($data,$i,1); //将单个字符存到zhi数组当中
            if($re[$i] === "\""){
                $re[$i] = "&quot;";
            }
            if($re[$i] === '\''){
                $re[$i] = "&#39;";
            }
            $data = $data.$re[$i];
        }
        return $data;
    }
    if(is_array($data)){
        foreach($data as $key=>$val){
            $data[$key] = escape2($val);
        }
    }
    return $data;
}



//关闭数据库的连接
function close($link){
    mysqli_close($link);
}