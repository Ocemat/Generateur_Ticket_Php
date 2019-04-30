<?php 

class Ticket {
    private $id;
    private $dateHeure;
    private $id_noob;
    private $id_reason;
    private $id_formateur;
    private $id_urgence;
   


public function __construct($id, $dateHeure, $id_noob, $id_reason, $id_formateur, $id_urgence) {
    $this -> id = $id;
    $this -> dateHeure = $dateHeure; //<-- retour de la bdd donc string. donc au format date Mysql cad DateAnglaise
    $this -> id_noob = $id_noob;
    $this -> id_reason = $id_reason;
    $this -> id_formateur = $id_formateur;
    $this -> id_urgence = $id_urgence;
}

public function getId(){
    return $this -> id;
}

public function getDateHeure() {
    return $this -> dateHeure;
}

public function getIdNoob(){
    return $this-> id_noob;
}

public function getIdReason(){
    return $this-> id_reason;
}

public function getIdFormateur(){
    return $this-> id_formateur;
}

public function getIdUrgence(){
    return $this-> id_urgence;
}

}

?>