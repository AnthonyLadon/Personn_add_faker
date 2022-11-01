<?php

namespace App\Demo\entity;

/**
 * Class Personne
 * Permet de créer une personne et acceder et modifier
 * ses proprietes via getters et setters
 */

class Personne
{
    protected $id = 0;
    private $Nom;
    private $Prenom;
    private $Adresse;
    private $CodePostal;
    private $Ville;
    private $Pays;
    private $Societe;

    // fonction constructeur avec ses parametres attendus
    public function __construct($nom, $prenom, $adresse, $codePostal, $ville, $pays, $societe)
    {
        $this->Nom = $nom;
        $this->Prenom = $prenom;
        $this->Adresse = $adresse;
        $this->CodePostal = $codePostal;
        $this->Ville = $ville;
        $this->Pays = $pays;
        $this->Societe = $societe;
    }

    function getNom()
    {
        return $this->Nom;
    }

    function setNom($nom)
    {
        return $this->Nom = $nom;
    }

    function getPrenom()
    {
        return $this->Prenom;
    }

    function setPrenom($prenom)
    {
        return $this->Prenom = $prenom;
    }

    function getAdresse()
    {
        return $this->Adresse;
    }

    function setAdresse($adresse)
    {
        return $this->Adresse = $adresse;
    }

    function getCodePostal()
    {
        return $this->CodePostal;
    }

    function setCodePostal($codePostal)
    {
        return $this->CodePostal = $codePostal;
    }

    function getVille()
    {
        return $this->Ville;
    }

    function setVille($ville)
    {
        return $this->Ville = $ville;
    }

    function getPays()
    {
        return $this->Pays;
    }

    function setPays($pays)
    {
        return $this->Pays = $pays;
    }

    function getSociete()
    {
        return $this->Societe;
    }

    function setSociete($societe)
    {
        return $this->Societe = $societe;
    }

    // fonction magique permet de echo l'objet Personne instancié
    public function __toString()
    {
        return $this->getNom() . " " . $this->getPrenom() . " " . $this->getAdresse() . " " . $this->getCodePostal() . " " . $this->getVille() . " " . $this->getPays() . " " . $this->getSociete();
    }
}
