<?php  
/**
 * 前台登陆注册
 * @author  <[l@easycms.cc]>
 */
class LoginaAction extends Action{
	//空操作
	public function _empty(){
		$this->redirect("Index/Index/index");
	}

	Public function _initialize(){
   		// 控制器初始化方法
   		// 判断是否手机访问
   		if (ismobile()) {
            C('DEFAULT_THEME','mobile');
        }
	}


	public function index(){
	    $wjid=$_GET['id'];
		$this->assign("wjid",$wjid);
		$this->display('login');
	}
	public function checkLogin(){
	    $wjid=$_POST["wjid"];
		
		if($_SESSION["verify"]!=md5($_POST['code'])){
			$this->error("验证码错误");
		}
		$User = M("Member_user"); 
		if (!$User->create()){
			 $this->error(($User->getError()));
		}else{
		$name=$User->create();
		$where['username']=$name['username'];
		$where['password']=md5($name['password']);
		$result =$User->where($where)->find();
		if($result['islock']==1){
			$this->error('您的账号已经被管理锁定，请联系管理员',U('Login/index'));
		}
		if($result!=null){
			$_SESSION[C('USER_AUTH_KEY_F')]=$result['username'];
			$_SESSION[C('USER_AUTH_KEY_ID')]=$result["user_id"];
			$this->success('登陆成功',"/index.php/index/Wj/detials/id/".$wjid);
		}else{
			$this->error('登陆失败',"/index.php/index/Wj/detials/id/".$wjid);
		}
	}
}

public function checkreg(){
		$wjid=$_GET['id'];
		$this->assign("wjid",$wjid);
		$this->display('checkreg');
}
public function checkregs(){
		$wjid=$_POST["wjid"];
    
		if($_SESSION["verify"]!=md5($_POST['code'])){
			$this->error("验证码错误");
		}
		$User = D("Member_user"); 
		$result=$User->create();
		if (!$result){
			 $this->error(($User->getError()));
		}else{
			$addresult=$User->where($result)->add();
			if($addresult>0){
				$_SESSION[C('USER_AUTH_KEY_F')]=$result['username'];
				$_SESSION[C('USER_AUTH_KEY_ID')]=$addresult;
				$this->success('注册成功',"/index.php/index/Wj/detials/id/".$wjid);
			}else{
				$this->error('注册失败',"/index.php/index/Wj/detials/id/".$wjid);
			}
		}
}

public function verify(){
		import('ORG.Util.Image');
		Image::buildImageVerify();
	}	

public function doLogout(){
		//清除前台的服务端的session值
		unset($_SESSION[C('USER_AUTH_KEY_F')]);
		unset($_SESSION[C('USER_AUTH_KEY_ID')]);
		$this->success('退出成功',U('Index/Index/index'));
	}


}
