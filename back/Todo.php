<?php
require 'DB.php';

class Todo
{
    private $db;
    private $conn;

    public function __construct()
    {
      $this->db = DB::conection();
      $this->conn=$this->db->getConnection();

    }


    // the first page - diplay all rows 

    public function alldata(){
        $sql = "SELECT * FROM `todo`";
        $result = $this->db->queryArray($sql);
        return $result;
    }

    // update row 
    public function update($data){

        $data = $this->db->secure($data);
        $column = $data["column"]; 
        $id = $data["id"]; 
        $text = $data["textToupdate"];

        $sql = "UPDATE todo
        SET `$column` = '$text'
        WHERE `id`= $id";
      
        if  ($this->conn->query($sql) == true) {
          return true;
        } else {
          echo "Error: " . $sql . "<br>" . mysqli_error($this->conn);
        }
          
    }
  
 
  

  

}

?>