<?php
/**
* 前台首页
*/
class WjAction extends CommonAction
{ 
	Public function index(){
        $all=M('wenjuan')->order('id desc')->select();
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
	Public function submit(){
	    $id=$_POST['id'];
		$wj=M('wenjuan')->where("id=$id")->find();
		$data=M('wenti')->where("wenjuanid=$id")->order("paixu desc")->select();
		$count=M('wenti')->where("wenjuanid=$id")->count();
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
		$this->assign('data',$data);
		$this->assign('count',$count);
		$this->assign('right',$i);
		$this->assign('score',$score);
		$this->assign('wj',$wj);
		//显示模板	
		$this->display('did');
	}
	
}
