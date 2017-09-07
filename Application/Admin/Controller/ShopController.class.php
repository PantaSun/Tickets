<?php
namespace Admin\Controller;
use Think\Controller;
class ShopController extends Controller {
//     public function index(){
//         $this->display();
//     }

    /**
     * 向数据库添加门店
     */
    public function add(){
    	if (!IS_POST){
    		$this->error("非法操作！！！");
    	}else{
    	  $shopname = _mysql_string_nonull(I('post.shop_name'),'门店名称');
    	  $info = array(
    				"shop_name"     => $shopname,
    	  			"shop_limit"       =>_mysql_string(I('post.limit'))          
    		);
    	  
    	  $inforecord = array(
    	  		"sm_object" 		        => 1,
    	  		"sm_type" 		            => 1,
    	  		"sm_before"              => '新建门店',
    	  		"sm_after"                 =>'上限'._mysql_string(I('post.limit')).'人',
    	  		"sm_time"                 => date('Y-m-d H:i:s',time()),
    	  		"sm_shop_name"     =>$shopname
    	  );
    	  if(M('shop')->where('shop_name='.'\''.$info["shop_name"].'\'')->find()){
    			_alert_back("该门店已经被添加了哦！");
    		}  	
    	
    	  if (M('shop')->add($info) && M('sm_modify')->add($inforecord)){
    			_alert_back("添加成功！");
    	  }else {
    			_alert_back("由于未知原因添加失败，请重试，若多次发生此类错误请联系程序员！");
    		}
    	}
    }
    /**
     * 列表显示所有门店信息
     */
    public function allShop(){
    	if (session('username') == null){
    		$this->error("非法操作！！！");
    	}else {
    	$shop = M('shop'); // 实例化User对象
    	import('ORG.Util.Page');// 导入分页类
    	$count      = $shop->where('shop_auth=1')->count();// 查询满足要求的总记录数
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
    	$list = $shop->where('shop_auth=1')->order('shop_id DESC')->limit($Page->firstRow.','.$Page->listRows)->select();
    	$id = 1;
    	$this->assign('id',$id);
    	$this->assign('list',$list);// 赋值数据集
    	$this->assign('page',$show);// 赋值分页输出
    	$this->display(); // 输出模板
    	}
    }
    /**
     * 修改数据库门店名称
     */
    public function modifyName(){
    	if (!IS_POST){
    		$this->error("非法操作！！！");
    	}else{
    		$shopid = _mysql_string(I('post.shop_id'));
    		$newshopname = _mysql_string_nonull(I('post.new_shop_name'));
    		 $info = array(
    	 			"shop_id"                       => $shopid ,
    				"shop_name" 		        => $newshopname 			
    		);
    		 $shop = M('shop')->where('shop_id='.'\''.$shopid.'\'')->find();
    		 $inforecord = array(
    		 		"sm_object" 		        => 1,
    		 		"sm_type" 		            => 3,
    		 		"sm_before"              => $shop['shop_name'],
    		 		"sm_after"                 => $newshopname,
    		 		"sm_time"                 => date('Y-m-d H:i:s',time()),
    		 		"sm_shop_name"     => $newshopname
    		 );
    		if(M('shop')->where('shop_id='.'\''.$shopid.'\'')->save($info) && M('sm_modify')->add($inforecord)){
    			$this->success('修改成功！！！',U('Shop/allShop'));
    		}else {
    			_alert_back("修改失败！");
    		}
    	}
    }
    /**
     * 修改数据库门店上限人数
     */
    public function modifyLimit(){
    	if (!IS_POST){
    		$this->error("非法操作！！！");
    	}else{
    		$shopid = _mysql_string(I('post.shop_id'));
    		$shoplimit = _mysql_string(I('post.limit'));
    		$info = array(
    			"shop_id"                       => $shopid ,
    			"shop_limit" 		        => $shoplimit
    		);
    		$shop = M('shop')->where('shop_id='.'\''.$shopid.'\'')->find();
    		$inforecord = array(
    				"sm_object" 		        => 1,
    				"sm_type" 		            => 3,
    				"sm_before"              => "上限".$shop['shop_limit']."人",
    				"sm_after"                 =>"上限".$shoplimit."人",
    				"sm_time"                 => date('Y-m-d H:i:s',time()),
    				"sm_shop_name"     =>$shop['shop_name']
    		);
    		if(M('shop')->where('shop_id='.'\''.$shopid.'\'')->save($info) && M('sm_modify')->add($inforecord)){
    			$this->success('修改成功！！！',U('Shop/allShop'));
    		}else {
    			_alert_back("您并未作修改！");
    		}
    	}
    }
   
  /**
   *删除门店
   */
  public function deleteShop(){
  	if (IS_GET){
  		$shopname = _mysql_string(I('get.shop_name'));
  		$info = array(
  				"shop_name"    => $shopname,
  				"shop_auth"      => 2
  		);
  		$inforecord = array(
  				"sm_object" 		        => 1,
  				"sm_type" 		            => 2,
  				"sm_before"              =>$shopname,
  				"sm_after"                 =>"门店已被删除",
  				"sm_time"                 => date('Y-m-d H:i:s',time()),
  				"sm_shop_name"     =>$shopname
  		);
  		if (M('shop')->where('shop_name='.'\''.$shopname.'\'')->save($info) && M('sm_modify')->add($inforecord)){
  			$this->success('删除成功！',U('allShop'));
  		}else {
  			_alert_back("删除失败！");
  		}
  	}else {
  		_alert_back("非法操作！！！");
  	}
  }
}