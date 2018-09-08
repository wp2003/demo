<?php
namespace core;

class View
{
	//模板文件
	protected $file;
	//模板变量
	protected $vars = [];  //php5.4+
	//读取文件
	public function make($file)
	{
		$this->file = 'view/'.$file.'.html';
		return $this;
	}
	//分配变量
	public function with($name,$value)
	{
		$this->vars[$name] = $value;
		return $this;
	}
	//魔术方法
	public function __toString()
	{
		extract($this->vars);
		include $this->file;
		return '';
	}
}