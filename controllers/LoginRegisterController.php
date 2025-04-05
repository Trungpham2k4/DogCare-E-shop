<?php
    require_once '../models/UserModel.php';
    class LoginRegister{
        private $email;
        private $password;
        private $role;
        private $authtoken;
        private $surname;
        private $name;
        private $repository;
        
        public function __construct($email, $password, $authtoken, $role, $surname = "", $name = ""){
            $this->email = $email;
            $this->password = $password;
            $this->role = $role;
            $this->authtoken = $authtoken;
            $this->surname = $surname;
            $this->name = $name;
            $this->repository = new UserModel();
        }

        public function authenticateUser() {
            if ($this->repository->authenticate($this->email, $this->password, $this->authtoken, $this->role)) {
                return true;
            } else {
                return false;
            }
        }
        
        

        public function createUser(){
            return $this->repository->createUser($this->email, $this->password,$this->authtoken, $this->role, $this->surname, $this->name);
        }

        public function checkDuplicateEmail(){
            return $this->repository->checkDuplicateEmail($this->email);
        }
    }

?>