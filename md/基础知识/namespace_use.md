### PHP命令空间namespace及use的用法实践总结
https://www.cnblogs.com/drunkhero/p/namespace.html

1.  namespace后命名的定义不区分大小写
2.  没有定义命名空间，就理解为使用顶级命名空间。new类时，可以在类前加上反斜杠\,也可以不加。
3.  new类时，带上命名空间时，之间一定用反斜杠字符，而不是顺斜杠。
4.  类在指定命名空间下， new类时，一定要带上指定的命名空间。
     new \one\Person(); //输出 I am one!;  
5.  


1.使用namespace的目的
用到所需要的类时，需要先require或include引入  
目前有些php框架会自动加载（即include）所有新建的model类，所以为了避免你新建的model类和项目框架原生的核心类发生重名冲突，采用了namespace。


2.namespace的使用方法

3.使用use的目的

4.use的使用方法