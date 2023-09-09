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




$prefixe = $_POST['prefixe'];
$prenom = $_POST['prenom'];
$nom = $_POST['nom'];
$email = $_POST['email'];
$telephone_mobile = $_POST['telephone_mobile'];
$ville = $_POST['ville'];
$codepostal = $_POST['codepostal'];
$pays = $_POST['pays'];
$cursus = $_POST['cursus'];
$campus = $_POST['campus'];
$niveau = $_POST['niveau'];
$message = $_POST['message'];

if(empty($_POST['prefixe'])){
    echo "La variable POST est vide.";
} 

$sql = "INSERT INTO liste_inscrits (prefixe, prenom, nom, email, telephone_mobile, ville, codepostal, pays, cursus, campus, niveau, message) 
        VALUES ('$prefixe', '$prenom', '$nom', '$email', '$telephone_mobile', '$ville', '$codepostal', '$pays', '$cursus', '$campus', '$niveau', '$message')";

if ($conn->query($sql) === TRUE) {
    echo "Nouvelle ligne insérée avec succès.";
} else {
    echo "Erreur lors de l'insertion de la ligne : " . $conn->error;
}


$sql = "SELECT * FROM liste_inscrits";
$result = $conn->query($sql);

print_r($result);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Utilisateurs Inscrits</title>
</head>
<body>
    <table>
    <tr>
        <th>Préfixe <?php echo $prefixe; ?></th>
        <th>Prénom <?php echo $prenom; ?></th>
        <th>Nom <?php echo $nom; ?></th>
        <th>Email <?php echo $email; ?></th>
        <th>Téléphone Mobile <?php echo $telephone_mobile; ?></th>
        <th>Ville <?php echo $ville; ?></th>
        <th>Code Postal <?php echo $codepostal; ?></th>
        <th>Pays <?php echo $pays; ?></th>
        <th>Cursus Souhaité <?php echo $cursus; ?></th>
        <th>Campus Souhaité <?php echo $campus; ?></th>
        <th>Niveau actuel <?php echo $niveau; ?></th>
        <th>Quelques mots sur votre parcours et motivations <?php echo $message; ?></th>
    </tr>
    </table>
</body>
</html>