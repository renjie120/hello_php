<?php 
	//下面的函数表示设置默认的错误处理方式.
	set_error_handler("customError");
	//设置自定义的错误处理函数
	function customError($errno,$errstr){
		echo "<b>错误号码:[$errno]</b><br>错误描述：$errstr<br>";
		echo "脚本结束<br>";
		die();
	}

	function myException($exception){
		echo "<b>出现异常：</b>".$exception->getMessage();
	}
	set_exception_handler("myException");
	//throw new Exception("没有被捕获的异常");

	//下面演示一个自定义的异常类.
	class customException extends Exception
	{
		public function errorMessage()
		{
			//error message
			$errorMsg = 'Error on line '.$this->getLine().' in '.$this->getFile()
			.': <b>'.$this->getMessage().'</b> is not a valid E-Mail address';
			return $errorMsg;
		}
	} 

	$int=123;
	if(!filter_var($int,FILTER_VALIDATE_INT)){
		echo("不是整数");
	}else{
		echo("验证通过");
	}
	echo("<br>");
	$var = 1024;
	/*下面设置过滤器的两个条件.*/
	$int_options = array(
	"options"=>array
	 (
	 "min_range"=>0,
	 "max_range"=>256
	 )
	);

	if(!filter_var($var, FILTER_VALIDATE_INT, $int_options))
	 {
	 echo("整数范围不匹配");
	 }
	else
	 {
	 echo("整数范围是匹配的");
	 }

	//判断url参数里面是否有指定的url变量
	 if(!filter_has_var(INPUT_POST, "url"))
	 {
	 echo("Input type does not exist");
	 }
	else
	 {
	 $url = filter_input(INPUT_POST, "url", FILTER_SANITIZE_URL);
	 }

     //自定义的过滤字符串函数.
	 function convertSpace($string)
	{
	return str_replace("_", " ", $string);
	}

	$string = "Peter_is_a_great_guy!";

	echo filter_var($string, FILTER_CALLBACK, array("options"=>"convertSpace"));

?>