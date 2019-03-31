#### PHP session 变量用于存储关于用户会话（session）的信息，或者更改用户会话（session）的设置。  
#### Session 变量存储单一用户的信息，并且对于应用程序中的所有页面都是可用的。
----

##### PHP session通过在服务器上存储用户信息以便随后使用（比如用户名称、购买商品等）。
##### 然而，会话信息是临时的，在用户离开网站后将被删除。如果您需要永久存储信息，可以把数据存储在数据库中。
##### Session 的工作机制是：为每个访客创建一个唯一的 id (UID)，并基于这个 UID 来存储变量。
##### UID 存储在 cookie 中，或者通过 URL 进行传导。


###### 启动session    session_start() 函数必须位于 <html> 标签之前：
```
<?php session_start(); ?>
<html>
<body>
</body>
</html>
会向服务器注册用户的会话，以便您可以开始保存用户信息，同时会为用户会话分配一个 UID

```

##### 存储 Session 变量:使用 PHP $_SESSION 变量
```
<?php
session_start();
// 存储 session 数据
$_SESSION['views']=1;
?>
```

```
<html>
<head>
<meta charset="utf-8">
<title>菜鸟教程(runoob.com)</title>
</head>
<body>

<?php
// 检索 session 数据
echo "浏览量：". $_SESSION['views'];
?>

</body>
</html>
```

```
<?php
session_start();

if(isset($_SESSION['views']))
{
    $_SESSION['views']=$_SESSION['views']+1;
}
else
{
    $_SESSION['views']=1;
}
echo "浏览量：". $_SESSION['views'];
?>
```


##### 销毁 Session:使用 unset()-释放单个 或 session_destroy() 函数-释放所有session数据
```
<?php
session_start();
if(isset($_SESSION['views']))
{
    unset($_SESSION['views']);//释放变量
}
?>

<?php
session_destroy();//您也可以通过调用 session_destroy() 函数彻底销毁 session：
?>



```