<?php 
include "model/humain.php";
include "model/reason.php";
include "model/formateur.php";
include "model/urgence.php";
include "model/ticket.php";

function createConnexion() {
    $host = '127.0.0.1';
    $db = 'noob';
    $user = 'root'; // NOT A GOOD IDEA !!!
    $pass = '';
    $dsn = "mysql:host=$host;dbname=$db";

    try {
        $pdo = new PDO($dsn, $user, $pass);
    } catch (\PDOException $e) {
            throw new \PDOException($e->getMessage(), (int)$e->getCode());
    }
    return $pdo;
}


function get_all_contacts() {
    //a) se connecter à la bdd 
    $pdo = createConnexion();
    //b) prépare requete sql 
    $stmt = $pdo->query ('SELECT * FROM contact');
    //c) executer requête sql
        //création d'un tableau vide pouvant stocker des données
        $resultats = [];
        //on parcourir les resultats de la requete SELECT * FROM contact
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)) { 
        //pour chaque résultat trouvé dans la base de donnée (while, fetch) on créé un nouvel humain avec les données récupérées
        // (new Humain(...))
        $humain = new Humain($row["id"], $row["nom"], $row["prenom"]);
        //on ajoute cette objet humain au tableau résultat
        $resultats[] = $humain; 
    }  
        return $resultats;

        //fermeture de la connexion à la bdd
        $pdo = null;
}


function get_all_reasons() {
    //a) se connecter à la bdd 
    $pdo = createConnexion();
    //b) prépare requete sql 
    $stmt = $pdo->query ('SELECT * FROM reason');
    //c) executer requête sql
        $resultats = [];
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)) { 
        $reason = new Reason ($row["id"], $row["libelle"]);
        $resultats[] = $reason; 
    }  
        return $resultats;

        //fermeture de la connexion à la bdd
        $pdo = null;
}


function get_all_boss() {
    //a) se connecter à la bdd 
    $pdo = createConnexion();
    //b) prépare requete sql 
    $stmt = $pdo->query ('SELECT * FROM formateur');
    //c) executer requête sql
        $resultats = [];
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)) { 
        $boss = new Formateur ($row["id"], $row["nom"], $row["prenom"]);
        $resultats[] = $boss; 
    }  
        return $resultats;

        //fermeture de la connexion à la bdd
        $pdo = null;
}

function get_all_urgence() {
    //a) se connecter à la bdd 
    $pdo = createConnexion();
    //b) prépare requete sql 
    $stmt = $pdo->query ('SELECT * FROM urgence');
    //c) executer requête sql
        $resultats = [];
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)) { 
        $urgence = new Urgence ($row["id"], $row["libelle"]);
        $resultats[] = $urgence; 
    }  
        return $resultats;

        //fermeture de la connexion à la bdd
        $pdo = null;
}



// Créer une requête INSERT INTO
//enregistrement d'un ticket dans la base de données
function createTicketIntoBDD($id_noob, $id_reason, $id_formateur, $id_urgence) {
    $sql = "INSERT INTO `ticket` (`id`, `dateHeure`, `id_noob`, `id_reason`, `id_formateur`, `id_urgence`) VALUES (NULL, NOW(), :id_noob, :id_reason, :id_formateur, :id_urgence);";
    //il me faut un objet pdo 
    $pdo = createConnexion();
    $sth = $pdo->prepare($sql);
    // récupère la date courante
    $sth->bindParam(':id_noob', $id_noob);
   // $sth->bindParam(':dateHeure', $dateHeure);
    $sth->bindParam(':id_reason', $id_reason);
    $sth->bindParam(':id_formateur', $id_formateur);
    $sth->bindParam(':id_urgence', $id_urgence);
    $sth->execute();
    
    // Close connexion ...
    $pdo = null;
}


function get_all_tickets() {
    //a) se connecter à la bdd 
    $pdo = createConnexion();
    //b) prépare requete sql 
    
    $stmt = $pdo->query ('SELECT TIMESTAMPDIFF(SECOND, t.dateHeure, NOW()) AS diffSecondes, t.id, t.dateHeure as t_dh, c.nom as n_nom, c.prenom as n_prenom, f.nom as f_nom, f.prenom as f_prenom, r.libelle as r_libelle, u.libelle as u_libelle
                        FROM ticket as t 
                        INNER JOIN contact as c ON t.id_noob = c.id
                        INNER JOIN formateur as f ON t.id_formateur = f.id
                        INNER JOIN reason as r ON t.id_reason = r.id
                        INNER JOIN urgence as u ON t.id_urgence = u.id
                        ORDER BY t.id ASC');
  
    //c) executer requête sql
        $resultats = [];
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {      
            $noob = $row["n_prenom"]." ".$row["n_nom"];
            $boss = $row["f_prenom"]." ".$row["f_nom"];
            $objectDateTimePHP = \DateTime::createFromFormat('Y-m-d H:i:s', $row["t_dh"]);


            $jours = floor($row["diffSecondes"]/86400);
            $reste = $row["diffSecondes"]%86400;
            $heures = floor($reste/3600);
            $reste = $reste%3600;
            $minutes = floor($reste/60);
            $secondes = $reste%60;   

            $tpsAttentePHP = $jours." j <br>".$heures."h ".$minutes."min ";

            $tickets = new Ticket ($row["id"], $objectDateTimePHP, $tpsAttentePHP, $noob, $row["r_libelle"], $boss, $row["u_libelle"]);
            $resultats[] = $tickets;
    }  
        return $resultats;

        //fermeture de la connexion à la bdd
        $pdo = null;
}


function delete_contact() {
    //a) se connecter à la bdd 
    $pdo = createConnexion();
    //b) prépare requete sql 
    $id = $_GET['id'];
    
    $stmt = $pdo->exec ('DELETE FROM ticket WHERE id=' .$id);   
    if ( !$stmt ) {
        echo 'La suppression n\'a pas eu lieu';
    } else {
        echo 'L\'entrée '.$id.' a été supprimée';
    }
    $pdo = null;
}


?>