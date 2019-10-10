<?php

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
