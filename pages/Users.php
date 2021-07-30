<?php
include_once "operations.php";
include_once "DBclass.php";
class Users extends database implements operation{

    var $userid;
    var $name;
    var $email;
    var $phone;
    var $type;
    var $password;
    var $country;
    var $city;
    var $street;
     
    function setuserid($id){
        $this->userid=$id;
    }
    function getid(){
        return $this->userid;
    }
    function setname($n){
        $this->name=$n;
    }
    function getname(){
        return $this->name;
    } 
    function setemail($e){
        $this->email=$e;
    }
    function getemail(){
        return $this->email;
    } 
    function setphone($p){
        $this->phone=$p;
    }
    function getphone(){
        return $this->phone;
    } 
    function settype($t){
        $this->type=$t;
    }
    function gettype(){
        return $this->type;
    } 
    function setpassword($pass){
        $this->password=$pass;
    }
    function getpassword(){
        return $this->password;
    }
     function setcountry($c){
        $this->country=$c;
    }
    function getcountry(){
        return $this->country;
    }
    function setcity($c){
        $this->city=$c;
    }
    function getcity(){
        return $this->city;
    }
    function setstreet($s){
        $this->street=$s;
    }
    function getstreet(){
        return $this->street;
    }

    public function Add(){
        return parent::RunDML("insert into users values (Default , '".$this->getname()."' , '".$this->getphone()."', '".$this->getemail()."' ,'".$this->gettype()."' ,'".$this->getpassword()."', '".$this->getcity()."' ,'".$this->getcountry()."' ,'".$this->getstreet()."')");
    }
    public function Update(){
       return parent::RunDML("update users set name= '".$this->getname()."' ,phone= '".$this->getphone()."', email= '".$this->getemail()."' ,type='".$this->gettype()."' ,password='".$this->getpassword()."' where (user_id = '".$_SESSION["ID"]."')");

    }
    public function UpdatePW(){
        return parent::RunDML("update users set  Password='".$this->getpassword()."' where user_id='".$_GET["id"]."'");
    }
    public function delete(){
        return parent::RunDML("delete from users  where (user_id = '".$_SESSION["ID"]."') ");
    }
    public function Select(){

    }
    public function login(){
        $result = parent::GetData("select * from users where (email = '".$this->getemail()."' or phone = '".$this->getphone()."') and password= '".$this->getpassword()."' ");
        return $result;
    }

    public function GetByID(){
        $result = parent::GetData("select * from users where user_id= '".$_SESSION['ID']."'");
        return $result;
    }
     
    public function GetByEmail(){
        $result = parent::GetData("select * from users where email= '".$this->getemail()."'");
        return $result;
    }
}
?>