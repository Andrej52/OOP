<?php

class Database {
    private $DB_name="test";
    private $DB_pwd="";
    private $DB_user="root";
    private $conn;
    protected $sql,$sql_result,$prep,$vals,$values,$rows,$tablename;
    public $data;



    //constructor 
    
    public function __construct()
    {
             $conn = new mysqli("localhost",$this->DB_user,$this->DB_pwd,$this->DB_name);
        if (!$conn->connect_error) 
        {
            return $this->conn = $conn;
        }
        else
        {
            return false;
        }
    }

    private function prepareData($post)
    {   
        $this->tablename = array_shift($post);
        $this->rows=array_keys($post);                       // getting array keys  of post
        $this->values=array_values($post);                   // getting array values of post  
        $this->vals=substr(str_repeat("?,",sizeof($post)),0,-1);   //making string of ? into prepare()
        $this->prep=str_repeat("s",sizeof($post));              //making string of  data types into bind_param()
        $this->rows=join(",",$this->rows);
    }


    public function getData($tablename)
    {
        $this->sql =("SELECT * from $tablename");
        $this->SubmitQuery($this->sql);
        try {
            if ($this->sql_result->num_rows > 0 ) {
                for ($i=0; $i < $this->sql_result->num_rows; $i++) { 
                    $this->data[$i]=mysqli_fetch_assoc($this->sql_result);
                }
            }
        } catch (PDOException $e) {
            throw "<p>data not found</p>" . $e->getMessage();
        }
    }

    public function SubmitQuery($sql)
    {
        if (!empty(trim($sql))) { 
            $sqlAction = substr($sql, 0, 6);
            try {
                $stmt = $this->conn->prepare($sql);
                if($sqlAction === "INSERT" || $sqlAction === "UPDATE" ||$sqlAction === "SELECT")
                {
                    if ($this->prep !== null) 
                    {
                       $stmt->bind_param($this->prep ,...$this->values);
                    }
                    $stmt->execute();
                    $this->sql_result= $stmt->get_result();
                }
                $stmt->close();

            } catch (PDOException $e) {
                throw "Error: " . $e->getMessage();
            }
        }
    }
    
    public function add($post)
    {
        $this->prepareData($post);
        $this->sql=("INSERT INTO $this->tablename($this->rows)  VALUES($this->vals)");

        if ($this->SubmitQuery($this->sql)) 
        {
            return true;
        }
        else
        {
            return false;
        }
        
    }

    public function edit($post,$id)
    {
        $this->prepareData($post);
        $this->sql =("UPDATE  $this->tablename SET $this->rows=$this->vals  WHERE id = $id ");
        $this->prep="s";
        if ($this->SubmitQuery($this->sql)) {
            return true;
        }
        else
        {
            return false;
        }
        
    }

    public function remove($tablename,$id)
    {
   
        $this->sql =("DELETE * FROM $tablename WHERE id = ?");
        $this->prep="s";
        $this->values=$id;
        if ($this->SubmitQuery($this->sql)) {
            return true;
        }
        else
        {
            return false;
        }
    }   
    
}