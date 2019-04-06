##### 问题1:Apache Error: Invalid command ‘Allow’, perhaps misspelled or defined by a module not included in the server configuration
运行完:httpd.exe -t 测试

修改:hosts:127.0.0.1 www.phpstudy.com

这个时候http.conf：不能listen 80会冲突

```
<VirtualHost *:80>
        ServerAdmin test@test.com
        DocumentRoot "D:/test.com"
        ServerName test.com
        ServerAlias www.test.com
        ErrorLog "logs/test.com-error.log"
        CustomLog "logs/test.com-access_log" common
       <Directory  "D:/test.com">  #也可以在http.conf里统一设置,但因为各个虚拟主机的设置不同，因此建议单独进行设置
            AllowOverride All
            Order allow,deny
            Allow from all
            Require all granted
       </Directory>
</VirtualHost>
```


```
LoadModule access_compat_module modules/mod_access_compat.so #基于主机的组授权（名称或IP地址） httpd 2.x兼容的模块，
LoadModule proxy_module modules/mod_proxy.so #apache的代理模块
LoadModule proxy_http_module modules/mod_proxy_http.so #代理http和https请求
LoadModule vhost_alias_module modules/mod_vhost_alias.so #虚拟主机动态配置
LoadModule authz_host_module modules/mod_authz_host.so #基于主机的组授权
Include conf/extra/httpd-vhosts.conf#启用虚拟主机配置

```

##### 问题2：
