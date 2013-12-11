<META http-equiv="content-type" content="text/html; charset=gb2312">   
<html>
<body> 
<script type="text/javascript" src="jquery-1.9.0.js" ></script>
<script type="text/javascript">
 function add(){
	  $.ajax( { 
		   type: "post",
		   url: "money.php?operate=add",
		   data: "money_Time="+$('input[name=money_Time]').val()
			   +"&money="+$('input[name=money]').val()
			   +"&money_Type="+$('input[name=money_Type]').val()
			   +"&money_Desc="+$('input[name=money_Desc]').val()+"",
		   success: function(msg){
			 //alert(msg );
		   }
	  });
 }
</script>
<form action="money.php?operate=insert" method="post">
时间: <input type="text" name="money_Time" />
金额： <input type="text" name="money" />
类别： <input type="text" name="money_Type" />
描述： <input type="text" name="money_Desc" />
<input type="submit" value="保存"  >
</form>

</body>
</html>