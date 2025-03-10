<?php
include 'db.php';

// Récupération des paramètres type depuis l'URL
$type = $_GET['type'] ?? null;

// Récupérer les employés, clients et documents
$employes = $pdo->query("SELECT * FROM employes")->fetchAll(PDO::FETCH_ASSOC);
$clients = $pdo->query("SELECT * FROM clients")->fetchAll(PDO::FETCH_ASSOC);
$documents = $pdo->query("SELECT * FROM documents")->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion de Smarttech</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="container mt-4">

    <h1 class="text-center mb-4">Gestion de Smarttech</h1>

    <ul class="nav nav-tabs">
        <li class="nav-item"><a class="nav-link <?= ($type === 'employe') ? 'active' : '' ?>" href="index.php?type=employe">Employés</a></li>
        <li class="nav-item"><a class="nav-link <?= ($type === 'client') ? 'active' : '' ?>" href="index.php?type=client">Clients</a></li>
        <li class="nav-item"><a class="nav-link <?= ($type === 'document') ? 'active' : '' ?>" href="index.php?type=document">Documents</a></li>
    </ul>

    <div class="tab-content mt-3">
        <?php if ($type === 'employe' || !$type): ?>
        <div class="tab-pane fade <?= ($type === 'employe') ? 'show active' : '' ?>" id="employes">
            <h2>Liste des Employés</h2>
            <table class="table table-bordered">
                <tr><th>ID</th><th>Nom</th><th>Email</th><th>Poste</th><th>Date d'embauche</th><th>Actions</th></tr>
                <?php foreach ($employes as $emp): ?>
                    <tr>
                        <td><?= $emp['id'] ?></td>
                        <td><?= $emp['nom'] ?></td>
                        <td><?= $emp['email'] ?></td>
                        <td><?= $emp['poste'] ?></td>
                        <td><?= $emp['date_embauche'] ?></td>
                        <td>
                            <a href="modifier.php?id=<?= $emp['id'] ?>" class="btn btn-warning btn-sm">Modifier</a>
                            <a href="supprimer.php?type=employe&id=<?= $emp['id'] ?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet employé ?');" class="btn btn-danger btn-sm">Supprimer</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
            <a href="ajouter.php?type=employe" class="btn btn-success">Ajouter Employé</a>
        </div>
        <?php endif; ?>

        <?php if ($type === 'client' || !$type): ?>
        <div class="tab-pane fade <?= ($type === 'client') ? 'show active' : '' ?>" id="clients">
            <h2>Liste des Clients</h2>
            <table class="table table-bordered">
                <tr><th>ID</th><th>Nom</th><th>Email</th><th>Téléphone</th><th>Actions</th></tr>
                <?php foreach ($clients as $cli): ?>
                    <tr>
                        <td><?= $cli['id'] ?></td>
                        <td><?= $cli['nom'] ?></td>
                        <td><?= $cli['email'] ?></td>
                        <td><?= $cli['telephone'] ?></td>
                        <td>
                            <a href="modifier.php?id=<?= $cli['id'] ?>" class="btn btn-warning btn-sm">Modifier</a>
                            <a href="supprimer.php?type=client&id=<?= $cli['id'] ?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce client ?');" class="btn btn-danger btn-sm">Supprimer</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
            <a href="ajouter.php?type=client" class="btn btn-success">Ajouter Client</a>
        </div>
        <?php endif; ?>

        <?php if ($type === 'document' || !$type): ?>
        <div class="tab-pane fade <?= ($type === 'document') ? 'show active' : '' ?>" id="documents">
            <h2>Liste des Documents</h2>
            <table class="table table-bordered">
                <tr><th>ID</th><th>Titre</th><th>Auteur</th><th>Année</th><th>Type</th><th>Actions</th></tr>
                <?php foreach ($documents as $doc): ?>
                    <tr>
                        <td><?= $doc['id'] ?></td>
                        <td><?= $doc['titre'] ?></td>
                        <td><?= $doc['auteur'] ?></td>
                        <td><?= $doc['annee_publication'] ?></td>
                        <td><?= $doc['type_document'] ?></td>
                        <td>
                            <a href="modifier.php?id=<?= $doc['id'] ?>" class="btn btn-warning btn-sm">Modifier</a>
                            <a href="supprimer.php?type=document&id=<?= $doc['id'] ?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce document ?');" class="btn btn-danger btn-sm">Supprimer</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
            <a href="ajouter.php?type=document" class="btn btn-success">Ajouter Document</a>
        </div>
        <?php endif; ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
