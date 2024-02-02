<?php
class PostController
{

    public function createPost(): void
    {
        $instancePostManager = new PostManager();
        if (isset($_POST['content']) && (isset($_POST["id_channel"]))) {
            $newPost = new Post($_POST['content']);
            $newPost->setChannelId($_POST["id_channel"]);
<<<<<<< HEAD
            $instancePostManager->createPost($newPost);
            header("Location: index.php");
=======
                $instancePostManager->createPost($newPost);
                header("Location: index.php");
>>>>>>> 41e5e9ac5192615fa2b69046ba0ad03a8ce0979c
        }
    }

    public function deletePost(): void
    {
    }
}
