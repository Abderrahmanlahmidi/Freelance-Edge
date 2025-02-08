<?php


class Role
{
    private int $id = 0;
    private string $rolename = "";

    public function __construct() {}

    public static function instanceWithName(string $name): Role
    {
        $instance = new self();

        $instance->rolename = $name;

        return $instance;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function setRoleName(string $rolename): void
    {
        $this->rolename = $rolename;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getRoleName(): string
    {
        return $this->rolename;
    }


    public function __toString()
    {
        $id = $this->id;
        $name = $this->rolename;


        return "(Role) => id : " . $id . " , Role name : " . $name;
    }
}
