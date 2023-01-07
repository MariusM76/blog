<?php

class Topic extends Base
{
    public $name;


    public static function getTableName()
    {
        return 'topics';
    }
}