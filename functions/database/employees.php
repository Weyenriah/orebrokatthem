<?php

trait Employees {
    // Add Employee
    public function addEmployee($name, $title, $telephone, $email, $password, $hidden, $image) {
        // Checks so that there's no spamming
        // and if mail exists
        if ($this->changesLastHour('employees') > 20 || $this->emailExists($email)) {
            return false;
        } else {
            // Insert information in database
            $sql = 'INSERT INTO %1$semployees (
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
            )';
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
        // If email exists...
        if ($this->emailExists($email, $id)) {
            return false;
        }
        // Update information in database
        $sql = 'UPDATE %1$semployees SET
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
        // Adds password if needed
        if (!($canLogin && $password === null)) {
            $sql .= ' password = :password,';
            $parameters['password'] = $password;
        }
        // Adds image if needed
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
        // Sends query to database
        return $stmt->execute($parameters);
    }

    // Delete Employee
    public function deleteEmployee($id) {
        // Deletes all information from database
        $sql = 'DELETE FROM %1$semployees WHERE id = :id';
        // Prepares a query
        $stmt = $this->pdo->prepare($sql);
        // Sends query to database
        return $stmt->execute(array(
            'id' => $id,
        ));
    }

    public function emailExists($email, $excludedUserId = 0) {
        // Gets right information from database
        $sql = 'SELECT email FROM %1$semployees WHERE id != :id AND email = :email';
        // Prepares a query
        $stmt = $this->pdo->prepare($sql);
        // Sends query to database
        $stmt->execute([
            'id' => $excludedUserId,
            'email' => $email
        ]);
        // Returns and fetch if needed
        return count($stmt->fetchAll()) < 1 ? false : true;
    }
}