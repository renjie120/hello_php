<?php
	//require_once("phpdebug.php");  
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
	if(filter_has_var(INPUT_POST, "operate")){
		$operate = $_POST["operate"];
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
			mysql_query("insert into money_detail_t(money_time,money,money_type,money_desc) values('$_POST[money_Time]','$_POST[money]','$_POST[money_Type]','$_POST[money_Desc]')");
			echo "��ӳɹ�����";
		}else{
			echo "ʧ�� !";
		}
	}
	//ɾ������
	//mysql_query("DELETE FROM Persons WHERE LastName='Griffin'");
	//�ر����ݿ�
	mysql_close($con); 
?>