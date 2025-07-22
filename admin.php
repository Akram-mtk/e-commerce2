<?php
$host = "localhost";
$user = "root";
$password = "";
$dbname = "nike_store";

$conn = new mysqli($host, $user, $password, $dbname);
if ($conn->connect_error) {
    die("❌ Connexion échouée : " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = trim($_POST['nom']);
    $prix = trim($_POST['prix']);
    $image = $_FILES['image']['name'];
    $tailles = implode(",", $_POST['tailles']); 

    $target_dir = "images/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        echo "✅ L'image a été téléchargée avec succès.<br>";
    } else {
        echo "❌ Une erreur s'est produite lors du téléchargement de l'image.<br>";
    }

    $sql = "INSERT INTO produit (nom, prix, image, tailles) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    if ($stmt) {
        $stmt->bind_param("ssss", $nom, $prix, $image, $tailles);
        if ($stmt->execute()) {
            echo "✅ Produit ajouté avec succès !<br>";
        } else {
            echo "❌ Erreur d'insertion dans la base de données : " . $stmt->error . "<br>";
        }
        $stmt->close();
    } else {
        echo "❌ Erreur de préparation de la requête : " . $conn->error . "<br>";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Administration - Ajouter un Produit</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <nav class="navbar">
    <span>🏠 Administration</span>
    <ul>
      <li><a href="index.php">Retour au site</a></li>
    </ul>
  </nav>

  <div id="form-container">
    <h2>Ajouter un nouveau produit</h2>
    <form action="admin.php" method="POST" enctype="multipart/form-data">
      <div class="form-field">
        <label for="nom">Nom du produit :</label>
        <input type="text" name="nom" id="nom" required>
      </div>

      <div class="form-field">
        <label for="prix">Prix du produit :</label>
        <input type="text" name="prix" id="prix" required>
      </div>

      <div class="form-field">
        <label for="image">Image du produit :</label>
        <input type="file" name="image" id="image" accept="image/*" required>
      </div>

      <div class="form-field">
        <label for="tailles">Tailles disponibles :</label>
        <select name="tailles[]" id="tailles" multiple required>
          <option value="39">39</option>
          <option value="40">40</option>
          <option value="41">41</option>
          <option value="42">42</option>
          <option value="43">43</option>
          <option value="44">44</option>
        </select>
      </div>

      <div class="form-actions">
        <button type="submit">Ajouter le produit</button>
      </div>
    </form>
  </div>

  <footer>
    <p>&copy; <?= date('Y') ?> Nike TN. Tous droits réservés.</p>
  </footer>
</body>
</html>

<?php $conn->close(); ?>
