<?php

/* 导出超级管理员操作记录excel函数*/
function pushSM($data,$name='Excel'){
	error_reporting(E_ALL);
	date_default_timezone_set('Asia/Shanghai');
	import("Vendor.PHPExcel");
	$objPHPExcel = new \PHPExcel();

	/*以下是一些设置 ，什么作者 标题啊之类的*/
	$objPHPExcel->getProperties()->setCreator("pantasun")
	->setLastModifiedBy("pantasun")
	->setTitle("超级管理员修改记录数据EXCEL导出")
	->setSubject("超级管理员修改记录数据EXCEL导出")
	->setDescription("备份数据")
	->setKeywords("excel")
	->setCategory("result file");
	/*以下就是对处理Excel里的数据， 横着取数据，主要是这一步，其他基本都不要改*/
	$objPHPExcel->getActiveSheet()->setCellValue('A1', '记录ID');
	$objPHPExcel->getActiveSheet()->setCellValue('B1', '操作对象1-门店 2-销售员 3-品鉴会');
	$objPHPExcel->getActiveSheet()->setCellValue('C1', '操作方式1-新建 2-删除 3-修改');
	$objPHPExcel->getActiveSheet()->setCellValue('D1', '操作之前数量或门店');
	$objPHPExcel->getActiveSheet()->setCellValue('E1', '操作之后数量或门店');
	$objPHPExcel->getActiveSheet()->setCellValue('F1', '操作时间');
	$objPHPExcel->getActiveSheet()->setCellValue('G1', '所属门店');
	$i = 2;
	foreach($data as $item){
		$objPHPExcel->getActiveSheet()->setCellValue('A' . $i, $item['sm_id']);
		$objPHPExcel->getActiveSheet()->setCellValue('B' . $i, $item['sm_object']);
		$objPHPExcel->getActiveSheet()->setCellValue('C' . $i, $item['sm_type']);
		$objPHPExcel->getActiveSheet()->setCellValue('D' . $i, $item['sm_before']);
		$objPHPExcel->getActiveSheet()->setCellValue('E' . $i, $item['sm_after']);
		$objPHPExcel->getActiveSheet()->setCellValue('F' . $i, $item['sm_time']);
		$objPHPExcel->getActiveSheet()->setCellValue('G' . $i, $item['sm_shop_name']);
		
		$i ++;
	}
// 	foreach($data as $k => $v){
// 		$num=$k+1;
// 		$objPHPExcel->setActiveSheetIndex(0)
// 		//Excel的第A列，uid是你查出数组的键值，下面以此类推
// 		->setCellValue('A'.$num, $v['sm_id'])
// 		->setCellValue('B'.$num, $v['sm_object'])
// 		->setCellValue('C'.$num, $v['sm_type'])
// 		->setCellValue('D'.$num, $v['sm_before'])
// 		->setCellValue('E'.$num, $v['sm_after'])
// 		->setCellValue('F'.$num, $v['sm_time'])
// 		->setCellValue('G'.$num, $v['sm_shop_name']);
// 	}
	$objPHPExcel->getActiveSheet()->setTitle('User');
	$objPHPExcel->setActiveSheetIndex(0);
	header('Content-Type: application/vnd.ms-excel');
	header('Content-Disposition: attachment;filename="'.$name.'.xls"');
	header('Cache-Control: max-age=0');
	$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
	$objWriter->save('php://output');
	exit;
}
/* 导出销售员销售记录excel函数*/
function pushSalesman($data,$name='Excel'){
	error_reporting(E_ALL);
	date_default_timezone_set('Asia/Shanghai');
	import("Vendor.PHPExcel");
	$objPHPExcel = new \PHPExcel();

	/*以下是一些设置 ，什么作者 标题啊之类的*/
	$objPHPExcel->getProperties()->setCreator("pantasun")
	->setLastModifiedBy("pantasun")
	->setTitle("超级管理员修改记录数据EXCEL导出")
	->setSubject("超级管理员修改记录数据EXCEL导出")
	->setDescription("备份数据")
	->setKeywords("excel")
	->setCategory("result file");
	/*以下就是对处理Excel里的数据， 横着取数据，主要是这一步，其他基本都不要改*/
	$objPHPExcel->getActiveSheet()->setCellValue('A1', '记录ID');
	$objPHPExcel->getActiveSheet()->setCellValue('B1', '售票时间');
	$objPHPExcel->getActiveSheet()->setCellValue('C1', '销售员账号');
	$objPHPExcel->getActiveSheet()->setCellValue('D1', '所属门店');
	$objPHPExcel->getActiveSheet()->setCellValue('E1', '品鉴会ID');
	$objPHPExcel->getActiveSheet()->setCellValue('F1', '售前该品鉴会已售量');
	$objPHPExcel->getActiveSheet()->setCellValue('G1', '售后该品鉴会已售量');
	$i = 2;
	foreach($data as $item){
		$objPHPExcel->getActiveSheet()->setCellValue('A' . $i, $item['sr_id']);
		$objPHPExcel->getActiveSheet()->setCellValue('B' . $i, $item['sr_time']);
		$objPHPExcel->getActiveSheet()->setCellValue('C' . $i, $item['sr_salesman']);
		$objPHPExcel->getActiveSheet()->setCellValue('D' . $i, $item['sr_shop_name']);
		$objPHPExcel->getActiveSheet()->setCellValue('E' . $i, $item['sr_tasting_id']);
		$objPHPExcel->getActiveSheet()->setCellValue('F' . $i, $item['sr_salesbefore']);
		$objPHPExcel->getActiveSheet()->setCellValue('G' . $i, $item['sr_salesafter']);

		$i ++;
	}
	// 	foreach($data as $k => $v){
	// 		$num=$k+1;
	// 		$objPHPExcel->setActiveSheetIndex(0)
	// 		//Excel的第A列，uid是你查出数组的键值，下面以此类推
	// 		->setCellValue('A'.$num, $v['sm_id'])
	// 		->setCellValue('B'.$num, $v['sm_object'])
	// 		->setCellValue('C'.$num, $v['sm_type'])
	// 		->setCellValue('D'.$num, $v['sm_before'])
	// 		->setCellValue('E'.$num, $v['sm_after'])
	// 		->setCellValue('F'.$num, $v['sm_time'])
	// 		->setCellValue('G'.$num, $v['sm_shop_name']);
	// 	}
	$objPHPExcel->getActiveSheet()->setTitle('User');
	$objPHPExcel->setActiveSheetIndex(0);
	header('Content-Type: application/vnd.ms-excel');
	header('Content-Disposition: attachment;filename="'.$name.'.xls"');
	header('Cache-Control: max-age=0');
	$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
	$objWriter->save('php://output');
	exit;
}

