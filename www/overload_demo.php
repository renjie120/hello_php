<?php
	//php�����أ�������java�ķ�����á�
	class MyDynamicClass{
		private $data = array();//�����洢���ݵĶ���
		//public $declared = 1;
		private $hidden = 2;
		//����һ�������Ҳ�����ʱ�򣬻����__set������__get.
		public function __set($name,$value){
			echo "���ã�'$name' ֵΪ��'$value'";
			$this->data[$name]=$value;
		}
		
		public function __get($name){
			echo "ȡֵ��'$name':";
			if(array_key_exists($name,$this->data)){
				return $this->data[$name];
			}
			 $trace = debug_backtrace();
			  trigger_error(
            'Undefined property via __get(): ' . $name .
            ' in ' . $trace[0]['file'] .
            ' on line ' . $trace[0]['line'],
            E_USER_NOTICE);
			return null;
		}

		public function getHidden() {
			return $this->hidden;
		}
	}

	$obj = new MyDynamicClass();

	$obj->a = 1;
	$obj->a = 123;
	echo $obj->a . " ";

?>