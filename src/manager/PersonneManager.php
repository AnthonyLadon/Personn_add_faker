<?php

namespace App\Demo\manager;

use Faker\Factory;
use App\Demo\entity\Personne;


/**
 * Class PersonneManager
 * Permet de créer un nombre d'objet Personne défini avec de faux attributs générés 
 */

class PersonneManager
{
    static function create_personn($nb)
    {

        // use the factory to create a Faker\Generator instance
        $faker = Factory::create('fr_FR');


        // initialisation talbeau vide
        $tabPersonnes = [];


        echo "<table class='table table-bordered'>";
        echo "<thead class='thead-dark'><tr class='table-primary'><th> </th><th>Nom</th><th>Prénom</th><th>Adresse</th><th>Code Postal</th><th>Pays</th><th>Société</th></tr></thead>";


        for ($i = 0; $i < $nb; $i++) {

            // création des attributs de $personn et stockage dans un tableau
            $tabPersonnes['nom'] = $faker->lastname();
            $tabPersonnes['prenom'] = $faker->firstname();
            $tabPersonnes['adresse'] = $faker->address();
            $tabPersonnes['codePostal'] = $faker->postcode();
            $tabPersonnes['pays'] = $faker->country();
            $tabPersonnes['societe'] = $faker->company();

            $personn = new Personne($tabPersonnes);

            echo "<tbody>";
            echo "<tr><th>" . $i + 1 . "</th><td>" . $personn->getNom() . "</td>";
            echo "<td>" . $personn->getPrenom() . "</td>";
            echo "<td>" . $personn->getAdresse() . "</td>";
            echo "<td>" . $personn->getCodePostal() . "</td>";
            echo "<td>" . $personn->getPays() . "</td>";
            echo "<td>" . $personn->getSociete() . "</td></tr></tbody>";

            // Remise à zéro du talbeau avant de revenir dans la boucle
            $tabPersonnes = [];
        }

        echo "</table>";
    }



    private $connexion;


    public function __construct($connexion)
    {
        $this->connexion = $connexion;
    }

    public function getConnexion()
    {
        return $this->connexion;
    }

    public function setConnexion($connexion)
    {
        $this->connexion = $connexion;
    }



    public function create(Personne $personne)
    {
        // PREPARE THE REQUEST

        $stmt = $this->getConnexion()->prepare(
            'INSERT INTO Adresse_faker SET Nom=:Nom, Prenom=:Prenom, Adresse= :Adresse, CodePostal=:CodePostal, Pays=:Pays, Societe=:Societe'
        );


        // BIND THE VALUES INTO THE STATEMENT

        $stmt->bindValue(':Nom', $personne->getNom());
        $stmt->bindValue(':Prenom', $personne->getPrenom());
        $stmt->bindValue(':Adresse', $personne->getAdresse());
        $stmt->bindValue(':CodePostal', $personne->getCodePostal());
        $stmt->bindValue(':Pays', $personne->getPays());
        $stmt->bindValue(':Societe', $personne->getSociete());


        // EXCUTE THE REQUEST

        $stmt->execute();
    }
}
