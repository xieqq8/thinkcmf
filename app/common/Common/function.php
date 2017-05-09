<?php

function subtitle($String,$Length,$dian="") {  
	if (mb_strwidth($String, 'UTF8') <= $Length ){   
		return $String;   
	}else{   
		$I = 0;   
		$len_word = 0;   
		while ($len_word < $Length){   
		$StringTMP = substr($String,$I,1);   
		if ( ord($StringTMP) >=224 ){   
			$StringTMP = substr($String,$I,3);   
			$I = $I + 3;   
			$len_word = $len_word + 2;   
		}elseif( ord($StringTMP) >=192 ){   
			$StringTMP = substr($String,$I,2);   
			$I = $I + 2;   
			$len_word = $len_word + 2;   
		}else{   
			$I = $I + 1;   
			$len_word = $len_word + 1;   
		}   
		$StringLast[] = $StringTMP;   
		}   
		/* raywang edit it for dirk for (es/index.php)*/   
		if (is_array($StringLast) && !empty($StringLast)){   
			$StringLast = implode("",$StringLast);   
			$StringLast .= $dian;
		}   
		return $StringLast;    
	}    
}//截取字符串 

function base64url_encode($data) {
  return rtrim(strtr(base64_encode($data), '+/', '-_'), '=');
} //base64 加密


function base64url_decode($data) { 
  return base64_decode(str_pad(strtr($data, '-_', '+/'), strlen($data) % 4, '=', STR_PAD_RIGHT)); 
} //base64 解密

function ordercode($str=''){
	$year_code = array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');
	$order_sn = $year_code[intval(date('Y'))-2016].strtoupper(dechex(date('m'))).date('d').substr(time(),-5).substr(microtime(),2,5).sprintf('%02d',rand(0,99));
	return $str.$order_sn;
}//创建订单号

function checkSign($sign){
	$new_sign = sha1(md5(date("YmdHi").'&%@$Xi168'));
	$new_sign2 = sha1(md5(date('YmdHi',strtotime('-1 minute')).'&%@$Xi168'));
	$new_sign3 = sha1(md5(date('YmdHi',strtotime('+1 minute')).'&%@$Xi168'));
	if($new_sign == $sign || $new_sign2 == $sign || $new_sign3 == $sign){
		return true;
	}else{
		return false;
	}
}//验证签名

function curl_post($url, $post) {
	$options = array(
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_HEADER         => false,
		CURLOPT_POST           => true,
		CURLOPT_POSTFIELDS     => $post,
	);

	$ch = curl_init($url);
	curl_setopt_array($ch, $options);
	$result = curl_exec($ch);
	curl_close($ch);
	return $result;
}//CURL post
//$url = 'http://222.73.117.156/msg/HttpBatchSendSM';
//$data = 'account=kuaxuew&pswd=Kxw123123&mobile='.$mobile.'&msg='.$msg.'&needstatus=true';
//$result = curl_post($url,$data);

function HttpBatchSendSM($mobile,$msg){
	$url = 'http://222.73.117.169/msg/HttpBatchSendSM';
	$data = 'account=N4421871&pswd=Ps11d696&mobile='.$mobile.'&msg='.$msg.'&needstatus=true';
// 	$url = 'http://222.73.117.156/msg/HttpBatchSendSM';
// 	$data = 'account=kuaxuew&pswd=Kxw123123&mobile='.$mobile.'&msg='.$msg.'&needstatus=true';
	$result = curl_post($url,$data);
	$rearray = explode(",",$result);
	$rearray = explode("\n",$rearray[1]);
	return $rearray[0]; // 20150908131342,0 1000908131342159300
}//创蓝 短信发送

function classname($id){
	$find = M("class")->where("id='$id'")->field("name")->find();
	return $find[name];
}

function checkSign2($sign , $username){
	$new_sign = sha1(md5(date("YmdHi").'&%@$Xi768'.$username));
	$new_sign2 = sha1(md5(date('YmdHi',strtotime('-1 minute')).'&%@$Xi768'.$username));
	$new_sign3 = sha1(md5(date('YmdHi',strtotime('+1 minute')).'&%@$Xi768'.$username));
	if($new_sign == $sign || $new_sign2 == $sign || $new_sign3 == $sign){
		return true;
	}else{
		return false;
	}
}//验证签名2，增加username即手机号

