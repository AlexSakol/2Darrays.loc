<!--Find a max element and divide every diagonal element by max--> 
<a href = "form1.php">Form </a> <a href ="/index.php">Main </a><br>
<?php
if(isset($_GET["n"]) && isset($_GET["m"]) && $_GET['n']>0 && $_GET["m"]>0)
{
    $n = $_GET["n"]; $m = $_GET["m"];
    $arr = [[]];
    for($i = 0; $i < $n; $i++)
    {
        for($j=0; $j < $m; $j++)
        {
            $arr[$i][$j] = mt_rand(-100,100);
        }
    }
    echo "Создан массив<br>";
    printArray($arr);  
    if ($n == $m) task($arr);
    else echo"Массив не квадратный";
}
else echo "Некорректное кол-во элементов";


    function printArray ($arr)
    {
        echo "<table>";
        foreach($arr as $row)
        {
            echo "<tr>";
            foreach($row as $item)
            {
                echo "<td>$item</td>"; 
            }
            echo "</tr>";
        }
        echo "</table>";
    }

    function task ($arr)
    {
        $max = $arr[0][0];
        $n = count($arr);
        for($i = 0; $i < $n; $i++)//find max
        {
            $m = count($arr[$i]);
            for($j = 0; $j < $m; $j++)
            {
                if($max < $arr[$i][$j])
                {
                    $max = $arr[$i][$j];
                }            
            }
        }
        echo "max = $max<br>";
        echo "Диагональные элементы деленные на максимум<br>";
	    for ($i = 0; $i < $n; $i++) {//main diagonal
            $m = count($arr[$i]);
		    for ($j = 0; $j < $m; $j++) {
			    if ($i == $j) {
				    $div1 = $arr[$i][$j] / $max;
				    echo "$div1<br>";
			    }
		    }
	    }
	    for ($i = ($n - 1); $i >= 0; $i--)//side diagonal
	    {
		    $div2 = $arr[$i][$n - $i - 1] / $max;
		    echo "$div2<br>";
	    }
    }

?>