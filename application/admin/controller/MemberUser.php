<?php
namespace app\admin\controller;
use think\Controller;
class MemberUser extends Controller
{
	//会员新增页面
    public function member_add()
    {
        //判断是否是post提交
        if(request()->isPOST()){
            //把表单提交的值传入$data中
            $data['username']=input('post.username');
            $data['password']=input('post.password');
            //实例化memberuser验证类
            $validate = Validate('MemberUser');
            //调用memberuser验证类验证表单提交的数据
            $result = $validate->scene('add')->check($data);
            //判断表单数据时候合法
            if(!$result){
                return $this->error($validate->getError());
            }
            $data['create_time']=time();
            $member_user= model('MemberUser');
            try {
                $id=$member_user->member_add($data);
            } catch (\Exception $e) {
                return $this->error($e->getMessage());
            }
            if ($id) {
                $this->success('新增用户成功id为'.$id);
            }else{
                $this->error('新增用户失败');
            }
            
        }else{
            return $this->fetch();
        }
    }
    
    //会员列表页面
    public function member_list()
    {
        $member_user= model('MemberUser');
        $data=$member_user->member_list();
        // foreach ($data as $key => $value) {
        //     $data[$key]['create_time']=date('Y-m-d H:i:s',$value['create_time']);
        // }
        $this->assign('data',$data);
        return $this->fetch();
        
    }
}
