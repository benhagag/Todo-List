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
  
 
  

  

}

?>