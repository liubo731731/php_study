#### 专门放置组件的网站Packagist:https://packagist.org/


php7.3安装时候有问题，总是报"count():Parameter must be an array or an object that implements Countable",查资料之后因为7.2 7.3的php严格限制了数组的参数
所以换成7.1的php了

直接下载7.1的压缩包->解压->复制一份php.ini->安装windows的composer-->查看composer --version--->修改数据源
```
composer --version 

composer config -g repo.packagist composer https://packagist.phpcomposer.com 更改 Packagist 为国内镜像：



```

#### Composer 的使用

1. 创建一个 composer.json 
2. 添加如下内容
```
{
    "require": {
        "monolog/monolog": "1.2.*"
    }
}
```
3. composer install


#### require 命令
除了使用 install 命令外，我们也可以使用 require 命令快速的安装一个依赖而不需要手动在 composer.json 里添加依赖信息：  
composer require monolog/monolog  
Composer 会先找到合适的版本，然后更新composer.json文件，在 require 那添加 monolog/monolog 包的相关信息，再把相关的依赖下载下来进行安装，
最后更新 composer.lock 文件并生成 php 的自动加载文件。