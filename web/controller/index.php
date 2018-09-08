<?php
namespace web\controller;

use core\View;
use Gregwar\Captcha\CaptchaBuilder;

class Index
{
	protected $view;
	public function __construct()
	{
		$this->view = new View();
	}
	public function show()
	{
		//调用视图模板
		return $this->view->make('show')->with('version','version:1.0 copyright@2018');
	}
	public function login()
	{
		return $this->view->make('login');
	}
	public function code()
	{
		$builder = new CaptchaBuilder;
		$builder->build(100, 30);
		$_SESSION['phrase'] = $builder->getPhrase();
		header('Content-type: image/jpeg');
		$builder->output();
	}
}