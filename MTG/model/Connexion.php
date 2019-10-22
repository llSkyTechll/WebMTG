<?php

class Connexion
{
	// protected car on ne veut pas qu'il soit accessible directement, seulement par ses filles en héritage
    protected function getConnexion()
    {
        // le \pdo c'est pour le namespace globale
        $connexion = new \PDO('mysql:host=localhost;dbname=bd_mtg;charset=utf8', 'root', '',array( 
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, 
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8" ,
        PDO::ATTR_EMULATE_PREPARES=>false)); // contre l'injection de 2ème niveau
        return $connexion;
    }
}



?>