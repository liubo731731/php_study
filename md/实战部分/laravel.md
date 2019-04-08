#### laravel apache 服务器配置 https://blog.csdn.net/mwg1234/article/details/52294218

1.简单点，可以在控制台直接在laravel 工程 public 目录下 php -S localhost:10086   
php5.4(好像是这个版本)支持内置server,开发用这个方式最方便了，同时也支持rewrite
 
2.apache vhost

a. 开启rewrite:  去掉httpd.conf 中LoadModule rewrite_module modules/mod_rewrite.so 前的 '#'

b. vhost

<VirtualHost *:80>
    ServerAdmin webmaster@mwg.com
    DocumentRoot D:/laravel/public/
    ServerName laravel.test.com # 这个需要在hosts里配置对应项目,如:127.0.0.0 laravel.test.com
#    ServerAlias www.dummy-host.example.com


```
<Directory d:/laravel/public/>  
AllowOverride All# rewrite需要开启这个
Options Indexes FollowSymLinks
Require all granted  
    </Directory>  
```

    ErrorLog "logs/laravel.test.com-error.log"
    CustomLog "logs/laravel.test.com-access.log" common
</VirtualHost>

#### 第一节课
框架:  
Laravel:5.3版本  
thinkphp:3.2.3 国人开发,中文文档完善  
composer global require laravel/installer  
laravel new blog  
composer create-project --prefer-dist laravel/laravel blog  
composer create-project --prefer-dist laravel/laravel blog 5.7.*。  


2：composer软件：主要管理依赖关系 yum、 默认安装 PHP启动程序-  
https://getcomposer.org/  

CURL 微信开发  
UPLOAD 文件操作  
EXCEL 导出  
MAIL 邮件  
LOG  日志  
LARAVEL   

3.新建composer.json--->composer install

4.开启

 Composer 安装 Laravel 安装器:composer global require "laravel/installer"
 
 
 
 ### 目录介绍-第二节:
###### 目录结构
1.app:应用核心代码
2.boostrap:不是前端的那一个，而是框架的
3：config
4:database 
5：public 主入口和前端的资源
6：

###### 开发展示页面
1. env设置数据库
2. 设置路由web.php 
3. php artisan make:controller IndexController 创建控制器-本质是一个类继承自Controller 然后在这个里面写方法  

```
页面html
@foreach ($data as $value)
<tr>
  <td>{{$value->ssr_ip}}</td>
  <td>{{$value->ssr_port}}</td>
  <td>{{$value->password}}</td>
</tr>
@endforeach
```


```
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class IndexController extends Controller
{
   public  function index(){
   	   $data=DB::table('ssr_url')->get();
	   //var_dump($data);
	   // echo "<br>"
	    //dd($data);
		return view('user')->with("data",$data);
   }

}
```

1. MVC模式 介绍  浏览器->路由->(controller+model)->view  外加中间件


#### 第三节课:配置和路由2
######  环境配置 .env配置 系统配置 config
* APP_KEY:网站的秘钥  删除会有问题 在当前目录执行:"php artisan key:generate"重新生成
* APP_DEBUG=true  默认true  打印日志 报错提示 网站上线 必须关掉 false
* 获取环境配置信息 echo env("DB_HOST");echo config("app.debug"),dd(config('app'));
* 设置环境配置信息 时间date('Y-m-d H:i:s') UTC/PRC 在app里面我们设置为PRC  
* 修改信息 config(['app.timezone'=>"UTC"]);//临时修改
##### php artisan（工具匠）本质是php文件--可以在dos下执行:控制器 中间件 秘钥生成！
* 上线下  php artisan up/down  错误503页面这个没成功！
* 查看路由列表 php artisan route:list

######  基本路由
* 直接用echo "返回数据";
* 加载页面 return view("home");
* 加载控制器 经过数据库:控制器里面查找数据库









 