<?php

/**
 * Config de base requete DB
 */
return array(
    "DB_USER" => "root",
    "DB_PASS" => "",
    "DB_HOST" => "localhost",
    "DB_NAME" => "ecfalban",
    "DB_CHARSET" => "utf8",
    "DB_TYPE" => "mysql",
    "DB_OPTION" => array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // Affichage message précis si erreur
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"
    ),
);
