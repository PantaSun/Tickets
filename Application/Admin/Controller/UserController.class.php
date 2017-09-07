<?php
namespace Admin\Controller;
use Think\Controller;
class UserController extends Controller {
//     public function index(){
//         $this->display();
//     }
    /**
     * 添加销售员
     */
    public function  addSalesman(){
     if (session('username') == null){
    	    	$this->error("非法操作！！！");
    	   }else {
    	    	$shop = M('shop')->where('shop_auth=1')->select();
    			$this->assign('list',$shop);
    			$this->display();
    	   }   	
    }
    /**
     * 向数据库添加销售员
     */
    public function add(){
    	if (!IS_POST){
    		$this->error("非法操作！！！");
    	}else{
    	  $username = _mysql_string_nonull(I('post.username'),'账号');
    	  $password = _mysql_string_nonull(I('post.password'),'密码');
    	  $notpassword = _mysql_string_nonull( I('post.notpassword'), '密码确认');
    	  //_alert_back(I('post.shop_id'));
    	  $info = array(
    				"user_name" 		        => _check_username($username),
    				"user_password" 		=> md5(_check_password($password,$notpassword)),
    	  			"user_shop_name"   =>_mysql_string(I('post.shop_name'))
    		);
    	  $inforecord = array(
    	  		"sm_object" 		        => 2,
    	  		"sm_type" 		            => 1,
    	  		"sm_before"              => '不属于任何门店',
    	  		"sm_after"                 =>_mysql_string(I('post.shop_name')),
    	  		"sm_time"                 => date('Y-m-d H:i:s',time()),
    	  		"sm_shop_name"     =>_mysql_string(I('post.shop_name'))
    	  		);
    	  
    	  if(M("user")->where('user_name='.'\''.$info["user_name"].'\'')->find()){
    			_alert_back("该账号已经被添加了哦！");
    		}  	
    	
    	  if (M('user')->add($info) && M('sm_modify')->add($inforecord)){
    			_alert_back("添加成功！");
    	  }else {
    			_alert_back("由于未知原因添加失败，请重试，若多次发生此类错误请联系程序员！");
    		}
    	}
    }
    /**
     * 列表显示所有销售员信息
     */
    public function allSalesman(){
    	if (session('username') == null){
    		$this->error("非法操作！！！");
    	}else {
    	$salesman = M('user'); // 实例化User对象
    	import('ORG.Util.Page');// 导入分页类
    	$count      = $salesman->where('user_auth=1')->count();// 查询满足要求的总记录数
    	$Page       = new \Think\Page($count,8);// 实例化分页类 传入总记录数和每页显示的记录数
    	$Page -> setConfig('header','共%TOTAL_ROW%条');
    	$Page -> setConfig('first','首页');
    	$Page -> setConfig('last','共%TOTAL_PAGE%页');
    	$Page -> setConfig('prev','上一页');
    	$Page -> setConfig('next','下一页');
    	$Page -> setConfig('link','indexpagenumb');//pagenumb 会替换成页码
    	$Page -> setConfig('theme','%HEADER% %FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%');
    	$show       = $Page->show();// 分页显示输出
    	// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
    	$list = $salesman->where('user_auth=1')->order('user_id DESC')->limit($Page->firstRow.','.$Page->listRows)->select();
    	$id = 1;
    	$this->assign('id',$id);
    	$this->assign('list',$list);// 赋值数据集
    	$this->assign('page',$show);// 赋值分页输出
    	$this->display(); // 输出模板
    	}
    }
    /**
     * 修改销售员信息，查找界面
     */
    public  function selectSalesman(){
     if (session('username') == null){
    	    	$this->error("非法操作！！！");
    	   }else {
    			$this->display();
    	   }   	
    }
    /**
     * 修改数据库账号信息
     */
    public function modify(){
    	if (!IS_POST){
    		$this->error("非法操作！！！");
    	}else{
    	$username = _mysql_string(I('post.username'));
    	$password = _mysql_string(I('post.password'));
    	$notpassword = _mysql_string(I('post.notpassword'));
    	 $info = array(
    				"user_name" 		        => _check_username($username)
    	  			
    		);
    	 $user = M('user')->where('user_name='.'\''.$username.'\'')->find();
    	 $inforecord = array(
    	 		"sm_object" 		        => 2,
    	 		"sm_type" 		            => 3,
    	 		"sm_before"              => $user['user_shop_name'],
    	 		"sm_after"                 =>_mysql_string(I('post.shop_name')),
    	 		"sm_time"                 => date('Y-m-d H:i:s',time()),
    	 		"sm_shop_name"     =>_mysql_string(I('post.shop_name'))
    	 );
    	if ($password != null){
    		$info["user_password"] = md5(_check_password($password,$notpassword));
    	}
    		
      	if ($user['user_shop_name'] != _mysql_string(I('post.shop_name'))){   	
      		$info["user_shop_name"] = _mysql_string(I('post.shop_name'));
     	}
    	if((M('user')->where('user_name='.'\''.$username.'\'')->save($info)) && M('sm_modify')->add($inforecord)){
    		$this->success('修改成功！！！',U('allSalesman'));
    	}else {
    		_alert_back("您未做任何修改！");
    	}
    	}
    }
    /**
     * 从数据库查找账号
     */
  	public function modifySalesman(){
  		if (!IS_POST){
  			$this->error("非法操作！！！");
  		}else{
  		$username = _mysql_string_nonull(I('post.username'), "账号");
  		$user = M('user');
  		$shop = M('shop')->where('shop_auth=1')->select();
  		if ($user->where('user_name='.'\''.$username.'\'')->find()){
  			$info = $user->where('user_name='.'\''.$username.'\'')->find();
  		}else {
  			_alert_back("该账号不存在！");
  		}
  		$this->assign("user",$info);
  		$this->assign("shop",$shop);
  		$this->display();
  		}
  }
  /**
   *删除账号
   */
  public function deleteSalesman(){
  		if (IS_GET){
  			$username = _mysql_string(I('get.username'));
  			$info = array(
    				"user_name" 		        => _check_username($username),
    	  			"user_auth"   => 2
    		);
  			$user = M('user')->where('user_name='.'\''.$username.'\'')->find();
  			$inforecord = array(
  					"sm_object" 		        => 2,
  					"sm_type" 		            => 2,
  					"sm_before"              => $user['user_shop_name'],
  					"sm_after"                 =>'不属于任何门店',
  					"sm_time"                 => date('Y-m-d H:i:s',time()),
  					"sm_shop_name"     => $user['user_shop_name']
  			);
  			if ((M('user')->where('user_name='.'\''.$username.'\'')->save($info)) && M('sm_modify')->add($inforecord)){
  				$this->success('删除成功！',U('allSalesman'));
  			}else {
  				_alert_back("shibai");
  			}
  		}
  }
}