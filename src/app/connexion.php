<?php

  function connect($config){
    try{
      $db = new PDO('mysql:host='.$config['serveur'].';dbname='.$config['bd'],$config['login'],$config['mdp']);
    }
    catch(Exception $e){
  	  //echo 'Echec: '.$e->getMessage();
  	  $db = NULL;
    }
    return $db;
  }
  
?>

