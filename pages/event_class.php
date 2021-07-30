<?php
  include_once "DBclass.php";
  include_once "operations.php";
    class Events extends database implements operation{
        var $event_id;
        var	$name;
        var	$place;
        var	$time;
        var	$details;
        var	$user_id;
        public function setid($value){
            $this->event_id=$value;
        }
        public function getid(){
            return $this->event_id;
        }               
        public function setname($value){
            $this->name=$value;
        }
        public function getname(){
            return $this->name;
        }
        public function setplace($value){
            $this->place=$value;
        }
        public function getplace(){
            return $this->place;
        }
        public function settime($value){
            $this->time=$value;
        }
        public function gettime(){
            return $this->time;
        }
        public function setdetails($value){
            $this->details=$value;
        }
        public function getdetails(){
            return $this->details;
        }
    
        public function Add(){
            return parent::RunDML(" insert into events values ( Default , '".$this->getname()."' , '".$this->getplace()."' , '".$this->gettime()."' , '".$this->getdetails()."' ,'".$_SESSION["ID"]."')");
        }
        public function Update(){
            return parent::RunDML("update events set event_name= '".$this->getname()."' ,place= '".$this->getplace()."', time= '".$this->gettime()."' ,details='".$this->getdetails()."'  where (event_id = '".$this->getid()."')");

        }
        public function delete(){
            return parent::RunDML( "delete from events where event_id= '".$this->getid()."' ");

        }
        public function Select(){
            
        }
        public function GetLasstID(){
            return mysqli_insert_id( $this->conn);
         }

        public function GetAll(){
            return parent::GetData("select events.event_id ,events.event_name, events.place,events.time,events.details,users.user_id,users.name
            from events
            INNER JOIN users  ON users.user_id=events.user_id
            ");
        }
        public function GetByID(){
            $result = parent::GetData("select * from events where event_id= '".$this->getid()."' ");
            return $result;
        }
        public function getbycom(){
            return parent::GetData("select events.event_id ,events.event_name, events.place,events.time,events.details,users.user_id,users.name
            from events
            INNER JOIN users  ON users.user_id=events.user_id where user_id= '".$_GET['company']."'");

        }
        public function getlast(){
            return parent::GetData("select events.event_id ,events.event_name, events.place,events.time,events.details,users.user_id,users.name
            from events
            INNER JOIN users  ON users.user_id=events.user_id order by event_id desc limit 6");

        }
        public function GetfromView(){
            $result = parent::GetData("select events.event_id ,events.event_name, events.place,events.time,events.details,users.user_id,users.name
            from events
            INNER JOIN users  ON users.user_id=events.user_id where user_id= '".$_SESSION['ID']."' ");
            return $result;
        }
    
    }

?>