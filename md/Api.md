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

* 删除不需要的数据 unset($_POST["_token"]); 相当于js的delete 


* 统一resuful格式返回数据格式  

```
laravel 在Api接口开发中，可以使用 response()->json(["code"=>0,"msg"=>"ok","data"=>$data]);返回接口的 json数据但是太过烦索
我的解决方法如下，创一个 BaseController 继承 Controller
然后，所有的 api中的控制器都继承 BaseController；
在BaseController写上一些公用的方法

<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
 
class BaseController extends Controller{
 
 
    //成功返回
    public function success($data,$msg="ok"){
        $this->parseNull($data);//回的数据中的null修改值为空，不然安卓端处理起来很烦
        $result = [
            "code"=>0,
            "msg"=>$msg,
            "data"=>$data,
        ];
    return response()->json($result,200);
  }
 
 
    //失败返回
    public function error($code="422",$data="",$msg="fail"){
        $result = [
            "code"=>$code,
            "msg"=>$msg,
            "data"=>$data
        ];
        return response()->json($result,200);
    }
 
    //如果返回的数据中有 null 则那其值修改为空 （安卓和IOS 对null型的数据不友好，会报错）
    private function parseNull(&$data){
        if(is_array($data)){
            foreach($data as &$v){
                $this->parseNull($v);
            }
        }else{
            if(is_null($data)){
                $data = "";
            }
        }
    }
 
}

```


* return back() 返回当前页面 exit();执行终止
* 阻止表单提交 onsubmit="return false;"
* 获取用户所有数据
* call_user_func_array
```
call_user_func_array ： 调用回调函数，并把一个数组参数作为回调函数的参数。

说明：mixed call_user_func_array ( callable $callback , array $param_arr )

把第一个参数作为回调函数（callback）调用，把参数数组作（param_arr）为回调函数的的参数传入。

返回回调函数的结果。如果出错的话就返回FALSE
--------------------- 
作者：weihuiblog 
来源：CSDN 
原文：https://blog.csdn.net/weihuiblog/article/details/78998924 
版权声明：本文为博主原创文章，转载请附上博文链接！
```

* array_unshift() 函数用于向数组插入新元素。新数组的值将被插入到数组的开头。