<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Retrieve form fields
  $number1 = htmlspecialchars($_POST['number1']);
  $number2 = htmlspecialchars($_POST['number2']);

  // Display form data
  echo "<h2>Formulaire soumis :</h2>";
  echo "<strong>Number 1:</strong> " . htmlspecialchars($number1) . "<br>";
  echo "<strong>Number 2:</strong> " . htmlspecialchars($number2) . "<br>";
  echo "<strong>Result:</strong> " . ($number1 + $number2) . "<br>";
}
