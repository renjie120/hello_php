<?php 
	//����ĺ�����ʾ����Ĭ�ϵĴ�����ʽ.
	set_error_handler("customError");
	//�����Զ���Ĵ�������
	function customError($errno,$errstr){
		echo "<b>�������:[$errno]</b><br>����������$errstr<br>";
		echo "�ű�����<br>";
		die();
	}

	function myException($exception){
		echo "<b>�����쳣��</b>".$exception->getMessage();
	}
	set_exception_handler("myException");
	//throw new Exception("û�б�������쳣");

	//������ʾһ���Զ�����쳣��.
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