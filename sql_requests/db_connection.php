<?php

// on délcare nos constantes de connexion a la base de données
const DB_HOST = 'database';
const DB_USER = 'admin';
const DB_PASS = 'admin';
const DB_NAME = 'jeuxvideo';

// on crée la connexion a la base de données
$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

// on vérifie si la connexion a la base de données a échoué
if (!$connection) {
    die('Connection failed: ' . mysqli_connect_error());
}

// on force l'encodage en utf8
mysqli_set_charset($connection, 'utf8');