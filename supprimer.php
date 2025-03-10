<?php
include 'db.php';

// Récupérer les paramètres type et id depuis l'URL
$type = $_GET['type'] ?? null;
$id = $_GET['id'] ?? null;

// Vérifier si le type et l'id sont valides
if (!$type || !$id || !in_array($type, ['client', 'employe', 'document'])) {
    die("Paramètres invalides !");
}

// Déterminer la table à supprimer en fonction du type
switch ($type) {
    case 'client':
        $table = 'clients';
        break;
    case 'employe':
        $table = 'employes';
        break;
    case 'document':
        $table = 'documents';
        break;
    default:
        die("Type invalide !");
}

// Préparer et exécuter la requête de suppression
$sql = "DELETE FROM $table WHERE id = :id";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':id', $id, PDO::PARAM_INT);

if ($stmt->execute()) {
   
    header("Location: index.php?type=$type");
    
} else {
    
    echo "Erreur lors de la suppression.";
}
?>
