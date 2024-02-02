<?php


class Router
{

    public function handleRequest(array $get): void
    {
        if (isset($get["route"]) && $get['route'] === "about") {
            $instancePageController = new PageController();
            $instancePageController->about();
        } else if (isset($get["route"]) && $get['route'] === "home") {
            $instancePageController = new PageController();
            $instancePageController->home();
        } else if (isset($get["route"]) && $get['route'] === "create-category") {
            $instancePageController = new CategoryController();
            $instancePageController->createCategory();
        } else if (isset($get["route"]) && $get['route'] === "create-channel") {
            $instanceChannelController = new ChannelController();
            $instanceChannelController->createChannel();
        } else if (isset($get["route"]) && $get['route'] === "delete-channel") {
            $instanceChannelController = new ChannelController();
            $instanceChannelController->deleteChannel();
        } else if (isset($get["route"]) && $get['route'] === "delete-category") {
            $instanceChannelController = new CategoryController();
            $instanceChannelController->deleteChannel();
        } else if (!isset($get["route"])) {
            $instancePageController = new PageController();
            $instancePageController->home();
        } else {
            $instancePageController = new PageController();
            $instancePageController->error();
        }
    }
}
