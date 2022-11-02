<div align="center" style="display:flex;justify-content:center">
    <img src="https://www.ex-admin.com/logo.png" height="80"><h1 style="margin-left:10px">Ex-Admin</h3>
</div>
<br>
<p><code>Ex-Admin</code>是一个基于<a href="https://www.antdv.com/docs/vue/introduce-cn/" target="_blank">Ant Design of Vue</a>开发而成后台系统构建工具，无需关注页面模板JavaScript，只用php代码即可快速构建出一个功能完善的后台系统。。</p>


- [中文文档](https://www.ex-admin.com/doc)
- [Demo / 在线演示](https://demo.ex-admin.com)
- [github](https://github.com/rocky-git/ex-admin-webman)
- [gitee(码云)](https://gitee.com/rocky-git/ex-admin-webman)
- [ex-admin-ui(github)](https://github.com/rocky-git/ex-admin-ui)
- [ex-admin-ui(码云)](https://gitee.com/rocky-git/ex-admin-ui)



![](https://www.ex-admin.com/img/1655645000903.png)




### 特性
- 灵活的设计，支持php各种框架接入
- 后台组件面向对象编程，组件化开发
- 自定义vue页面组件，无需重新编译打包
- 注解权限RBAC的权限系统,无限极菜单
- 数据表格构建工具，内置丰富的表格常用功能（如拖拽排序、数据导出、搜索、快捷创建、批量操作等）
- 数据表单构建工具，分步表单构建工具，内置丰富的表单类型，表单watch，表单互动
- 数据详情页构建工具
- 支持自定义图表

### 安装
首先需要安装 webman 框架，如已安装可以跳过此步骤。如果您是第一次使用 webman，请务必先阅读文档 <a href="https://www.workerman.net/doc/webman/install.html" target="_blank">安装《webman 中文文档》</a> ！
```
composer create-project workerman/webman 项目名称
```

安装 ex-admin

```
cd {项目名称}

composer require -W psr/container ^1

composer require rockys/ex-admin-webman
```
配置config/database.php
```php

return [
    'default' => env('DB_CONNECTION', 'mysql'),
    'connections' => [
        'mysql' => [
            'driver' => 'mysql',
            'host' => env('DB_HOST', '127.0.0.1'),
            'port' => env('DB_PORT', '3306'),
            'database' => env('DB_DATABASE', 'forge'),
            'username' => env('DB_USERNAME', 'forge'),
            'password' => env('DB_PASSWORD', ''),
            'unix_socket' => env('DB_SOCKET', ''),
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => '',
            'prefix_indexes' => true,
            'strict' => true,
            'engine' => null,
            'options' => [
                \PDO::ATTR_TIMEOUT => 3
            ],
        ],
    ]
];
```
修改.env 文件，设置数据库连接设置正确
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=webman
DB_USERNAME=root
DB_PASSWORD=
```

然后运行下面的命令完成安装：
```
php webman admin:install
```


启动服务：
```
php start.php start
```
启动服务后，在浏览器打开 http://127.0.0.1:8787/admin，使用用户名 admin 和密码 admin 登陆

-----------------------------------

### 鸣谢
`Ex-Admin` 基于以下组件:

+ [ThinkPhP](http://www.thinkphp.cn/)
+ [Ant Design Vue](https://www.antdv.com)
+ [Vue3](https://cn.vuejs.org/)
+ [font-awesome](http://fontawesome.io)
+ [echarts](https://echarts.apache.org/)
+ [simple-uploader.js](https://github.com/simple-uploader/Uploader)
+ [tinymce](https://www.tiny.cloud/)
+ [sortablejs](http://www.sortablejs.com/)


### License

------------
Ex-Admin遵循Apache2开源协议发布，并提供免费使用

### 捐赠

<div>
<img src="https://www.ex-admin.com/storage/files/fa5b3c66950b0bc92b96552dd8095ac7.jpeg" height="300">

<img src="https://www.ex-admin.com/storage/files/82ace9b2aebc95aaa59610bfb5a620bf.jpeg" height="300">
</div>