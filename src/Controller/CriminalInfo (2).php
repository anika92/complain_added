<?php
namespace App\Controller;
use App\Message\Message;
use App\Utility\Utility;
use App\Model\Database as DB;
class CriminalInfo extends DB
{
    public $id = "";
    public $name = "";
    public $crimeType = "";
    public $criminalType = "";
    public $age = "";
    public $height = "";
    public $description = "";
    public $gender = "";
    public $address = "";
    public $station_id="";
    public $release_date="";
    public $image = "";


    public function __construct()
    {
        parent::__construct();
    }

    public function prepare($data = Array())
    {
        if (array_key_exists('id', $data)) {
            $this->id = $data['id'];
        }
        if (array_key_exists('name', $data)) {
            $this->name = $data['name'];
        }
        if (array_key_exists('multiple', $data)) {
            $this->crimeType = $data['multiple'];
        }
        if (array_key_exists('criminal', $data)) {
            $this->criminalType = $data['criminal'];
        }
        if (array_key_exists('age', $data)) {
            $this->age = $data['age'];

        }
        if (array_key_exists('station_id', $data)) {
            $this->station_id = $data['station_id'];
        }
        if (array_key_exists('date', $data)) {
            $this->release_date = $data['date'];
        }

        if (array_key_exists('height', $data)) {
            $this->height = $data['height'];
        }
        if (array_key_exists('description', $data)) {
            $this->description = $data['description'];
        }
        if (array_key_exists('gender', $data)) {
            $this->gender = $data['gender'];
        }
        if (array_key_exists('address', $data)) {
            $this->address = $data['address'];
        }

        if (array_key_exists('image', $data)) {
            $this->image = $data['image'];
        }


        return $this;

    }

    public function store()
    {
        $query="INSERT INTO `criminal_info` ( `name`, `crime_type`, `c_t_type`, `age`, `height`, `description`, `gender`, `address`,`station_id`,`release_date`,`image`) VALUES ( '".$this->name."', '".$this->crimeType."', '".$this->criminalType."', '".$this->age."', '".$this->height."', '".$this->description."', '".$this->gender."', '".$this->address."', '".$this->station_id."','".$this->release_date."','".$this->image."');";
//        $query="INSERT INTO `criminal_info` (`name`, `crime_type`, `c_t_type`, `age`, `height`, `description`, `gender`, `address`, `image`) VALUES ('".$this->name."', '".$this->crimeType."', '".$this->criminalType."', '".$this->age."', '".$this->height."', '".$this->description."', '".$this->gender."', '".$this->address."', '".$this->image."');";
//        $query = "INSERT INTO `criminaldb`.`criminal_info` ( `name`, `crime_type`, `criminal_type`, `age`, `height`, `description`, `gender`, `address`, `image`) VALUES ( '{$this->name}', '{$this->crimeType}', '{$this->criminalType}', '{$this->age}', '{$this->height}', '{$this->description}', '{$this->gender}', '{$this->address}', '{$this->image}');');";
//        echo $query;
//        die();
        $result = mysqli_query($this->conn, $query);

        if ($result) {
            Message::message("<div class=\"alert alert-success\">
  <strong>Success!</strong> Criminal added successfull !!
</div>");
            Utility::redirect('../../views/police/welcome.php');

        } else {
            Message::message("<div class=\"alert alert-danger\">
  <strong>Error!</strong> Data has not been stored successfully.
    </div>");
            Utility::redirect('../../views/police/welcome.php');

        }
    }
    public  function policeviewcrime(){
        $_allCriminalP=array();
        $query= "SELECT police_station.station_name,criminal_info.c_id, criminal_info.name,criminal_info.crime_type,criminal_info.c_t_type,criminal_info.age,criminal_info.height,criminal_info.description,criminal_info.gender,criminal_info.address,criminal_info.release_date,criminal_info.image FROM criminal_info LEFT JOIN police_station ON criminal_info.station_id=police_station.station_id;";

        $result= mysqli_query($this->conn,$query);
        while($row=mysqli_fetch_object($result)){
            $_allCriminalP[]=$row;
        }
        return $_allCriminalP;
    }
    public  function index(){
        $_allCriminalP=array();
        $query= "SELECT * FROM `criminal_info` ";
        $result= mysqli_query($this->conn,$query);
        while($row=mysqli_fetch_object($result)){
            $_allCriminalP[]=$row;
        }
        return $_allCriminalP;
    }
    public  function indexcriminal(){
        $_allCriminalP=array();
        $query= "SELECT * FROM `criminaltable` ";
        $result= mysqli_query($this->conn,$query);
        while($row=mysqli_fetch_object($result)){
            $_allCriminalP[]=$row;
        }
        return $_allCriminalP;
    }
    public  function indexcrime(){
        $_allCriminalP=array();
        $query= "SELECT * FROM `crimetable` ";
        $result= mysqli_query($this->conn,$query);
        while($row=mysqli_fetch_object($result)){
            $_allCriminalP[]=$row;
        }
        return $_allCriminalP;
    }
    public function view(){
        $query="SELECT * FROM `criminal_info` LEFT JOIN police_station  ON criminal_info.station_id=police_station.station_id WHERE `c_id`=".$this->id;
        /*echo $query;
        die();*/
        $result= mysqli_query($this->conn,$query);
        $row= mysqli_fetch_object($result);
        return $row;
    }
    public function count(){
        $query="SELECT COUNT(*) AS totalItem FROM `criminaldb`.`criminal_info` ";
        $result=mysqli_query($this->conn,$query);
        $row= mysqli_fetch_assoc($result);
        return $row['totalItem'];
    }
    public function update(){
        if(!empty($this->image)) {
            $query="UPDATE `criminal_info` SET `name` = '".$this->name."', `crime_type` = '".$this->crimeType."', `c_t_type` = '".$this->criminalType."', `age` = '".$this->age."', `height` = '".$this->height."', `description` = '".$this->description."', `gender` = '".$this->gender."', `address` = '".$this->address."', `station_id` = '".$this->station_id."',`release_date` = '".$this->release_date."',`image` = '".$this->image."'  WHERE `criminal_info`.`c_id` =".$this->id;


        }else{
            $query="UPDATE `criminal_info` SET `name` = '".$this->name."', `crime_type` = '".$this->crimeType."', `c_t_type` = '".$this->criminalType."', `age` = '".$this->age."', `height` = '".$this->height."', `description` = '".$this->description."', `gender` = '".$this->gender."', `address` = '".$this->address."', `station_id` = '".$this->station_id."',`release_date` = '".$this->release_date."' WHERE `criminal_info`.`c_id` =".$this->id;
        }


        $result= mysqli_query($this->conn,$query);
        if($result){
            Message::message("<div class=\"alert alert-success\">
  <strong>Success!</strong> Sucessfully Updated Info.
</div>");
            Utility::redirect('../../views/criminal_info/criminalAll.php');
        }
        else {
            Message::message("<div class=\"alert alert-danger\">
  <strong>Error!</strong> Data has not been Updated.
    </div>");
            Utility::redirect('../../views/criminal_info/criminalAll.php');
        }
    }
    public function mostWanted()
    {
        $_allCriminalP=array();
        $query = "SELECT * FROM `criminal_info` WHERE `c_t_type`='most wanted'";
       /* echo $query;
        die();*/
        $result= mysqli_query($this->conn,$query);
        while($row=mysqli_fetch_object($result)){
            $_allCriminalP[]=$row;
        }
        return $_allCriminalP;

    }
}