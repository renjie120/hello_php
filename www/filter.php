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

	$int=123;
	if(!filter_var($int,FILTER_VALIDATE_INT)){
		echo("��������");
	}else{
		echo("��֤ͨ��");
	}
	echo("<br>");
	$var = 1024;
	/*�������ù���������������.*/
	$int_options = array(
	"options"=>array
	 (
	 "min_range"=>0,
	 "max_range"=>256
	 )
	);

	if(!filter_var($var, FILTER_VALIDATE_INT, $int_options))
	 {
	 echo("������Χ��ƥ��");
	 }
	else
	 {
	 echo("������Χ��ƥ���");
	 }

	//�ж�url���������Ƿ���ָ����url����
	 if(!filter_has_var(INPUT_POST, "url"))
	 {
	 echo("Input type does not exist");
	 }
	else
	 {
	 $url = filter_input(INPUT_POST, "url", FILTER_SANITIZE_URL);
	 }

     //�Զ���Ĺ����ַ�������.
	 function convertSpace($string)
	{
	return str_replace("_", " ", $string);
	}

	$string = "Peter_is_a_great_guy!";

	echo filter_var($string, FILTER_CALLBACK, array("options"=>"convertSpace"));

?>