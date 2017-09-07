<?php
/**
 * 返回全无矩阵
 * @param unknown $count
 * @return string
 */
function makeArray($count){
	for($i=0;$i<7;$i++){
		for ($j=0;$j<$count;$j++){
			$marray[$i][$j]['tasting_count']="无";
			$marray[$i][$j]['tasting_id']="无";
		}
	}
	return $marray;
}
/**
 * 时间点专用冒泡排序
 * @param unknown $arr
 * @return unknown
 */
function _time_getpao($arr)
{
	$len=count($arr);
	//设置一个空数组 用来接收冒出来的泡
	//该层循环控制 需要冒泡的轮数
	for($i=1;$i<$len;$i++)
	{ //该层循环用来控制每轮 冒出一个数 需要比较的次数
		for($k=0;$k<$len-$i;$k++)
		{
			if(strtotime('1970-01-01'.$arr[$k])>strtotime('1970-01-01'.$arr[$k+1]))
			{
				$tmp=$arr[$k+1];
				$arr[$k+1]=$arr[$k];
				$arr[$k]=$tmp;
			}
		}
	}
	return $arr;
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
	
?>