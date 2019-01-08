<?php

trait Employees {
    // Add Employee
    public function addEmployee($name, $title, $telephone, $email, $password, $hidden, $image) {
        if ($this->changesLastHour('employees') > 20 || $this->emailExists($email)) {
            return false;
        } else {
            $sql = "INSERT INTO employees (
              `name`, 
              `title`, 
              `telephone`, 
              `email`, 
              `password`, 
              `hidden`,
              `image`
            ) VALUES (
              :name, 
              :title, 
              :telephone, 
              :email, 
              :password, 
              :hidden,
              :image
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
                'image' => $image,
            ));
        }
    }

    // Change Employee
    public function changeEmployee($id, $name, $title, $telephone, $email, $canLogin, $password, $hidden, $image) {
        if ($this->emailExists($email, $id)) {
            return false;
        }
        $sql = 'UPDATE employees SET
              name = :name,
              title = :title,
              telephone = :telephone,
              email = :email,';
        $parameters = [
            'id' => $id,
            'name' => $name,
            'title' => $title,
            'telephone' => $telephone,
            'email' => $email,
        ];

        if (!($canLogin && $password === null)) {
            $sql .= ' password = :password,';
            $parameters['password'] = $password;
        }
        if ($image != null) {
            $sql .= ' image = :image,';
            $parameters['image'] = $image;
        }

        $sql .= ' hidden = :hidden
                  WHERE
                  id = :id';
        $parameters['hidden'] = $hidden;

        // Prepares a query
        $stmt = $this->pdo->prepare($sql);

        return $stmt->execute($parameters);
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

    public function emailExists($email, $excludedUserId = 0) {
        $sql = 'SELECT email FROM employees WHERE id != :id AND email = :email';

        $stmt = $this->pdo->prepare($sql);

        $stmt->execute([
            'id' => $excludedUserId,
            'email' => $email
        ]);

        return count($stmt->fetchAll()) < 1 ? false : true;
    }
}