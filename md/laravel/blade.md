#### Blade 并不限制你在视图中使用原生 PHP 代码
* @endsection 指令仅定义了一个片段， @show 则在定义的同时 立即 yield 这个片段


##### 组件 & 插槽
* aa
* s
* s
* a


##### 显示数据

```
Route::get('greeting', function () {
    return view('welcome', ['name' => 'Samantha']);
});
Hello, {{ $name }}.
```

* 可以在 Blade 的回显语句{{}}中放置你想要的任意 PHP 代码:任意
* 显示非转义字符 不希望转义:
```
Hello, {!! $name !!}
```
* 渲染 JSON  

```
前端js代码
<script>
	var app = <?php echo json_encode($array); ?>;
</script>

不过，你可以使用 @json Blade 指令代替手动调用 json_encode 函数
<script>
	var app = @json($array);
</script>
```

* HTML 实体编码:如果要禁用双重编码，可以在 AppServiceProvider 的 boot 中调用 Blade::withoutDoubleEncoding 方法：

* Blade & JavaScript 框架

```
可以使用 @ 符号通知 Blade 渲染引擎某个表达式应保持不变
<h1>Laravel</h1>

Hello, @{{ name }}.
然后交给angular vue等处理
```




* @verbatim 指令:如果需要大量用@ 请考虑用verbatim

```
@verbatim
	<div class="container">
		Hello, {{ name }}.
	</div>
@endverbatim
```

#### 控制结构

* If 语句:可以使用 @unless,@if、 @elseif、 @else 和 @endif 指令构造 if 语句  

```
@if (count($records) === 1)
	I have one record!
@elseif (count($records) > 1)
	I have multiple records!
@else
	I don't have any records!
@endif


@unless (Auth::check())
    You are not signed in.
@endunless

```

* @isset 和 @empty 

```
@isset($records)
	// $records 被定义且不是  null...
@endisset

@empty($records)
	// $records 为空...
@endempty
```
	
* 身份验证:@auth 和 @guest 指令能够用于快速确定当前用户是经过身份验证的，还是一个访客 

```
@auth
    // 此用户身份已验证...
@endauth

@guest
    // 此用户身份未验证...
@endguest



@auth('admin')
    // 此用户身份已验证...
@endauth

@guest('admin')
    // 此用户身份未验证...
@endguest
```

* 片段指令:@hasSection 检查片段是否存在内容  

```
@hasSection('navigation')
	<div class="pull-right">
		@yield('navigation')
	</div>

	<div class="clearfix"></div>
@endif

```

* Switch 指令  

```
@switch($i)
	@case(1)
		First case...
		@break

	@case(2)
		Second case...
		@break

	@default
		Default case...
@endswitch
```

* 循环  

```
@for ($i = 0; $i < 10; $i++)
    The current value is {{ $i }}
@endfor

@foreach ($users as $user)
    <p>This is user {{ $user->id }}</p>
@endforeach

@forelse ($users as $user)
    <li>{{ $user->name }}</li>
@empty
    <p>No users</p>
@endforelse

@while (true)
    <p>I'm looping forever.</p>
@endwhile

//跳过本次循环
@foreach ($users as $user)
    @if ($user->type == 1)
        @continue
    @endif

    <li>{{ $user->name }}</li>

    @if ($user->number == 5)
        @break
    @endif
@endforeach

也可以在一行中声明带有条件的指令
@foreach ($users as $user)
    @continue($user->type == 1)

    <li>{{ $user->name }}</li>

    @break($user->number == 5)
@endforeach

循环变量
@foreach ($users as $user)
    @if ($loop->first)
        This is the first iteration.
    @endif

    @if ($loop->last)
        This is the last iteration.
    @endif

    <p>This is user {{ $user->id }}</p>
@endforeach

parent访问父元素
@foreach ($users as $user)
    @foreach ($user->posts as $post)
        @if ($loop->parent->first)
            This is first iteration of the parent loop.
        @endif
    @endforeach
@endforeach

$loop 变量还包含其它几种有用的属性
   index,iteration,remaining,count,first,last,depth,parent具体含义查手册!
```

* 注释:Blade 也允许在视图中定义注释。  

```
{{-- This comment will not be present in the rendered HTML --}}

<!--HTML这样写的注释会返回-->

```

* PHP:在模板中使用 @php 指令执行原生的 PHP 代码块  

```
@php
    //
@endphp
频繁使用意味着模板中嵌入了过多的逻辑

```

#### 表单
* CSRF 域:只要在应用中定义了 HTML 表单，就一定要在表单中包含隐藏的 CSRF 令牌域

```
 <form method="POST" action="/profile">
    @csrf
    ...
</form>
```

* Method 域:模仿:PUT、 PATCH 及 DELETE

```
<form action="/foo/bar" method="POST">
    @method('PUT')
    ...
</form>
```

#### 引入子视图
* Blade 的 @include引入子视图  父视图变量在子视图都可以用

```
<div>
    @include('shared.errors')

    <form>
        <!-- Form Contents -->
    </form>
</div>

被包含的视图不仅会继承父视图的所有可用数据，还能够以数组形式向被包含的视图传递额外数据
@include('view.name', ['some' => 'data'])

@includeIf('view.name', ['some' => 'data']) 包含一个不确定是否存在的视图

@includeWhen($boolean, 'view.name', ['some' => 'data']);按照条件包含

@includeFirst(['custom.admin', 'admin'], ['some' => 'data'])//包含给定视图数组中第一个存在的视图，可以使用 includeFirst 指令

应当尽量避免在 Blade 视图中使用 __DIR__ 和 __FILE__ 魔术常量，因为它们将指向缓存中经过编译的视图的位置。


```

* 给被包含的视图起别名

```
AppServiceProvider 的 boot 方法中
use Illuminate\Support\Facades\Blade;
Blade::include('includes.input', 'input');

使用:

@input(['type' => 'email']);




```

#### 堆栈:完全看不懂
#### Service 注入

```
@inject('metrics', 'App\Services\MetricsService')
<div>
    Monthly Revenue: {{ $metrics->monthlyRevenue() }}.
</div>

```

#### 扩展 Blade:directive方法自定义指令。当 Blade 编译器遇到自定义指令时，这会调用该指令包含的表达式提供的回调。

```
<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * 执行注册后引导服务.
     *
     * @return void
     */
    public function boot()
    {
        Blade::directive('datetime', function ($expression) {
            return "<?php echo ($expression)->format('m/d/Y H:i'); ?>";
        });
    }

    /**
     * 在容器中注册绑定.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}

<?php echo ($var)->format('m/d/Y H:i'); ?>

添加指令要清除缓存: 
在更新 Blade 指令的逻辑之后，需要 Blade 视图的所有缓存。可以使用 view:clear Artisan 命令删除 Blade 视图缓存。

```


#### 自定义 If 语句:Blade::if  在AppServiceProvider 的 boot 方法中这样做：

```
use Illuminate\Support\Facades\Blade;

/**
 * 执行注册后引导服务
 *
 * @return void
 */
public function boot()
{
    Blade::if('env', function ($environment) {
        return app()->environment($environment);
    });
}

模板中使用:
@env('local')
    // 应用在本地环境中运行...
@elseenv('testing')
    // 应用在测试环境中运行...
@else
    // 应用没有在本地和测试环境中运行...
@endenv

```
