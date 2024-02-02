<?php

class ChannelController
{
    public function __construct()
    {
    }

    // public function checkChannel(): void
    // {
    //     $newChannelManager = new ChannelsManager();
    //     $newChannelManager->createChannel(1, 'Mon premier channel');
    //     $route = 'error';
    //     require 'templates/layout.phtml';
    // }

    public function showChannels(): array
    {
        $newChannelManager = new ChannelsManager;
        $channels = $newChannelManager->getChannels();
        return $channels;
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

