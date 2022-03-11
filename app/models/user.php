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
            $this->userExist();
            $_POST['password']= $this->password;
            $this->db->add($_POST);
            $this->signIn();

            if($this->result->num_rows == 1)
            {
                session_start();
                foreach($this->result as $row)
                {
                    $_SESSION['username'] =$row['username'];
                    $_SESSION['id'] =$row['ID'];
                }
                $_SESSION["loggedin"] = TRUE;
                http_response_code(200);
                echo "user Registerered Succesfully!";
                exit();
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
        if (empty($_SESSION)) {
            http_response_code(200);
            echo "user Logged out Succesfully!";
        }
            http_response_code(400);
            echo "user Logged out Unsuccesfully!";
        exit();
    }

    private function userExist()
    {
        $sql = "SELECT email from  users where email=?";
        $this->db->prep="s";
        $this->db->values=[$this->email];
        $this->db->SubmitQuery($sql);
        if ($this->db->sql_result->num_rows > 0) {
            http_response_code(409);
            echo"userExist"; 
            exit();
        }
    }
}