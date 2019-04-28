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
    $sql = "INSERT INTO `ticket` (`id`, `id_noob`, `id_reason`, `id_formateur`, `id_urgence`) VALUES (NULL, :id_noob, :id_reason, :id_formateur, :id_urgence);";
    //il me faut un objet pdo 
    $pdo = createConnexion();
    $sth = $pdo->prepare($sql);
    $sth->bindParam(':id_noob', $id_noob);
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
    $stmt = $pdo->query ('SELECT * FROM ticket');
    //c) executer requête sql
        $resultats = [];
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)) { 
        $tickets = new Ticket ($row["id"], $row["id_noob"], $row["id_reason"], $row["id_formateur"], $row["id_urgence"]);
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