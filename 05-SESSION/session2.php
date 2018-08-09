<?php


// Ouverture ou création d'une session :
session_start();


echo 'la session est accessible dans tous les scripts du site, comme ici : <br>';
var_dump($_SESSION); // on accède bien aux information contenues dans la session

//Ce fichier (= page) n'a rien à voir avec l'autre page, il n'y a pas d'inclusion, il pourait être dans un autre dossier, s'appeler n'importe comment, les informations