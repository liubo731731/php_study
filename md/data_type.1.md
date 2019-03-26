### 数据类型
---
1. String（字符串），单引号/双引号都可以
2. Integer（整型）正数/负数/十进制， 十六进制（ 以 0x 为前缀）或八进制（前缀为 0）
3. Float（浮点型） 小数1.2或者指数2.4e3;
4. Boolean（布尔型） 
5. Array（数组） 
6. Object（对象）class关键字声明类对象。类是可以包含属性和方法的结构 
7. NULL（空值） 


###其他
1. var_dump() 可以返回数据类型和值,直接输出到页面echo效果
2. 

### 1.字符串
```
<!DOCTYPE html>
<html>
<body>
<?php 
$x = "Hello world!";
echo $x;
echo "<br>"; 
$x = 'Hello world!';
echo $x;
?>

</body>
</html>
```

上述代码:定义变量x,然后输出x和空行,再修改x，然后输出x元素

### 2.整数
```
<?php 
$x = 5985;
var_dump($x);
echo "<br>"; 
$x = -345; // 负数 
var_dump($x);
echo "<br>"; 
$x = 0x8C; // 十六进制数
var_dump($x);
echo "<br>";
$x = 047; // 八进制数
var_dump($x);
?>
效果:
int(5985) 
int(-345) 
int(140) 
int(39)
```

上述代码:定义时候按照16进制或者8进制定义，输出默认按照10进制

###3.小数
```
<!DOCTYPE html>
<html>
<body>

<?php 
$y='10';
var_dump($y);
echo "<br>";
$x = 10.365;
var_dump($x);
echo "<br>"; 
$x = 2.4e3;
var_dump($x);
echo "<br>"; 
$x = 0.8E-5;
var_dump($x);
?>   

</body>
</html>

效果:
string(2) "10" 两个长度字符串,值为'10'
float(10.365)
float(2400) //转换为整数
float(8.0E-6) //科学计数法 小数0.0001也会转成科学计数法


```
### 4.布尔true/false
### 5.数组
```
<!DOCTYPE html>
<html>
<body>

<?php 
$cars=array("Volvo","BMW","Toyota");
var_dump($cars);
?>   

</body>
</html>

效果
array(3) {
  [0]=>string(5) "Volvo"
  [1]=>string(3) "BMW"
  [2]=>string(6) "Toyota"
}

```