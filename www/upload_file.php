<?php include "common.php" ?>
<?php 
	//下面判断是否出现错误
	if($_FILES["file"]["error"]>0){
		echo "文件上传出现错误:".$_FILES["file"]["error"]."<br />";
	}
	else{
		echo "上传：".$_FILES["file"]["name"]."<br/>";
		echo "文件类型：".$_FILES["file"]["type"]."<br/>";
		echo "文件大小：".($_FILES["file"]["size"]/1024)."Kb<br/>";
		echo "存储位置：".$_FILES["file"]["tmp_name"]."<br/>";

		//判断文件是否已经存在.
		if(file_exists("upload/".$_FILES["file"]["name"])){
			echo $_FILES["file"]["name"]."已经存在";
		}else{
			//创建目录
			if(!file_exists("upload/")){
				mkdir("upload/");
			}
			//移动上传的文件的位置
			move_uploaded_file($_FILES["file"]["tmp_name"],"upload/".$_FILES["file"]["name"]);
			echo "保存在："."upload/".$_FILES["file"]["name"];
		}
	}
?>