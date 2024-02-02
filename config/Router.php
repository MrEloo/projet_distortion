<?php


class Router
{

    public function handleRequest(array $get): void
    {
        if (isset($get["route"]) && $get['route'] === "about") {
            $instancePageController = new PageController();
            $instancePageController->about();
            // } else if (isset($get["route"]) && $get['route'] === "home") {
            //     $instancePageController = new PageController();
            //     $instancePageController->home();

        } else if (isset($get["route"]) && $get['route'] === "home") {
            $instanceCategoryController = new CategoryController();
            $instanceCategoryController->displayAllCategories();
            // $instanceCategoryController->displayAllChannels();
        } else if (isset($get["route"]) && $get['route'] === "create-category") {
            $instanceCategoryController = new CategoryController();
            $instanceCategoryController->createCategory();
        } else if (isset($get["route"]) && $get['route'] === "create-channel") {
            $instanceChannelController = new ChannelController();
            $instanceChannelController->createChannel();
        } else if (isset($get["route"]) && $get['route'] === "create-post") {
            $instancePostController = new PostController();
            $instancePostController->createPost();
        } else if (isset($get["route"]) && $get['route'] === "delete-channel") {
            $instanceChannelController = new ChannelController();
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
