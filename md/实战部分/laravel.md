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

4. MVC模式



 