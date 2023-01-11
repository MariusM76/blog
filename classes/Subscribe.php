<?php

class Subscribe extends Base
{
    public $email;

    public static function getTableName()
    {
        return 'subscribes';
    }
}