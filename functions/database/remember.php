<?php

trait Remember {
    // Add cat to Remember-flow
    public function addRememberCat($name, $born, $came, $adopted, $death, $description, $cause) {
        $sql = 'INSERT INTO remember(
                  `name`,
                  `born`,
                  `came`,
                  `adopted`,
                  `death`,
                  `description`,
                  `cause`
                ) VALUES (
                  :name,
                  :born,
                  :came,
                  :adopted,
                  :death,
                  :description,
                  :cause
                )';

        // Prepares a query
        $stmt = $this->pdo->prepare($sql);

        // Sends query to database
        return $stmt->execute(array(
           'name' => $name,
           'born' => $born,
           'came' => $came,
           'adopted' => $adopted,
           'death' => $death,
           'description' => $description,
           'cause' => $cause,
        ));
    }

    // Change cat from Remember-flow
    public function changeRememberCat($id, $name, $born, $came, $adopted, $death, $description, $cause) {
        $sql = 'UPDATE remember SET
                  name = :name,
                  born = :born,
                  came = :came,
                  adopted = :adopted,
                  death = :death,
                  description = :description,
                  cause = :cause 
                WHERE
                  id = :id';

        // Prepares a query
        $stmt = $this->pdo->prepare($sql);

        // Sends query to database
        return $stmt->execute(array(
            'id' => $id,
            'name' => $name,
            'born' => $born,
            'came' => $came,
            'adopted' => $adopted,
            'death' => $death,
            'description' => $description,
            'cause' => $cause,
        ));
    }

    // Delete cats from Remember-flow
    public function deleteRememberCat($id) {
        // Gets all information from database
        $sql = 'DELETE FROM remember WHERE id = :id';
        // Prepares a query
        $stmt = $this->pdo->prepare($sql);
        // Sends query to database
        return $stmt->execute(array(
            'id' => $id,
        ));
    }
}