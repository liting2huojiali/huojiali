<?php
namespace app\admin\controller;
use think\Controller;
class ClassType extends Controller
{
	//分类新增页面
    public function class_add()
    {
        //判断是否是post提交
        if(request()->isPOST()){
            //把表单提交的值传入$data中
            $data['name']=input('post.name');
            //实例化ClassType验证类
            $validate = Validate('ClassType');
            //调用ClassType验证类验证表单提交的数据
            $result = $validate->scene('add')->check($data);
            //判断表单数据时候合法
            if(!$result){
                return $this->error($validate->getError());
            }
            $data['create_time']=time();
            $class_type= model('ClassType');
            try {
                $id=$class_type->class_add($data);
            } catch (\Exception $e) {
                return $this->error($e->getMessage());
            }
            if ($id) {
                $this->success('新增分类成功id为'.$id);
            }else{
                $this->error('新增分类失败');
            }
            
        }else{
            return $this->fetch();
        }
    }
    
    //分类列表页面
    public function class_list()
    {
        $class_type= model('ClassType');
        $data=$class_type->class_list();
        // foreach ($data as $key => $value) {
        //     $data[$key]['create_time']=date('Y-m-d H:i:s',$value['create_time']);
        // }
        $this->assign('data',$data);
        return $this->fetch();
        
    }
}
