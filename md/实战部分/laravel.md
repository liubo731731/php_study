#### laravel apache 服务器配置

1.简单点，可以在控制台直接在laravel 工程 public 目录下 php -S localhost:10086   
php5.4(好像是这个版本)支持内置server,开发用这个方式最方便了，同时也支持rewrite
 
2.
2. apache vhost

a. 开启rewrite:  去掉httpd.conf 中LoadModule rewrite_module modules/mod_rewrite.so 前的 #

b. vhost

<VirtualHost *:80>
    ServerAdmin webmaster@mwg.com
    DocumentRoot D:/laravel/public/
    ServerName laravel.test.com # 这个需要在hosts里配置对应项目,如:127.0.0.0 laravel.test.com
#    ServerAlias www.dummy-host.example.com


<Directory d:/laravel/public/>  
AllowOverride All# rewrite需要开启这个
Options Indexes FollowSymLinks
Require all granted  
    </Directory>  

    ErrorLog "logs/laravel.test.com-error.log"
    CustomLog "logs/laravel.test.com-access.log" common
</VirtualHost>
--------------------- 
作者：ttfy1234 
来源：CSDN 
原文：https://blog.csdn.net/mwg1234/article/details/52294218 
版权声明：本文为博主原创文章，转载请附上博文链接！