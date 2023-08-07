# Search

代码参考自：

- [简单搜索 https://github.com/5iux/sou](https://github.com/5iux/sou)
- [闲渡导航 https://github.com/xiandus/search](https://github.com/xiandus/search)

页面样式、页面内容参考自 Azad大佬的[搜哈-聚合网址导航](https://ss.azad.asia/)。

页面很好看很喜欢，很想自己部署一个。但是开源代码仓库是很多年前的了，于是优化了一下代码，并在此提供出来。^_^

代码分为两种，`html-release`为静态版本，`php-release`为PHP版本。

PHP版本的代码添加了简单的后台管理功能，包括：

- 菜单管理
- 搜索引擎管理
- 壁纸管理
- 小组件管理

在壁纸管理里可以上传壁纸，或者使用自定义的图片地址。

## 截图示例

![](https://图床.红红.我爱你/2023/08/07/64d0f003a1db6.png)

![](https://图床.红红.我爱你/2023/08/07/64d0f003e23eb.png)

![](https://图床.红红.我爱你/2023/08/07/64d0f0057849d.png)

![](https://图床.红红.我爱你/2023/08/07/64d0f0057945e.png)

![](https://图床.红红.我爱你/2023/08/07/64d0f0061f6d3.png)

## 安装php-release

 创建Mysql数据库；

导入`lucki_search.sql`数据库数据；

修改`/admin/function.php`：

```
    // 连接数据库文件
    $host = '127.0.0.1:3306';
    $dbuser = 'root';
    $pwd = '';
    $dbname = 'lucki_search';
```

配置Nginx或者Apache...这里略过；

访问测试：`example.com`；

访问没问题，请打开 `example.com/admin` 登录后台；

默认用户名：`admin`，默认密码：`123456`，请务必修改密码。

## End

代码简陋，大佬勿笑~