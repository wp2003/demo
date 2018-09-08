<?php
namespace core;

class Bootstrap
{
	public static function run()
	{
		//dump("boot running ...<br>");
		//dump(file_get_contents("php://input"));
		//$query = $parse_url($_SERVER['REQUEST_URI']); 
		self::parseUrl();
	}

	//分析URL中的 s=class/action
	public static function parseUrl()
	{
		$action = $_GET['s'];
		if(isset($action))
		{
			$arr = explode('/', $action);
			$class = '\web\controller\\'.ucfirst($arr[0]);
			$action = $arr[1];
		}
		else
		{
			//默认的控制器和方法
			$class = '\web\controller\Index';
			$action = 'show';
		}

		//生成、调用 控制器类方法
		//todo 1.视图-echo 2.接口-return
		echo (new $class)->$action();
	}
}