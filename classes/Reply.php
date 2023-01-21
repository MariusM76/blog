<?php

class Reply extends Base
{
    public $name;

    public $body;

    public $messageId;


    public static function getTableName()
    {
        return 'replies';
    }

    public function getPostId()
    {
        $messageId = new Message($this->messageId);
        return $messageId->postId;
    }
}