<?php
	//require_once("phpdebug.php");  
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
	if(filter_has_var(INPUT_POST, "operate")){
		$operate = $_POST["operate"];
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
			mysql_query("insert into money_detail_t(money_time,money,money_type,money_desc) values('$_POST[money_Time]','$_POST[money]','$_POST[money_Type]','$_POST[money_Desc]')");
			echo "添加成功！！";
		}else{
			echo "失败 !";
		}
	}
	//删除数据
	//mysql_query("DELETE FROM Persons WHERE LastName='Griffin'");
	//关闭数据库
	mysql_close($con); 
?>