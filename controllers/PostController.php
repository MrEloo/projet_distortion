<?php 
class PostController {
 
     public function createPost(): void
    {
        $instancePostManager = new PostManager();
        if (isset($_POST['content']) && (isset($_POST["id_channel"]))) {
            $newPost = new Post($_POST['content']);
            $newPost->setChannelId($_POST["id_channel"]);
                $instancePostManager->createPost($newPost);
                header("Location: index.php");
        }
    }   
}