<?php
class Topic extends Database
{
    private $db;
    public $data;

    public function __construct()
    {
        $db = new Database();
        $this->db=$db;
    }
    private function databaseData($tablename)
    {
        $this->db->getData($tablename);
        $this->data= $this->db->data;
        return $this->data;
    }
    public function display($tablename)
    {
        $this->databaseData($tablename);
        if ($this->data != null) {
            foreach($this->data as $key => $row)
            {
                echo "
                <section>
                <h1>{$row['header']}</h1>
                <article>
                {$row['text']}
                </article>
                <img src='' alt='{$row['image']}'> 
                </section>
                ";
            }
        }
      
    }
    public function management($tablename)
    {
        $this->databaseData($tablename);  
        echo "<table id='{$tablename}'>
        <tr>";
            foreach ($this->data[0] as $key => $value) echo "<th>{$key}</th>";echo " <th>Akcia</th></tr>";   
            for ($i=0; $i <sizeof($this->db->data) ; $i++) 
            { 
                echo  "<tr>";
                    foreach ($this->data[$i] as $key => $value) echo "<td>{$value}</td>"; 
                    echo "  <td>
                    <button id='{$this->data[$i]['ID']}'>delete</button>
                    <button id='{$this->data[$i]['ID']}'>edit</button>
                    </td> 
                </tr>";
                }
        echo "</table>";
    }
}