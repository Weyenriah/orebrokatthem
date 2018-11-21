<?php

trait Cats {
    // Add cat
    public function addCat($catName, $gender, $color, $age, $description, $home, $contact, $show){
        if ($this->changesLastHour('cats') > 20) {
            return false;
        } else {
            $sql = "INSERT INTO cats (
              `name`,
              `gender`,
              `color`,
              `age`,
              `description`,
              `home`,
              `contact`,
              `showcase`
            ) VALUES (
              :catName,
              :gender,
              :color,
              :age,
              :description,
              :home,
              :contact,
              :show
            )";

            // Prepares a query
            $stmt = $this->pdo->prepare($sql);

            // Sends query to database
            return $stmt->execute(array(
                'catName' => $catName,
                'gender' => $gender,
                'color' => $color,
                'age' => $age,
                'description' => $description,
                'home' => $home,
                'contact' => $contact,
                'show' => $show,
            ));
        }
    }

    // Change news
    public function changeCat($id, $name, $age, $gender, $color, $description, $home, $contact, $showcase) {
        $sql = 'UPDATE cats SET 
                  name = :name,
                  age = :age,
                  gender = :gender,
                  color = :color,
                  description = :description,
                  home = :home,
                  contact = :contact,
                  showcase = :showcase
                WHERE 
                  id = :id';

        // Prepares a query
        $stmt = $this->pdo->prepare($sql);

        // Sends query to database
        return $stmt->execute(array(
            'id' => $id,
            'name' => $name,
            'age' => $age,
            'gender' => $gender,
            'color' => $color,
            'description' => $description,
            'home' => $home,
            'contact' => $contact,
            'showcase' => $showcase,
        ));
    }

    // Delete cats
    public function deleteCat($id) {
        // Gets all information from database
        $sql = 'DELETE FROM cats WHERE id = :id';
        // Prepares a query
        $stmt = $this->pdo->prepare($sql);
        // Sends query to database
        return $stmt->execute(array(
            'id' => $id,
        ));
    }
}