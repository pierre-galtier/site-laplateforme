<?php
$servername = "localhost";  // Nom du serveur MySQL (généralement "localhost" en local)
$username = "root";  // Nom d'utilisateur MySQL
$password = "";  // Mot de passe MySQL
$dbname = "inscriptions";  // Nom de la base de données

// Connexion à la base de données
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("La connexion a échoué : " . $conn->connect_error);
}

// Requête SELECT pour récupérer toutes les données de la table liste_inscrits
$sql = "SELECT * FROM liste_inscrits";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Liste des inscrits</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        h1 {
            text-align: center;
        }

        .inscrit {
            background-color: #f9f9f9;
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 5px;
        }

        .inscrit p {
            margin: 5px 0;
        }

        hr {
            border: none;
            border-top: 1px solid #ddd;
            margin: 20px 0;
        }

        .empty {
            text-align: center;
            font-style: italic;
            color: #888;
        }
    </style>
</head>
<body>
    <h1>Liste des inscrits</h1>
    <?php
    // Vérifier si des résultats ont été trouvés
    if ($result->num_rows > 0) {
        // Afficher les données
        while ($row = $result->fetch_assoc()) {
            echo '<div class="inscrit">';
            echo "<p><strong>ID:</strong> " . $row["id"] . "</p>";
            echo "<p><strong>Prénom:</strong> " . $row["prenom"] . "</p>";
            echo "<p><strong>Nom:</strong> " . $row["nom"] . "</p>";
            echo "<p><strong>Email:</strong> " . $row["email"] . "</p>";
            echo "<p><strong>Téléphone mobile:</strong> " . $row["telephone_mobile"] . "</p>";
            echo "<p><strong>Ville:</strong> " . $row["ville"] . "</p>";
            echo "<p><strong>Code postal:</strong> " . $row["codepostal"] . "</p>";
            echo "<p><strong>Pays:</strong> " . $row["pays"] . "</p>";
            echo "<p><strong>Cursus:</strong> " . $row["cursus"] . "</p>";
            echo "<p><strong>Campus:</strong> " . $row["campus"] . "</p>";
            echo "<p><strong>Niveau:</strong> " . $row["niveau"] . "</p>";
            echo "<p><strong>Message:</strong> " . $row["message"] . "</p>";
            echo "</div>";
            echo "<hr>";
        }
    } else {
        echo '<p class="empty">Aucun résultat trouvé dans la table liste_inscrits.</p>';
    }

    // Fermer la connexion
    $conn->close();
    ?>
</body>
</html>
