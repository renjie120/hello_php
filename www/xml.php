<?php
	 $xmlDoc  = new DOMDocument();
	 $xmlDoc ->load("data.xml");
     
	 //将xml内容以字符串形式输出.
	 //print $xmlDoc->saveXML();

	 $x = $xmlDoc->documentElement;
	 foreach($x->childNodes AS $item){
	   print $item->nodeName." = " .$item->nodeValue ." 节点类型:" .$item->nodeType ."<br/>";
	 }
?>
 