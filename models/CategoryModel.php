<?php
class CategoryModel{
    private string $id;
    private string $name;

    public function __construct(string $id, string $name)
    {
        $this->id = $id;
        $this->name = $name;
    }

    public function getId(){
        return $this->id;
    }
    public function getName(){
        return $this->name;
    }

}


?>