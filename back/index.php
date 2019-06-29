 <?php
 header("Access-Control-Allow-Origin: *");
 header('Content-Type: application/json');
 header("Access-Control-Allow-Methods: GET, PUT, POST, DELETE");
 header("Access-Control-Allow-Headers", "Origin, X-Requested-With, Content-Type, Accept");

 require 'Todo.php';

 if(isset($_SERVER["REQUEST_URI"])){

    $TodoClass = new Todo();
    $data = (array)json_decode(file_get_contents("php://input"));

    if($_SERVER["REQUEST_METHOD"] == "GET"){

        $allTodo = $TodoClass->alldata();
        print_r(json_encode($allTodo));

}


 }

 ?>