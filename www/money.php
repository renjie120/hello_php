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
		die("链接不上数据库:".mysql_errors());
	}
	//创建一个数据库
	//(mysql_query("CREATE DATABASE my_db",$con))

	//选择一个数据库
	mysql_select_db("dwz4j",$con);
	
	//创建表，执行一段sql
	/*$sql = "CREATE TABLE Persons 
	(
	FirstName varchar(15),
	LastName varchar(15),
	Age int
	)";
	mysql_query($sql,$con);
    */ 
	//通过过滤器判断含有post的参数：operate
	if(filter_has_var(INPUT_GET, "operate")){
		$operate = $_GET["operate"];
		if($operate=='list'){
			$result = mysql_query("select * from money_detail_t");
			echo "<table width='500px'  border='1'><tr><td>流水号</td><td>时间</td><td>金额</td><td>描述</td><td>类别</td></tr>";
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
		   echo "<span id='msg'>添加成功！".$classname::aStaticMethod()."</span>";
		}else{
			echo "operate为空失败 !";
		}
	}
	else{
		echo "没有找到参数 !";
	}
	//删除数据
	//mysql_query("DELETE FROM Persons WHERE LastName='Griffin'");
	//关闭数据库
 
	mysql_close($con); 
?>