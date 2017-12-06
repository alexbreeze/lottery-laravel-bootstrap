# lottery-laravel-bootstrap
## 简介
1. 基于 **Laravel5.1+Bootstrap3.7** 开发的 **'简单WEB抽奖'**，适合较小的群体进行抽奖
2. 框架的优雅性得以体现，界面友好简洁
3. 自适应的特点让客户可以在各个客户端使用

## 用法
1. 将项目 `clone` 到服务器根目录
2. 切记在正式投入生产之前，修改 `.env` 文件
3. 将 `lottery.sql` 文件导入到数据库，可以得到部分初始数据
4. 下面给出默认路由：
  -  `getcount   //抽奖次数`
  -  `getaward  //获得奖品并更新次数`
5. 有 **Laravel** 和 **jQuery** 基础会更容易理解代码

## 改进
1. 素材均取自 **Bootstrap** 官网主题，虽然界面友好但是略显单一
2. 使用 **jQuery** 封装的 `$.get()` 方法是为了便于调试，正式使用最好使用 `$.post()`
3. 由于 **Laravel** 框架优雅的特性，代码格式较为凝练简单
4. 可以改用最新的 **Laravel 5.5**，可以使用 **Laravel Mix** 更轻松管理 **JavaScript CSS** 代码
