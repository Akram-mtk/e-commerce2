<?php
date_default_timezone_set('Africa/Algiers'); 

$host = "localhost";
$user = "root";
$password = "";
$dbname = "nike_store";

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die("❌ Échec de la connexion : " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo "🧪 Données POST reçues<br>";

    $nom = trim($_POST['nom']);
    $prenom = trim($_POST['prenom']);
    $adresse = trim($_POST['adresse']);
    $email = trim($_POST['email']);
    $indicatif = trim($_POST['indicatif']);
    $numero = trim($_POST['numero']);
    $paiement = trim($_POST['paiement']);
    $date_commande = date('Y-m-d H:i:s'); 

    echo "✅ Données récupérées : $nom, $prenom, $adresse, $email, $indicatif, $numero, $paiement<br>";

    if (empty($nom) || empty($prenom) || empty($adresse) || empty($email) || empty($indicatif) || empty($numero) || empty($paiement)) {
        echo "❌ Tous les champs sont obligatoires.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "❌ Adresse e-mail invalide.";
    } else {
        echo "🧪 Données valides, insertion en cours...<br>";

        $sql = "INSERT INTO commandes (nom, prenom, adresse, email, indicatif, numero, paiement, date_commande)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = $conn->prepare($sql);
        if (!$stmt) {
            echo "❌ Erreur de préparation : " . $conn->error;
        } else {
            $stmt->bind_param("ssssssss", $nom, $prenom, $adresse, $email, $indicatif, $numero, $paiement, $date_commande);             
            if ($stmt->execute()) {
                echo "✅ Insertion réussie<br>";
                header("Location: confirmation.html");
                exit();
            } else {
                echo "❌ Erreur lors de l'exécution : " . $stmt->error;
            }
            $stmt->close();
        }
    }
}

$conn->close();
?>
