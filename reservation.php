<?php
// Paramètres de connexion à la base de données
$host = 'mzprofksayf.mysql.db';
$dbname = 'mzprofksayf';
$username = 'mzprofksayf'; // Nom d'utilisateur par défaut de MySQL sur XAMPP
$password = 'Allo123456'; // Mot de passe par défaut de MySQL sur XAMPP (laisser vide)

// Connexion à la base de données
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}

// Vérifier si le formulaire est soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $service = htmlspecialchars($_POST['service']);
    $service_date = $_POST['service_date'];
    $special_request = htmlspecialchars($_POST['special_request']);

    // Préparer la requête d'insertion
    $sql = "INSERT INTO reservations (name, email, service, service_date, special_request) 
            VALUES (:name, :email, :service, :service_date, :special_request)";
    $stmt = $pdo->prepare($sql);

    // Exécuter la requête d'insertion
    if ($stmt->execute(['name' => $name, 'email' => $email, 'service' => $service, 'service_date' => $service_date, 'special_request' => $special_request])) {
        echo "Réservation enregistrée avec succès.";
    } else {
        echo "Erreur lors de l'enregistrement de la réservation.";
    }
}
?>
