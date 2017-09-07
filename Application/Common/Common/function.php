<?php
use Think\Controller;
use JPush\Model as M;
use JPush\JPushClient;
use JPush\Exception\APIConnectionException;
use JPush\Exception\APIRequestException;

	/** 
 	* 验证码检查 
    */  
	function check_verify($code, $id = ""){  
	    $verify = new \Think\Verify();  
	    return $verify->check($code, $id);  
	}  
	/**
	 * 弹窗并返回
	 * @param unknown $_info
	 */
	function _alert_back($_info){
		echo '<html>';
		echo '<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>';
		echo "<script type='text/javascript'>alert('$_info');history.back();</script>";
		echo '</html>';
		exit();
	}
	/**
	 * 弹窗
	 * @param unknown $_info
	 */
	function _alert($_info){
		echo '<html>';
		echo '<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>';
		echo "<script type='text/javascript'>alert('$_info')</script>";
		echo '</html>';
	}
	
	/**
	 *  转义 SQL 语句中使用的字符串中的特殊字符
	 * @param unknown $_string
	 * @return unknown|string
	 */
	function _mysql_string($_string){
		if (GPC){
			return $_string;
		}else {
			return mysql_real_escape_string($_string);
		}
	}
	/**
	 *  转义 SQL 语句中使用的字符串中的特殊字符 不准为空
	 * @param unknown $_string
	 * @return unknown|string
	 */
	function _mysql_string_nonull($_string, $_name){
		if ($_string == null){
			_alert_back($_name."不能为空！！！");
		}else {
			if (GPC){
				return $_string;
			}else {
				return mysql_real_escape_string($_string);
			}
		}
	}
	
?>