function replace_alip($url){
	$url_ar = explode("?",$url);
	return $url_ar[0];
}//去掉阿里云问号后面的字符串 http://oss-cn-qingdao.aliyuncs.com/painting/image_resource/2016-07/2ACC0B21A19C7FBA2CD6C85092E4A0CB.jpg?uploadId=808BF790E0EF4B3F8051EBEF0D4ED98D


function uploadfile($files , $imgName='' , $imaup = '' , $object='class',$newwidth=800){ //上传剪切图片
	if(empty($files["name"])){
		$imagesrc = $imaup;
	}else{
		$ext =pathinfo($files['name'], PATHINFO_EXTENSION); //后缀
		$upload_path = '/Uploads/attached/';
		$upload = new \Think\Upload();// 实例化上传类
		$upload->maxSize   =     993145728 ;// 设置附件上传大小
		$upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
		$upload->rootPath  =     '.'.$upload_path; // 设置附件上传根目录
		$upload->savePath  =     ''; // 设置附件上传（子）目录
		$upload->subName   = ''; //子目录创建方式，[0]-函数名，[1]-参数，多个参数使用数组
		$retuimg = $upload->upload();// 上传文件
		if($retuimg){
			$uploadf = '.'.$upload_path;
			$img_url = $retuimg[$imgName]['savepath'] . $retuimg[$imgName]['savename'];
			$image = new \Think\Image();//实例化图片处理类
			$url = $uploadf . $img_url;
			$new_ext = '.'.$ext;
			$img_name = str_replace($new_ext, "_", $img_url);//替换图片名字
			$image->open($url);//打开图片
			$name = $uploadf . $img_name . 'thumb'.$new_ext;
			$width = $image->width(); // 返回图片的宽度
			$height = $image->height(); // 返回图片的高度
			$pre = $newwidth/$width;
			$newheight = ceil($height*$pre);
			if ($image->thumb($newwidth, $newheight)->save($name))//生成缩略图,并保存
			{
				$thumb = $img_name . 'thumb'.$new_ext;
			}
			$Oss = new \Think\Oss();
			$parameter = array(
				'maxSize'	=> 2000000,
				'exts'		=> array('jpg', 'gif', 'png', 'jpeg'),
				'filepath'	=> $object.'/'.date('Y-m',time()).'/'
			);
			$size = filesize($name);
			$new_files = array(
				'name'      => $thumb,
				'size'      => $size,
				'tmp_name'  => $name
			);
			$result = $Oss->upload($new_files,$parameter);
			if($result['code'] == 1){
				$imagesrc = $result['src'];
				if($imaup){
					$Oss->delete($imaup);
				}
				@unlink($uploadf.$img_url);
				@unlink($name);
			}else{
				return false;
			}
		}else{
			return false;
		}
	}
	return $imagesrc;
}
//---------------------------------------------------------------添加缩略图


function uploadfile2($files,  $imaup = '', $object='class'){ //上传剪切图片
	if(empty($files["name"])){
		$imagesrc = $imaup;
	}else{
		$Oss = new \Think\Oss();
		$parameter = array(
				'maxSize'	=> 2000000,
				'exts'		=> array('jpg', 'gif', 'png', 'jpeg'),
				'filepath'	=> $object.'/'.date('Y-m',time()).'/'
		);
		$result = $Oss->upload($files,$parameter);
		if($result['code'] == 1){
			$imagesrc = $result['src'];
			if($imaup){
				$Oss->delete($imaup);
			}
		}else{
			return false;
		}
	}
	return $imagesrc;
}
//---------------------------------------------------------------上传图片

function formatDate($time){
	$beginToday = mktime(0,0,0,date('m'),date('d'),date('Y'));      //今天开始
    $endToday = mktime(0,0,0,date('m'),date('d')+1,date('Y'))-1;    //今天结束
	$beginYesterday = mktime(0,0,0,date('m'),date('d')-1,date('Y'));//昨天开始
	$endYesterday = mktime(0,0,0,date('m'),date('d'),date('Y'))-1;  //昨天结束
	  
	$defaultDate = date("Y-m-d");
	$first=1;
	$w=date('w',strtotime($defaultDate));
	$week_start = strtotime("$defaultDate -".($w ? $w - $first : 6).' days'); //本周开始
	
	$year_start = strtotime(date("Y-01-01 00:00:00"));              //今年开始
	
	$str = '';
	if($time>=$beginToday && $time<=$endToday){
		$str = date("H:i", $time);
	}elseif($time>=$beginYesterday && $time<=$endYesterday){
		$str = "昨天 ".date("H:i", $time);
	}elseif($time>=$week_start){
		$str = getTimeWeek($time) ." ". date("H:i" , $time);
	}elseif($time >= $year_start){
		$str = date("m月d日 H:i", $time);
	}else{
		$str = date("Y年m月d日 H:i",$time);
	}
	return $str;
}//日期格式化

