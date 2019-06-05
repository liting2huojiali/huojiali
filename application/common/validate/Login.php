<?php
namespace app\common\validate;
use think\Validate;
/**
* 登录验证器
*/
class Login extends Validate
{
	protected $rule=[
		// 'captcha'=>'require|captcha',
		'username'=>'require|max:25',
		'password'=>'require',
	];
	protected $massage=[
		// 'captcha.require'=>'登录验证码不能为空',
		// 'captcha.captcha'=>'验证码错误',
		'username.require'=>'登录用户名不能为空',
		'username.max'=>'登录用户名最大为25个字符',
		'password.require'=>'登录密码不能为空',

	];
	protected $scene=[
		'add'=>['username','password'];
	];
}

?>