<?php

/*
*PHP function to display limited words from a string.
*/
function words_limit( $str, $num, $append_str='' ){
	$words = preg_split( '/[\s]+/', $str, -1, PREG_SPLIT_OFFSET_CAPTURE );
	if( isset($words[$num][1]) ){
		$str = substr( $str, 0, $words[$num][1] ).$append_str;
	}
	unset( $words, $num );
	return trim( $str );
}

echo words_limit($yourString, 50,'...'); 
or
echo words_limit($yourString, 50); 



/*
*生成随机密码 
*/
//方法1
echo substr(md5(uniqid()), 0, 8); 
//方法2
function rand_password($length){
  $chars =  'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
  $chars .= '0123456789' ;
  $chars .= '!@#%^&*()_,./<>?;:[]{}\|=+';

  $str = '';
  $max = strlen($chars) - 1;

  for ($i=0; $i < $length; $i++)
    $str .= $chars[rand(0, $max)];

  return $str;
}
echo rand_password(16);
