<?php
require_once'model.php';
require_once'liste.php';
$c=new connexion();
$liste_personnes=new liste();
$cl=new personne('77','ahmed','sami','sami@gmail','Monstir','tunisie','mon',17254758);
$result_clients=$cl->getid_personne();
$liste_personnes->inserer_queue($cl,$c,$result_clients);


















?>