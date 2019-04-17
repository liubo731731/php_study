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
```