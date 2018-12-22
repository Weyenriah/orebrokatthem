<?php

trait Employees {
    // Add Employee
    public function addEmployee($name, $title, $telephone, $email, $password, $hidden) {
        if ($this->changesLastHour('employees') > 20) {
            return false;
        } else {
            $sql = "INSERT INTO employees (
              `name`, 
              `title`, 
              `telephone`, 
              `email`, 
              `password`, 
              `hidden`
            ) VALUES (
              :name, 
              :title, 
              :telephone, 
              :email, 
              :password, 
              :hidden
            )";
            // Prepares a query
            $stmt = $this->pdo->prepare($sql);

            // Sends query to database
            return $stmt->execute(array(
                'name' => $name,
                'title' => $title,
                'telephone' => $telephone,
                'email' => $email,
                'password' => $password,
                'hidden' => $hidden,
            ));
        }
    }

    // Change Employee
    public function changeEmployee($id, $name, $title, $telephone, $email, $canLogin, $password, $hidden) {
        if ($canLogin && $password === null) {
            $sql = 'UPDATE employees SET
                  name = :name,
                  title = :title,
                  telephone = :telephone,
                  email = :email,
                  hidden = :hidden
                WHERE
                  id = :id';
            // Prepares a query
            $stmt = $this->pdo->prepare($sql);

            return $stmt->execute(array(
                'id' => $id,
                'name' => $name,
                'title' => $title,
                'telephone' => $telephone,
                'email' => $email,
                'hidden' => $hidden,
            ));
        }else {
            $sql = 'UPDATE employees SET
                  name = :name,
                  title = :title,
                  telephone = :telephone,
                  email = :email,
                  password = :password,
                  hidden = :hidden
                WHERE
                  id = :id';
            // Prepares a query
            $stmt = $this->pdo->prepare($sql);

            return $stmt->execute(array(
                'id' => $id,
                'name' => $name,
                'title' => $title,
                'telephone' => $telephone,
                'email' => $email,
                'password' => $password,
                'hidden' => $hidden,
            ));
        }
    }

    // Delete Employee
    public function deleteEmployee($id) {
        // Gets all information from database
        $sql = 'DELETE FROM employees WHERE id = :id';
        // Prepares a query
        $stmt = $this->pdo->prepare($sql);
        // Sends query to database
        return $stmt->execute(array(
            'id' => $id,
        ));
    }
}