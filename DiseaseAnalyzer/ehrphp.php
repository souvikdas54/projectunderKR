<!DOCTYPE html>
<html>
<body>
<?php

$dataset = array

(

array ("p2", 42, 75, 2, 1, 2, 1, 2, 0, 0, 0, 1, 0, 0, 0, 0, 0, 15, 3.8729, "Measles"),
array ("p3", 13, 33, 2, 0, 0, 0, 2, 3, 1, 0, 1, 0, 0, 0, 5, 0, 44, 6.6332, "Mumps"),
array ("p4", 66, 60, 2, 1, 0, 1, 0, 3, 1, 2, 1, 3, 0, 0, 0, 5, 55, 7.4161, "Common Cold"),
array ("p6", 79, 50, 0, 0, 2, 0, 0, 0, 1, 0, 0, 0, 0, 4, 0, 0, 21, 4.5825, "Chicken Pox"),
array ("p9", 69, 47, 0, 1, 0, 1, 0, 0, 0, 2, 0, 3, 0, 0, 0, 5, 40, 6.3245, "Common Cold"),
array ("p10", 50, 95, 2, 1, 0, 0, 2, 0, 1, 0, 1, 0, 4, 0, 0, 0, 27, 5.1961, "Flu"),
array ("p12", 68, 34, 2, 1, 2, 0, 0, 3, 0, 0, 1, 0, 0, 0, 0, 0, 19, 4.3588, "Measles"),
array ("p13", 39, 50, 2, 0, 0, 0, 2, 0, 1, 0, 0, 0, 0, 0, 5, 0, 34, 5.8309, "Mumps"),
array ("p14", 54, 89, 2, 1, 0, 1, 2, 0, 1, 2, 1, 3, 0, 0, 0, 5, 50, 7.0710, "Common Cold"),
array ("p15", 11, 65, 2, 0, 0, 1, 2, 0, 0, 0, 1, 0, 4, 0, 0, 0, 26, 5.0990, "Flu"),
array ("p1", 17, 96, 2, 0, 2, 0, 2, 0, 1, 2, 0, 0, 0, 4, 0, 0, 33, 5.7445, "Chicken Pox"),
array ("p17", 79, 62, 2, 1, 2, 1, 2, 0, 0, 0, 1, 0, 0, 0, 0, 0, 15, 3.8729, "Measles"),
array ("p18", 29, 78, 2, 0, 0, 0, 0, 3, 1, 0, 0, 0, 0, 0, 5, 0, 39, 6.2449, "Mumps"),
array ("p21", 62, 97, 0, 0, 2, 1, 0, 0, 1, 0, 0, 0, 0, 4, 0, 0, 22, 4.6904, "Chicken Pox"),
array ("p23", 33, 82, 2, 0, 0, 0, 0, 0, 1, 0, 1, 0, 0, 0, 5, 0, 31, 5.5677, "Mumps"),
array ("p24", 30, 87, 2, 0, 0, 1, 0, 0, 1, 2, 1, 3, 0, 0, 0, 5, 45, 6.7082, "Common Cold"),
array ("p5", 25, 62, 2, 0, 0, 1, 2, 3, 1, 0, 1, 0, 4, 0, 0, 0, 36, 6, "Flu"),
array ("p16", 48, 37, 2, 0, 2, 0, 2, 3, 0, 0, 1, 0, 0, 4, 0, 0, 38, 6.1644, "Chicken Pox"),
array ("p8", 78, 83, 0, 0, 0, 0, 2, 0, 1, 0, 1, 0, 0, 0, 0, 0, 6, 2.4494, "Mumps"),
array ("p22", 25, 70, 2, 1, 2, 0, 2, 0, 0, 0, 1, 0, 0, 0, 0, 0, 14, 3.7416, "Measles"),
array ("p7", 37, 68, 2, 1, 2, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 0, 11, 3.3166, "Measles"),
array ("p20", 63, 88, 2, 0, 0, 1, 2, 3, 1, 0, 0, 0, 4, 0, 0, 0, 35, 5.9160, "Flu"),
array ("p25", 73, 67, 2, 0, 0, 1, 0, 3, 1, 0, 1, 0, 4, 0, 0, 0, 32, 5.6568, "Flu"),
array ("p11", 76, 84, 2, 1, 2, 0, 0, 0, 0, 2, 0, 0, 0, 4, 0, 0, 29, 5.3851, "Chicken Pox"),
array ("p19", 45, 74, 0, 1, 0, 1, 0, 3, 1, 2, 1, 3, 0, 0, 0, 5, 51, 7.1414, "Common Cold")

);
$sum=0;
$normalize=array();
$similarity=array();
for($i=0;$i<25;$i++){
	$normalize[$i]=array();
	$similarity[$i]=array();
}
for($row=0;$row<25;$row++){
	$sum=0;
	$sqrt=$dataset[$row][18];
	$normalize[$row][0]=$dataset[$row][0];
	$normalize[$row][15]=$dataset[$row][19];
	for($column=3;$column<=16;$column++){
		$data=$dataset[$row][$column]/$sqrt;
		$data=round($data,4);
		$normalize[$row][$column-2]=$data;
	}
}
/*
for($row=0;$row<25;$row++){
	for($column=0;$column<16;$column++){
		echo $normalize[$row][$column];
		echo "  ";
	}
	echo "<br/>";
}
*/

$input=array("p26",1,0,1,1,0,0,1,1,1,0,0,1,0,0);
$sum=0;
for($i=1;$i<15;$i++){
	$input[$i]=pow($input[$i],2);
	$sum=$sum+$input[$i];
}
$sum=sqrt($sum);
for($i=1;$i<15;$i++){
	$input[$i]=round(($input[$i]/$sum),4);
	//echo $input[$i];
	//echo "<br/>";
}
$sum=0;
$temp=0;
$max=0;
$maxpos=0;
for($rows=0;$rows<25;$rows++){
	$sum=0;
	for($columns=1;$columns<15;$columns++){
		$temp=$normalize[$rows][$columns]*$input[$columns];
		$sum=$sum+$temp;
	}
	if($sum>$max){
		$max=$sum;
		$maxpos=$rows;
	}
	$similarity[$rows][0]=$normalize[$rows][0];
	$similarity[$rows][1]=round($sum,4);
	$similarity[$rows][2]=$normalize[$rows][15];
}
echo "Maximum Similarity";
echo "<br/>";
echo $similarity[$maxpos][0];
echo "<br/>";
echo $similarity[$maxpos][1];
echo "<br/>";
echo $similarity[$maxpos][2];


/*
 
for ($row = 0; $row < 25; $row++) {
  echo "<p><b>Row number $row</b></p>";
  echo "<ul>";
  for ($col = 0; $col < 3; $col++) {
    echo "<li>".$similarity[$row][$col]."</li>";
  }
  echo "</ul>";
}
*/

?>
</body>
</html>