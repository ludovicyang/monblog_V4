<?php
require './Modele/modele.php';

function listerBillets()
{
    $bdd=Modele::getBdd();
    $billets = $bdd-> getBillets();
    $lienBillet = "index.php?action=afficherBillet&id=";
    // Affichage
    require 'vue/listeBillets.php';
 }
   
 function afficherBillets($id)
{
    $bdd=Modele::getBdd();
    $billet = $bdd->getBillet($id);
    //$commentaires = $bdd-> getCommentaires($id);
    require 'vue/detailsBillet.php';
 }
 
function afficherErreur($msgErreur) 
{
    require 'vue/erreur.php';
}

