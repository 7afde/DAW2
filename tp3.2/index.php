<?php
session_start();

// Initialisation des votes
if (!isset($_SESSION['votes'])) {
  $_SESSION['votes'] = ['PHP' => 0, 'JavaScript' => 0, 'Python' => 0];
}

// Gestion du vote
if (isset($_POST['vote']) && !isset($_SESSION['has_voted'])) {
  $vote = $_POST['language'];
  if (array_key_exists($vote, $_SESSION['votes'])) {
    $_SESSION['votes'][$vote]++;
    $_SESSION['has_voted'] = true;
  }
}

// Gestion de la déconnexion
if (isset($_POST['logout'])) {
  session_destroy();
  header("Location: index.php");
  exit();
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <title>Sondage</title>
</head>

<body>
  <h1>Quel est votre langage de programmation préféré ?</h1>

  <?php if (isset($_SESSION['has_voted'])): ?>
    <p>Merci pour votre vote !</p>
    <p>Résultats du sondage :</p>
    <ul>
      <li>PHP : <?php echo $_SESSION['votes']['PHP']; ?> votes</li>
      <li>JavaScript : <?php echo $_SESSION['votes']['JavaScript']; ?> votes</li>
      <li>Python : <?php echo $_SESSION['votes']['Python']; ?> votes</li>
    </ul>
    <form method="post">
      <button type="submit" name="logout">Déconnexion</button>
    </form>
  <?php else: ?>
    <form method="post">
      <input type="radio" name="language" value="PHP" id="php">
      <label for="php">PHP</label><br>
      <input type="radio" name="language" value="JavaScript" id="javascript">
      <label for="javascript">JavaScript</label><br>
      <input type="radio" name="language" value="Python" id="python">
      <label for="python">Python</label><br>
      <button type="submit" name="vote">Voter</button>
    </form>
  <?php endif; ?>

  <?php if (isset($_SESSION['has_voted'])): ?>
    <p>Vous avez déjà voté !</p>
  <?php endif; ?>
</body>

</html>