<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form fields
    $nom = isset($_POST['nom']) ? htmlspecialchars($_POST['nom']) : '';
    $prenom = isset($_POST['prenom']) ? htmlspecialchars($_POST['prenom']) : '';
    $email = isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '';
    $sexe = isset($_POST['sexe']) ? htmlspecialchars($_POST['sexe']) : '';
    $specialite = isset($_POST['specialite']) ? htmlspecialchars($_POST['specialite']) : '';
    $languages = isset($_POST['languages']) ? $_POST['languages'] : [];
    $os = isset($_POST['os']) ? htmlspecialchars($_POST['os']) : '';

    // Handle file upload (photo)
    if (isset($_FILES['photo']) && $_FILES['photo']['error'] == 0) {
        if ($_FILES['photo']['size'] <= 1000000) {
            $photoName = pathinfo($_FILES['photo']['name']);
            $extension_upload = $photoName['extension'];
            $extension_auth = array('jpg', 'jpeg', 'png', 'gif');
            if (in_array($extension_upload, $extension_auth)) {
                move_uploaded_file($_FILES['photo']['tmp_name'], 'uploads/' . basename($_FILES['photo']['name']));
                echo "L'envoi a bien été effectué !<br>";
            } else {
                echo "L'extension du fichier n'est pas autorisée<br>";
            }
        } else {
            echo "Le fichier est trop volumineux<br>";
        }
    } else {
        echo "Erreur lors de l'upload du fichier<br>";
    }

    // Display form data
    echo '<link rel="stylesheet" type="text/css" href="./test.phpstyles.css">';
    echo "<h2 class='text'>Formulaire soumis :</h2>";
    echo "<strong>Nom:</strong> " . htmlspecialchars($nom) . "<br>";
    echo "<strong>Prénom:</strong> " . htmlspecialchars($prenom) . "<br>";
    echo "<strong>Email:</strong> " . htmlspecialchars($email) . "<br>";
    echo "<strong>Sexe:</strong> " . htmlspecialchars($sexe) . "<br>";
    echo "<strong>Spécialité:</strong> " . htmlspecialchars($specialite) . "<br>";

    // Display selected languages
    echo "<strong>Langages maîtrisés:</strong> ";
    echo !empty($languages) ? htmlspecialchars(implode(", ", $languages)) : "Aucun sélectionné";
    echo "<br>";

    // Display operating system
    echo "<strong>Système d'exploitation:</strong> " . htmlspecialchars($os) . "<br>";
}
