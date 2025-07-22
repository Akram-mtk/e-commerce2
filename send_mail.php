<!-- <?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'src/Exception.php';
require 'src/PHPMailer.php';
require 'src/SMTP.php';

$nom = $_POST['nom'] ?? '';
$prenom = $_POST['prenom'] ?? '';
$adresse = $_POST['adresse'] ?? '';
$emailClient = $_POST['email'] ?? '';
$indicatif = $_POST['indicatif'] ?? '';
$numero = $_POST['numero'] ?? '';
$paiement = $_POST['paiement'] ?? '';
$produitsJson = $_POST['produits_json'] ?? '[]';
$produits = json_decode($produitsJson, true);

$message = "<h2>Nouvelle commande client</h2>";
$message .= "<p><strong>Nom :</strong> $nom</p>";
$message .= "<p><strong>Prénom :</strong> $prenom</p>";
$message .= "<p><strong>Adresse :</strong> $adresse</p>";
$message .= "<p><strong>Email :</strong> $emailClient</p>";
$message .= "<p><strong>Téléphone :</strong> $indicatif $numero</p>";
$message .= "<p><strong>Compte bancaire :</strong> $paiement</p>";
$message .= "<h3>Produits commandés :</h3>";

if (!empty($produits)) {
    $message .= "<ul>";
    foreach ($produits as $produit) {
        $nomProduit = htmlspecialchars($produit['nom']);
        $taille = htmlspecialchars($produit['taille']);
        $prix = htmlspecialchars($produit['prix']);
        $message .= "<li>$nomProduit (Taille: $taille) - $prix €</li>";
    }
    $message .= "</ul>";
} else {
    $message .= "<p>Aucun produit trouvé dans le panier.</p>";
}

$mail = new PHPMailer(true);



try {
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com'; 
    $mail->SMTPAuth = true;
    $mail->Username = 'benlalamrayane@gmail.com';   
    $mail->Password = 'bavemgtnfqfogzkf';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    $mail->setFrom('benlalamrayane@gmail.com', 'Nike TN Store');
    $mail->addAddress('benlalamrayane@gmail.com');

    $mail->isHTML(true);
    $mail->Subject = 'Nouvelle commande client';
    $mail->Body    = $message;

    $mail->send();
    echo "Commande envoyée avec succès !";
} catch (Exception $e) {
    echo "Erreur lors de l'envoi de l'e-mail : {$mail->ErrorInfo}";
}
?> -->
