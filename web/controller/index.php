<?php
namespace web\controller;

use core\View;

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
	public function post()
	{
		dump("index posting ...");
	}
}