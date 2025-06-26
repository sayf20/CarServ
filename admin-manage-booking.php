<?php
// Paramètres de connexion à la base de données
$host = 'mzprofksayf.mysql.db';
$dbname = 'mzprofksayf';
$username = 'mzprofksayf'; // Nom d'utilisateur par défaut de MySQL sur XAMPP
$password = 'Allo123456'; // Mot de passe par défaut de MySQL sur XAMPP (laisser vide)


try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}

// Approuver une réservation
if (isset($_GET['approve_id'])) {
    $approve_id = $_GET['approve_id'];
    $stmt = $pdo->prepare("UPDATE reservations SET status='Approved' WHERE id=?");
    $stmt->execute([$approve_id]);
    echo "<p>Réservation approuvée avec succès !</p>";
}

// Supprimer une réservation
if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];
    $stmt = $pdo->prepare("DELETE FROM reservations WHERE id=?");
    $stmt->execute([$delete_id]);
    echo "<p>Réservation supprimée avec succès !</p>";
}

// Récupérer toutes les réservations
$stmt = $pdo->query("SELECT * FROM reservations");
$reservations = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Admin - Gérer les Réservations</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container my-5">
    <h1>Gérer les Réservations</h1>

    <!-- Affichage des réservations -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Email</th>
                <th>Service</th>
                <th>Date</th>
                <th>Demande Spéciale</th>
                <th>Statut</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($reservations as $reservation) { ?>
                <tr>
                    <td><?php echo htmlspecialchars($reservation['id']); ?></td>
                    <td><?php echo htmlspecialchars($reservation['name']); ?></td>
                    <td><?php echo htmlspecialchars($reservation['email']); ?></td>
                    <td><?php echo htmlspecialchars($reservation['service']); ?></td>
                    <td><?php echo htmlspecialchars($reservation['service_date']); ?></td>
                    <td><?php echo htmlspecialchars($reservation['special_request']); ?></td>
                    <td><?php echo htmlspecialchars($reservation['status']); ?></td>
                    <td>
                        <a href="?approve_id=<?php echo $reservation['id']; ?>" class="btn btn-success btn-sm">Approuver</a>
                        <a href="?delete_id=<?php echo $reservation['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette réservation ?');">Supprimer</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

</body>
</html>

<?php
$pdo = null;
?>
