<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
</head>
<body>
</body>
</html>
<?php
@include_once("G:/phpStudy_64/phpstudy_pro/WWW/pms/waf.php");
@include_once("G:/phpStudy_64/phpstudy_pro/WWW/pms/waf.php");
include ('mysqli_connect.php');
function check_input($value)
{
// 去除斜杠
if (get_magic_quotes_gpc())
  {
  $value = stripslashes($value);
  }
//过滤非法字符
if (preg_match('/^select|insert|and|or|create|update|order by|delete|alter|count|\'|\/\*|\*|\.\.\/|\.\/|union|into|load_file|outfile/i', $value))
  {
  	echo "<script>alert('非法操作，你的IP已被记录！！！！！');window.location='index.php'
   ;</script>";
  }
return $value;
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $acco = check_input($_POST["account"]);
    $pw = check_input($_POST["pass"]);
}
$adsql="select * from admin_login where AID ={$acco} and pwd ='{$pw}'";
$adres=mysqli_query($dbc,$adsql);
$resql="select * from user_login where PID ={$acco} and pwd ='{$pw}'";
$reres=mysqli_query($dbc,$resql);
if(mysqli_num_rows($adres)==1 ){
    session_start();
    $_SESSION['userid']=$acco;
    echo "<script>window.location='admin_index.php'</script>";
}
else if(mysqli_num_rows($reres)==1){
    session_start();
    $_SESSION['userid']=$acco;
    echo "<script>window.location='user_index.php'</script>";
}
else
{
    echo "<script>alert('用户名或密码错误，请重新输入!');window.location='index.php'
   ;</script>";
}
?>