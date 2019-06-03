<?php 
namespace app\common\validate;
use think\validate;	
/**
* 新增验证会员类
*/
class MemberUser extends validate
{
	protected $rule = [
        'username'  =>  'require|max:25',
        'password' =>  'require|min:6',
    ];
    
    protected $message = [
        'username.require'  =>  '用户名必须填写',
        'username.max'      =>  '用户名最大为25个组字符',
        'password.require' =>  '密码必须填写',
        'password.min' =>  '密码最小为6个字符',
    ];
    
    protected $scene = [
        'add'   =>  ['username','password'],
        'edit'  =>  ['username'],
    ];
}