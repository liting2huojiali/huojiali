<?php 
namespace app\common\model;
use think\Model;
/**
* 会员添加模型类
*/
class ClassType extends Model
{

	//会员新增
	public function class_add($data)
	{	
		// 判断传递的数据为数组
		if (!is_array($data)) {
			exception('传递数据不合法');
		}
		$this->allowField(true)->save($data);
		return $this->id;
	}
	//会员列表
	public function class_list()
	{ 
		return $this->select();
	}	
}