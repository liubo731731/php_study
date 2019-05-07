<?php
//超人类能力接口-XPower,UltraBomb实现
interface SuperModuleInterface
{
    public function activate(array $target);
}

//超能力实现接口SuperModuleInterface
class XPower implements SuperModuleInterface
{
    public function activate(array $target)
    {
        echo "激活XPOWER";
    }
}

/**
 * 终极炸弹  实现SuperModuleInterface
 */
class UltraBomb implements SuperModuleInterface
{
    public function activate(array $target)
    {
        echo "激活终极炸弹";
    }
}

//超人工厂,制造超人,每个超人有一种超能力,传入什么能力，制造什么能力的超人
class Superman
{
    protected $module;

    //类型是接口类:任何实现这个接口的类都可以兼容
    public function __construct(SuperModuleInterface $module)
    {
         $this->module = $module;
    }

    public function attack(){
         echo "超人攻击";
    }
}



//容器类,存储实例对象和回调函数
class Container
{
    protected $binds;//闭包数组,key,value存储
    protected $instances;//实例化对象数组key,value存储

    //传入抽象名称和闭包
    public function bind($abstract, $concrete)
    {
        //如果第二个参数是闭包,那么存入binds数组(key,value),否则存入实例数组(key,value)
        if ($concrete instanceof Closure) {
            $this->binds[$abstract] = $concrete;
        } else {
            $this->instances[$abstract] = $concrete;
        }
    }
    //传入名称和参数,如果实例存在,直接扔回去;否则把容器对象本身作为第一个参数,调用回调函数制造超人,然后扔回去
    public function make($abstract, $parameters = [])
    {
        if (isset($this->instances[$abstract])) {
            //如果绑定的是对象,那么直接扔回去,否则把this+参数传递给回调函数进行构造
            return $this->instances[$abstract];
        }
        array_unshift($parameters, $this);//this添加到最前面
        return call_user_func_array($this->binds[$abstract], $parameters);//这个函数返回值作为make函数的返回值
    }
}

$container = new Container;//new 一个容器

//机器人工厂
$container->bind('superman', function ($container, $moduleName) {
    return new Superman($container->make($moduleName));
});//只绑定不执行,重复make是没有用的
//$container->make($moduleName) 最终返回一个对象,这个对象是通过xpower的回调函数造出来的


//能力工厂
$container->bind('xpower', function ($container) {
    return new XPower;
});//只绑定不执行

$container->bind('ultrabomb', function($container) {
    return new UltraBomb;
});//只绑定不执行


$superman_1 = $container->make('superman',['xpower']);//超人1 具备xpower
$superman_2 = $container->make('superman', ['ultrabomb']);//超人2 具备ultrabomb
$superman_3 = $container->make('superman', ['xpower']);//超人1 xpower

echo ($superman_1===$superman_2?'true':'false');
echo "<br>";
echo ($superman_1===$superman_3?'true':'false');
//最终效果,我们按照自己的参数制造了超人,分别具有两个具备xpower,一个具备ultrabomb
exit;
?>