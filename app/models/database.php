<?php

class Database {
    private $DB_name="test";
    private $conn,$result;
    protected $prep,$sql,$values,$sql_result;
    public $token;
    public $data;


    //constructor 
    
    public function __construct()
    {
        $this->connect_DB(); 
        $this->getResult();
    }

    // connection to Database

    private function connect_DB()
    {
        $conn = new mysqli("localhost","root","",$this->DB_name);
        if (!$conn->connect_error) 
        {
            $this->result = true;
            return $this->conn = $conn;
        }
        else
        {
            $this->result=false;
        }
    }

    // checks if token is valid or invalid

    private function getResult()
    {
        if($this->result == false)  
        {
            echo "<p>Pripojenie sa nepodarilo</p>";
        } 
        else
        {
            return $this->conn;
        }
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
        if (trim($sql) != '') { 
            $sqlAction = substr($sql, 0, 6);
            try {
           
                $stmt = $this->conn->prepare($sql);
                if($sqlAction === "INSERT" || $sqlAction === "UPDATE" ||$sqlAction === "SELECT")
                {
                    if ($this->prep !== null) {
                       $stmt->bind_param($this->prep ,...$this->values);
                    }
                    $stmt->execute();
                    $this->sql_result= $stmt->get_result();
                    $this->sql_result;
                }
                return $this->token=TRUE;
                $stmt->close();

            } catch (PDOException $e) {
                throw "Error: " . $e->getMessage();
            }
        }
    }
    
    public function add($post)
    {
        $tablename = array_shift($post);    // getting table value from hidden form input
        $rows = array_keys($post);          // getting array keys into variable $rows
        $values = array_values($post);      // getting array values into variable $values
        $count=sizeof($post);               // getting length of array into variable $count
        $prep = str_repeat("s",$count);       //making string of  data types into bind_param()
        $vals = str_repeat("?,",$count);      //making string of ? into prepare()
        $vals = substr($vals, 0, -1);   //cutting last "," in vals

        // skusit lepsie nacodid tuto pasaz po line 7
        $rows = implode(",ß",$rows);
        $rows = explode("ß",$rows);
        $rows = implode($rows);      
        $values=array_values($post);
    
        $this->values=$values;
        $this->prep=$prep;
        $this->sql=("INSERT INTO $tablename($rows)  VALUES($vals)");
        $this->SubmitQuery($this->sql);
        
    }
    
   public function edit($post)
    {
        $this->sql =("UPDATE  ?
        SET  
        WHERE id = ?
        ");
    }

    public function remove($tablename,$id)
    {
        $this->sql =("DELETE from $tablename where id = ?");
        $this->prep="s";
        $this->values=$id;
    }   
    
}