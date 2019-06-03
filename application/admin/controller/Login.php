<?php 
namespace app\admin\controller;
use think\Controller;
use think\Captcha;
/**
* 登录
*/
class Login extends Controller
{
	//判断是否登录
	public function index()
	{
		//取session中id的值
		$id=session('id');
		//判断session有没有id
		if (!$id) {
			return $this->fetch('Login/login');
		}
		return $this->fetch('Index/index');
	}
	//登录
	public function login()
	{
		//判断是否是post请求的数据
		if (request()->isPOST()) {
			dump(input('post.'));die;
		}else{
			return $this->fetch();
		}
	}
}