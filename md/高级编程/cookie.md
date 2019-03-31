#### cookie
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
?>

<html>
.....
```

