<?php
	 $xmlDoc  = new DOMDocument();
	 $xmlDoc ->load("data.xml");
     
	 //��xml�������ַ�����ʽ���.
	 //print $xmlDoc->saveXML();

	 $x = $xmlDoc->documentElement;
	 foreach($x->childNodes AS $item){
	   print $item->nodeName." = " .$item->nodeValue ." �ڵ�����:" .$item->nodeType ."<br/>";
	 }
?>
 