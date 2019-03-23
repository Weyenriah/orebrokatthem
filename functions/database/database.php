<?php
require_once dirname(__FILE__).'/cats.php';
require_once dirname(__FILE__).'/employees.php';
require_once dirname(__FILE__).'/news.php';
require_once dirname(__FILE__).'/remember.php';
require_once dirname(__FILE__).'/PDOWithPrefix.php';

class Database {

    private $pdo;

    public function __construct($host, $database, $username, $password, $prefix) {
        // Connect to database
        $this->pdo = new PDOWithPrefix(
            'mysql:host=' . $host . ';dbname=' . $database . ';charset=utf8',
            $username,
            $password,
            [],
            $prefix
        );

        // Activate error messages
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Prevents PDO from using simulated prepares
        $this->pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    }

    // Traits
    use Cats, Employees, News, Remember;

    // Order differently when admin
    public function  getAdminCats($page) {
        return $this->getCats($page, 0, 0, '', 0,true, true);
    }

    // Get all cats
    public function getCats($page = 0, $gender = 0, $living = 0, $name='', $age = 0, $orderById = false, $showHidden = false) {
        // Gets all information from database
        $sql = 'SELECT * FROM %1$scats';
        $conditions = array();
        // Filter cats
        // Gender filter
        if ($gender == 1){
            $conditions[] = 'gender = 1';
        } elseif ($gender == 2) {
            $conditions[] = 'gender = 0';
        }
        // Living filter
        if ($living == 1){
            $conditions[] = 'home = 1';
        } elseif ($living == 2) {
            $conditions[] = 'home = 0';
        }
        // Age filter
        $kitten = date('Y') - 1;
        $young = date('Y') - 10;
        if ($age == 1) { // Kitten
            $conditions[] = 'age >= ' . $kitten;
        } elseif ($age == 2) { // Young
            $conditions[] = 'age < ' . $kitten;
            $conditions[] = 'age >= ' . $young;
        } elseif ($age == 3) { // Kitten + Young
            $conditions[] = 'age >= ' . $young;
        } elseif ($age == 4) { // Senior
            $conditions[] = 'age < ' . $young;
        } elseif ($age == 5) { // Kitten + Senior
            $conditions[] = 'age >= ' . $kitten . ' OR age < ' . $young;
        } elseif ($age == 6) { // Young + Senior
            $conditions[] = 'age < ' . $kitten;
        }

        $conditions[] = 'name LIKE :name';

        if(!$showHidden) {
            $conditions[] = 'hide = 0';
        }

        $conditions[] = 'adopted_cat is null';

        if (count($conditions) > 0) {
            $sql .= ' WHERE ' . implode(' AND ', $conditions);
        }

        // Reversing the order
        if($orderById) {
            $sql .= ' ORDER BY id DESC';
        } else {
            $sql .= ' ORDER BY name';
        }
        // Limit amount of cats per includes
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

    public function countAdminCatPages() {
        return $this->countCatPages(0, 0, '', 0, true);
    }

    // Count and return includes of cats
    public function countCatPages($gender = 0, $living = 0, $name='', $age = 0, $showHidden = false) {
        // Gets all information from database
        $sql = 'SELECT COUNT(id) AS NumberOfCats FROM %1$scats';
        $conditions = array();
        // Filter cats
        // Gender filter
        if ($gender == 1){
            $conditions[] = 'gender = 1';
        } elseif ($gender == 2) {
            $conditions[] = 'gender = 0';
        }
        // Living filter
        if ($living == 1){
            $conditions[] = 'home = 1';
        } elseif ($living == 2) {
            $conditions[] = 'home = 0';
        }
        // Age filter
        $kitten = date('Y') - 1;
        $young = date('Y') - 10;
        if ($age == 1) { // Kitten
            $conditions[] = 'age >= ' . $kitten;
        } elseif ($age == 2) { // Young
            $conditions[] = 'age < ' . $kitten;
            $conditions[] = 'age >= ' . $young;
        } elseif ($age == 3) { // Kitten + Young
            $conditions[] = 'age >= ' . $young;
        } elseif ($age == 4) { // Senior
            $conditions[] = 'age < ' . $young;
        } elseif ($age == 5) { // Kitten + Senior
            $conditions[] = 'age >= ' . $kitten . ' OR age < ' . $young;
        } elseif ($age == 6) { // Young + Senior
            $conditions[] = 'age < ' . $kitten;
        }

        $conditions[] = 'name LIKE :name';

        if(!$showHidden) {
            $conditions[] = 'hide = 0';
        }

        $conditions[] = 'adopted_cat is null';

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
        // Return number of cats divided by number of includes
        return ceil($numberOfCats / 8);
    }

    // Slideshow cats
    public function getSlideCats() {
        // Gets all information from database
        $sql = 'SELECT * FROM %1$scats WHERE showcase = 1';
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
        $sql = 'SELECT * FROM %1$snews ORDER BY id DESC LIMIT 8 OFFSET :offset';
        // Prepares a query
        $stmt = $this->pdo->prepare($sql);
        // Sends query to database
        $stmt->execute(array(
            'offset' => 8 * $page,
        ));
        // Grab the list
        return $stmt->fetchAll();
    }

    // Count and return includes of news
    public function countNewsPages() {
        $sql = 'SELECT COUNT(id) AS NumberOfNews FROM %1$snews';
        // Prepares a query
        $stmt = $this->pdo->prepare($sql);
        // Sends query to database
        $stmt->execute();
        // Grab the list
        $numberOfNews = $stmt->fetchColumn(0);
        // Return number of cats divided by number of includes
        return ceil($numberOfNews / 8);
    }

    // Get all Remember Cats-cats
    public function getRememberCats($page = 0) {
        // Gets all information from database
        $sql = 'SELECT * FROM %1$sremember ORDER BY id DESC LIMIT 8 OFFSET :offset';
        // Prepares a query
        $stmt = $this->pdo->prepare($sql);
        // Sends query to database
        $stmt->execute(array(
            'offset' => 8 * $page,
        ));
        // Grab the list
        return $stmt->fetchAll();
    }

    // Count and return includes of rememeber cats
    public function countRememberPages() {
        $sql = 'SELECT COUNT(id) AS NumberOfCats FROM %1$sremember';
        // Prepares a query
        $stmt = $this->pdo->prepare($sql);
        // Sends query to database
        $stmt->execute();
        // Grab the list
        $numberOfCats = $stmt->fetchColumn(0);
        // Return number of cats divided by number of includes
        return ceil($numberOfCats / 8);
    }

    // Get all employees
    public function getEmployees($showHidden = false) {
        // Gets all information from database
        $sql = 'SELECT * FROM %1$semployees';
        if(!$showHidden) {
            $sql .= ' WHERE hidden = 0';
        } else {
            $sql .= ' ORDER BY id DESC';
        }
        // Prepares a query
        $stmt = $this->pdo->prepare($sql);
        // Sends query to database
        $stmt->execute();
        // Grab the list
        return $stmt->fetchAll();
    }

    // Get all text-content
    public function getContent($element) {
        // Gets all information from database
        $sql = 'SELECT * FROM %1$stextfields WHERE element = :element LIMIT 1';
        // Prepares a query
        $stmt = $this->pdo->prepare($sql);
        // Sends query to database
        $stmt->execute(array(
            'element' => $element,
        ));
        // Grab the list
        return $stmt->fetchObject()->content;
    }

    // Change textfields
    public function changeTextfield($element, $content) {
        $sql = 'UPDATE %1$stextfields SET
                  content = :content 
                WHERE
                  element = :element';
        // Prepares a query
        $stmt = $this->pdo->prepare($sql);
        // Sends query to database
        return $stmt->execute(array(
            'element' => $element,
            'content' => $content,
        ));
    }

    // Stops adding flow for a while after a few added in table
    private function changesLastHour($table) {
        $sql = 'SELECT COUNT(*) AS count FROM %1$s' . $table . ' WHERE date BETWEEN date_sub(NOW(), INTERVAL 1 HOUR) AND NOW();';
        // Prepares a query
        $stmt = $this->pdo->prepare($sql);
        // Sends query to database
        $stmt->execute();

        return $stmt->fetchObject()->count;
    }

    // Log in
    public function login($email, $password) {
        // Gets all information needed from database
        $sql = 'SELECT id, `password` FROM %1$semployees WHERE email = :email AND `password` IS NOT NULL LIMIT 1';
        // Prepares a query
        $stmt = $this->pdo->prepare($sql);
        // Sends query to database
        $result = $stmt->execute(array(
            'email' => $email,
        ));
        // Verifying password
        if($result && $stmt->rowCount()) {
            $user = $stmt->fetchObject();
            if(password_verify($password, $user->password)) {
                return $user->id;
            }
        }
        return null;
    }

    // Get user email
    public function getUserEmail($id) {
        $sql = 'SELECT email FROM %1$semployees WHERE id = :id';
        // Prepares a query
        $stmt = $this->pdo->prepare($sql);
        // Sends query to database
        $stmt->execute(array(
            'id' => $id,
        ));
        // Grab the list
        return $stmt->fetchObject()->email;
    }
}