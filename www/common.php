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
?>