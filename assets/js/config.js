/**
 * ========================================================= 
 * 全局定义的一些常量,独立于框架的,比如访问地址，这些只读的数据,如果框架需要直接引用,把赋值给scope
 * app.js里面有  	$rootScope.espConfig=espConfig;//全局的一些配置文件,全局抽离出来
 * 需要在框架引用,可以引用
 * =========================================================
 */
(function() {
	var appConfig = {};
	appConfig.BasePath = "aa"; //默认的地址
	//页面和js文件的更新控制
	appConfig.updateManage = {
		immediateUpdateFile: true, //是否立即更新文件，默认是30分钟更新一次，紧急更新需要设置 
		immediateUpdateTime: 600000, //立即更新的时间默认是60000ms 1分钟,	
	};	
	window.appConfig = appConfig;	
})(window);