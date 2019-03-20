<?php
function getPage($db){

// Inscrire vos contrôleurs ici    
$lesPages['accueil'] = "actionAccueil";
$lesPages['mentions'] = "actionMentions";
$lesPages['maintenance'] = "actionMaintenance";
$lesPages['utilisateur'] = "actionUtilisateur";

if ($db!=null){
  if(isset($_GET['page'])){
    // Nous mettons dans la variable $page, la valeur qui a été passée dans le lien
    $page = $_GET['page']; }
  else{
    // S'il n'y a rien en mémoire, nous lui donnons la valeur « accueil » afin de lui afficher une page
    //par défaut
    $page = 'accueil';
  }

  if (!isset($lesPages[$page])){
    // Nous rentrons ici si cela n'existe pas, ainsi nous redirigeons l'utilisateur sur la page d'accueil
    $page = 'accueil'; 
  }

  $contenu = $lesPages[$page];
}
else{
  $contenu = $lesPages['maintenance'];  
}
// La fonction envoie le contenu
return $contenu; 

}
?>
