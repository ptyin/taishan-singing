<?php
include "config.php";
function guid()
{
    $code="ABCDEFGHIGKLMNOPQRSTUVWXYZ";
    $rand=$code[rand(0,25)].strtoupper(dechex(date('m')))
        .date('d').substr(time(),-5)
        .substr(microtime(),2,5).sprintf('%02d',rand(0,99));
    for(
        $a = md5( $rand, true ),
        $s = '0123456789ABCDEFGHIJKLMNOPQRSTUV',$d = '',
        $f = 0;
        $f < 8;
        $g = ord( $a[ $f ] ), // ord（）函数获取首字母的 的 ASCII值
        $d .= $s[ ( $g ^ ord( $a[ $f + 8 ] ) ) - $g & 0x1F ],//按位亦或，按位与。
        $f++
        );return $d;
}
if(isset($_COOKIE['once']))
{
    echo "fail";
}
else
{
    if(!isset($_GET['singing_vote_id'])||!isset($_GET['reciting_vote_id']))
    {
        http_response_code(400);
        echo "error";
    }
    else
    {
        $conn = @mysql_connect(servername, username, password, dbname) or die("连接服务器出错：".mysql_error());
        @mysql_select_db(dbname) or die("连接数据库出错：".mysql_error());
        @mysql_query('SET NAMES UTF8');
        $result1 = mysql_query("update performances set data=data+1 where id=".$_GET['singing_vote_id'].";");
        $result2 = mysql_query("update performances set data=data+1 where id=".$_GET['reciting_vote_id'].";");
        if(!$result1||!$result2)
        {
            http_response_code(400);
            echo "error";
        }
        else
        {
            setcookie("once", true, time() + 60 * 60 * 5);
            echo "success";
        }
        mysql_free_result($result1);
        mysql_free_result($result2);
        mysql_close($conn);
    }
}