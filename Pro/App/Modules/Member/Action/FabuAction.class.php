<?php 
/**
 * 个人信息类
 * @author  <[l@easycms.cc]>
 */
class FabuAction extends CommonAction{
	public function index(){
		if(!$_SESSION[C('USER_AUTH_KEY_F')]){
			$this->error("请先登陆");
		}
        $this->display('show');
        
	}
	public function second(){
		if(!$_SESSION[C('USER_AUTH_KEY_F')]){
			$this->error("请先登陆");
		}
		$id=$_GET['id'];
	    $m = M('wenjuan')->where("id = $id")->find();
	    if($m==NULL)
	    $this->error('无这篇问卷','/');
		$wenjuan=M('wenjuan')->where("id=$id")->find();
		$this->assign('wenjuan',$wenjuan);
		$wenti=M('wenti')->where("wenjuanid=$id")->order("paixu desc")->select();
		$this->assign('wenti',$wenti);
		
        $this->display('show2');
        
	}
	
    public function add(){
			$model = M('wenjuan');
            $model->create();
			$model->fbrid=$_SESSION[C('USER_AUTH_KEY_ID')];
			if(empty($model->name))
			{
				$this->error('问卷名称不能为空');
			}
			else
			{
			$id=$model->add();
			$this->redirect('fabu/second', array('id'=>$id), 1,'跳转到第二步');
			}
	}
	public function addwenti(){
			$model = M('wenti');
            $model->create();
			if(empty($model->title))
			{
				$this->error('问题名称不能为空');
			}
			elseif(empty($model->A)&&empty($model->B)&&empty($model->C)&&empty($model->D))
			{
				$this->error('选项不能为空');
			}
			else
			{
			$id=$model->add();
			$wenjuanid=$_POST['wenjuanid'];
			$fenshu=$_POST['wentifenshu'];
			$tol = M('wenjuan')->where("id=$wenjuanid")->find();
			$data['fenshu'] = $tol['fenshu'] +$fenshu;
            M('wenjuan')->where("id=$wenjuanid")->save($data);
			$this->success('问题添加成功');
			}
	}
	public function dwenti(){//delete
	        $id=$_GET['id'];
			$model = M('wenti');
            $data=M('wenti')->where("id=$id")->find();
			$wenjuanid=$data['wenjuanid'];
			$score=$data['wentifenshu'];
			$tol = M('wenjuan')->where("id=$wenjuanid")->find();
			$save['fenshu'] = $tol['fenshu'] -$score;
            M('wenjuan')->where("id=$wenjuanid")->save($save);
			$model = M('wenti');
            M('wenti')->where("id=$id")->delete();
			$this->success('问题删除成功');
	}
}