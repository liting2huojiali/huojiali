<?php
namespace app\admin\controller;
use think\Controller;

class Index extends Controller
{
	//首页
    public function index()
    {
        return $this->fetch();
    }
    //欢迎页面
    public function welcome()
    {
    	return "我爱霍佳丽";
    }
}
