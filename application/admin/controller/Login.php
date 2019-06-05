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
			$data=input('post.');
			//实例化login验证类
            $validate = Validate('Login');
            //调用login验证类验证表单提交的数据
            $result = $validate->scene('add')->check($data);
			if (!$result) {
				$this->error($validate->getError());
			}
			$member_user= model('MemberUser');
			// dump($data);die;
			if(!$rew=$member_user->member_find($data)){
				$this->error('登录失败，请检查您的登录名密码是否正确');
			}else{
				session('id',$rew['id']);
				session('id',$rew['username']);
				$this->success('登录成功','Index/index');
			}
		}else{
			return $this->fetch();
		}
	}
}