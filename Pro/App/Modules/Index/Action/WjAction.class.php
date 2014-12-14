<?php
/**
* 前台首页
*/
class WjAction extends CommonAction
{ 
	Public function index(){
        if(!$_SESSION[C('USER_AUTH_KEY_F')]){
			$this->error("请先登陆");
		}
        $fbrid=$_SESSION[C('USER_AUTH_KEY_ID')];
        $all=M('wenjuan')->where("fbrid='".$fbrid."'")->order('id desc')->select();
        $this->assign('all',$all);
		//显示模板	
		$this->display('all');
	}
	Public function detials(){
	    $id=$_GET['id'];
		$wj=M('wenjuan')->where("id=$id")->find();
		$tm=M('wenti')->where("wenjuanid=$id")->order("paixu desc")->select();
        $this->assign('wj',$wj);
		$this->assign('tm',$tm);
		//显示模板	
		$this->display('detials');
	}
    Public function rank(){
	    $id=$_GET['id'];
		$wj=M('wenjuan')->where("id=$id")->find();
		$pm=M('paiming')->where("wenjuanid=$id")->order("score desc")->select();
		$this->assign('wj',$wj);
		$this->assign('pm',$pm);
		//显示模板	
	    $this->display('rank');
	}
	Public function submit(){
        if(!$_SESSION[C('USER_AUTH_KEY_F')]){
			$this->error("请先登陆");
		}
	    $wenjuanid=$_POST['id'];
		$wj=M('wenjuan')->where("id=$wenjuanid")->find();
		$data=M('wenti')->where("wenjuanid=$wenjuanid")->order("paixu desc")->select();
		$count=M('wenti')->where("wenjuanid=$wenjuanid")->count();
		$i=0;
		$score=0;
		
		 foreach ($data as $key=>$value){
		   $id=$data[$key]["id"];
           $ans=$_POST[$id];
		   $rightans=$data[$key]["ans"];
		   $wentifenshu=$data[$key]["wentifenshu"];
		   if($ans==$rightans){
		   $i=$i+1;
		   $score+=$wentifenshu;}
		   $data[$key]["ans2"]=$ans;
		   $data[$key]["wentifenshu"]=$score;
          }
        
        $model = M('paiming');
		$userid=$_SESSION[C('USER_AUTH_KEY_ID')];
		$result=$model->where("dtrid =$userid and wenjuanid=$wenjuanid")->find();
		if($result==0)
		{
        $model->create();
		$model->wenjuanid=$wenjuanid;
		$model->dtr=$_SESSION[C('USER_AUTH_KEY_F')];
		$model->dtrid=$userid;
		$model->score=$score;
		$model->add();
		} 
		else
        {
		$this->error("你已经答过了");
        }
		$this->assign('data',$data);
		$this->assign('count',$count);
		$this->assign('right',$i);
		$this->assign('score',$score);
		$this->assign('wj',$wj);
		//显示模板	
		$this->display('did');
	}
	
}
