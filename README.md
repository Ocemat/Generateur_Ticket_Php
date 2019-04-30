# Generateur_Ticket_Php
     /\  \         /\  \         /\  \         /\  \                  /\__\         /\  \    
    /::\  \       /::\  \       /::\  \       /::\  \                /::|  |       /::\  \   
   /:/\:\  \     /:/\:\  \     /:/\:\  \     /:/\:\  \              /:|:|  |      /:/\:\  \  
  /::\~\:\  \   /::\~\:\  \   /::\~\:\  \   /:/  \:\__\            /:/|:|__|__   /::\~\:\  \ 
 /:/\:\ \:\__\ /:/\:\ \:\__\ /:/\:\ \:\__\ /:/__/ \:|__|          /:/ |::::\__\ /:/\:\ \:\__\
 \/_|::\/:/  / \:\~\:\ \/__/ \/__\:\/:/  / \:\  \ /:/  /          \/__/~~/:/  / \:\~\:\ \/__/
    |:|::/  /   \:\ \:\__\        \::/  /   \:\  /:/  /                 /:/  /   \:\ \:\__\  
    |:|\/__/     \:\ \/__/        /:/  /     \:\/:/  /                 /:/  /     \:\ \/__/  
    |:|  |        \:\__\         /:/  /       \::/__/                 /:/  /       \:\__\    
     \|__|         \/__/         \/__/         ~~                     \/__/         \/__/    


_______________________________________________
|                                              |
|      BIENVENUE SUR VOTRE TICKET GENERATOR    |
|______________________________________________|

Le générateur de Ticket pour avoir de l'aide auprès de votre boss préféré !

IMPORTANT A LIRE AVANT DE L'UTILISER !!

1/ Créer une base de données MySql que vous nommerez : noob

2/ Importer la base de données vierge "noob.sql" que vous trouverez à la racine du dossier
Pour cela : 
    - Se connecter à MySql
    - Cliquer sur la table noob (que vous venez de créer)
    - Cliquer sur Importer
    - Cliquer sur "choisir un fichier" et aller chercher le fichier "noob.sql" à la racine du dossier
    - Puis cliquer sur "Executer"
La base de données est créée avec l'ensemble des tables

3/ Dans la base de données, créer ou importer la liste des noobs, des boss, des raisons de blocage ainsi que les niveaux d'urgence

4/ Mettre à jour vos données de connexion à la base de données
    - Ouvrir le fichier "model.php" qui se trouve dans le dossier model
    - Trouver la function createConnexion() et modifier les informations s'il y a lieu
    - Ne pas oublier d'enregistrer les modifications !

5/ Lancer votre générateur de ticket en vous connectant à localhost/gerateur_tickets/index.php
    - Si vous avez été un bon élève, la liste des noobs (dont vous ne faites pas parti ! ;), des boss, des raisons et des urgences s'affiche dans la liste déroulante.
    - Si vous êtes un noob, reprenez à l'étape 1 ou utiliser votre Joker "Appel à un ami !" ;)


      _____)                   /  /
   /           ,             /  / 
   )__   __      ___        /  /  
 /       / (_ /_(_) (_/_   o  o   
(_____)    .-/     .-/            
          (_/     (_/             


Intérêt du Design Patter : 
J'ai utilisé le design patter MVC "Model Vue Controller" afin de mieux structurer mon code et de le rendre plus visible.
Les modèles (dossier "model") contient les données à afficher.
Les vues (dossier "tpl") contient la présentation de l'interface graphique.
Un contrôleur (dossier "controller") contient la logique concernant les actions effectuées par l'utilisateur.

Le front controller "index.php" dessine le routage des différentes actions faites par l'utilisateur.

