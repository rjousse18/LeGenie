<?php

function actionAccueil($twig, $db)
{
    $form = array();
    $actu = new Actualite($db);
    $liste = $actu->select();
    echo $twig->render('index.html.twig', array('form'=>$form, 'liste'=>$liste));
}

function actionConnexion($twig){
    echo $twig->render('connexion.html.twig', array()); 
}

function actionInscrire($twig){
    $form = array(); 
    if (isset($_POST['btInscrire'])){
      $inputEmail = $_POST['inputEmail'];
      $inputPassword = $_POST['inputPassword']; 
      $inputPassword2 =$_POST['inputPassword2']; 
      $role = $_POST['role'];
      $form['valide'] = true;
      if ($inputPassword!=$inputPassword2){
        $form['valide'] = false;  
        $form['message'] = 'Les mots de passe sont différents';
      }
      
      $form['email'] = $inputEmail;
      $form['role'] = $role;
      
    }
    echo $twig->render('inscrire.html.twig', array('form'=>$form));
}

function actionMentions($twig){
    echo $twig->render('mentions.html.twig', array());
}

function actionApropos($twig){
    echo $twig->render('apropos.html.twig', array());
}

function actionMaintenance($twig){
    echo $twig->render('maintenance.html.twig', array());
}

function actionMlegales($twig){
    echo $twig->render('mlegales.html.twig', array());
}

function actionActu($twig, $db)
{
    $form = array();
    if(isset($_POST['btCreation']))
    {
        $titre = $_POST['inputTitre'];
        $contenu = $_POST['inputContenu'];
        $form['valide'] = true;
        $actu = new Actualite($db);
        $exec = $actu->insert($titre, $contenu);
        if(!$exec)
        {
            $form['valide'] = false;
            $form['message'] = 'Problème d\'insertion dans la table actualité.';
        }
        $form['titre'] = $titre;
    }
    echo $twig->render('actu.html.twig', array('form'=>$form));
}
?>
