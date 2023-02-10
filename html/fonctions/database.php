<?php
    function getDatabase() {
        $dsn = 'mysql:host=mysql;dbname=recette_manager;charset=utf8';
        $username = 'user';
        $password = 'password';

        try {
            $bdd = new PDO($dsn, $username, $password);
        } catch (\PDOException $e) {
            die("Erreur : " . $e->getMessage());
        }
 
        return $bdd;
    }
