正在加载中，请稍候。。。。。。。
<?php

function myException($exception){
 	echo "<b>出现异常：</b>".$exception->getMessage();
}
//下面设置异常处理方式。
set_exception_handler("myException");
set_error_handler("customError");
//设置自定义的错误处理函数
function customError($errno,$errstr){ 
	//die();
}

$dbstr = "(DESCRIPTION = (ADDRESS_LIST = (ADDRESS = (PROTOCOL = TCP)(HOST = 192.168.17.250)(PORT = 1521)) ) (CONNECT_DATA = (SERVICE_NAME = dipdb) ) )";
$dbstr2 = "(DESCRIPTION = (ADDRESS_LIST = (ADDRESS = (PROTOCOL = TCP)(HOST = 192.168.17.58)(PORT = 1521)) ) (CONNECT_DATA = (SERVICE_NAME = bpsdb) ) )";
//$dbconn=OCILogon("dipoa2","dipoa2",$dbstr);
$dbconn=oci_connect("dipoa4","dipoa4",$dbstr); 
$dbconn2=oci_connect("dipwfs","dipwfs",$dbstr2);
echo __LINE__."<br>";
echo __FILE__."<br>";
echo __DIR__."<br>";
echo __FUNCTION__."<br>";
echo __CLASS__."<br>";
echo __METHOD__."<br>";
echo __NAMESPACE__."<br>";
if($dbconn){
	echo "成功!";
}else{
	echo "失败!";
	Ora_Logoff($dbconn);  
	phpinfo(); 
}
$stmt = oci_parse($dbconn,"select *   from alltables  t where t.sort  = '新业务表'  ");
$stmt2 = oci_parse($dbconn2,"select *   from alltables  t where t.sort  = '新业务表'  ");
oci_execute($stmt,OCI_DEFAULT);
oci_execute($stmt2,OCI_DEFAULT);
$result = null;
echo "<table><tr><td>";
echo "<table align='top' border='1'><tr><td>表名</td><td>说明</td><td>总行数</td></tr>";

while(oci_fetch($stmt)){
	$tbname = oci_result($stmt,"TABLENAME"); 
	//下面的列名都使用大写！因为oracle里面默认使用大写
	echo  "<tr><td>".$tbname."</td>"
		."<td>".oci_result($stmt,"TABLEDESC")."</td>"
		."<td>".getCount($dbconn,$tbname)."</td>"
		//."<td>".oci_result($stmt,"SORT")."</td>";
		."</tr>";
}
echo "</table>";
echo "</td><td>";
echo "<table  align='top' border='1'><tr><td>表名</td><td>说明</td><td>总行数</td></tr>"; 
while(oci_fetch($stmt2)){
	$tbname = oci_result($stmt2,"TABLENAME"); 
	//下面的列名都使用大写！因为oracle里面默认使用大写
	echo  "<tr><td>".$tbname."</td>"
		."<td>".oci_result($stmt2,"TABLEDESC")."</td>"
		."<td>".getCount($dbconn2,$tbname)."</td>"
		//."<td>".oci_result($stmt,"SORT")."</td>";
		."</tr>";
}
echo "</table>";
echo "</tr></table>";
//查询表的总行数.
function getCount($con,$str){  
		$ss = oci_parse($con,"select count(1) A  from ".trim($str));
		oci_execute($ss, OCI_DEFAULT);
		while(oci_fetch($ss)){
			return oci_result($ss,"A");
		} 
		return "0"; 
} 
 

OCILogOff($dbconn); 
?>