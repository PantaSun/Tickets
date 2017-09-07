<?php
namespace Admin\Controller;
use Think\Controller;
class ManagementController extends Controller {
	
    public function index(){
        $this->display();
    }
    /**
     * 添加超管
     */
    public function addSM(){
    	$this->display();
    }
    public function add(){
    	if (!IS_POST){
    		$this->error("页面不存在！！！");
    	}else{
    		$username = _mysql_string_nonull(I('post.username'),'账号');
    		$password = _mysql_string_nonull(I('post.password'),'密码');
    		$notpassword = _mysql_string_nonull( I('post.notpassword'), '密码确认');
    		//_alert_back(I('post.shop_id'));
    		$info = array(
    				"user_name" 		        => _check_username($username),
    				"user_password" 		=> md5(_check_password($password,$notpassword)),
    		);
    	 
    		if(M("supermanager")->where('user_name='.'\''.$info["user_name"].'\'')->find()){
    			_alert_back("该账号已经被添加了哦！");
    		}
    	 
    		if (M('supermanager')->add($info)){
    			_alert_back("添加成功！");
    		}else {
    			_alert_back("由于未知原因添加失败，请重试，若多次发生此类错误请联系程序员！");
    		}
    	}
    }
}