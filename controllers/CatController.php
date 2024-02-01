<?php 

class CatController 
{
    
    public function __construct()
    {
    }
    
    public function createCategory(): void
    {
        $route = 'createCategory()';
        require 'templates/layout.phtml';
    }
    
    public function pushCategory(): void
    {
        $cm = new CategoryManager();
        
        if (isset($_POST['name'])) 
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
    
   
}