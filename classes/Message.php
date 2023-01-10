<?php

class Message extends Base
{
    public $name;

    public $message;

    public $postId;


    public static function getTableName()
    {
        return 'messages';
    }
}