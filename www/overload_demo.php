<?php
	//php的重载，类似于java的反射调用。
	class MyDynamicClass{
		private $data = array();//用来存储数据的对象
		//public $declared = 1;
		private $hidden = 2;
		//当找一个属性找不到的时候，会进入__set，或者__get.
		public function __set($name,$value){
			echo "设置：'$name' 值为：'$value'";
			$this->data[$name]=$value;
		}
		
		public function __get($name){
			echo "取值：'$name':";
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