<?php
$host = "localhost";
$user = "root";
$password = "";
$dbname = "nike_store";

$conn = new mysqli($host, $user, $password, $dbname);
if ($conn->connect_error) {
    die("❌ Connexion échouée : " . $conn->connect_error);
}

$search = isset($_GET['q']) ? trim($_GET['q']) : '';

if (!empty($search)) {
    $stmt = $conn->prepare("
        SELECT nom, image, prix, GROUP_CONCAT(DISTINCT tailles ORDER BY tailles SEPARATOR ',') AS tailles
        FROM produit
        WHERE nom LIKE CONCAT('%', ?, '%')
        GROUP BY nom, image, prix
    ");
    $stmt->bind_param("s", $search);
    $stmt->execute();
    $result = $stmt->get_result();
} else {
    $sql = "
        SELECT nom, image, prix, GROUP_CONCAT(DISTINCT tailles ORDER BY tailles SEPARATOR ',') AS tailles
        FROM produit
        GROUP BY nom, image, prix
    ";
    $result = $conn->query($sql);
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Nike TN Shop</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <nav class="navbar">
    <span>🏠 Nike TN</span>
    <form method="GET" action="index.php" class="search-form">
     <input type="text" name="q" placeholder="Rechercher un produit..." value="<?= isset($_GET['q']) ? htmlspecialchars($_GET['q']) : '' ?>" />
     <button type="submit">🔍</button>
     </form>
    <ul>
      <li><a href="#contact">Contact</a></li>
      <li><a href="panier.html" id="cart-link">Panier (<span id="cart-count">0</span>)</a></li>
    </ul>
  </nav>

  <div class="hero">
    <h1>Bienvenue sur notre boutique Nike TN</h1>
    <p>Découvrez nos meilleures paires !</p><br>
    <p>Style, confort, performance – tout en une paire.</p>
  </div>

  <div class="products">
    <?php if ($result && $result->num_rows > 0): ?>
      <?php while($row = $result->fetch_assoc()): ?>
        <div class="product-card">
        <img src="images/<?php echo htmlspecialchars($row['image']); ?>" alt="<?php echo htmlspecialchars($row['nom']); ?>" />
          <h3><?= htmlspecialchars($row['nom']) ?></h3>
          <p><?= number_format($row['prix'], 2) ?> $</p>
          <div>
            <label>Pointure :</label><br>
            <?php foreach (explode(',', $row['tailles']) as $taille): ?>
              <label>
                <input type="radio" name="taille_<?= md5($row['nom']) ?>" value="<?= trim($taille) ?>">
                <?= trim($taille) ?>
              </label>
            <?php endforeach; ?>
         </div>
             <button onclick="ajouterAuPanier('<?= addslashes($row['nom']) ?>','<?= addslashes($row['image']) ?>',getSelectedSize(this),this,<?= $row['prix'] ?>)">Ajouter au panier</button>
          </div>
      <?php endwhile; ?>
    <?php else: ?>
      <p>Aucun produit disponible.</p>
    <?php endif; ?>
  </div>

  <div id="apercu-panier" class="apercu-panier"></div>

  <div id="contact" class="contact">
    <h2>Contactez-nous</h2>
    <p>Email : benlalamrayane@gmail.com | Téléphone : +213 549 107 247</p>
  </div>

  <footer>
    <p>&copy; <?= date('Y') ?> Nike TN. Tous droits réservés.</p>
  </footer>

  <script src="script.js"></script>
</body>
</html>

<?php $conn->close(); ?>
