 
<html>
 <head>
  <title> New Document </title>
 </head>

 <body>
  <?php
	echo "hello world!";
	$a=1234;
	$hello ='hello';
	$world='world';
	$full="$hello $world";
	$a=-123;
	echo $hello."<br>";
	echo $hello."   ".$world."<br>";
	echo strpos($full,$world);
	echo 	strpos('string','ing') ; 
	echo 	'¼ÓÃÜ£º'.crypt('hello world','wolaihengshi')."\n<br />";

	if (CRYPT_EXT_DES == 1)
	{
		echo "Extended DES: ".crypt("hello world")."\n<br />";
	}
	else
	{
		echo "Extended DES not supported.\n<br />";
	}
	$str="Hello";
	print_r(explode(" ",$str));
	/*´òÓ¡md5×Ö·û´®*/
	echo md5($str)."<br>"; 
	print_r(str_split($str));
	print_r ("<br>");
	print_r(str_split($str,2));
	print_r ("<br>");

	echo $_SERVER['HTTP_USER_AGENT'];

	print_r ("<br>");
	$d =date("D");
	echo $d;

	print_r ("<br>");
	$d = 123;
	switch($d){
	case 1:
		echo(1);
		break;
	case 2:
		echo(2);
		break;
	default:
		echo('other');
		break;
	}
	print_r ("<br>");
	/**next show array:*/
	$myarr = array("first","sss",'ddddd');
	echo $myarr[0]."--".$myarr[1]."--".$myarr[2];
	
	print_r ("<br>");
	$myarr[3] = 123;
	echo $myarr[0]."--".$myarr[1]."--".$myarr[2]."--".$myarr[3];
 
	$ages = array("lishuiqing"=>12,"hh"=>33);
	print_r ("<br>");
	echo $ages['lishuiqing'];
	
 	print_r ("<br>");
	echo $ages['hh'];

	for($i=0;$i<5;$i++){
		echo "hello world!<br>";
	}

	print_r ("<br>");
	$arr2 = array("one",'tow',"333");
	foreach($arr2 as $value)
		echo "value:".$value."<br>";

	function writeMyName(){
		echo "my name";
	}
	function sayToHello($name){
		echo "hello".$name;
	}
	writeMyName();
	sayToHello('lishuiqing');
 ?>
 </body>

</html>
