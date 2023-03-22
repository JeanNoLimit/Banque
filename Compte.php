<?php

class Compte {
//attributs
    private string $_libelle;
    private float $_solde;
    private string $_devise;
    private Titulaire $_titulaire;
//constructeur
    public function __construct(string $libelle,float $solde,string $devise, Titulaire $titulaire ){
        $this->_libelle=$libelle;
        $this->_solde=$solde;
        $this->_devise=$devise;
        $this->_titulaire=$titulaire;
        //ajouter le nouveau compte dans la liste des comptes du titulaire
        $this->_titulaire->addCompte($this);
    }
//accesseurs
    public function getLibelle(){
        return  $this->_libelle;
    }

    public function getSolde(){
        return $this->_solde;
    }
    public function getDevise(){
        return $this->_devise;
    }
    public function getTitulaire(){
        return $this->_titulaire;
    }
//mutateurs
    public function setLibelle($newLibelle){
        $this->_libelle=$newLibelle;
    }
    public function setSolde($newsolde){
        $this->_solde=$newsolde;
    }
    public function setDevise($newDevise){
        $this->_devise=$newDevise;
    }
    public function setTitulaire($newTitulaire){
        $this->_titulaire=$newTitulaire;
    }
// fonction toString. 
// Affiche toutes les informations du compte ainsi que le nom et prénom du titulaire du compte. 
    public function __toString(){
        return "le compte <strong>". $this->getLibelle() . "</strong> dispose d'un solde de " . $this->getSolde() ." ". $this->getDevise(). 
        ".<br> Titulaire du compte : ". $this->_titulaire->getPrenom()." ".$this->_titulaire->getNom(). "<br><br>";

    }
// Fonction créditer
    public function credit($valeur){
       $this->_solde+=$valeur;
       echo "le compte <strong>". $this->getLibelle() . "</strong> a été de crédité de ". $valeur . $this->getDevise()."<br>";
       echo "Nouveau solde : ". $this->_solde . $this->getDevise()."<br>";
        return $this->_solde;
    }

// fonction débiter. On vérifie d'abbord la solvabilité du compte en question.
    public function debit($valeur){
        $tmp=$this->_solde-$valeur;
        if ($tmp<0) {
            echo "Solde du compte :". $this->getSolde() . $this->getDevise()." Debit demandé : ". $valeur.$this->getDevise()."<br>";             
            echo "Vous ne pouvez pas avoir un solde négatif!<br>";
        }
        else {
            $this->_solde-=$valeur;
            echo "le compte <strong> ". $this->getLibelle(). "</strong> a été débité de ". $valeur . $this->getDevise()."<br>";
            echo "Nouveau solde : ". $this->_solde . $this->getDevise()."<br>";
        }
        return $this->_solde;
    }
//Virement entre 2 comptes
    public function virement(float $somme,Compte $to){
        $tmp=$this->_solde-$somme;
        if ($tmp<0) {
            echo "virement impossible, solde inssufisant!<br>";
                // ...si virement sur le même compte
        }elseif($this->_libelle==$to->_libelle){
            echo "virement impossible sur le même compte!<br>";

        }
        else{
            $this->debit($somme);
            $to->credit($somme);
        }

    }
}


?>