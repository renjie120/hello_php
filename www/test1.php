<html>
<?php include "common.php" ?>
<body>
	<form action="welcome.php" method="post">
	����:<input name="name"/><br>
	����:<input name="age"/>
	<input type="submit">
	</form>
	<br>
	<?php echo date("Y/m/d");
		throw new Exception("Value must be 1 or below");
		$file = fopen("test.txt","r") or exit("�򲻿��ļ�!");
		changeLine();
		echo "Ŀ¼λ�ã�".realpath("test.txt");
		changeLine();
		changeLine();
		while(!feof($file)){
			echo fgets($file)."<br />";
		}
		//����������ַ��Ĵ�ӡ
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