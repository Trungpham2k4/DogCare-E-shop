<?php
// Note trong PHP thì hàm json_encode sẽ không tự động chuyển đối tượng thành json mà các class cần phải implement 
// JsonSerializable để hiện thực method jsonSerialize => Hàm này sẽ tự động được gọi khi json_encode đc gọi
class ProductDTO implements JsonSerializable{
    private string $id;
    private string $name;
    private string $description;
    private string $categoryId;
    private float $price;
    private string $image;

    public function __construct(string $id, string $name, string $description, string $categoryId, float $price, string $image)
    {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->categoryId = $categoryId;
        $this->price = $price;
        $this->image = $image;
    }

    public function getId(){
        return $this->id;
    }
    public function getName(){
        return $this->name;
    }

    public function getDescription(){
        return $this->description;
    }

    public function getCategoryId(){
        return $this->categoryId;
    }

    public function getPrice(){
        return $this->price;
    }
    public function getImage(){
        return $this->image;
    }
    public function jsonSerialize(): mixed {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'category_id' => $this->categoryId,
            'price' => $this->price,
            'image' => $this->image
        ];
    }
}


?>