<META http-equiv="content-type" content="text/html; charset=gb2312">   
<html>
<body> 
<script type="text/javascript" src="jquery-1.9.0.js" ></script>
<script language="javascript" type="text/javascript" src="My97DatePicker/WdatePicker.js"></script>
<script type="text/javascript">
 function add(){ 
	  $.ajax( { 
		   type: "GET",
		   url: "money.php?operate=add&money_Time="+$('input[name=money_Time]').val()
			   +"&money="+$('input[name=money]').val()
			   +"&money_Type="+$('input[name=money_Type]').val()
			   +"&money_Desc="+$('input[name=money_Desc]').val()+"",
		   success: function(msg){
			  $('#content').html(msg);
			  $.ajax({
				type: "GET",
     		    url: 'money.php?operate=list',
				success:function(ans){ 
					$('#content').append(ans);
				}
			  });
		   }
	  });
 }
</script>
<form action="money.php?operate=insert" method="post">
时间: <input type="text" name="money_Time" onClick="WdatePicker()" />
金额： <input type="text" name="money" />
类别： <input type="text" name="money_Type" />
描述： <input type="text" name="money_Desc" />
<input type="button" value="保存" onclick='add()'  >
</form>
<div id='content'></div>
</body>
</html>