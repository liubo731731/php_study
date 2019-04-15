#### 这里放一些常用的函数清单和简单的说明,或者注意事项

* set_error_handler() 函数设置用户自定义的错误处理函数
* trigger_error() 函数创建用户级别的错误消息。

```
<?php
//error handler function
function customError($errno, $errstr, $errfile, $errline) {
    echo "<b>Custom error:</b> [$errno] $errstr<br />";
    echo "Error on line $errline in $errfile<br />";
    echo "Ending Script";
    die();
}
 
//set error handler
set_error_handler("customError");
 
$test=2;
 
//trigger error
if ($test > 1) {
    trigger_error("A custom error has been triggered");
}

//trigger_error(errormsg,errortype);
errormsg 必需。规定错误消息。最大长度 1024 字节。
errortype	
可选。规定错误类型。可能的值：
E_USER_ERROR
E_USER_WARNING
E_USER_NOTICE（默认）

?>
```

* error_log() 函数向服务器错误记录、文件或远程目标发送错误消息。
```
   error_log(message,type,destination,headers);
```

* array_chunk() - 将一个数组分割成多个 数组:[1,2,3,4]->["0"=>[1,2],"1"=>[3,4]],曾经做移动端数组分组用过;

* SERVER数组,


* 删除实体之前记录文件url，删除实体之后，删除文件unlink,成功之后,返回成功,或者不管失败成功都返回,或者直接提示删除文件成功,或者放到一个事务里面


* 批量删除:

* jquery 删除元素：$("#div1").remove();remove() - 删除被选元素（及其子元素）empty() - 从被选元素中删除子元素

* onchange 离开时候触发

* 瀑布流

* 删除修改附件时候记得删除老的附件

