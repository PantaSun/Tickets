<?php
namespace Home\Controller;
use Think\Controller;
class ShowController extends Controller {
    public function index(){
    	if (session('username2') == null){
    		$this->error("非法操作！！！");
    	}else {
    	date_default_timezone_set('Asia/Shanghai');
    	$shopname = _mysql_string(session("shop_name"));
    	$now = date('Y-m-d H:i:s',time());
    	$nextweek = date("Y-m-d 00:00:00",strtotime("+1 week"));
    	//echo date('Y-m-d H:i:s',time());
    	//echo "一周后:".date("Y-m-d 00:00:00",strtotime("+1 week")). "<br>";
    	$todystamp = strtotime($tody);
    	$shop = M('shop')->where('shop_name='.'\''.$shopname.'\'')->find();
    	$tasting = M('tasting')->where('tasting_shop_name='.'\''.$shopname.'\''.'and tasting_datetime >='.'\''.$now.'\''.'and tasting_datetime <'.'\''.$nextweek.'\''.'and tasting_auth=1')->select();
    	//print_r($tasting);
    	$timepoint = array();
    	$i = 0;
    	foreach($tasting as $key=>$value){
    		if (!(in_array($value['tasting_time'], $timepoint))){
    			$timepoint[$i] = $value['tasting_time'];
    			$i++;
    		}
    	}
    	//print_r(_time_getpao($timepoint));
    	$timepointsx = _time_getpao($timepoint);
    	$count = count($timepointsx);
    	$data = makeArray($count);
    	for ($i = 0;$i<7;$i++){		
    	   foreach($tasting as $key=>$value){
    			$date['date'][$i] =  date("Y-m-d",strtotime("+".$i." day"));
    
    			if (trim(substr( $value['tasting_datetime'], 0 , 11) )== $date['date'][$i]){
    					foreach ($timepointsx as $k=>$v){
    						if ($v == $value['tasting_time']){
    							$data[$i][$k]['tasting_count'] = $value['tasting_count'];
    							$data[$i][$k]['tasting_id'] = $value['tasting_id'];
    						}
    					}
    			}
    	   }
    	}
    }
    	
    	$count   = M('tasting')->where('tasting_shop_name='.'\''.$shopname.'\'')->count();
    	$weekarray=array("日","一","二","三","四","五","六");
    	for ($i = 0;$i<7;$i++){
    		$date['date'][$i] =  date("Y-m-d",strtotime("+".$i." day")); 
    		$date['week'][$i] =  $weekarray[date("w",strtotime("+".$i." day"))];
    	}
    	//print_r($data);
    	$this->assign("data",$data);
    	$this->assign("date",$date);
    	$this->assign("shop",$shop);
    	$this->assign("timepoint",$timepointsx);
    	$this->assign("tasting",$tasting);
    	$this->display();
    }
 
    /**
     * 列表
     */
    public function showTockets(){
    	
    }
}