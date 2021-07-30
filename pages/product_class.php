<?php
    include_once "DBclass.php";
    include_once "operations.php";
    class Products extends database implements operation{
        var $product_id;
        var $pname;
        var $price;
        var $description;
        var $prod_date;
        var $concentration;
        public function setid($value){
            $this->product_id=$value;
        }
        public function getid(){
            return $this->product_id;
        }               
        public function setpname($value){
            $this->pname=$value;
        }
        public function getpname(){
            return $this->pname;
        }
        public function setprice($value){
            $this->price=$value;
        }
        public function getprice(){
            return $this->price;
        }
        public function setdescription($value){
            $this->description=$value;
        }
        public function getdescription(){
            return $this->description;
        }
        public function setprod_date($value){
            $this->prod_date=$value;
        }
        public function getprod_date(){
            return $this->prod_date;
        }
        public function setconcentration($value){
            $this->concentration=$value;
        }
        public function getconcentration(){
            return $this->concentration;
        }

        public function Add(){
            return parent::RunDML(" insert into products values ( Default , '".$this->getpname()."' , '".$this->getprice()."' , '".$this->getdescription()."' , '".$this->getprod_date()."' , '".$this->getconcentration()."' , '".$_SESSION['ID']."')");
        }
        public function Update(){
            return parent::RunDML("update products set pname= '".$this->getpname()."' ,price= '".$this->getprice()."', description= '".$this->getdescription()."' ,productionDate='".$this->getprod_date()."' ,concentration='".$this->getconcentration()."' where (product_id = '".$this->getid()."')");

        }
        public function delete(){
            return parent::RunDML( "delete from products where product_id= '".$this->getid()."' ");
        }
        public function Select(){
        }

        public function GetLasstID(){
           return mysqli_insert_id( $this->conn);
        }
        
        public function GetAll(){
            return parent::GetData("select products.product_id ,products.pname ,products.price ,products.description,products.productionDate ,products.concentration,
             users.user_id ,users.name FROM products INNER JOIN users on users.user_id = products.user_id");
        }
        
        public function GetfromView(){
            $result = parent::GetData("select products.product_id ,products.pname ,products.price ,products.description,products.productionDate ,products.concentration,
            users.user_id ,users.name FROM products INNER JOIN users on users.user_id = products.user_id where user_id= '".$_SESSION['ID']."' ");
            return $result;
        }
        public function GetByID(){
            $result = parent::GetData("select * from products where product_id= '".$this->getid()."' ");
            return $result;
        }
        public function getbycom(){
            return parent::GetData("select products.product_id ,products.pname ,products.price ,products.description,products.productionDate ,products.concentration,
            users.user_id ,users.name FROM products INNER JOIN users on users.user_id = products.user_id where users.user_id= '".$_GET['company']."'");

        }
        public function getlast(){
            return parent::GetData("select products.product_id ,products.pname ,products.price ,products.description,products.productionDate ,products.concentration,
            users.user_id ,users.name FROM products INNER JOIN users on users.user_id = products.user_id order by product_id desc limit 8");

        }
        public function GetByPID(){
            $result = parent::GetData("select * from products where product_id= '".$_GET['id']."' ");
            return $result;
        }
        public function filter(){
            $result = parent::GetData("select * from select products.product_id ,products.pname ,products.price ,products.description,products.productionDate ,products.concentration,
            users.user_id ,users.name FROM products INNER JOIN users on users.user_id = products.user_id where pname like '".$_GET['se']."%' ");
            return $result;
        }
        public function getbypageno($p){
            return parent::GetData("select products.product_id ,products.pname ,products.price ,products.description,products.productionDate ,products.concentration,
            users.user_id ,users.name FROM products INNER JOIN users on users.user_id = products.user_id where products.product_id= '".$p."' by product_id limit 8");

        }
    }
?>