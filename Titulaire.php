<?php
class Titulaire {
// Attributs d'un titulaire de compte
    private string $_nom;
    private string $_prenom;
    private string $_dateN;
    private string $_ville;
    private array $_listeComptes;
// constructeur
    public function __construct (string $nom, string $prenom,string $dateN,string $ville){
        $this->_nom=$nom;
        $this->_prenom=$prenom;
        $this->_dateN=$dateN;
        $this->_ville=$ville;
        // On créée une liste de compte, vide lorsqu'on instancie un objet Titulaire
        $this->_listeComptes=[];

    }
// accesseurs
    public function getNom(){
        return $this->_nom;
    }
    public function getPrenom(){
        return $this->_prenom;
    }
    public function getDate(){
        return $this->_dateN;
    }
    public function getVille(){
        return $this->_ville;
    }
    public function getListecomptes(){
        return $this->_listeComptes;
    }
// mutateurs
    public function setNom($newNom){
        $this->_nom=$newNom;
    }
    public function setPrenom($newPrenom){
        $this->_prenom=$newPrenom;
    }
    public function setDate($newDate){
        $this->_dateN=$newDate;
    }
    public function setville($newVille){
        $this->_ville=$newVille;
    }
    public function setListecomptes($newListe){
        $this->_listeComptes=$newListe;
    }

//méthodes 
    //fonction addCompte pour ajouter un nouveau compte au tableau du titulaire
    //Penser à creer une condition pour éviter la création de plusieurs comptes avec même libellé.
    public function addCompte(Compte $compte){
        $this->_listeComptes[]=$compte;
    }
    //fonction getAge permet de calculer l'age du titulaire.
    public function getAge(string $dateN){
        $dateNTemp= DateTime::createFromFormat('d/m/Y', $dateN);
        $d=new DateTime("now");
        $diff = date_diff($dateNTemp, $d);
        return $diff->format('%y');        
    }
    // fonction toString pour l'affichage
    public function __toString(){
        return "<h4> Liste des comptes de : ".$this->getPrenom(). " ". $this->getNom()." (".$this->getAge($this->_dateN). "ans)</h4>
        **************************<br>";
    }
    // Fonction affichage. Permet de visualiser l'ensemble des données du Titulaire et la liste des comptes du titulaire
    public function getAffichage(){
        $result=$this;
        foreach($this->_listeComptes as $compte){
            $result.=$compte;
        }
        return $result;
    }
}

?>