<?php 

$a = array(1,3,4,5,6,7);

$b='34,67,89,67,12';

$c=array_push($a,explode(",",$b));


print_r($a);


?>