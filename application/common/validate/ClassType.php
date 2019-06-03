<?php 
namespace app\common\validate;
use think\validate;
/**
* 分类验证
*/
class ClassType extends validate
{
	protected $rule=[
		'name'=>'require|max:25',
	];
	protected $message=[
		'name.require'=>'分类名不能为空',
		'name.max'=>'分类名最大为25个字符',
	];
	
	protected $scene=[
		'add'   =>  ['name'],
	];
}