<?php

namespace db;
require_once 'DB.php';
class ProductRepository
{
    private readonly DB $db;
    public function __construct(DB $db)
    {
        $this->db = $db;
    }

    public function select(string $searchTxt = null) : array {
        $connection = null;
        $values = [];

        try {
            $connection = $this->db->connect();
            if (!$connection->connect_error) {
                $query = "SELECT * FROM `products`";

                if (!empty($searchTxt)) {
                    $searchTxt = trim($searchTxt);
                    $query .= " WHERE title LIKE ? OR price = ?";
                }
                $stmt = $connection->prepare($query);

                if(!empty($searchTxt)) {
                    $title = "%{$searchTxt}%";
                    $stmt->bind_param('sd', $title, $searchTxt);
                }

                $stmt->execute();
                $result = $stmt->get_result();

                while ($row = $result->fetch_array(MYSQLI_NUM)) {
                    $values[] = ['id' => $row[0], 'title' => $row[1], 'price' => $row[2]];
                }

            }
        } finally {
            $connection?->close();
        }

        return $values;
    }

    public function insert($entity) : array | null {
        if($entity === null || !isset($entity['title']) || !isset($entity['price'])) {
            return null;
        }

        if($entity['price'] < 0) {
            return null;
        }

        $connection = null;
        $res = null;

        try {
            $connection = $this->db->connect();
            if (!$connection->connect_error) {
                $query = "INSERT INTO products(title, price) VALUES (?, ?)";

                $stmt = $connection->prepare($query);
                $title = trim($entity['title']);
                $stmt->bind_param('sd', $title, $entity['price']);

                $res = $stmt->execute();
                if($res !== true) {
                    $res = null;
                }
                else {
                    $res = ['id' => $connection->insert_id, 'title' => $title, 'price' => $entity['price']];
                }
            }
        } finally {
            $connection?->close();
        }

        return $res;
    }
    public function update($entity) : bool {
        if($entity === null || !isset($entity['id']) || !isset($entity['title']) || !isset($entity['price'])) {
            return false;
        }

        if($entity['price'] < 0) {
            return false;
        }

        $connection = null;

        try {
            $connection = $this->db->connect();
            if (!$connection->connect_error) {
                $query = "UPDATE products SET title=?, price=? WHERE id=?";

                $stmt = $connection->prepare($query);
                $title = trim($entity['title']);
                $stmt->bind_param('sdi', $title, $entity['price'], $entity['id']);

                $res = $stmt->execute();
            }
        } finally {
            $connection?->close();
        }

        return $res ?? false;
    }

    public function delete($id) : bool {
        if($id === null) {
            return false;
        }

        $connection = null;
        $res = false;

        try {
            $connection = $this->db->connect();
            if (!$connection->connect_error) {
                $query = "DELETE FROM products WHERE id=?";

                $stmt = $connection->prepare($query);
                $stmt->bind_param('i', $id);

                $res = $stmt->execute();
            }
        } finally {
            $connection?->close();
        }

        return $res;
    }
}