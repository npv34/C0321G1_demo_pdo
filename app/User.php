<?php

namespace App;

class User
{
    public int $id;
    public string $username;
    public string $email;
    public string $address;
    public string $group;


    public function __construct($data)
    {
        $this->username = $data['username'];
        $this->email = $data['email'];
        $this->address = $data['address'];
        $this->group = $data['group_name'];
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

}