<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>

    <?php

    require "vendor/autoload.php";

    use App\Demo\Manager\PersonneManager;
    use App\Demo\entity\Personne;



    PersonneManager::create_personn(10);


    try {
        $connexionDb = new PDO(
            'mysql:host=localhost;dbname=poo_php',
            'root',
            'root'
        );
    } catch (Exception $exc) {
        die('Erreur : ' . $exc->getMessage());
    }


    // Test insertion d'une personne:

    $test = new PersonneManager($connexionDb);
    $nouvellePersonne = new Personne("Maurice", "Phillipe", "12 rue des Choses", 4000, "Liege", "Belgique", "clopes qui puent");
    // $test->insert($nouvellePersonne);


    // test de la fonction magique __toString() sur une personne instanciée:
    //---> echo $nouvellePersonne;


    // TEST READ ALL

    $personneRecup = $test->readAll();

    echo "<h2>Liste des personnes recupérées dans la BD</h2>";

    foreach ($personneRecup as $personne) {
        echo $personne . "<br>";
    }


    // TEST READ ID

    echo "<h2>Personne récupérée par son ID</h2>";

    $personneRecupId = $test->readById(3);
    echo $personneRecupId;


    ?>

</body>

</html>