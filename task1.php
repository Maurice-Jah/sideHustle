
<?php

// 1.A range function that takes two arguments, start and end, and returns an array containing all the numbers from start up to (and including) end and also adds them togther
function numberRange($start, $end){
    $sum = 0;
  foreach(range($start, $end) as $array){
      echo $array . "<br>";
      $sum += $array;
  }

  echo "The Sum of the numbers in the range is $sum" ."<br>";
 
}

// To output the numbers
numberRange(1,5);





//2. A Function that takes an array of numbers and returns the sum of these numbers.
function sum($numbers){
    $total = 0;
    for($i = 0; $i < count($numbers); $i++){
        $total += $numbers[$i];
    }
    
    return $total;
}

echo "<br>";

//To output the sum
$output = sum(array(1,2,3,4,5));
echo "The sum of the array is $output";

?>





