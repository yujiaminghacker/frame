<?php 
function p($sta){
	echo "<pre>".print_r($sta,true)."<pre>";exit;
}

//配置项读取与设置
function C($name=NULL,$value=NULL){
	//缓存配置
	static $_config=array();
	if(is_null($name)){
		return $_config;
	}else if(is_null($value)){
		//如果$name为数组时，将其与 $_config合并
		if(is_array($name)){
			$_config=array_merge($_config,$name);
		}else{
			//读取配置项
			return isset($_config[$name])?$_config[$name]:NULL;
		}
	}else{
		$_config[$name]=$value;
	}
}
//自动类加载

function __autoload($class){
	// p($class);
	$classFile=$class.'.class.php';
	if(substr($class,-10)=='Controller' &&
		require_cache(
			array(CONTROLLER_PATH.$classFile,
				HD_PATH.'Core/'.$classFile)
		)){
		return;
	}else if(substr($class, -5)=="Model" &&
		require_cache(
			array(HD_PATH.'Core/'.$classFile)
			)){
		return;
	}
}

//缓存加载文件
function require_cache($file){
	//定义静态变量，用于缓存已经加载的文件
	static $_file=array();
	//将参数转化为数组
	if(!is_array($file)){
		$file=array($file);
	}
	//为每一个文件命令一个key  ?
	foreach($file  as  $f){
		$name = md5($f);
		//已经加载的文件不要再加载
		if(isset($_file[$name]))return true;
		//如果文件存在并且可读时加载此文件
		if(is_file($f) && is_readable($f)){
			require $f;
			$_file[$name]=true;
			return true;
		}
	}
	return false;
}

//错误处理函数的
//错误处理的函数
function error($msg){
	echo "<div style='background:#298323;padding:10px;color:#fff;font-size:12px;'>$msg</div>";
	exit;
}
