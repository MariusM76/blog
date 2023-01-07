<?php

class Message extends Base
{
    public $firstName;

    public $lastName;

    public $email;

    public $message;


    public static function getTableName()
    {
        return 'messages';
    }
}