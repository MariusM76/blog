<?php

class Topic extends Base
{
    public $name;


    public static function getTableName()
    {
        return 'topics';
    }

    public function getNoOfPosts()
    {
        return $noOfPosts = count(Post::findBy('topicId',$this->getId()));
    }
}