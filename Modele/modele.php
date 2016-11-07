<?php
class Modele
{
private $monPdo;
private static $bdd=null;
//effectue la connexion à la bdd
//instancie et renvoie l'objet PDO associé

private function __construct(){
    $this->monPdo = new PDO('mysql:host=localhost;dbname=monblog;charset=utf8','root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}

public function __destruct(){
    $this->monPdo=null;
}

/*private function getBdd()
{
    if ($this->monPdo==null) { 
        // Connexion à la base "monblog" locale, utilisation du compte root sans mot de passe
        $this->monPdo = new PDO('mysql:host=localhost;dbname=monblog;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
     
    }
    return $this->monPdo;
}*/

public static function getBdd()
{
    if (self::$bdd==null){
        self::$bdd = new Modele();
    }
    return self::$bdd;
}


public function getBillets()
{
    $requeteBillets = "select * from T_BILLET order by BIL_ID desc";
    $stmtBillets = $this->monPdo->query($requeteBillets);
    $billets = $stmtBillets->fetchAll();
    return $billets;
}

public function getBillet($idBillet)
{
    $requeteBillet = "select * from T_BILLET where BIL_ID= $idBillet";
    $stmtBillet = $this->monPdo->query($requeteBillet);
    $billet = $stmtBillet->fetch();  // Accès au premier élément résultat
    return $billet;
}

}
