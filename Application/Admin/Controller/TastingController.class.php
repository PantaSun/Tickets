<?php
namespace Admin\Controller;

use Think\Controller;
class TastingController extends Controller {
	
// 	public function __construct(){
// 		if (session('username') == null){
// 			_alert_back("非法操作！！");
// 		}
// 	}	
//     public function index(){
//         $this->display();
//     }
    /**
     * 添加品鉴会
     */
    public function  addTasting(){
    	if (session('username') == null){
    		$this->error("非法操作！！！");
    	}else {
    		$shop = M('shop')->where('shop_auth=1')->select();
    		$this->assign('list',$shop);
    		$this->display();
    	}
    }
    /**
     * 批量添加连续品鉴会
     */
    public function  addAllTasting(){
    	if (session('username') == null){
    		$this->error("非法操作！！！");
    	}else {
     		$shop = M('shop')->where('shop_auth=1')->select();
     		$this->assign('list',$shop);
    		$this->display();
    	}
    }
    /**
     * 为所有门店添加品鉴会
     */
    public function  addAllShopTasting(){
    	if (session('username') == null){
    		$this->error("非法操作！！！");
    	}else {
    		$shop = M('shop')->where('shop_auth=1')->select();
    		$this->assign('list',$shop);
    		$this->display();
    	}
    }
    /**
     * 为部分门店添加品鉴会
     */
    public function  addPartShopTasting(){
    	if (session('username') == null){
    		$this->error("非法操作！！！");
    	}else {
    		$id = 1;
    		$shop = M('shop')->where('shop_auth=1')->select();
    		$this->assign('list',$shop);
    		$this->assign('id',$id);
    		$this->display();
    	}
    }
    /**
     * 向数据库为所有门店添加同一天品鉴会
     */
    public function addAllShop(){
    	if (!IS_POST){
    		$this->error("非法操作！！！");
    	}else{
    		$shop = M('shop')->where('shop_auth=1')->select();
    		//print_r($shop);
    		$shopcount = M('shop')->where('shop_auth=1')->count();
    		$tasting_date_y   = _mysql_string(I('post.date_y'));
    		$tasting_date_m  = _mysql_string(I('post.date_m'));
    		$tasting_date_d   = _mysql_string(I('post.date_d'));
    		$tasting_time_h   = _mysql_string(I('post.time_h'));
    		$tasting_time_m  = _mysql_string(I('post.time_m'));
    		$str1 =  _mysql_string(I('post.date_y')).'-'._mysql_string(I('post.date_m')).'-'._mysql_string(I('post.date_d')).' '._mysql_string(I('post.time_h')).':'._mysql_string(I('post.time_m')).':'.'00';
    		for ($i=0;$i<$shopcount;$i++){
    			$infos[]= array(
    					"tasting_shop_name" 		=> $shop[$i]['shop_name'],
    					"tasting_date_y" 		        => $tasting_date_y,
    					"tasting_date_m" 		        => $tasting_date_m,
    					"tasting_date_d" 		        => $tasting_date_d,
    					"tasting_time_h" 		        => $tasting_time_h,
    					"tasting_time_m" 		        => $tasting_time_m,
    					"tasting_time"                   => _mysql_string(I('post.time_h')).':'._mysql_string(I('post.time_m')).':'.'00',
    					"tasting_datetime"           => $str1
    			);
    		}
    		foreach ($shop as $v){
    			$str .=$v['shop_name'].'/';
    		}
    		$inforecord = array(
    				"sm_object" 		        => 3,
    				"sm_type" 		            => 1,
    				"sm_before"              => '新建'.$shopcount.'个时间为'.$str1.'的品鉴会',
    				"sm_after"                 => '新建'.$shopcount.'个时间为'.$str1.'的品鉴会',
    				"sm_time"                 => date('Y-m-d H:i:s',time()),
    				"sm_shop_name"     =>'涉及的门店：'.$str
    		);
    
    		if (M('tasting')->addAll($infos) && M('sm_modify')->add($inforecord) ){
    			$this->success("添加成功！",U('Tasting/allTasting'));
    
    		}else {
    			_alert_back("由于未知原因添加失败，请重试，若多次发生此类错误请联系程序员！".M('tasting')->getError());
    		}
    
    	}
    }
    /**
     * 向数据库为所有门店添加同一天品鉴会
     */
    public function addPartShop(){
    	if (!IS_POST){
    		$this->error("非法操作！！！");
    	}else{
    		$shopcount = M('shop')->where('shop_auth=1')->count();
    		for ($i=1;$i<=$shopcount;$i++){
    			if( I('post.'.$i) != null){
    				$shopname[]= I('post.'.$i);
    			}
    		}
    		if (empty($shopname)){
    			_alert_back("您没有先选中任何门店！");
    		}
    		$shop = M('shop')->where('shop_auth=1')->select();
    		//print_r($shop);
   
    		$tasting_date_y   = _mysql_string(I('post.date_y'));
    		$tasting_date_m  = _mysql_string(I('post.date_m'));
    		$tasting_date_d   = _mysql_string(I('post.date_d'));
    		$tasting_time_h   = _mysql_string(I('post.time_h'));
    		$tasting_time_m  = _mysql_string(I('post.time_m'));
    		$str1 =  _mysql_string(I('post.date_y')).'-'._mysql_string(I('post.date_m')).'-'._mysql_string(I('post.date_d')).' '._mysql_string(I('post.time_h')).':'._mysql_string(I('post.time_m')).':'.'00';
    		for ($i=0;$i<count($shopname);$i++){
    			$infos[]= array(
    					"tasting_shop_name" 		=> $shopname[$i],
    					"tasting_date_y" 		        => $tasting_date_y,
    					"tasting_date_m" 		        => $tasting_date_m,
    					"tasting_date_d" 		        => $tasting_date_d,
    					"tasting_time_h" 		        => $tasting_time_h,
    					"tasting_time_m" 		        => $tasting_time_m,
    					"tasting_time"                   => _mysql_string(I('post.time_h')).':'._mysql_string(I('post.time_m')).':'.'00',
    					"tasting_datetime"           => $str1
    			);
    		}
    		foreach ($shopname as $v){
    			$str .=$v.'/';
    		}
    		$inforecord = array(
    				"sm_object" 		        => 3,
    				"sm_type" 		            => 1,
    				"sm_before"              => '新建'.count($shopname).'个时间为'.$str1.'的品鉴会',
    				"sm_after"                 => '新建'.count($shopname).'个时间为'.$str1.'的品鉴会',
    				"sm_time"                 => date('Y-m-d H:i:s',time()),
    				"sm_shop_name"     =>'涉及的门店：'.$str
    		);
    
    		if (M('tasting')->addAll($infos) && M('sm_modify')->add($inforecord) ){
    			$this->success("添加成功！",U('Tasting/allTasting'));
    			 
    		}else {
    			_alert_back("由于未知原因添加失败，请重试，若多次发生此类错误请联系程序员！".M('tasting')->getError());
    		}
    
    	}
    }
    /**
     * 向数据库批量添加品鉴会
     */
    public function addAll(){
    	//_alert_back(I('post.shop_id'));
    	if (!IS_POST){
    		$this->error("非法操作！！！");
    	}else{
    		$daycount = _mysql_string(I('post.day_count'));
    		$tasting_date_y   = _mysql_string(I('post.date_y'));
    		$tasting_date_m  = _mysql_string(I('post.date_m'));
    		$tasting_date_d   = _mysql_string(I('post.date_d'));
    		$tasting_time_h   = _mysql_string(I('post.time_h'));
    		$tasting_time_m  = _mysql_string(I('post.time_m'));
    		$daystamp = mktime($tasting_time_h,$tasting_time_m,0,$tasting_date_m,$tasting_date_d,$tasting_date_y);
    		for ($i=0;$i<$daycount;$i++){		
    			$nextday = date('Y-m-d H:i:s',$daystamp+60*60*24*$i);			
    			$infos[]= array(
    							"tasting_shop_name" 		=> _mysql_string_nonull(I('post.shop_name')),
    							"tasting_date_y" 		        => substr( date("Y-m-d h:i:s", strtotime($nextday)), 0 , 4),
    							"tasting_date_m" 		        => substr( date("Y-m-d h:i:s", strtotime($nextday)), 5 , 2),
    							"tasting_date_d" 		        => substr( date("Y-m-d h:i:s", strtotime($nextday)), 8 , 2),
    							"tasting_time_h" 		        => _mysql_string(I('post.time_h')),
    							"tasting_time_m" 		        => _mysql_string(I('post.time_m')),
    							"tasting_time"                   => _mysql_string(I('post.time_h')).':'._mysql_string(I('post.time_m')).':'.'00',
    							"tasting_datetime"           => $nextday
    			);
    		}
    		
    		$inforecord = array(
    				"sm_object" 		        => 3,
    				"sm_type" 		            => 1,
    				"sm_before"              => '新建'.$daycount.'个品鉴会',
    				"sm_after"                 =>'新建'.$daycount.'个品鉴会',
    				"sm_time"                 => date('Y-m-d H:i:s',time()),
    				"sm_shop_name"     =>_mysql_string_nonull(I('post.shop_name'))
    		);

    		if (M('tasting')->addAll($infos) && M('sm_modify')->add($inforecord) ){
    			$this->success("添加成功！",U('Tasting/allTasting'));
    			
    		}else {
    			_alert_back("由于未知原因添加失败，请重试，若多次发生此类错误请联系程序员！".M('tasting')->getError());
    		}

    	}
    }
    /**
     * 向数据库添加品鉴会
     */
    public function add(){
    	  //_alert_back(I('post.shop_id'));
    	if (!IS_POST){
    		$this->error("非法操作！！！");
    	}else{
    	 
    	  $info = array(
    				"tasting_shop_name" 		=> _mysql_string_nonull(I('post.shop_name')),
    				"tasting_date_y" 		        => _mysql_string(I('post.date_y')),
    	  			"tasting_date_m" 		        => _mysql_string(I('post.date_m')),
    	  			"tasting_date_d" 		        => _mysql_string(I('post.date_d')),
    	  			"tasting_week" 		            => _mysql_string(I('post.week')),
    	  			"tasting_time_h" 		        => _mysql_string(I('post.time_h')),
    	  			"tasting_time_m" 		        => _mysql_string(I('post.time_m')),
    	  			"tasting_time"                   => _mysql_string(I('post.time_h')).':'._mysql_string(I('post.time_m')).':'.'00',
    	  		    "tasting_datetime"           => _mysql_string(I('post.date_y')).'-'._mysql_string(I('post.date_m')).'-'._mysql_string(I('post.date_d')).' '._mysql_string(I('post.time_h')).':'._mysql_string(I('post.time_m')).':'.'00'
    		);    	  
    	  $inforecord = array(
    	  		"sm_object" 		        => 3,
    	  		"sm_type" 		            => 1,
    	  		"sm_before"              => '新建一个品鉴会',
    	  		"sm_after"                 =>'新建一个品鉴会',
    	  		"sm_time"                 => date('Y-m-d H:i:s',time()),
    	  		"sm_shop_name"     =>_mysql_string_nonull(I('post.shop_name'))
    	  );
    	
    	  if (M('tasting')->add($info) && M('sm_modify')->add($inforecord)){
    			$this->success("添加成功！",U('Tasting/addTasting'));
    	  }else {
    			_alert_back("由于未知原因添加失败，请重试，若多次发生此类错误请联系程序员！");
    		}
    	}
    }
    /**
     * 列表显示所有品鉴会信息
     */
    public function allTasting(){
    	if (session('username') == null){
    		$this->error("非法操作！！！");
    	}else {
    	$Tasting = M('tasting'); // 实例化User对象
    	import('ORG.Util.Page');// 导入分页类
    	$count      = $Tasting->where('tasting_auth=1')->count();// 查询满足要求的总记录数
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
    	$list = $Tasting->where('tasting_auth=1')->order('tasting_id DESC')->limit($Page->firstRow.','.$Page->listRows)->select();
    	$id = 1;
    	$this->assign('id',$id);
    	$this->assign('list',$list);// 赋值数据集
    	$this->assign('page',$show);// 赋值分页输出
    	$this->display(); // 输出模板
    	}
    }
   

