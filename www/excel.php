<? 
header("Content-type:application/vnd.ms-excel"); 
header("Content-Disposition:filename=test.xls"); 
echo "test1\t"; 
echo "test2\t\n"; 
echo "test1\t"; 
echo "test2\t\n"; 
echo "test1\t"; 
echo "test2\t\n"; 
echo "test1\t"; 
echo "test2\t\n"; 
echo "test1\t"; 
echo "test2\t\n"; 
echo "test1\t"; 
echo "test2\t\n"; 
?> 

<? 
 /*
require "excel_class.php";

Read_Excel_File("Book1.xls",$return);

for ($i=0;$i<count($return[Sheet1]);$i++)
{
    for ($j=0;$j<count($return[Sheet1][$i]);$j++)
    {
        echo $return[Sheet1][$i][$j]."|";
    }
    echo "<br>";
}*/
?> 
<? /*
require "excel_class.php";

Read_Excel_File("Book1.xls",$return);
Create_Excel_File("ddd.xls",$return[Sheet1]);
*/
?>
 