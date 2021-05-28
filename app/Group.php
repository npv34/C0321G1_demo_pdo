<?php


namespace App;


class Group
{
    public int $id;
    public string $name;

    public function __construct($data)
    {
        $this->name = $data['name'];
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }


}