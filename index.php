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


    $test = new PersonneManager($connexionDb);
    $nouvellePersonne = new Personne("Dupont", "Jean", "3 rue des gens", 4000, "Liege", "Belgique",);
    $test->create($nouvellePersonne);


    ?>

</body>

</html>