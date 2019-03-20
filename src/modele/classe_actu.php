<?php
class Actualite{
    private $db;
    private $insert; // Étape 1
    private $select;
    
    public function __construct($db)
    {
        $this->db = $db;
        $this->insert = $db->prepare("insert into Actualités(id, titre, contenu) values(NULL, :titre, :contenu)");   // Étape 2     
        $this->select = $db->prepare("select titre from Actualités order by titre");
    }
    
    public function insert($titre, $contenu)
    {
        $r = true;
        $this->insert->execute(array(':titre'=>$titre,':contenu'=>$contenu));
        if ($this->insert->errorCode()!=0){
            print_r($this->insert->errorInfo());  
            $r=false;
        }
        return $r;
    }
    
    public function select()
    {
        $this->select->execute();
        if($this->select->errorCode()!=0){
            print_r($this->select->errorInfo());
        }
        return $this->select->fetchAll();
    }
}