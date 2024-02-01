<?php


class Router
{

   public function handleRequest(array $get): void {
        if (isset($get["route"]) && $get['route'] === "about") {
            $instancePageController = new PageController();
            $instancePageController->about();
        } else if (isset($get["route"]) && $get['route'] === "home") {
            $instancePageController = new PageController();
            $instancePageController->home();
        } else if (!isset($get["route"])) {
            $instancePageController = new PageController();
            $instancePageController->home();
        } else {
            $instancePageController = new PageController();
            $instancePageController->error();
        }
    }
}
