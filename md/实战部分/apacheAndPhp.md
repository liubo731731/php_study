###### Windows下Apache+PHP开发环境的搭建主要包括三种方式，
* 第一种是直接采用集成化的安装包，如XAMPP，
* 第二种是Apache采用官方提供的msi安装包，PHP手动安装，
* 第三种是Apache和PHP均手动安装。
###### 显然，第一种方式是最简单的，但相应的限制也比较大，第三种方式最麻烦，但可以灵活的选择自己所需的版本进行安装


###### 安装步骤
1. 下载windows版本的Apache和PHP
2. 将Apache压缩包解压,把解压后的Apache24拷贝到要安装的目标位置。建议拷贝到C盘根目录下，因为这是其默认设置。
   我选择的是拷贝到D盘根目录，这样就需要对Apache配置文件d:\Apache24\conf\httpd.conf进行修改，
   打开该文件，将c:/Apache24全部替换成d:/Apache24
3. 运行cmd，进入Apache24下的bin目录，为了检查httpd.conf有无问题，我们输入httpd.exe -t，如果正常的话只会显示一行Syntax OK，如果有错的话则会告诉我们是哪儿错了。
4. 在控制台中运行httpd.exe -k install将Apache安装成windows服务，这样Apache以后将自动运行。
5. 运行httpd.exe -k start启动服务，如果没有错误提示，在浏览器中输入http://127.0.0.1或者http://localhost将显示如下页面：


###### 配置php
1. 将PHP解压后拷贝到安装位置，我这里选择的是d:/php-5.5.15。然后将php.ini-development复制并重命名为php.ini，如果是部署，则复制php.ini-production。
2. 编辑Apache的httpd.conf 查找LoadModule，在其后面增加下面配置，如果你的PHP在C盘的话，请将D:换成C:，另外注意路径使用/
```
LoadModule php5_module D:/php-5.5.15/php5apache2_4.dll
PHPIniDir D:/php-5.5.15
查找AddType，加入如下配置：

AddType application/x-httpd-php .php
查找DirectoryIndex，加入index.php，如果希望index.php优先于index.html，则将其放在前面。

<IfModule dir_module>
    DirectoryIndex index.html index.php
</IfModule>
保存配置，在命令行中运行httpd.exe -t检查配置，如果没有问题，则运行httpd.exe -k restart重启Apache服务。
```
3.  在Apache24\htdocs目录下新建一个phpinfo.php文件，输入如下PHP代码：
```
<?php
    phpinfo();
?>
```
4. 然后在浏览器中访问http://127.0.0.1/phpinfo.php