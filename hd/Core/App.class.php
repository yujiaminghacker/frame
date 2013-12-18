<?php 
class App{
	function run(){
	//加载应用配置项
		if(is_file(CONFIG_PATH."config.php")){
			C(require CONFIG_PATH."config.php");
			}
		//控制器
		$c=isset($_GET['c'])?$_GET['c']:"Index";
		//方法
		$m=isset($_GET['m'])?$_GET['m']:"Index";
		//常量
		define("CONTROLLER",ucfirst($c));
		define("METHOD",$m);
		//__autoload  自动类加载
		
		$controller = ucfirst($c.'Controller');
		// p($controller);
		$ob= new $controller;//IndexController
		if(!method_exists($ob,$m)){
			error(":( 您请求的方法不存在");
		}

		$ob->$m();
	}
}