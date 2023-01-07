<?php

class User extends Base
{
    public $username;

    public $email;

    public $role;

    public $password;

    public $createdAt;

    public $updatedAt;

    public $subscribe;


    public static function getTableName()
    {
        return 'users';
    }
}