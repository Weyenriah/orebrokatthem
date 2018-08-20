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
    public function getCats($reversed) {
        // Gets all information from database
        $sql = 'SELECT * FROM cats ORDER BY name';
        if ($reversed) {
            $sql .= ' DESC';
        }
        // Prepares a query
        $stmt = $this->pdo->prepare($sql);
        // Sends query to database
        $stmt->execute();
        // Grab the list
        return $stmt->fetchAll();
    }

    // Search cats by name
    public function searchCats($name, $reversed) {
        // Gets all information from database
        $sql = 'SELECT * FROM cats WHERE name LIKE :name ORDER BY name';
        if ($reversed) {
            $sql .= ' DESC';
        }
        // Prepares a query
        $stmt = $this->pdo->prepare($sql);
        // Sends query to database
        $stmt->execute(array(
           'name' => '%'.$name.'%',
        ));
        // Grab the list
        return $stmt->fetchAll();
    }

    //
    public function alphaFilter() {
        // Gets all information from database
        $sql = 'SELECT * FROM cats ORDER BY name DESC';
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