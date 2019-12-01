<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
</body>
</html>
<?php
@include_once("G:/phpStudy_64/phpstudy_pro/WWW/pms/waf.php");
@include_once("G:/phpStudy_64/phpstudy_pro/WWW/pms/waf.php");
session_start();
$userid=$_SESSION['userid'];
include ('mysqli_connect.php');
$delid=$_GET['id'];
$sqla="select state a from pay where PID={$delid} ;";
$resa=mysqli_query($dbc,$sqla);
$resulta=mysqli_fetch_array($resa);
if($resulta['a']==1) {
    $sqla = "delete  from pay where PID={$delid} ;";
    $resa = mysqli_query($dbc, $sqla);
    if ($resa == 1 ) {
        echo "<script>alert('删除成功！')</script>";
        echo "<script>window.location.href='admin_jiaofei.php'</script>";
    }
    else {
        echo "删除失败！";
        echo "<script>window.location.href='admin_jiaofei.php'</script>";
    }
}
else {
    echo "<script>alert('不能删除该信息！')</script>";
    echo "<script>window.location.href='admin_jiaofei.php'</script>";
}
?>
