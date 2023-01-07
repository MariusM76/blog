<?php

class Post extends Base
{
    public $userId;

    public $title;

    public $views;

    public $body;

    public $published;

    public $createdAt;

    public $updatedAt;

    public $topicId;


    public static function getTableName()
    {
        return 'posts';
    }
}