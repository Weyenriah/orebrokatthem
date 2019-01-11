<?php

trait News {
    // Add News
    public function addNews($news, $image) {
        // Checks no spamming
        if ($this->changesLastHour('news') > 20) {
            return false;
        } else {
            // Insert into database
            $sql = 'INSERT INTO %1$snews (
                      `news`,
                      `image`
                    ) VALUES (
                      :news,
                      :image
                    )';
            // Prepares a query
            $stmt = $this->pdo->prepare($sql);
            // Sends query to database
            return $stmt->execute(array(
                'news' => $news,
                'image' => $image,
            ));
        }
    }

    // Change News
    public function changeNews($id, $news, $image) {
        // Updates database
        $sql = 'UPDATE %1$snews SET news = :news';
        // Parameters needed
        $parameters = [
            'news' => $news,
            'id' => $id,
        ];
        if ($image != null) {
            $sql .= ', image = :image';
            $parameters['image'] = $image;
        }
        $sql .= ' WHERE id = :id';
        // Prepares a query
        $stmt = $this->pdo->prepare($sql);
        // Sends query to database
        return $stmt->execute($parameters);
    }

    // Delete News
    public function deleteNewsPost($id) {
        // Gets all information from database
        $sql = 'DELETE FROM %1$snews WHERE id = :id';
        // Prepares a query
        $stmt = $this->pdo->prepare($sql);
        // Sends query to database
        return $stmt->execute(array(
            'id' => $id,
        ));
    }
}