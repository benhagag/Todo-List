<?php

class DB {
  private $conn;
  private $servername;
  private $username;
  private $password;
  private $dbname;
  static $instance=null;

  public function __construct()
  {
    $this->servername="localhost";
    $this->username="root";
    $this->password="";
    $this->dbname="matrix";
  
    $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
  
    // Check connection
    if ($this->conn->connect_error) {
      die("Connection failed: " . $this->conn->connect_error);
    }
      
      return $this->conn;
    }

  static function conection(){
      if(self::$instance==null){

        return self::$instance=new DB();

      }else{

        return self::$instance;
      }

  }

 public function getConnection() {
   return $this->conn;
 }

 // secure query from sql injection !
 public function secure($dataToSecure){

  $dataSecured = [];
    foreach ($dataToSecure as $key => $data) {

      if(is_numeric($data)){

        $data=(int) $data;

      }else{

        $data=mysqli_real_escape_string($this->conn,$data);

      }
      $dataSecured[$key] = $data;
    }

    return $dataSecured;
 }

 public function queryArray($sql){

  $allrows =[];
  $result = $this->conn->query($sql);

  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        array_push($allrows, $row);
    }

  } else {
   return false;
  }
  
  return $allrows;


 }





 public function __destruct(){

   $this->conn->close();
}
}

?>
