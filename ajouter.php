<?php
include 'db.php';

$type = $_GET['type'] ?? null;

$titres = [
    'employe' => 'Ajouter un Employé',
    'client' => 'Ajouter un Client',
    'document' => 'Ajouter un Document'
];

if (!in_array($type, ['employe', 'client', 'document'])){
    die("Type invalide !");
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title><?= $titres[$type] ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="container mt-4">
    <h2><?= $titres[$type] ?></h2>

    <form method="post" action="traitement_ajout.php">
        <input type="hidden" name="type" value="<?= $type ?>">

        <?php if ($type == 'employe'): ?>
            <div class="mb-3">
                <label class="form-label">Nom</label>
                <input type="text" name="nom" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Poste</label>
                <input type="text" name="poste" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Date d'embauche</label>
                <input type="date" name="date_embauche" class="form-control" required>
            </div>

        <?php elseif ($type == 'client'): ?>
            <div class="mb-3">
                <label class="form-label">Nom</label>
                <input type="text" name="nom" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Téléphone</label>
                <input type="text" name="telephone" class="form-control" required>
            </div>

        <?php elseif ($type == 'document'): ?>
            <div class="mb-3">
                <label class="form-label">Titre</label>
                <input type="text" name="titre" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Auteur</label>
                <input type="text" name="auteur" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Année de publication</label>
                <input type="number" name="annee_publication" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Type</label>
                <select name="type_document" class="form-control" required>
                    <option value="Livre">Livre</option>
                    <option value="Magazine">Magazine</option>
                    <option value="Thèse">Thèse</option>
                    <option value="Article">Article</option>
                </select>
            </div>
        <?php endif; ?>

        <button type="submit" class="btn btn-success">Ajouter</button>
        <a href="index.php" class="btn btn-secondary">Annuler</a>
    </form>
</body>
</html>
