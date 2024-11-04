<?php
$pays = ["Algérie", "France", "États-Unis", "Espagne", "Italie", "Allemagne", "Japon", "Chine", "Inde", "Brésil"];
$favorites = isset($_COOKIE['favorites']) ? explode(',', $_COOKIE['favorites']) : [];


if (isset($_POST['add_favorite'])) {
  $favorite = $_POST['country'];
  $favorites = isset($_COOKIE['favorites']) ? explode(',', $_COOKIE['favorites']) : [];
  if (!in_array($favorite, $favorites)) {
    $favorites[] = $favorite;
    setcookie('favorites', implode(',', $favorites), time() + 3600);
  }
}

if (isset($_POST['clear_favorites'])) {
  setcookie('favorites', '', time() - 3600);
  $favorites = [];
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <title>Liste des pays</title>
  <style>
    .country {
      border: 1px solid #000;
      background-color: #f9f9f9;
      margin: 10px;
      padding: 10px;
    }

    .favorites {
      margin-top: 20px;
    }
  </style>
</head>

<body>
  <h1>Liste des pays</h1>
  <?php foreach ($pays as $pays): ?>
    <div class="country">
      <span><?php echo $pays; ?></span>
      <form method="post" style="display:inline;">
        <input type="hidden" name="country" value="<?php echo $pays; ?>">
        <button type="submit" name="add_favorite">Ajouter aux favoris</button>
      </form>
    </div>
  <?php endforeach; ?>

  <div class="favorites">
    <h2>Mes pays favoris</h2>
    <?php if (empty($favorites)): ?>
      <p>Aucun pays favori</p>
    <?php else: ?>
      <ul>
        <?php foreach ($favorites as $favorite): ?>
          <li><?php echo $favorite; ?></li>
        <?php endforeach; ?>
      </ul>
    <?php endif; ?>
    <form method="post">
      <button type="submit" name="clear_favorites">Effacer mes favoris</button>
    </form>
  </div>
</body>

</html>