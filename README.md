运行
---
+ composer install
+ vendor/bin/phpunit -c tests/phpunit.xml

分类
---
一共抽象了如下4种常用类型

+ DB - 带数据库的例子
+ NoDB - 不带数据库的例子
+ DI - 带依赖注入的例子(Dependency Injection)
  + 测试一个类，而这个类内部依赖另外一个类。另外一个类可以通过setter方法，构造方法，或者普通方法的参数传入的。
+ NoDI - 依赖非注入的例子(Hard Dependency)
  + 测试一个类，而这个类内部依赖另外一个类。另外一个类不是通过外部传入，而是固定死在这个类内部的。

DI，NoDI适合于TDD，比如依赖类尚未实现，而调用端不能等，这时可以让依赖类返回假数据（或叫stub）来使调用端可以走下去。


