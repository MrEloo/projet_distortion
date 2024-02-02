<?php

class ChannelController
{
    public function __construct()
    {
    }

    public function deleteChannel(): void
    {
        $instanceChannelManager = new ChannelsManager();
        $instanceChannelManager->deleteChannel($_GET['channel-id']);
        header('Location: index.php');
    }

    public function showChannels(array $channels): array
    {

        $newChannelManager = new ChannelsManager();
        $newPostManager = new PostManager();
        // $channels = $newChannelManager->getChannels();
        $channels_array = [];
        foreach ($channels as $key => $channel) {
            $posts_array = $newPostManager->getPostsWithChannelId($channel->getId());
            $channel->setPosts($posts_array);
            $channels_array[] = $channel;
        }
        return  $channels_array;
    }

    public function createChannel(): void
    {
        $instanceChannelManager = new ChannelsManager();
        if (isset($_POST['name']) && (isset($_POST["id_category"]))) {
            $verifChannel = $instanceChannelManager->getChannelWithIdCategory($_POST['name'], $_POST["id_category"]);
            if (isset($verifChannel)) {
                header("Location: index.php?errorChannel=already-exist");
            } else {
                $instanceCategoryManager = new CategoryManager();
                $category = $instanceCategoryManager->findOne($_POST['id_category']);
                $newChannel = new Channel($category, $_POST['name']);
                $instanceChannelManager->createChannel($newChannel);
                header("Location: index.php");
            }
        }
    }
}
