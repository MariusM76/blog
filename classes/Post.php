<?php

class Post extends Base
{
    public $userId;

    public $title;

    public $views;

    public $likes;

    public $imageId;

    public $body;

    public $published;

    public $createdAt;

    public $updatedAt;

    public $topicId;


    public static function getTableName()
    {
        return 'posts';
    }

    public function getImageName()
    {
//        $imageName = Image::findBy('id', $this->imageId);
//        var_dump($imageName);die;
        return $imageName= Image::findBy('id', $this->imageId);
    }

    public function getTopicName()
    {
        $topic = new Topic($this->topicId);
        return $topic->name;
    }

    public function getNoOfMessages()
    {
        $noOfMessages = Message::findBy('postId',$this->getId());
        return count($noOfMessages);
    }

    public function getAuthorName()
    {
        $author = new User($this->userId);
        return $author->username;
    }

}