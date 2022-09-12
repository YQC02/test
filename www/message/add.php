<?php
require_once("db.inc,php");
$name=$_POST['user'];
$contents=$_POST['contents'];
$mail=$_POST['mail'];
$phone=$_POST['phone'];
$exec="insert into message(name,contents,mail, phone)
values('$name','$contents','$mail','$phone')";
if (mysql_query($exec))
    echo "添加留言成功，谢谢您的留言!";
else
    echo "添加留言失败";
echo "<p><a href=index.php ><center>返回主页面</center></a>";
mysql_close();
?>
<html>
    <head>
        <meta http-equiv='refresh' content='3;url=index.php'>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    </head>
    <body>
        <p>谢谢您对本站的支持，三秒后返回......
    </body>
</html>
    