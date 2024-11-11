
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $inputText = $_POST['inputText'];
  $file = fopen("P1.txt", "a");
  fwrite($file, $inputText);
  fclose($file);
  echo "Done";
}
?>