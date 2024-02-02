<?php 
class PostManager extends AbstractManager {
    public function construct() {
        parent::__construct();
    }
    // ------------- METHOD --------------
    public function findAll() : array {
        $query = $this->db->prepare("
        SELECT 
            posts.*, 
            channels.id AS channel_id, 
            categories.id AS category_id, 
            categories.name AS category_name, 
            channels.name AS channel_name
        FROM 
            posts
        JOIN 
            channels ON posts.id_salon = channels.id
        JOIN 
            categories ON channels.id_cat = categories.id");

        $query->execute();
        $posts = $query->fetchAll(PDO::FETCH_ASSOC);
        $postsArray = [];
        
        foreach ($posts as $post) {
            $newCategory = new Category($post['category_name']);
            $newPost = new Post($post['content']);
            $newCategory->setId($post['category_id']); 
            $newPost->setId($post["id"]);
            $newChannel = new Channel($newCategory, $post['channel_name']);
            $newChannel->setId($post['id_salon']);
            $newPost->setChannel($newChannel);
            $postsArray[] = $newPost;
        }
        
        return $postsArray;
    }
    
    public function findOne(int $id): ?Post {
        $query = $this->db->prepare('
        SELECT 
            posts.*, 
            channels.id AS channel_id, 
            categories.id AS category_id, 
            categories.name AS category_name, 
            channels.name AS channel_name
        FROM 
            posts
        JOIN 
            channels ON posts.id_salon = channels.id
        JOIN 
            categories ON channels.id_cat = categories.id
        WHERE posts.id = :id');
    
        $parameters = [
            "id" => $id
        ];
        $query->execute($parameters);
    
        $post = $query->fetch(PDO::FETCH_ASSOC);
    
        if (isset($post)) {
            $newCategory = new Category($post['category_name']);
            $newPost = new Post($post['content']);
            $newCategory->setId($post['category_id']); 
            $newPost->setId($post["id"]);
            $newChannel = new Channel($newCategory, $post['channel_name']);
            $newChannel->setId($post['id_salon']);
            $newPost->setChannel($newChannel);
            return $newPost;
        } else {
            return null;
        }
    }


    
    
    public function createPost(Post $post) : void {
          $query = $this->db->prepare('INSERT INTO posts (content, id_salon, created_at) 
                    VALUES (:content, :id_salon, :created_at)');
        $parameters = [
            "content" => $post->getContent(),
            "id_salon" => $post->getChannelId(),
            "created_at" => $post->getCreatedAt()
            ];
            $query->execute($parameters);
            $lastPostId = $this->db->lastInsertId();
            $post->setId($lastPostId);
    }
    
    
    
    public function update(Post $post) : void {
        $query = $this->prepare('UPDATE posts 
        SET 
            content = COALESCE(:content, content),
            created_at = COALESCE(:created_at, created_at)
        WHERE id=:postId');
        
        $parameters = [
            'content' => $post['content'] ?? null,
            'created_at' => $post['created_at'] ?? null,
            'postId' => $post['id']
            ];
            $query->execute($parameters);
    }
    
    public function delete(int $id) : void {
        $query = $this->db->prepare('DELETE FROM posts WHERE id = :postId');
        $parameters = ['postId' => $id];
        $query->execute($parameters);
        header("Location: https://antoinecormier.sites.3wa.io/php/bre01-php-poo-j2/Mini%20Projet/index.php");
    }
}