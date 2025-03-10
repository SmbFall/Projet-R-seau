<?php
include 'db.php';

// Vérifier le type d'ajout
$type = $_POST['type'] ?? '';

// Exécuter la requête SQL en fonction du type
if ($type == 'employe') {
    $stmt = $pdo->prepare("INSERT INTO employes (nom, email, poste, date_embauche) VALUES (?, ?, ?, ?)");
    $stmt->execute([$_POST['nom'], $_POST['email'], $_POST['poste'], $_POST['date_embauche']]);

} elseif ($type == 'client') {
    $stmt = $pdo->prepare("INSERT INTO clients (nom, email, telephone) VALUES (?, ?, ?)");
    $stmt->execute([$_POST['nom'], $_POST['email'], $_POST['telephone']]);

} elseif ($type == 'document') {
    $stmt = $pdo->prepare("INSERT INTO documents (titre, auteur, annee_publication, type_document) VALUES (?, ?, ?, ?)");
    $stmt->execute([$_POST['titre'], $_POST['auteur'], $_POST['annee_publication'], $_POST['type_document']]);

} else {
    die("Type d'ajout invalide !");
}


header("Location: index.php?type=$type");
exit();
?>
