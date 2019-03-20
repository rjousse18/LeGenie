<?php

function actionAccueil($twig, $db)
{
    $form = Array();
    $util = new Utilisateur($db);
    $liste = $util->select();
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

function actionMentions($twig)
{
    echo $twig->render('mentions.html.twig', array());
}

function actionApropos($twig)
{
    echo $twig->render('apropos.html.twig', array());
}

function actionMaintenance($twig)
{
    echo $twig->render('maintenance.html.twig', array());
}

function actionUtilisateur($twig, $db)
{
    $form = Array();
    $util = new Utilisateur($db);
    if(isset($_POST['btInscrire']))
    {
        $nom = $_POST['inputNom'];
        $prenom = $_POST['inputPrenom'];
        $adresse = $_POST['inputAdresse'];
        $cp = $_POST['inputCp'];
        $ville = $_POST['inputVille'];
        $exec = $util->insert($nom, $prenom, $adresse, $cp, $ville);
        if(!$exec)
        {
            $form['valide'] = false;
            $form['message'] = "Erreur lors de l'insertion dans la base de données";
        }
        else
        {
            $form['valide'] = true;
        }
        $form['nom'] = $nom;
        $form['prenom'] = $prenom;
    }
    echo $twig->render('utilisateur.html.twig', array('form'=>$form));
}
?>
