<?php

namespace App\Models;

use App\Database\Database; 

class Brand extends CoreModel {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance(); 
    }


    public function create($name) {
        $stmt = $this->db->prepare("INSERT INTO brands (name) VALUES (:name)");
        $stmt->bindParam(':name', $name);
        return $stmt->execute();
    }


    public function read() {
        $stmt = $this->db->query("SELECT * FROM brands");
        return $stmt->fetchAll();
    }


    public function update($id, $name) {
        $stmt = $this->db->prepare("UPDATE brands SET name = :name WHERE id = :id");
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }


    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM brands WHERE id = :id");
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}