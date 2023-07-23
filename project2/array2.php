<!--Find a column with negative elements and find an average of this column-->
<a href = "form2.php">Form </a> <a href ="/index.php">Main </a><br>
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
    if ($n == $m) task2($arr, $n, $m);
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

    function task2 ($arr, $n, $m)
    {
       $count = 0;
       for($j = 0; $j < $m; ++$j)
       {
         for($i = 0; $i < $n; ++$i)
         {
            $sum = 0; $average = 0;
            if($arr[$i][$j]<0) 
            {
                $count++; 
                printf("Столбец с отрицательными элементами"); echo "<br>";
                for($i = 0; $i < $n; $i++)
                {
                    printf("%5d ", $arr[$i][$j]);
                    $sum += $arr[$i][$j];
                    $average = $sum/$n;
                }
                printf("<br>Среднее арифметическое %.4lf", $average); echo '<br>';
            }            
         }
       }
       if ($count == 0) { echo "Столбцов с отрицательными элементами не существует"; }
    }    
?>