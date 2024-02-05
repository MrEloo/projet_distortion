<?php

class CategoryController
{
    public function __construct()
    {
    }

    public function createCategory(): void
    {
        $instanceCategoryManager = new CategoryManager();
        if (isset($_POST['name'])) {
            $newCategory = new Category($_POST['name']);
            if ($instanceCategoryManager->findName($newCategory)) {

                header("Location: ../index.php?errorCategory=already-exist");
            } else {
                $instanceCategoryManager->createCategory($newCategory);
                header("Location: ../index.php");
            }
        }
    }

    public function displayAllCategories(): void
    {
        $instanceCategoryManager = new CategoryManager();
        $instanceChannelControler = new ChannelController();
        $categories_array = [];

        $categoriesToDisplay = $instanceCategoryManager->findAll();
        foreach ($categoriesToDisplay as $category) {
            $channels = $instanceCategoryManager->getAllChannelsFromCategory($category->getId());
            $searchChannels_array = $instanceChannelControler->showChannels($channels);
            $category->setChannels($searchChannels_array);
            $categories_array[] = $category;
        }
        $route = "home";
        require "templates/layout.phtml";
    }

    public function ChannelsbyCategories(): void
    {
        $instanceCategoryManager = new CategoryManager();
        $categoriesToSort = $this->displayAllCategories();
        foreach ($categoriesToSort as $category) {
            $category->getName();
        }
    }

    public function ChannelsFromCategory(): void
    {
        $AllChannelsFromCategory = $instanceCategoryManager->getAllChannelsFromCategory($category->getId());
    }
}
