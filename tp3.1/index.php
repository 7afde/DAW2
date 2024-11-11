<?php
// Retrieve favorites from the cookie or set to an empty array
$favorites = isset($_COOKIE['favorites']) ? explode(',', $_COOKIE['favorites']) : [];

// List of available countries
$countries = ["Algérie", "France", "États-Unis", "Espagne", "Italie", "Allemagne", "Japon", "Chine", "Inde", "Brésil"];

// Add a country to favorites if passed in the URL and not already a favorite
if (isset($_GET['add']) && in_array($_GET['add'], $countries) && !in_array($_GET['add'], $favorites)) {
  $favorites[] = $_GET['add'];
  setcookie('favorites', implode(',', $favorites), time() + 3600, "/");
}

// Clear all favorites if the 'clear' parameter is set in the URL
if (isset($_GET['clear'])) {
  setcookie('favorites', '', time() - 3600, "/");
  $favorites = [];
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <title>Pays Favoris</title>
</head>

<body>
  <h1>Liste des pays</h1>
  <ul>
    <?php foreach ($countries as $country): ?>
      <li>
        <?php echo htmlspecialchars($country); ?> -
        <a href="?add=<?php echo urlencode($country); ?>">Ajouter aux favoris</a>
      </li>
    <?php endforeach; ?>
  </ul>

  <h2>Mes pays favoris</h2>
  <?php if (empty($favorites)): ?>
    <p>Aucun pays favori</p>
  <?php else: ?>
    <ul>
      <?php foreach ($favorites as $favorite): ?>
        <li><?php echo htmlspecialchars($favorite); ?></li>
      <?php endforeach; ?>
    </ul>
  <?php endif; ?>

  <a href="?clear=1">Effacer mes favoris</a>
</body>

</html>