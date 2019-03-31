### cookie相关
---
##### 如何创建 Cookie？
1.setcookie() 函数用于设置 cookie。  
2.setcookie() 函数必须位于 <html> 标签之前。  
3.setcookie(name, value, expire, path, domain);  
4.在发送取回cookie 时，cookie的值会自动进行 URL 编码(为防止URL编码,请使用setrawcookie())

创建键:user,值:runoob,一小时之后过期
```
<?php
setcookie("user", "runoob", time()+3600);
//$expire=time()+60*60*24*30;
//setcookie("user", "runoob", $expire);


?>

<html>
.....
```

#### 如何取回 Cookie 的值？
echo $_COOKIE["user"];//查看某个  
print_r($_COOKIE);//查看所有
#### isset() 函数来确认是否已设置了 cookie  
```
<html>
<head>
<meta charset="utf-8">
<title>菜鸟教程(runoob.com)</title>
</head>
<body>
<?php
if (isset($_COOKIE["user"]))
    echo "欢迎 " . $_COOKIE["user"] . "!<br>";
else
    echo "普通访客!<br>";
?>
</body>
</html>

```
#### 如何删除 Cookie？
###### 删除需要让时间为过去的时间
```
<?php
// 设置 cookie 过期时间为过去 1 小时
setcookie("user", "", time()-3600);
?>
```

#### 如果浏览器不支持 Cookie 该怎么办？一种方式是使用form表单: