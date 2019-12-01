<?php
@include_once("G:/phpStudy_64/phpstudy_pro/WWW/pms/waf.php");
@include_once("G:/phpStudy_64/phpstudy_pro/WWW/pms/waf.php");
session_start();
$userid=$_SESSION['userid'];
include ('mysqli_connect.php');
$state=$_GET['id'];
if($state==1){
    $sql="update repair set state=0 where PID ={$userid}";
    $res=mysqli_query($dbc,$sql);
    if($res==1)
    {
        echo"<script>alert('取消报修成功')</script>";
        echo "<script>window.location.href='user_repair.php'</script>";
    }
    else
    {
        echo"<script>alert('取消报修失败！')</script>";
        echo "<script>window.location.href='user_repair.php'</script>";
    }
}
else{
    $sqla="update repair set state = 1 where PID ={$userid}";
    $resa=mysqli_query($dbc,$sqla);
    if($resa==1)
    {
        echo"<script>alert('报修成功！')</script>";
        echo "<script>window.location.href='user_repair.php'</script>";
    }
    else
    {
        echo"<script>alert('报修失败！')</script>";
        echo "<script>window.location.href='user_repair.php'</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
</body>
</html>
