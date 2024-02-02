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
        
     /*   if (isset($_POST['name'])) 
        {
            $name = $_POST['name'];
            
            $cat = new Category($name);
            $cat1 = $cm->findName($cat);
            
            if ($cat1)
            {  
                header("Location: index.php");
            }
        }   
    }
    
/* test */
    
    public function displayAllCategories(): void
    {
        $instanceCategoryManager = new CategoryManager();
        $categoriesToDisplay = $instanceCategoryManager->findAll();
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
    $AllChannelsFromCategory = $instanceCategoryManager -> getAllChannelsFromCategory($category->getId());
    }
    
    
}