<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $nom = htmlspecialchars($_POST['nom']);
  $prenom = htmlspecialchars($_POST['prenom']);
  $poste = htmlspecialchars($_POST['poste']);
  $enterprise = htmlspecialchars($_POST['enterprise']);
  $email = htmlspecialchars($_POST['email']);
  $telephone = htmlspecialchars($_POST['telephone']);
  $color = htmlspecialchars($_POST['color']);

  // Handle file upload
  if (isset($_FILES['photo']) && $_FILES['photo']['error'] == 0) {
    if ($_FILES['photo']['size'] <= 1000000) {
      $photoName = pathinfo($_FILES['photo']['name']);
      $extension_upload = $photoName['extension'];
      $extension_auth = array('jpg', 'jpeg', 'png', 'gif');
      if (in_array($extension_upload, $extension_auth)) {
        $destination = 'images/' . basename($_FILES['photo']['name']);
        move_uploaded_file($_FILES['photo']['tmp_name'], $destination);
        // echo "L'envoi a bien été effectué !<br>";
      } else {
        echo "L'extension du fichier n'est pas autorisée<br>";
      }
    } else {
      echo "Le fichier est trop volumineux<br>";
    }
  } else {
    echo "Erreur lors de l'upload du fichier<br>";
  }

  // Generate the card
  echo "<div style='background-color: $color; padding: 20px; width: 300px; border: 1px solid #ccc; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); font-family: Arial, sans-serif;'>";
  echo "<div style='text-align: center; margin-bottom: 15px;'>";
  echo "<img src='$destination' alt='Photo' style='width: 100px; height: 100px; object-fit: cover; border-radius: 50%; border: 2px solid #fff; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);'>";
  echo "</div>";
  echo "<h2 style='font-size: 1.5em; margin: 0; text-align: center; color: #333;'>$nom $prenom</h2>";
  echo "<p style='font-size: 1.1em; margin: 5px 0; text-align: center; color: #555;'><strong>Poste:</strong> $poste</p>";
  echo "<p style='font-size: 1.1em; margin: 5px 0; text-align: center; color: #555;'><strong>Entreprise:</strong> $enterprise</p>";
  echo "<p style='font-size: 1.1em; margin: 5px 0; text-align: center; color: #555;'><strong>Email:</strong> $email</p>";
  echo "<p style='font-size: 1.1em; margin: 5px 0; text-align: center; color: #555;'><strong>Téléphone:</strong> $telephone</p>";
  echo "</div>";
}
