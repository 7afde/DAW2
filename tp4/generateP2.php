<?php
$P1 = fopen("P1.txt", 'r');
$P2 = fopen("P2.txt", "r");
fsync($P1);
fsync($P2);
while (!feof($P1)) {
  $line = fgets($P1, 255);
  $uppercaseLine = strtoupper($line);
  fwrite($P2, $uppercaseLine);
  echo $uppercaseLine . "<br>";
}
fclose($P1);
fclose($P2);