/**
 * _check_username 检查和过滤用户名
 * @access public
 * @param string $string 受污染的用户名
 * @param int $min_num 最小长度
 * @param int $max_num 最大长度
 * @return string 过滤后的用户名
 */
function _check_username($_string){
	//去掉两边空格
	$_string = trim($_string);
	if (mb_strlen($_string,'utf-8')<6){
		_alert_back('用户账号长度不得小于6位！');
	}
	//限制敏感字符
	$_char_pattern='/[<>\'\"\ ]/';
	if (preg_match($_char_pattern, $_string)){
		_alert_back("用户账号不得包含特殊字符！");
	}
	//限制敏感用户名
	$_mg[0]='sunpengda';
	$_mg[1]='Pantasun';
	$_mg[2]='孙鹏达';
	//告诉用户哪些用户名无法注册
	foreach ($_mg as $value ){
		@$_mg_string.='['.$value.']'.'\n';
	}
	//采用绝对匹配
	if (in_array($_string, $_mg)){
		_alert_back($_mg_string.'以上敏感用户账号名不得注册');

	}

	return _mysql_string($_string);
}
/**
 * _check_password 验证密码
 * @access public
 * @param string $_first_pass
 * @param string $_end_pass
 * @param int $_min_num
 * @return string
 */
function  _check_password($_first_pass, $_end_pass){
	//判断密码
	if (strlen($_first_pass) <8){
		_alert_back('密码不得小于8位！');
	}
	//两次密码输入必须一致
	if ($_first_pass != $_end_pass){
		_alert_back('两次输入密码不一致！');
	}
	return _mysql_string(sha1($_first_pass));
}
/**
 * 检查价格相关格式
 * @param unknown $_string
 * @param unknown $_name
 * @return unknown|string
 */
function _check_price($_string, $_name){
	if (!(is_numeric($_string) && $_string > 0)){
		_alert_back($_name."未填写正确的数字！！！");
	}else {
		return _mysql_string($_string);
	}
}

/**
 * 返回商家邀请码，用来绑定微信
 * @param unknown $id
 * @return unknown|string
 */
function invitation($id){
	$time = time();
	$invitation = $time.$id;
	return _mysql_string($invitation);
}
/***
 *  检验折扣格式
 * @param unknown $discount
 */
function _check_discount($discount){
	
	$float1='/^\d\.?[0-9]$/';
	$float2='/^\d\.?[0-9][0-9]$/';
	$int = '/^\d$/';
	if ($discount == null){
		return $discount = null;
	}else {
		if (!(preg_match($float2, $discount) ||preg_match($float1, $discount) || preg_match($int, $discount))){
			_alert_back("折扣格式错误！");
		}elseif($discount >10 || $discount < 0){
			_alert_back("折扣值错误");
		}else {
			return _mysql_string($discount);
		}
	}
}
/**
 * 验证支付宝账号
 * @param unknown $_string
 * @return unknown|string
 */
function _check_alipay($_string){
	if (preg_match('/^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/', $_string) || preg_match('/1[34578]{1}\d{9}$/', $_string)){
		return _mysql_string($_string);
	}else {
		_alert_back("支付宝账号格式错误！！！");
	}
}
/**
 * 验证邮箱格式
 * @param unknown $_string
 */
function _check_email($_string){
	if (!preg_match('/^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/', $_string)){
		_alert_back('邮箱格式不正确！');
	}
}
/**
 * 检查手机号位数与格式是否正确
 * @param unknown $_string
 * @return unknown|string
 */
function _check_phone($_string){
	if (strlen($_string) != 11){
		_alert_back('手机号位数不正确！');
	}
	elseif (!preg_match('/1[34578]{1}\d{9}$/', $_string)){
		_alert_back('手机号格式不正确！');
	}
	return _mysql_string($_string);
}
/**
 * 检查是否为正整数
 * @param unknown $_string
 * @param unknown $_name
 * @return unknown|string
 */
function _check_number($_string, $_name){
	if (preg_match('/^\d+$/', $_string)){
		return _mysql_string($_string);
	}else {
		_alert_back($_name."填写的不是正确的数字！！！");
	}
}
/**
 * 检查是否为正整数
 * @param unknown $_string
 * @param unknown $_name
 * @return unknown|string
 */
function _is_number($_string){
	if (preg_match('/^\d+$/', $_string)){
		return true;
	}else {
		return false;
	}
} 
	
?>