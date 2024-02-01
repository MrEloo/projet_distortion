<?php 
class Post {
    private string $created_at;
    private int $id;
    private Channel $channel;
    private Category $category;
    
    public function __construct(private string $content) {
        $this->created_at = (new DateTime())->format('Y-m-d H:i:s');
    }
    
    // ----------- SETTERS & GETTERS ---------------
    public function getContent() : string {
        return $this->content;
    }
    public function setContent(string $content) : void {
        $this->content = $content;
    }
    
    public function getCreatedAt() : string {
        return $this->created_at;
    }

    public function setCreated_at(string $date) : void {
        $this->created_at = $date;
    }
    
    public function getId() : int {
        return $this->id;
    }
    public function setId(int $id) : void {
        $this->id = $id;
    }
    
    public function setChannel(Channel $channel) :void {
        $this->channel = $channel;
    }
    
    public function getChannel() : Channel {
        return $this->channel;
    }
    
    public function setCategory(Category $category) : void {
        $this->category = $category;
    }
    
    public function getCategory() : Category {
        return $this->category; 
    }
}