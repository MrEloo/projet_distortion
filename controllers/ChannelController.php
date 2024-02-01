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

    public function showChannels(): void
    {
        $newChannelManager = new ChannelsManager;
        $channels = $newChannelManager->getChannel();
        var_dump($channels);
        $route = 'home';
        require 'templates/layout.phtml';
    }
}
