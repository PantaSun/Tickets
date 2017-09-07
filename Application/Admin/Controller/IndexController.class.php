<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
        $this->display('login');
    }
    /**
     * 登录检测
     */
    public  function loginCheck(){
    	if (!IS_POST){
    		$this->error("页面不存在！！！");
    	}else{
    		$username = _mysql_string_nonull(I('post.username'),'账号');
    		$password = _mysql_string_nonull(I('post.password'),'密码');
    		$user = M('supermanager')->where('user_name='.'\''.$username.'\'')->find();
    		if($user){
    			if($user['user_password'] == md5(sha1($password))){
    				session('username',$username);		
    				$this->success('恭喜你！登陆成功！',U('Tasting/allTasting'));
    			}  else {
    				$this->error('账号与密码不匹配！！！请重试！！！');
    			}
    		}  else {
    			$this->error('账号不存在！！！请重试！！！');
    		}
    	}
    }
    /**
     * 退出
     */
    public function logout(){
    
    	session('username',null);
    	cookie(null);
    	$this->redirect('Index/index');     //注销成功，跳转至首页
    
    }
    /**
     * 修改密码
     */
    public function modifyPassword() {
        if (session('username') == null){
    		$this->error("非法操作！！！");
    	}else {
    	    $this->display();
    	}
    }
    public function modifySMPassword(){
    	if (!IS_POST){
    		$this->error("页面不存在！！！");
    	}else{
    		$username = _mysql_string(session('username'),'账号');
    		$password = _mysql_string_nonull(I('post.newpassword'),'密码');
    		$notpassword = _mysql_string_nonull( I('post.notpassword'), '密码确认');
    		//_alert_back(I('post.shop_id'));
    		$info = array(
    			"user_name" 		        => _check_username($username),
    			"user_password" 		=> md5(_check_password($password,$notpassword))
    		);
    		if(M('supermanager')->where('user_name='.'\''.$username.'\'')->save($info)){
    				$this->success("修改成功！",U('Index/modifypassword'));
    		}else {
    				_alert_back("修改失败！");
    		}
    	}
    }
    public function pushSMExcel(){
    	if (session('username') == null){
    		_alert_back("非法操作！");
    	}else {
    		$this->display();
    	}
    }
    public function download(){
    	$flag = _mysql_string(I('post.flag'));
    	if ($flag == 1){
    		$data= M('sm_modify')->select();  //查出数据
			$name='超管记录';  //生成的Excel文件文件名
			pushSM($data,$name);
    	}elseif ($flag == 2){
    		$data= M('salesrecord')->select();  //查出数据
    		$name='销售记录';  //生成的Excel文件文件名
    		pushSalesman($data,$name);
    	}
    }
}