<?php
ob_start();
include_once "DBclass.php";
include_once "operations.php";

class Cart  extends database implements operation
{
    var $prono;
    var    $proname;
    var $qty;
    var $price;
    var $Total;
    var $UserID;

    public function getprono()
    {
        return $this->prono;
    }
    public function setprono($value)
    {
        $this->prono = $value;
    }

    public function getproname()
    {
        return $this->proname;
    }
    public function setproname($value)
    {
        $this->proname = $value;
    }

    public function getqty()
    {
        return $this->qty;
    }
    public function setqty($value)
    {
        $this->qty = $value;
    }

    public function getprice()
    {
        return $this->price;
    }
    public function setprice($value)
    {
        $this->price = $value;
    }

    public function getTotal()
    {
        return $this->Total;
    }
    public function setTotal($value)
    {
        $this->Total = $value;
    }

    public function getUserID()
    {
        return $this->UserID;
    }
    public function setUserID($value)
    {
        $this->UserID = $value;
    }


    public function Add()
    {
        return parent::RunDML("insert into ordertemp values('" .$this->getprono(). "','" .$this->getproname(). "','" . $this->getqty() . "','" . $this->getprice() . "','" . $this->getTotal() . "','" . $this->getUserID() . "')");
    }
    public function Update()
    {
    }
    public function Delete()
    {
    }
    public function Select(){

    }

    public function DeleteCart($prno)
    {
        return parent::RunDML("delete from ordertemp where (prono='" . $prno . "' and usser_id='" . $_SESSION["ID"] . "')");
    }
    public function UpdateQTYP($prno)
    {
        return parent::RunDML("update ordertemp set qty=qty+1,total=qty*price where prono='" . $prno . "' and usser_id='" . $_SESSION["ID"] . "'");
    }
    public function UpdateQTYM($prno)
    {
        return parent::RunDML("update ordertemp set qty=qty-1,total=qty*price where prono='" . $prno . "' and usser_id='" . $_SESSION["ID"] . "'");
    }
    public function GetAll()
    {
        return parent::GetData("select * from ordertemp where usser_id='" . $_SESSION["ID"] . "'");
    }
    public function GetView($s)
    {
        return parent::GetData("select * from viewsales where user_id='" . $_SESSION["ID"] . "' and status='" . $s . "'");
    }
    public function GetCount()
    {
        return parent::GetData("select count(*) as count from ordertemp where usser_id='" . $_SESSION["ID"] . "'");
    }
    public function GetSum()
    {
        return parent::GetData("select sum(total) as total from ordertemp where usser_id='" . $_SESSION["ID"] . "'");
    }
}
