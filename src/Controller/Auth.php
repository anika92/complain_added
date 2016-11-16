<?php
namespace App\Controller;
session_start();
use App\Model\Database as DB;
use App\Utility\Utility;

class Auth extends DB
{
    public $email = "";
    public $password = "";
    public $usertype="";

    public function __construct()
    {
        parent::__construct();
    }

    public function prepare($data = Array())
    {
        if (array_key_exists('email', $data)) {
            $this->email = $data['email'];
        }
        if (array_key_exists('password', $data)) {
            $this->password = md5($data['password']);
        }
        if (array_key_exists('userType', $data)) {
            $this->usertype = $data['userType'];

        }
        return $this;

    }

    public function is_exist()
    {
        $query = "SELECT * FROM `admin` WHERE `email`='" . $this->email . "'";

        $result = mysqli_query($this->conn, $query);
        //$row= mysqli_fetch_assoc($result);
        if (mysqli_num_rows($result) > 0) {
            return TRUE;
        } else {
            return FALSE;
        }

    }

    public function is_registered()
    {
        $db="";
        if($this->usertype=="Admin"){
            $db='admin';

        }
        if($this->usertype=="Police"){
            $db='police_info';
        }
        if($this->usertype=="User"){
            $db='user_info';
        }


        $query = "SELECT * FROM $db WHERE `email`='" . $this->email . "' AND `password`='" . $this->password . "'";

        $result = mysqli_query($this->conn, $query);
        //$row= mysqli_fetch_assoc($result);

        if (mysqli_num_rows($result) > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    public function getUser()
    {
        $db="";
        if($this->usertype=="Admin"){
            $db='admin';

        }
        if($this->usertype=="Police"){
            $db='police_info';
        }
        if($this->usertype=="User"){
            $db='user_info';
        }


        $query = "SELECT * FROM $db WHERE `email`='" . $this->email . "' AND `password`='" . $this->password . "'";

        $result = mysqli_query($this->conn, $query);
        $row=mysqli_fetch_object($result);
        return $row;

    }

    public function logged_in()
    {
        if (((array_key_exists('user_email', $_SESSION)) && (!empty($_SESSION['user_email']))) && ((array_key_exists('userType', $_SESSION)) && (!empty($_SESSION['userType'])))) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    public function fetchInfo(){
        $db="";
        if($_SESSION['userType']=="Admin"){
            $db='admin';

        }
        if($_SESSION['userType']=="Police"){
            $db='police_info';
            $db2='police_profile';
            $db_id='p_id';
        }
        if($_SESSION['userType']=="User"){
            $db='user_info';
            $db2='user_profile';
            $db_id='user_id';
        }
        $status=$this->logged_in();
        if($status){
            if($db=="admin"){
                $query = "SELECT * FROM $db WHERE `email`='" . $_SESSION['user_email'] . "' AND `name`='" . $_SESSION['user_name']. "'";

            }
            else{
                $query = "SELECT * FROM $db INNER JOIN $db2 ON $db.$db_id=$db2.$db_id WHERE `email`='" . $_SESSION['user_email'] . "' AND `name`='" . $_SESSION['user_name']. "'";

            }
            $result = mysqli_query($this->conn, $query);
            $row=mysqli_fetch_object($result);
            return $row;
        }
    }

    public function log_out(){
        $_SESSION['user_email']="";
        $_SESSION['user_name']="";
        return TRUE;
    }







}

