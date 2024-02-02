<?php

require "../managers/AbstractManager.php";
require "../models/Category.php";
require "../models/Channel.php";
require "../models/Post.php";
require "../controllers/CategoryController.php";
require "../controllers/ChannelController.php";
require "../controllers/PageController.php";
require "../managers/CategoryManager.php";
require "../managers/ChannelsManager.php";
require "../managers/PostManager.php";
require "../config/Router.php";




$newChannelManager = new ChannelsManager();
$newPostManager = new PostManager();
$channels = $newChannelManager->getChannels();
$array = [];
foreach ($channels as $key => $channel) {
    $posts_array = $newPostManager->getPostsWithChannelId($channel->getId());
    $channel->setPosts($posts_array);
    $array[] = $channel;
}

var_dump($array[0]);
