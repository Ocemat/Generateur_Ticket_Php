<?php

//1. se met en lien avec le model 
require("model/model.php");
require("controller/controllers.php");

// On inclut le header
require("tpl/headerView.php"); 


//URL que le visiteur à tapper
$uri=parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

/* ROUTING */
if($uri === '/generateur_tickets/') {
    get_all();
} elseif($uri === '/generateur_tickets/index.php') {
    get_all();
} elseif($uri === '/generateur_tickets/index.php/createTicket') {
    create_ticket();
} elseif($uri === '/generateur_tickets/index.php/delete' && isset($_GET['id'])) {
    deleteTicket($_GET['id']);
} elseif($uri === '/generateur_tickets/index.php/ticketView') {
    get_tickets();
} else {
    header('HTTP/1.1 404 NOT FOUND');
    echo'<html><body><h1> Page Not Found </h1></body></html>';
}


// On inclut le pied de page
require("tpl/footerView.php"); 

?>