<?php

namespace App\Demo\manager;

use Faker\Factory;
use App\Demo\entity\Personne;



/**
 *PersonneManager
 *Gestion des personnes (CRUD, Faker)
 */

class PersonneManager
{

    private $connexion;


    public function getConnexion()
    {
        return $this->connexion;
    }

    public function setConnexion($connexion)
    {
        $this->connexion = $connexion;
    }

    public function __construct($connexion)
    {
        $this->connexion = $connexion;
    }


    /**
     * create_personn
     * Permet de créer un nombre d'objet Personne défini avec de faux attributs générés 
     */
    public static function create_personn($nb)
    {

        // use the factory to create a Faker\Generator instance
        $faker = Factory::create('fr_FR');




        echo "<table class='table table-bordered'>";
        echo "<thead class='thead-dark'><tr class='table-primary'><th> </th><th>Nom</th><th>Prénom</th><th>Adresse</th><th>Code Postal</th><th>Pays</th><th>Société</th></tr></thead>";


        for ($i = 0; $i < $nb; $i++) {

            $FakePersonn = new Personne(
                $faker->lastname(),
                $faker->firstname(),
                $faker->address(),
                $faker->postcode(),
                $faker->city(),
                $faker->country(),
                $faker->company()
            );


            echo "<tbody>";
            echo "<tr><th>" . $i + 1 . "</th>";
            echo "<td>" . $FakePersonn->getNom() . "</td>";
            echo "<td>" . $FakePersonn->getPrenom() . "</td>";
            echo "<td>" . $FakePersonn->getAdresse() . "</td>";
            echo "<td>" . $FakePersonn->getCodePostal() . "</td>";
            echo "<td>" . $FakePersonn->getPays() . "</td>";
            echo "<td>" . $FakePersonn->getSociete() . "</td></tr></tbody>";
        }

        echo "</table>";
    }



    /**
     * Méthode d'insertion des données en base
     * 
     */
    public function insert(Personne $personne)
    {
        $stmt = $this->getConnexion()->prepare(
            'INSERT INTO Faker SET nom=:nom, prenom=:prenom, Personne$personne=:Personne$personne, codePostal=:codePostal, ville=:ville, pays=:pays, societe=:societe'
        );
        // la methode bindValue lie les valeurs (':nom', valeur)
        $stmt->bindValue(':nom', $personne->getNom());
        $stmt->bindValue(':prenom', $personne->getPrenom());
        $stmt->bindValue(':Personne$personne', $personne->getAdresse());
        $stmt->bindValue(':codePostal', $personne->getCodePostal());
        $stmt->bindValue(':pays', $personne->getPays());
        $stmt->bindValue(':ville', $personne->getVille());
        $stmt->bindValue(':societe', $personne->getSociete());

        $stmt->execute();
    }


    public function readAll()
    {
        $personnes = [];
        $query = $this->getConnexion()->query(
            "SELECT * FROM Faker"
        );

        while ($data = $query->fetch(\PDO::FETCH_ASSOC)) {
            $personnes[] = new Personne(
                nom: $data['nom'],
                prenom: $data['prenom'],
                adresse: $data['adresse'],
                codePostal: $data['codePostal'],
                ville: $data['ville'],
                pays: $data['pays'],
                societe: $data['societe']
            );
        }

        return $personnes;
    }

    public function readById($id)
    {
        $id = (int) $id;

        // REQUETE SQL
        $query = $this->getConnexion()->query(
            'SELECT id, nom, prenom, adresse, codePostal, ville, pays, societe
            FROM Faker 
            WHERE id = ' . $id
        );


        // EXECUTION DE LA REQUETE SQL
        $datas = $query->fetch(\PDO::FETCH_ASSOC);

        // PDO::FETCH_ASSOC: retourne une tableau indexé
        // "nom du champ" => "valeur"


        // CREATION ET RENVOI DE LA PERSONNE (les clefs sont les meme que 
        // les nom de champs de la DB)

        return new Personne(
            $datas["nom"],
            $datas["prenom"],
            $datas["adresse"],
            $datas["codePostal"],
            $datas["ville"],
            $datas["pays"],
            $datas["societe"]
        );
    }


    public function update($id, Personne $personne)
    {
        $stmt = $this->getConnexion()->prepare(
            'UPDATE Faker SET nom=:nom, prenom=:prenom, adresse=:adresse, codePostal=:codePostal, ville=:ville, pays=:pays, societe=:societe WHERE id=:id'
        );

        $stmt->bindValue(':id', $id);
        $stmt->bindValue(':nom', $personne->getNom());
        $stmt->bindValue(':prenom', $personne->getPrenom());
        $stmt->bindValue(':adresse', $personne->getAdresse());
        $stmt->bindValue(':codePostal', $personne->getCodePostal());
        $stmt->bindValue(':pays', $personne->getPays());
        $stmt->bindValue(':ville', $personne->getVille());
        $stmt->bindValue(':societe', $personne->getSociete());


        $stmt->execute();
    }


    public function delete($id)
    {
        $this->getConnexion()->exec('DELETE FROM Faker WHERE id=' . $id);
    }
}
