<?php

class CategoryManager extends AbstractManager
{
    public function __construct()
    {
        parent::__construct();
    }


    public function findAll(): array
    {
        $query = $this->db->prepare('SELECT * FROM categories');
        $query->execute();
        $categories = $query->fetchAll(PDO::FETCH_ASSOC);

        $categories_array = [];

        foreach ($categories as $category) {
            $newCategory = new Category($category["name"]);
            $newCategory->setId($category["id"]);
            $categories_array[] = $newCategory;
        }

        return $categories_array;
    }


    public function findOne(int $id): ?Category
    {
        $query = $this->db->prepare('SELECT * FROM categories WHERE id = :id');
        $parameters = [
            "id" => $id
        ];
        $query->execute($parameters);
        $category = $query->fetch(PDO::FETCH_ASSOC);


        if (isset($category)) {
            $newCategory = new Category($category["name"]);
            $newCategory->setId($category["id"]);

            return $newCategory;
        }
        return null;
    }

    public function findName(Category $category): ?Category
    {
        $query = $this->db->prepare('SELECT * FROM categories WHERE name = :name');
        $parameters = [
            'name' => $category->getName()
        ];
        $query->execute($parameters);
        $categorySearch = $query->fetch(PDO::FETCH_ASSOC);


        if ($categorySearch) {
            $newCategory = new Category($categorySearch["name"]);
            $newCategory->setId($categorySearch["id"]);

            return $newCategory;
        }
        return null;
    }


    public function createCategory(Category $category): void
    {
        $query = $this->db->prepare('INSERT INTO categories (name) VALUES (:name)');
        $parameters = [
            'name' => $category->getName()
        ];
        $query->execute($parameters);
        $category->setId($this->db->lastInsertId());
    }


    public function update(Category $category): void
    {
        $query = $this->db->prepare('UPDATE categories SET name = :name');
        $parameters = [
            // 'name' => getName(),
        ];

        $query->execute($parameters);
    }


    public function delete(int $id): void
    {
        $query = $this->db->prepare('DELETE FROM categories WHERE id = :id');
        $parameters = [
            'id' => $id
        ];

        $query->execute($parameters);
    }

    public function getAllChannelsFromCategory(int $id): ?array
    {
        $query = $this->db->prepare('SELECT * FROM channels WHERE id_cat = :id_cat');
        $parameters = [
            'id_cat' => $id
        ];
        $query->execute($parameters);
        $channelsSearch = $query->fetchAll(PDO::FETCH_ASSOC);


        $newCategoryManager = new CategoryManager();
        $category =  $newCategoryManager->findOne($id);

        $channels_array = [];

        if ($channelsSearch) {
            foreach ($channelsSearch as $channel) {
                $newChannel = new Channel($category, $channel["name"]);
                $newChannel->setId($channel["id"]);

                $channels_array[] = $newChannel;
            }
            return $channels_array;
        }
        return null;
    }
}
