<?php
namespace App\Controller;
use App\Message\Message;
use App\Utility\Utility;
use App\Model\Database as DB;
class Complain extends DB
{
    public $id = "";
    public $name = "";
    public $description = "";
    public $complainant = "";

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
            $this->fullName = $data['name'];
        }
        if (array_key_exists('description', $data)) {
            $this->email = $data['description'];
        }
        if (array_key_exists('complainant', $data)) {
            $this->email = $data['complainant'];
        }

        return $this;
    }

    public function complainstore(){
        $query="INSERT INTO `complainstore` (`user_id`, `name`, `complainant`, `description`) VALUES ('{$this->id}', '{$this->name}', '{$this->complainant}', '{$this->description}');";
        $result=mysqli_query($this->conn,$query);
        if($result){
            Message::message("<div class=\"alert alert-success\">
  <strong>Success!</strong> Sucessfully Placed Your Complain.
</div>");
            Utility::redirect('../../views/user/welcome.php');

        } else {
            Message::message("<div class=\"alert alert-danger\">
  <strong>Error!</strong> Complain  Not Placed Successfully
    </div>");
            Utility::redirect('../../views/user/welcome.php');

        }
    }

}

