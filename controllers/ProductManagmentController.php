<?php
    require_once '../models/ProductModel.php';

    class ProductManagmentController{

        private $repository;
        
        public function __construct(){
            $this->repository = new ProductModel();
        }

        public function create($prod_name ,$price,$category, $image, $bio){
            $id = md5(uniqid(rand()));
            $category = $category === "Food" ? "CAT001" : "CAT002";
            $this->repository->addProduct($id, $prod_name, $price, $category, $image, $bio);
        }

        public function read($category){
            return $this->repository->getAll($category);
        }

        public function update($id, $prod_name , $price ,$category, $image, $bio){
            $currentProduct = $this->repository->getProductById($id);
            if($currentProduct !== null){
                $prod_name = empty($prod_name) ? $currentProduct->getName() : $prod_name;
                $price = empty($price) ? $currentProduct->getPrice() : $price;
                $category = $category === "Food" ? "CAT001" : "CAT002";
                $image = empty($image) ? $currentProduct->getImage() : $image;
                $bio = empty($bio) ? $currentProduct->getDescription(): $bio;
                $this->repository->updateProduct($id, $prod_name, $price, $category, $image, $bio);
            }
        }

        public function delete($id){
            $currentProduct = $this->repository->getProductById($id);
            if ($currentProduct !== null){
                $this->repository->deleteProduct($id);
            }
        }
}
?>