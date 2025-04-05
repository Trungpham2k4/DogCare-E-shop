<?php
    require_once '../models/ProductModel.php';
    class ProductDetailController{
        private $productRepo;
        public function __construct()
        {
            $this->productRepo = new ProductModel();
        }

        public function getProductById($id){
            return $this->productRepo->getProductById($id);
        }

        public function index($id){
            $current_product = $this->getProductById($id);
            // print_r($current_product);
            include('../views/product_detail.php');
        }




    }

?>