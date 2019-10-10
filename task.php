<?php

$readline = readline("Write file name (without extantion): ");
$operation = readline("White option (*, /, +, -): ");

$filename = $readline . ".txt";

if (!checkOperation($operation)) {
  echo "Enter currect operation \n"; die;
}

if (file_exists($filename) && is_readable($filename)) {

  $fn = fopen($filename, "r");

  while (! feof($fn) ) {
	   $line = fgets($fn);
     $arr = explode(" ", $line);
     $one = floatval($arr[0]);
     $two = floatval($arr[1]);

     $result = eval("return (float)$one $operation $two;");

     if ($result > 0) {
       saveToFile("positive.txt", $result);
     } elseif ($result < 0) {
       saveToFile("negative.txt", $result);
     }
  }

  fclose($fn);

} else {
  echo "File is not found \n";
}


// ~~~~~~~~~~~~~~~~~ functions ~~~~~~~~~~~~~~~~~

function checkOperation($operation)
{
  $operations = ["+", "-", "*", "/"];

  return in_array($operation, $operations);
}

function saveToFile($filename, $txt)
{
  $file = fopen($filename, "a") or die("Unable to open file!");
  fwrite($file, $txt . "\n");
  fclose($file);
}

?>
