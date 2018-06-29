<?php

class Database {

    private $pdo;

    public function __construct($host, $database, $username, $password) {
        // Connect to database
        $this->pdo = new PDO(
            'mysql:host=' . $host . ';dbname=' . $database . ';charset=utf8',
            $username,
            $password
        );

        // Activate error messages
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Prevents PDO from using simulated prepares
        $this->pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    }

    // Get all cats
    public function getCats() {
        // Gets all information from database
        $sql = 'SELECT * FROM cats';
        // Prepares a query
        $stmt = $this->pdo->prepare($sql);
        // Sends query to database
        $stmt->execute();
        // Grab the list
        return $stmt->fetchAll();
    }

    // Get all news
    public function getNews() {
        // Gets all information from database
        $sql = 'SELECT * FROM news';
        // Prepares a query
        $stmt = $this->pdo->prepare($sql);
        // Sends query to database
        $stmt->execute();
        // Grab the list
        return $stmt->fetchAll();
    }

    // Get all news
    public function getEmployees() {
        // Gets all information from database
        $sql = 'SELECT * FROM employees';
        // Prepares a query
        $stmt = $this->pdo->prepare($sql);
        // Sends query to database
        $stmt->execute();
        // Grab the list
        return $stmt->fetchAll();
    }
}