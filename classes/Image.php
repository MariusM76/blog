<?php

class Image extends Base
{
    public $file;


    public static function getTableName()
    {
        return 'images';
    }
}