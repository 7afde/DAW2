<?php
$P1 = fopen("P1.txt", "r");

while (!feof($P1)) {
  $ligne = fgets($P1, 255);
  echo $ligne . "<br>";
}
fclose($P1);
