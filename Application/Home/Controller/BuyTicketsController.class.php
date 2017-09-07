<?php
namespace Home\Controller;
use Think\Controller;
class BuyTicketsController extends Controller {
  
    /**
     * 修改数据库中已售票数
     */
    public function buyTickets(){
    	if (IS_GET){
    		$tastingid = _mysql_string(I('get.tasting_id'));
    		$tasting = M('tasting')->where('tasting_id='.'\''.$tastingid.'\'')->find();
    		$inforecord = array(
    				"sr_time"             =>date('Y-m-d H:i:s',time()),
    				"sr_salesman"     =>session('username2'),
    				"sr_shop_name" =>$tasting['tasting_shop_name'],
    				"sr_tasting_id"     =>$tastingid,
    				"sr_salesbefore"    =>$tasting['tasting_count'],
    				"sr_salesafter"     =>$tasting['tasting_count']+1
     		);
    		if(M('tasting')->where('tasting_id='.'\''.$tastingid.'\'')->setInc('tasting_count') && M('salesrecord')->add($inforecord)){
//     			$tasting1 = M('tasting')->where('tasting_id='.'\''.$tastingid.'\'')->find();
//     			$inforecord['sr_salesafter'] = $tasting1['tasting_count'];
//     			if (M())
    			$this->success("购买成功！",U('Show/index'));
    		}else {
    			_alert_back("购买失败！");
    		}
    	}else {
    		_alert_back("非法操作！");
    	}
    }
}