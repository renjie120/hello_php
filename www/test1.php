<html>
<?php include "common.php" ?>
<body>
	<form action="welcome.php" method="post">
	姓名:<input name="name"/><br>
	年龄:<input name="age"/>
	<input type="submit">
	</form>
	<br>
	<?php echo date("Y/m/d");
		throw new Exception("Value must be 1 or below");
		$file = fopen("test.txt","r") or exit("打不开文件!");
		changeLine();
		echo "目录位置：".realpath("test.txt");
		changeLine();
		changeLine();
		while(!feof($file)){
			echo fgets($file)."<br />";
		}
		//下面是逐个字符的打印
		/*while(!feof($file)){
			echo fgetc($file)."<br />";
		}*/
		fclose($file);

		function changeLine(){
			echo "<br>";
		}

	?>
</body>
</html>