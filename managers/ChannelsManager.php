<?php

class ChannelsManager extends AbstractManager
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getChannels(): array
    {
        $selectQuery = $this->db->prepare('SELECT channels.*, categories.name AS categories_name FROM channels JOIN categories ON categories.id = channels.id_cat');
        $selectQuery->execute();
        $channelsDatas  = $selectQuery->fetchAll(PDO::FETCH_ASSOC);


        $channels = [];

        foreach ($channelsDatas  as $key => $channelsData) {
            $category = new Category($channelsData['categories_name']);
            $channel = new Channel($category, $channelsData['name']);
            $channel->setId($channelsData['id']);
            $category->setId($channelsData['id_cat']);
            $channels[] = $channel;
        }
        return $channels;
    }

    public function getChannelWithIdCategory(string $channelName, int $id_category): ?Channel
    {
        $query = $this->db->prepare('SELECT * FROM channels WHERE name = :name AND id_cat = :id_cat');
        $parameters = [
            'name' => $channelName,
            'id_cat' => $id_category
        ];
        $query->execute($parameters);

        $channelSearch = $query->fetch(PDO::FETCH_ASSOC);

        if ($channelSearch) {
            $instanceCategoryManager = new CategoryManager;
            $category = $instanceCategoryManager->findOne($channelSearch["id_cat"]);
            if (isset($category)) {
                $newChannel = new Channel($category, $channelSearch["name"]);
                $newChannel->setId($channelSearch["id"]);

                return $newChannel;
            }
        }
        return null;
    }


    public function createChannel($channel): void
    {
        $createQuery = $this->db->prepare('INSERT INTO channels (id_cat, name) VALUES (:id_cat, :name)');
        $parameters = [
            'id_cat' => $channel->getCategory()->getId(),
            'name' => $channel->getName()
        ];
        $createQuery->execute($parameters);
    }

    public function deleteChannel($id): void
    {

        $newCategoryManager = new CategoryManager();



        $deleteQuery = $this->db->prepare('DELETE FROM posts WHERE id_salon = :id_salon');
        $parametersDeletePosts = [
            'id_salon' => $id,
        ];
        $deleteQuery->execute($parametersDeletePosts);

        $deleteQuery = $this->db->prepare('DELETE FROM channels WHERE id = :id');
        $parameters = [
            'id' => $id
        ];
        $deleteQuery->execute($parameters);
    }



    public function updateChannel(): void
    {
    }
}
