���ڼ����У����Ժ򡣡�����������
<?php

function myException($exception){
 	echo "<b>�����쳣��</b>".$exception->getMessage();
}
//���������쳣����ʽ��
set_exception_handler("myException");
set_error_handler("customError");
//�����Զ���Ĵ�������
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
	echo "�ɹ�!";
}else{
	echo "ʧ��!";
	Ora_Logoff($dbconn);  
	phpinfo(); 
}
$stmt = oci_parse($dbconn,"select *   from alltables  t where t.sort  = '��ҵ���'  ");
$stmt2 = oci_parse($dbconn2,"select *   from alltables  t where t.sort  = '��ҵ���'  ");
oci_execute($stmt,OCI_DEFAULT);
oci_execute($stmt2,OCI_DEFAULT);
$result = null;
echo "<table><tr><td>";
echo "<table align='top' border='1'><tr><td>����</td><td>˵��</td><td>������</td></tr>";

while(oci_fetch($stmt)){
	$tbname = oci_result($stmt,"TABLENAME"); 
	//�����������ʹ�ô�д����Ϊoracle����Ĭ��ʹ�ô�д
	echo  "<tr><td>".$tbname."</td>"
		."<td>".oci_result($stmt,"TABLEDESC")."</td>"
		."<td>".getCount($dbconn,$tbname)."</td>"
		//."<td>".oci_result($stmt,"SORT")."</td>";
		."</tr>";
}
echo "</table>";
echo "</td><td>";
echo "<table  align='top' border='1'><tr><td>����</td><td>˵��</td><td>������</td></tr>"; 
while(oci_fetch($stmt2)){
	$tbname = oci_result($stmt2,"TABLENAME"); 
	//�����������ʹ�ô�д����Ϊoracle����Ĭ��ʹ�ô�д
	echo  "<tr><td>".$tbname."</td>"
		."<td>".oci_result($stmt2,"TABLEDESC")."</td>"
		."<td>".getCount($dbconn2,$tbname)."</td>"
		//."<td>".oci_result($stmt,"SORT")."</td>";
		."</tr>";
}
echo "</table>";
echo "</tr></table>";
//��ѯ���������.
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