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
    public function getCats($page = 0, $gender = 0, $living = 0, $name='') {
        // Gets all information from database
        $sql = 'SELECT * FROM cats';
        $conditions = array();
        // Filter cats
        if ($gender == 1){
            $conditions[] = 'gender = 1';
        } elseif ($gender == 2) {
            $conditions[] = 'gender = 0';
        }
        if ($living == 1){
            $conditions[] = 'home = 1';
        } elseif ($living == 2) {
            $conditions[] = 'home = 0';
        }
        $conditions[] = 'name LIKE :name';

        if (count($conditions) > 0) {
            $sql .= ' WHERE ' . implode(' AND ', $conditions);
        }

        // Reversing the order
        $sql .= ' ORDER BY name';
        // Limit amount of cats per pages
        $sql .= ' LIMIT 8 OFFSET :offset';
        // Prepares a query
        $stmt = $this->pdo->prepare($sql);
        // Sends query to database
        $stmt->execute(array(
            'offset' => 8 * $page,
            'name' => '%'.$name.'%'
        ));
        // Grab the list
        return $stmt->fetchAll();
    }

    // Count and return pages of cats
    public function countCatPages($gender = 0, $living = 0, $name='') {
        // Gets all information from database
        $sql = 'SELECT COUNT(id) AS NumberOfCats FROM cats';
        $conditions = array();
        // Filter cats
        if ($gender == 1){
            $conditions[] = 'gender = 1';
        } elseif ($gender == 2) {
            $conditions[] = 'gender = 0';
        }
        if ($living == 1){
            $conditions[] = 'home = 1';
        } elseif ($living == 2) {
            $conditions[] = 'home = 0';
        }
        $conditions[] = 'name LIKE :name';

        if (count($conditions) > 0) {
            $sql .= ' WHERE ' . implode(' AND ', $conditions);
        }

        // Reversing the order
        $sql .= ' ORDER BY name';
        // Prepares a query
        $stmt = $this->pdo->prepare($sql);
        // Sends query to database
        $stmt->execute(array(
            'name' => '%'.$name.'%'
        ));
        // Grab the list
        $numberOfCats = $stmt->fetchColumn(0);
        // Return number of cats divided by number of pages
        return ceil($numberOfCats / 8);
    }

    // Slideshow cats
    public function getSlideCats() {
        // Gets all information from database
        $sql = 'SELECT * FROM cats WHERE showcase = 1';
        // Prepares a query
        $stmt = $this->pdo->prepare($sql);
        // Sends query to database
        $stmt->execute();
        // Grab the list
        return $stmt->fetchAll();
    }

    // Get all news
    public function getNews($page = 0) {
        // Gets all information from database
        $sql = 'SELECT * FROM news ORDER BY id DESC LIMIT 8 OFFSET :offset';
        // Prepares a query
        $stmt = $this->pdo->prepare($sql);
        // Sends query to database
        $stmt->execute(array(
            'offset' => 8 * $page,
        ));
        // Grab the list
        return $stmt->fetchAll();
    }

    // Count and return pages of news
    public function countNewsPages() {
        $sql = 'SELECT COUNT(id) AS NumberOfNews FROM news';
        // Prepares a query
        $stmt = $this->pdo->prepare($sql);
        // Sends query to database
        $stmt->execute();
        // Grab the list
        $numberOfNews = $stmt->fetchColumn(0);
        // Return number of cats divided by number of pages
        return ceil($numberOfNews / 8);
    }

    // Get all Remember Cats-cats
    public function getRememberCats($page = 0) {
        // Gets all information from database
        $sql = 'SELECT * FROM remember LIMIT 8 OFFSET :offset';
        // Prepares a query
        $stmt = $this->pdo->prepare($sql);
        // Sends query to database
        $stmt->execute(array(
            'offset' => 8 * $page,
        ));
        // Grab the list
        return $stmt->fetchAll();
    }

    // Count and return pages of rememeber cats
    public function countRememberPages() {
        $sql = 'SELECT COUNT(id) AS NumberOfCats FROM remember';
        // Prepares a query
        $stmt = $this->pdo->prepare($sql);
        // Sends query to database
        $stmt->execute();
        // Grab the list
        $numberOfCats = $stmt->fetchColumn(0);
        // Return number of cats divided by number of pages
        return ceil($numberOfCats / 8);
    }

    // Get all employees
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

    // Get content
    public function getContent($element) {
        // Gets all information from database
        $sql = 'SELECT * FROM textfields WHERE element = :element LIMIT 1';
        // Prepares a query
        $stmt = $this->pdo->prepare($sql);
        // Sends query to database
        $stmt->execute(array(
            'element' => $element,
        ));
        // Grab the list
        return $stmt->fetchObject()->content;
    }

    public function deleteNewsPost($id) {
        // Gets all information from database
        $sql = 'DELETE FROM news WHERE id = :id';
        // Prepares a query
        $stmt = $this->pdo->prepare($sql);
        // Sends query to database
        return $stmt->execute(array(
            'id' => $id,
        ));
    }

}