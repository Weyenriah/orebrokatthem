<?php

trait Cats {
    // Add Cat
    public function addCat($catName, $gender, $color, $age, $description, $home, $contact, $show){
        // Checks so that there's no spamming
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
            $ok = $stmt->execute(array(
                'catName' => $catName,
                'gender' => $gender,
                'color' => $color,
                'age' => $age,
                'description' => $description,
                'home' => $home,
                'contact' => $contact,
                'show' => $show,
            ));
            if ($ok) {
                return $this->pdo->lastInsertId();
            } else {
                return null;
            }
        }
    }

    // Change Cat
    public function changeCat($id, $name, $age, $gender, $color, $description, $home, $contact, $showcase) {
        // Updates all information needed from database
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

    // Delete Cat
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

    public function getCatImages($id) {
        // Gets all information from database
        $sql = 'SELECT image FROM cat_images WHERE cat_id = :id';
        // Prepares a query
        $stmt = $this->pdo->prepare($sql);
        // Connects to variable
        $stmt->execute(array(
            'id' => $id,
        ));
        // Sends query to database
        return $stmt->fetchAll();
    }

    public function addCatImage($id, $filename, $k) {
        // Insert right information in database
        $sql = 'INSERT INTO cat_images (cat_id, image, k) VALUES(:cat_id, :image, :k) ON DUPLICATE KEY UPDATE image = :image2;';
        // Prepares a query
        $stmt = $this->pdo->prepare($sql);
        // Sends query to database
        return $stmt->execute(array(
            'image' => $filename,
            'image2' => $filename,
            'cat_id' => $id,
            'k' => $k,
        ));
    }
}