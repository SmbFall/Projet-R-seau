<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $type = $_POST['type'];

    
    $conn = new mysqli("localhost", "username", "password", "database");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];

  
    switch ($type) {
        case 'employe':
            $sql = "UPDATE employes SET nom = ?, prenom = ?, email = ? WHERE id = ?";
            break;
        case 'client':
            $sql = "UPDATE clients SET nom = ?, prenom = ?, email = ? WHERE id = ?";
            break;
        case 'document':
            $sql = "UPDATE documents SET nom = ?, prenom = ?, email = ? WHERE id = ?";
            break;
        default:
            die("Type inconnu.");
    }

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssi", $nom, $prenom, $email, $id);

    if ($stmt->execute()) {
        echo "Modification réussie!";
        
        header("Location: liste_$type.php");
    } else {
        echo "Erreur lors de la modification : " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
