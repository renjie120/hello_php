<?php include "common.php" ?>
<?php 
	//�����ж��Ƿ���ִ���
	if($_FILES["file"]["error"]>0){
		echo "�ļ��ϴ����ִ���:".$_FILES["file"]["error"]."<br />";
	}
	else{
		echo "�ϴ���".$_FILES["file"]["name"]."<br/>";
		echo "�ļ����ͣ�".$_FILES["file"]["type"]."<br/>";
		echo "�ļ���С��".($_FILES["file"]["size"]/1024)."Kb<br/>";
		echo "�洢λ�ã�".$_FILES["file"]["tmp_name"]."<br/>";

		//�ж��ļ��Ƿ��Ѿ�����.
		if(file_exists("upload/".$_FILES["file"]["name"])){
			echo $_FILES["file"]["name"]."�Ѿ�����";
		}else{
			//����Ŀ¼
			if(!file_exists("upload/")){
				mkdir("upload/");
			}
			//�ƶ��ϴ����ļ���λ��
			move_uploaded_file($_FILES["file"]["tmp_name"],"upload/".$_FILES["file"]["name"]);
			echo "�����ڣ�"."upload/".$_FILES["file"]["name"];
		}
	}
?>