<?php
	abstract class AbstractClass{
		abstract protected function getValue();
		abstract protected function prefixValue($prefix);
	}
	class ConcreteClass extends AbstractClass{
		protected function getValue(){
			return "ConcreateClass";
		}
		public function prefixValue($prefix){
			return "{$prefix}ConcreateClass";
		}
	}
	class Foo{
		public static function aStaticMethod(){
			echo 123;
		}
	}
	//require_once("phpdebug.php");  
	//require_once("moneydetail.php");  
	function __autoload($class_name) {
		require_once $class_name . '.php';
	}
    //$debug = new PHPDebug();  
	header('Content-Type: text/plain;charset=gb2312');
	header("Cache-Control: no-cache, must-revalidate"); 
	
	$con=mysql_connect("localhost","root","987425");
	if(!$con){
		die("���Ӳ������ݿ�:".mysql_errors());
	}
	//����һ�����ݿ�
	//(mysql_query("CREATE DATABASE my_db",$con))

	//ѡ��һ�����ݿ�
	mysql_select_db("dwz4j",$con);
	
	//������ִ��һ��sql
	/*$sql = "CREATE TABLE Persons 
	(
	FirstName varchar(15),
	LastName varchar(15),
	Age int
	)";
	mysql_query($sql,$con);
    */ 
	//ͨ���������жϺ���post�Ĳ�����operate
	if(filter_has_var(INPUT_GET, "operate")){
		$operate = $_GET["operate"];
		if($operate=='list'){
			$result = mysql_query("select * from money_detail_t");
			echo "<table width='500px'  border='1'><tr><td>��ˮ��</td><td>ʱ��</td><td>���</td><td>����</td><td>���</td></tr>";
			while($row=mysql_fetch_array($result)){
				echo "<tr><td>".$row['money_Sno']
					."</td><td>".$row['money_Time']
					."</td><td>".$row['money']
					."</td><td>".$row['money_Type']
					."</td><td>".$row['money_Desc']."</td></tr>";
			}
			echo "</table>";
		}
		else if($operate=='add'){
		   $m = new MoneyDetail();
		   $m->money = $_GET['money'];
		   $m->moneytime = $_GET['money_Time'];
		   $m->moneytype = $_GET['money_Type'];
		   $m->moneydesc = $_GET['money_Desc'];
		   mysql_query("insert into money_detail_t(money_time,money,money_type,money_desc) values('$m->moneytime','$m->money','$m->moneytype','$m->moneydesc')");
		   $classname="Foo";
		   $class1 = new ConcreteClass();
		   echo $class1->prefixValue("FOO_>>>>_") ." ";
		   echo "<span id='msg'>��ӳɹ���".$classname::aStaticMethod()."</span>";
		}else{
			echo "operateΪ��ʧ�� !";
		}
	}
	else{
		echo "û���ҵ����� !";
	}
	//ɾ������
	//mysql_query("DELETE FROM Persons WHERE LastName='Griffin'");
	//�ر����ݿ�
 
	mysql_close($con); 
?>