<?php

class ChannelsManager extends AbstractManager
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getChannel(): array
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



    public function createChannel($channel): void
    {
        $createQuery = $this->db->prepare('INSERT INTO channels (id_cat, name) VALUES (:id_cat, :name)');
        $parameters = [
            'id_cat' => $channel->getCategory(),
            'name' => $channel->getName()
        ];
        $createQuery->execute($parameters);
    }

    public function deleteChannel($channel): void
    {
        $deleteQuery = $this->db->prepare('DELETE FROM channels WHERE id_cat = :id_cat AND name = :name');
        $parameters = [
            'id_cat' => $channel->getCategory()->getId(),
            'name' => $channel->getName()
        ];
        $deleteQuery->execute($parameters);
    }



    public function updateChannel(): void
    {
    }
}
