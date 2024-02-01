<?php

require '../managers/AbstractManager.php';
require '../models/Channel.php';
require '../models/Categories.php';
require '../managers/ChannelsManager.php';
require '../controllers/ChannelController.php';


$manager = new ChannelsManager();

$channelsCat = $manager->getChannel();

var_dump($channelsCat[13]);




// $category = null;

// if ($_POST['cat'] === 'Cinema') {
// $category = 1;
// } else if ($_POST['cat'] === 'Art') {
// $category = 2;
// }