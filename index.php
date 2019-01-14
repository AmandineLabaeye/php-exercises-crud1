<style>

    table {
        margin: 0 auto;
        border: double darkred 5px;
    }

    th {
        background-color: #a84421;
        font-size: 25px;
        padding: 30px;
        text-align: center;
        color: white;
        font-weight: lighter;
    }

    td {
        background-color: #f8602c;
        color: white;
        font-size: 20px;
        padding: 15px;
        text-align: center;
        font-weight: lighter;
    }

    u {
        color: darkred;
    }

    .F {
        text-align: center;
        color: darkblue;
        border: double black 5px;
        padding: 20px;
        border-radius: 30px;
        font-size: 20px;
    }

    .Flex {
        display: flex;
        justify-content: space-around;
        align-items: flex-start;
        flex-direction: row;
        flex-wrap: wrap;
        width: 100vw;
    }

    .Fux {
        text-align: center;
        color: darkblue;
        border: double black 5px;
        padding: 20px;
        border-radius: 30px;
        font-size: 20px;
        margin-top: 10px;
    }

</style>

<?php
/**
 * Created by PhpStorm.
 * User: Administrateur
 * Date: 14/01/2019
 * Time: 10:07
 */

$servername = "localhost";

$username = "root";

$password = "";

$dbname = "colyseum";

$connexion = new mysqli($servername, $username, $password);

if ($connexion->connect_error) {

    die("Connection failed: " . $connexion->connect_error);

} else {

    $connexion->select_db($dbname);

}

$clients = "Select * from clients where 1";

$con = $connexion->query($clients);

Echo "<table>";

Echo "<tr> <th> Exercice 1 </th></tr>";

Echo "</table>";

Echo "<br> <br>";

Echo "<table>";

Echo "<tr><th> Nom </th><th> Prenom </th><th> Date de Naissance </th></tr>";

while ($row = $con->fetch_assoc()) {

    Echo "<tr><td>" . $row["lastName"] . "</td><td>" . $row["firstName"] . "</td><td>" . $row["birthDate"] . "</td></tr>";

}

Echo "</table>";

Echo "<br><br>";

Echo "<table>";

Echo "<tr> <th> Exercice 2 </th></tr>";

Echo "</table>";

Echo "<br> <br>";

$showtype = "Select distinct * from showtypes where 1";

$con = $connexion->query($showtype);

Echo "<table>";

Echo "<tr><th> Type de concert </th></tr>";

while ($row = $con->fetch_assoc()) {

    Echo "<tr><td>" . $row["type"] . "</td></tr>";

}

Echo "</table>";

Echo "<br><br>";

Echo "<table>";

Echo "<tr> <th> Exercice 3 </th></tr>";

Echo "</table>";

Echo "<br> <br>";

$vingtclients = "Select * from clients where 1 LIMIT 0, 20";

$con = $connexion->query($vingtclients);

Echo "<table>";

Echo "<tr><th> Number </th><th> Nom </th><th> Prenom </th><th> Date de Naissance </th></tr>";

while ($row = $con->fetch_assoc()) {

    Echo "<tr><td>" . $row["id"] . "</td><td>" . $row["lastName"] . "</td><td>" . $row["firstName"] . "</td><td>" . $row["birthDate"] . "</td></tr>";

}

Echo "</table>";

Echo "<br> <br>";

Echo "<table>";

Echo "<tr> <th> Exercice 4 </th></tr>";

Echo "</table>";

Echo "<br> <br>";

$clientcarte = "Select * from clients, cards, cardtypes where cardtypes.id = cards.cardTypesId and clients.cardNumber = cards.cardNumber and cards.cardTypesId = 1";

$con = $connexion->query($clientcarte);

Echo "<table>";

Echo "<tr><th> Nom </th><th> Prenom </th><th> Nbr Carte </th></tr>";

while ($row = $con->fetch_assoc()) {

    Echo "<tr><td>" . $row["lastName"] . "</td><td>" . $row["firstName"] . "</td><td>" . $row["card"] . "</td></tr>";

}

Echo "</table>";

Echo "<br><br>";

Echo "<table>";

Echo "<tr> <th> Exercice 5 </th></tr>";

Echo "</table>";

$nomclient = "Select * from clients where lastName LIKE 'M%' ORDER BY lastName ASC";

$con = $connexion->query($nomclient);

while ($row = $con->fetch_assoc()) {

    Echo "<br><br><div class='F'> <u><b>Nom du client</b></u> : " . $row["lastName"] . "<br> <u><b>Prenom du client</b></u> : " . $row["firstName"] . "</div>";

}

Echo "<br> <br>";

Echo "<table>";

Echo "<tr> <th> Exercice 6 </th></tr>";

Echo "</table>";

$titre = "Select * from shows where 1 ORDER BY title ASC";

$con = $connexion->query($titre);

while ($row = $con->fetch_assoc()) {

    Echo "<br><br><div class='F'> <u><b>Titre du spectacle</b></u> : " . $row["title"] . "<br> <u><b>Nom de l'artiste</b></u> : " . $row["performer"] . "<br> <u><b>Date du spectacle</b></u> : " . $row["date"] . "<br> <u><b>Heure de commencement</b></u> : " . $row["startTime"] . "</div>";

}

Echo "<br><br>";

Echo "<table>";

Echo "<tr> <th> Exercice 7 </th></tr>";

Echo "</table>";

$client = "select distinct * from clients left join cards on (cards.cardNumber = clients.cardNumber) where 1";

$con = $connexion->query($client);

Echo "<div class='Flex'>";

while ($row = $con->fetch_assoc()) {

    if ($row["cardTypesId"] == 1) {

        $Carte = "Oui";

        $Number = $row["cardNumber"];

    } else {

        $Carte = "Non";

        $Number = "none";

    }

    Echo "<br><br><div class='Fux'><u><b>Nom</b></u> : " . $row["lastName"] . "<br> <u><b>Prenom</b></u> : " . $row["firstName"] . "<br> <u><b>Date de naissance</b></u> : " . $row["birthDate"] . "<br> <u><b>Carte de fidélité</b></u> : " . $Carte . "<br> <u><b>Numéro de la carte</b></u> : " . $Number . "</div>";

}

Echo "</div>";


