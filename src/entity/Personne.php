<?php

namespace App\Demo\entity;

/**
 * Class Personne
 * Permet de créer une personne et acceder et modifier
 * ses proprietes via getters et setters
 */

class Personne
{
    private $Nom;
    private $Prenom;
    private $Adresse;
    private $CodePostal;
    private $Pays;
    private $Societe;


    public function __construct($arg)
    {
        $this->Nom = $arg['nom'];
        $this->Prenom = $arg['prenom'];
        $this->Adresse = $arg['adresse'];
        $this->CodePostal = $arg['codePostal'];
        $this->Pays = $arg['pays'];
        $this->Societe = $arg['societe'];
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
}
