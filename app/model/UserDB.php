<?php

namespace App\Model;

use App\User;

class UserDB
{
    public $conn;

    public function __construct()
    {
        $database = new \App\Database();
        $this->conn = $database->connect();
    }

    public function getAll(): array
    {
        //chuan bi cau lenh truy van
        $sql = 'SELECT u.id, u.username, u.email, u.address, g.name as `group_name`  
                FROM users u JOIN `groups` g
                ON u.group_id = g.id';

        //thu thi - voi cac cau lenh select k co tham so su dung nhanh ham co san pdo -> query();
        $stmt = $this->conn->query($sql);

        $result = $stmt->fetchAll();
        $users = [];
        foreach ($result as $item) {
            $user = new User($item);
            $user->setId($item['id']);
            array_push($users, $user);
        }

        return $users;
    }
}