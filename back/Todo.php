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
    // delete row 
    public function delete($data){

        $data = $this->db->secure($data);
        $id = $data["id"];

        $sql = "DELETE FROM todo WHERE id=$id";

        if  ($this->conn->query($sql) == true) {
          return true;
        } else {
          echo "Error: " . $sql . "<br>" . mysqli_error($this->conn);
        }
    }

    // add row 
    public function add($data){

        $data = $this->db->secure($data);
        $name = $data["name"];
        $todo = $data["todo"];

        $sql = "INSERT INTO todo (name, todo)
        VALUES ('$name','$todo')";

        if  ($this->conn->query($sql) == true) {
            $newRow = $this->getNewInsertedRow();
            return $newRow;
        } else {
          echo "Error: " . $sql . "<br>" . mysqli_error($this->conn);
        }

    }


    // return the new row which is inseretd last ! 
    public function getNewInsertedRow(){

        $sql = "SELECT * from todo WHERE id = LAST_INSERT_ID()";
        $result = $this->db->queryArray($sql);
        return $result;
    }
}

?>