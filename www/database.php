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
ʱ��: <input type="text" name="money_Time" />
�� <input type="text" name="money" />
��� <input type="text" name="money_Type" />
������ <input type="text" name="money_Desc" />
<input type="submit" value="����"  >
</form>

</body>
</html>