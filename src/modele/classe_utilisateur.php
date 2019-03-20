<?php
class Utilisateur{
    private $db;
    private $insert;
    private $select;
    
    public function __construct($db)
    {
        $this->db = $db;
        $this->insert = $db->prepare("insert into Utilisateur(id, nom, prenom, adresse, cp, ville) values(NULL, :nom, :prenom, :adresse, :cp, :ville)");   // Étape 2     
        $this->select = $db->prepare("select nom, prenom from Utilisateur order by nom");
    }
    
    public function insert($nom, $prenom, $adresse, $cp, $ville)
    { // Étape 3
        $r = true;
        $this->insert->execute(array(':nom'=>$nom, ':prenom'=>$prenom, ':adresse'=>$adresse, ':cp'=>$cp,':ville'=>$ville));
        if ($this->insert->errorCode()!=0){
            print_r($this->insert->errorInfo());  
            $r=false;
        }
        return $r;
    }
    
    public function select()
    {
        $liste = $this->select->execute();
        if($this->select->errorCode()!=0){
            print_r($this->select->errorInfo());
        }
        return $this->select->fetchAll();
    }
}