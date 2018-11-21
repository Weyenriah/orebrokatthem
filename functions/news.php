<?php

trait News {
    // Add News
    public function addNews($news) {
        if ($this->changesLastHour('news') > 20) {
            return false;
        } else {
            $sql = 'INSERT INTO news (news) VALUES (:news)';
            // Prepares a query
            $stmt = $this->pdo->prepare($sql);
            // Sends query to database
            return $stmt->execute(array(
                'news' => $news,
            ));
        }
    }

    // Change News
    public function changeNews($id, $news) {
        $sql = 'UPDATE news SET news = :news WHERE id = :id';
        // Prepares a query
        $stmt = $this->pdo->prepare($sql);
        // Sends query to database
        return $stmt->execute(array(
            'id' => $id,
            'news' => $news,
        ));
    }

    // Delete News
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