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

