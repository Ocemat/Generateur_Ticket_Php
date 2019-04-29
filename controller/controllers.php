<?php

function get_all() {
    //2. demande au model de rappatrier les données dont il y'a besoin
    $noobs = get_all_contacts();
    $reasons = get_all_reasons();
    $bosses = get_all_boss();
    $urgences = get_all_urgence();
    $tickets = get_all_tickets();

    //3. appeler la bonne vue
    include "tpl/headerView.php"; 
    include "tpl/indexView.php";
    include "tpl/footerView.php"; 
};


function create_ticket() {
    //2 il traite la demande de l'utilisateur 
    $id_noob = filter_var($_POST['listeNoobs']);
    $id_reason = filter_var($_POST['listeRaisons']);
    $id_formateur = filter_var($_POST['listeFormateurs']);
    $id_urgence = filter_var($_POST['listeUrgence']);
    //3 il demande au model de faire ce qui doit être fait
    createTicketIntoBDD($id_noob, $id_reason, $id_formateur, $id_urgence);
   //3. appeler la bonne vue
    header("Location: /generateur_tickets/index.php");
};


function deleteTicket() {
    //2. demande au model de rappatrier les données dont il y'a besoin
        $results = delete_contact();
    //3. appeler la bonne vue
        include "tpl/headerView.php"; 
        include "tpl/successView.php";
        include "tpl/footerView.php"; 
};




?>