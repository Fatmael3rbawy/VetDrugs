<?php
class database{
    public $conn ;

    function __construct(){
        $this->conn = mysqli_connect("mysql5044.site4now.net","a6c9ee_new","12345abcde","db_a6c9ee_new");

    }
    
    function RunDML($statement){
        if(!mysqli_query($this->conn,$statement))
            {
                return mysqli_error($this->conn);
            }
        else
            return "ok";
    }

    function GetData($select){
        $result=mysqli_query($this->conn,$select);
        return $result;

    }
}


?>