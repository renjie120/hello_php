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
ʱ��: <input type="text" name="money_Time" onClick="WdatePicker()" />
�� <input type="text" name="money" />
��� <input type="text" name="money_Type" />
������ <input type="text" name="money_Desc" />
<input type="button" value="����" onclick='add()'  >
</form>
<div id='content'></div>
</body>
</html>