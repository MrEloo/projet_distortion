<?php

class CategoryManager extends AbstractManager
{
       public function __construct()
    {
        parent::__construct();
    }
    
    
    public function findAll () : array
    {
        $query = $this->db->prepare('SELECT * FROM categories');
        $query->execute();
        $categories = $query->fetchAll(PDO::FETCH_ASSOC);
        
        $categories_array = [];
        
        foreach($categories as $category) {
            $category1 = new Category($category["name"]);
            $category1->setId($category["id"]);
            $categories_array[]=$category1;
        }
        
        return $categories_array;
    }
    
    
    public function findOne (int $id) : ?Category
    {
        $query = $this->db->prepare('SELECT * FROM categories WHERE id = :id');
        $parameters = [
            "id" => $id
        ];
        $query->execute($parameters);
        $category = $query->fetch(PDO::FETCH_ASSOC);
        
      
        if ($category) {
            $category1 = new Category($category["name"]);
            $category1->setId($category["id"]);
            
            return $category1;
        }
        return null;
    }
    
    public function findName (Category $name) : ?Category
    {
        $query = $this->db->prepare('SELECT * FROM categories WHERE name = :name');
        $parameters = [
            'name' => $name->getName()
        ];
        $query->execute($parameters);
        $category = $query->fetch(PDO::FETCH_ASSOC);
        
      
        if ($category) {
            $cat1 = new Category($category["name"]);
            $cat1->setId($category["id"]);
            
            return $cat1;
        }
        return null;
    }
    
    
    public function create (Category $category) : void
    {
        $query = $this->db->prepare('INSERT INTO categories (name) VALUES (:name)');
        $parameters = [
            'name' => $category->getName()
        ];
        $query->execute($parameters);
        $category->setId($this->db->lastInsertId());
    }
    
    
    public function update (Category $category) : void
    {
        $query = $this->db->prepare('UPDATE categories SET name = :name');
        $parameters = [
            'name' => getName(),
        ];

        $query->execute($parameters);
    }
    
    
    public function delete (int $id) : void
    {
        $query = $this->db->prepare('DELETE FROM categories WHERE id = :id');
        $parameters = [
            'id' => $id
        ];
        
        $query->execute($parameters);
    }
    
}
