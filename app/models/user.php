<?php
       include_once "database.php";
class User extends Database
{   
    public $name;
    public $username;
    public $password;
    public $email;
    public $result;
    private $db;
    public function __construct()
    {
        $this->db=new Database();
        return $this->db;
    }
    
    public function signUp()
    {
        if ($this->userExist()) {
            $this->result="userExist";
        }
        else
        {
            $_POST['password']= $this->password;
            $this->db->add($_POST);
            $this->signIn();
            if($this->result->num_rows == 1)
        {
            session_start();
            foreach($this->result as $key => $row)
            {
            $username=$row['username'];
            $id=$row['ID'];
            }
            $_SESSION['username'] =$username;
            $_SESSION['id'] =$id;
            $_SESSION["loggedin"] = TRUE;
        }
           return $this->result=$this->db->token; 
        }
    }

    public function signIn()
    {
    
        $sql = "SELECT * from  users where username = ? AND password = ? ";
        $this->db->prep="ss";
        $this->db->values=[$this->username,$this->password];
        $this->db->SubmitQuery($sql);
        $this->result=$this->db->sql_result;
    }

    public function signOut()
    {
        session_start();
        unset($_SESSION);
        session_destroy();
        header("Location:/OOP/public/login?result=LoggoedOut");
    }

    private function userExist()
    {
        $sql = "SELECT email from  users where email=?";
        $this->db->prep="s";
        $this->db->values=[$this->email];
        $this->db->SubmitQuery($sql);
        if ($this->db->sql_result->num_rows > 0) {
            return $this->result=true;
        }
        else
        {
            return $this->result=false;
        }
    }
}