function getTimeWeek($time, $i = 0) {
	$weekarray = array("日","一", "二", "三", "四", "五", "六");
	$oneD = 24 * 60 * 60;
	return "周" . $weekarray[date("w", $time + $oneD * $i)];
}

function addAttention($uid, $auid){
	$attention = M("Attention");
	$rs = $attention->where("uid=$uid and auid=$auid")->find();
	if(!$rs){
		$attention->uid = $uid;
		$attention->auid = $auid;
		$attention->ctime = time();
		$insertid = $attention->add();
	}
	return true;
} //添加关注

function formatDate2($time){
	$beginToday = mktime(0,0,0,date('m'),date('d'),date('Y'));      //今天开始
	$endToday = mktime(0,0,0,date('m'),date('d')+1,date('Y'))-1;    //今天结束
	$beginYesterday = mktime(0,0,0,date('m'),date('d')-1,date('Y'));//昨天开始
	$endYesterday = mktime(0,0,0,date('m'),date('d'),date('Y'))-1;  //昨天结束
	 
	$defaultDate = date("Y-m-d");
	$first=1;
	$w=date('w',strtotime($defaultDate));
	$week_start = strtotime("$defaultDate -".($w ? $w - $first : 6).' days'); //本周开始

	$year_start = strtotime(date("Y-01-01 00:00:00"));              //今年开始

	$str = '';
	if($time>=$beginToday && $time<=$endToday){
		$str = date("H:i", $time);
	}elseif($time>=$beginYesterday && $time<=$endYesterday){
		$str = "昨天 ";
	}elseif($time>=$week_start){
		$str = getTimeWeek($time);
	}elseif($time >= $year_start){
		$str = date("m月d日", $time);
	}else{
		$str = date("Y年m月d日",$time);
	}
	return $str;
}//日期格式化2

function uploadupfile($files, $imgName, $imaup = '', $object='upgrade'){ //升级包上传
	header("Content-type: text/html; charset=utf-8");
	if(empty($files["name"])){
		$data['imagesrc'] = $imaup;
	}else{
		$upload_path = '/Uploads/upgrade/';
		$upload = new \Think\Upload();// 实例化上传类
		$upload->maxSize   =     993145728 ;// 设置附件上传大小
		$upload->exts      =     array('apk');// 设置附件上传类型
		$upload->rootPath  =     '.'.$upload_path; // 设置附件上传根目录
		$upload->savePath  =     ''; // 设置附件上传（子）目录
		$upload->subName   = ''; //子目录创建方式，[0]-函数名，[1]-参数，多个参数使用数组
		$retuimg = $upload->upload();// 上传文件
		$root = $_SERVER['DOCUMENT_ROOT'];
		if($retuimg){
			$uploadf = '.'.$upload_path;
			$img_url = $retuimg[$imgName]['savepath'] . $retuimg[$imgName]['savename'];
			$url = $uploadf . $img_url;
			$appObj  = new \Think\Apkparser();
			$res   = $appObj->open($url);
			$version = $appObj->getVersionCode();  // 版本名称
			$Oss = new \Think\Oss();
			$parameter = array(
				'maxSize'	=> 200000000,
				'exts'		=> array('apk'),
				'filepath'	=> $object.'/'.date('Y-m',time()).'/'
			);
			$size = filesize($url);
			$new_files = array(
					'name'      => $img_url,
					'size'      => $size,
					'tmp_name'  => $url
			);
			$result = $Oss->upload($new_files,$parameter);
			if($result['code'] == 1){
				$data['imagesrc'] = $result['src'];
				$data['version'] = $version;
				if($imaup){
					$Oss->delete($imaup);
				}
				@unlink($url);
			}else{
				return false;
			}
		}else{
			return false;
		}
	}
	return $data;
}
//---------------------------------------------------------------上传图片