    /**
     * 从数据库修改品鉴会已售票数
     */
  	public function modifyCount(){
  		if (!IS_POST){
  			$this->error("非法操作！！！");
  		}else{
  		   $tastingid = _mysql_string(I('post.tasting_id'));
  		   $tastingcount = _mysql_string(I('post.new_tasting_count'));
  		   if (!_is_number($tastingcount)){
  		   		$this->error("修改失败，请填写正整数！！",U('Tasting/allTasting'));
  		   }
   			$info = array(
    				"tasting_id" 		=>$tastingid ,
     	  			"tasting_count"   => $tastingcount
   		   );
   			$tasting = M('tasting')->where('tasting_id='.'\''.$tastingid.'\'')->find();
   			$inforecord = array(
   					"sm_object" 		        => 3,
   					"sm_type" 		            => 3,
   					"sm_before"              => "已售：".$tasting['tasting_count'],
   					"sm_after"                 => "已售：".$tastingcount,
   					"sm_time"                 => date('Y-m-d H:i:s',time()),
   					"sm_shop_name"     =>$tasting['tasting_shop_name']
   			);
  			if (M('tasting')->where('tasting_id='.'\''.$tastingid.'\'')->save($info) && M('sm_modify')->add($inforecord)){
  				$this->success('修改成功！',U('Tasting/allTasting'));
  			}else {
  				_alert_back("修改失败！");
  			}
  		}
  }
  /**
   *删除品鉴会
   */
   public function deleteTasting(){
  		if (IS_GET){
  			$tastingid = _mysql_string(I('get.tasting_id'));
   			$info = array(
    				"tasting_id" 		=>$tastingid ,
     	  			"tasting_auth"   => 2
   		   );
   			$tasting = M('tasting')->where('tasting_id='.'\''.$tastingid.'\'')->find();
   			$inforecord = array(
   					"sm_object" 		        => 3,
   					"sm_type" 		            => 2,
   					"sm_before"              => '品鉴会ID：'.$tastingid,
   					"sm_after"                 =>'本品鉴会已经被删除',
   					"sm_time"                 => date('Y-m-d H:i:s',time()),
   					"sm_shop_name"     =>$tasting['tasting_shop_name']
   			);
  			if (M('tasting')->where('tasting_id='.'\''.$tastingid.'\'')->save($info) && M('sm_modify')->add($inforecord)){
  				$this->success('删除成功！',U('Tasting/allTasting'));
  			}else {
  				_alert_back("删除失败！");
  			}
  		}
  }
  /**
   *批量删除品鉴会
   */
  public function deleteTastings(){
  	if (!IS_POST){
  		$this->error("非法操作！！！");
  	}else{
  		for ($i=1;$i<=8;$i++){
  			if( I('post.'.$i) != null){
  				$deleteid[]= I('post.'.$i);
  			}
  		}
  		if (empty($deleteid)){
  			_alert_back("您没有先选中任何品鉴会！");
  		}
  		$tasting = M('tasting')->where('tasting_id='.'\''.$deleteid[0].'\'')->find();
  		$str2= $tasting['tasting_shop_name'];
  		$str3[0]= $tasting['tasting_shop_name'];
  		for ($i=0;$i<count($deleteid);$i++){
  			$tasting = M('tasting')->where('tasting_id='.'\''.$deleteid[$i].'\'')->find();
  			$str .="ID:".$deleteid[$i].'/';
  			if (!in_array($tasting['tasting_shop_name'],$str3)){
  				$str2 .=$tasting['tasting_shop_name'].'/';
  				$str3[$i+1] = $tasting['tasting_shop_name'];
  			}
  			
  		}
  		$inforecord = array(
  				"sm_object" 		        => 3,
  				"sm_type" 		            => 2,
  				"sm_before"              => "删除的有".$str,
  				"sm_after"                 =>count($deleteid).'个品鉴会已经被删除',
  				"sm_time"                 => date('Y-m-d H:i:s',time()),
  				"sm_shop_name"     =>"涉及的门店：".$str2
  		);
  		$where['tasting_id'] = array('in',$deleteid);
  		$data['tasting_auth'] = 2;
  		if(M('tasting')->where($where)->save($data) && M('sm_modify')->add($inforecord)){
  			$this->success("删除成功！",U('Tasting/allTasting'));
  		}else {
  			_alert_back("修改失败！");
  		}
 	 }
  }
}