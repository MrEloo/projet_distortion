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

                header("Location: index.php?errorCategory=already-exist");
            } else {
                $instanceCategoryManager->createCategory($newCategory);
                header("Location: index.php");
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
                exit();
            }
        }
        else 
        {
            $name = $_POST['name'];
            $cat = new Category($name);
            
            $cm->create($cat);
        }
    }
    
   */
    }

    public function deleteCategory(): void
    {
        $instanceChannelManager = new CategoryManager();
        $instanceChannelManager->delete($_GET['channel-id']);
        header('Location: index.php');
    }
}
