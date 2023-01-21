<?php

class Image extends Base
{
    public $file;


    public static function getTableName()
    {
        return 'images';
    }

    public function getPostTitle()
    {
        $post = Post::findBy('imageId',$this->getId());
        return $post[0]->title;
    }
}