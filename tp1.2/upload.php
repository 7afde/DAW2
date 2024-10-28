<?php
if (isset($_FILES['photo']) && $_FILES['photo']['error'] == 0) {
  if ($_FILES['photo']['size'] <= 1000000) {
    $photoName = pathinfo($_FILES['photo']['name']);
    $extension_upload = $photoName['extension'];
    $extension_auth = array('jpg', 'jpeg', 'png', 'gif');
    if (in_array($extension_upload, $extension_auth)) {
      $destination = 'images/' . basename($_FILES['photo']['name']);
      move_uploaded_file($_FILES['photo']['tmp_name'], $destination);
      echo "L'envoi a bien été effectué !<br>";
      echo "<img src='$destination' alt='Uploaded Image'><br>";
    } else {
      echo "L'extension du fichier n'est pas autorisée<br>";
    }
  } else {
    echo "Le fichier est trop volumineux<br>";
  }
} else {
  echo "Erreur lors de l'upload du fichier<br>";
}
