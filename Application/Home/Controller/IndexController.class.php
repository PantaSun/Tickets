<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
    	$this->display('login');
    }
    /**
     * 登录验证
     */
    public  function loginCheck(){
    	if (!IS_POST){
    		$this->error("页面不存在！！！");
    	}else{
    		$username = _mysql_string_nonull(I('post.username'),'账号');
    		$password = _mysql_string_nonull(I('post.password'),'密码');
    		$user = M('user')->where('user_name='.'\''.$username.'\'')->find();
    		if($user){
    			if($user['user_password'] == md5(sha1($password))){
    				$shop = M('shop')->where('shop_name='.'\''.$user['user_shop_name'].'\'')->find();
    				session('username2',$username);
    				session('shop_name',$shop['shop_name']);
    				$this->success('恭喜你！登陆成功！',U('Show/index'));
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
    
    	session('username2',null);
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
    /**
     * 修改数据库中密码
     */
    public function modifyUserPassword(){
    	if (!IS_POST){
    		$this->error("页面不存在！！！");
    	}else{
    		$username = _mysql_string(session('username2'),'账号');
    		$password = _mysql_string_nonull(I('post.newpassword'),'密码');
    		$notpassword = _mysql_string_nonull( I('post.notpassword'), '密码确认');
    		//_alert_back(I('post.shop_id'));
    		$info = array(
    				"user_name" 		        => _check_username($username),
    				"user_password" 		=> md5(_check_password($password,$notpassword))
    		);
    		if(M('user')->where('user_name='.'\''.$username.'\'')->save($info)){
    			$this->success("修改成功！",U('Index/modifypassword'));
    		}else {
    			_alert_back("修改失败！");
    		}
    	}
    }
}